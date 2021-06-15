<h1>Task List</h1>
<button type="button" class="btn btn-primary showAddTaskModal" data-bs-toggle="modal" data-bs-target="#formTaskModal">
  Add Task
</button>
<span><?php Flasher::flash(); ?></span>
<form action="<?= BASEURL; ?>/task/search" method="POST">
  <div class="input-group mb-3">
    <input type="text" class="form-control" name="keyword-task" id="keyword-task" placeholder="Task" aria-label="Task" aria-describedby="submit-search" autocomplete="off">
    <button class="btn btn-primary" type="submit" id="submit-search">Search</button>
  </div>
</form>
<ul class="list-group">
  <?php foreach ($data as $key => $value) : ?>
    <li class="list-group-item">
      <?= $value['task_name'] ?>
      <a href="<?= BASEURL; ?>/task/retrieve/<?= $value['id']; ?>" class="btn btn-primary badge float-end ms-1">Detail</a>
      <a href="" class="btn btn-dark badge float-end ms-1 showEditTaskModal" data-id="<?= $value['id']; ?>" data-bs-toggle="modal" data-bs-target="#formTaskModal">Ubah</a>
    </li>
  <?php endforeach; ?>
</ul>

<!-- Modal -->
<div class="modal fade" id="formTaskModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="formTaskModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formTaskModalTitle">Add Task</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/task/create" method="POST">
          <div class="form-floating mb-3">
            <input type="hidden" class="form-control" id="id" name="id">
            <label for="id">ID</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="task" name="task" placeholder="Insert Task Name..." autocomplete="off">
            <label for="task">Task Name</label>
          </div>
          <button id="submit" type="submit" class="btn btn-primary float-end">Add Task</button>
        </form>
      </div>
      <div class="modal-footer">
        <p>&nbsp;</p>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $(function() {

    $('.showAddTaskModal').on('click', function() {
      $('#formTaskModalTitle').html('Add Task');
      $('#submit').html('Add Task');
      $('.modal-body form').attr('action', '<?= BASEURL; ?>/task/create');

      $('#task').val(null);
    });

    $('.showEditTaskModal').on('click', function() {
      $('#formTaskModalTitle').html('Ubah Data Task');
      $('#submit').html('Ubah Data Task');
      $('.modal-body form').attr('action', '<?= BASEURL; ?>/task/update');

      const id = $(this).data('id');

      $.ajax({
        url: '<?= BASEURL; ?>/task/retrieveUpdate',
        data: {
          id: id
        },
        method: 'post',
        dataType: 'json',
        success: function(result) {
          $('#id').val(result.id);
          $('#task').val(result.task_name);
        }
      });
    });
  });
</script>