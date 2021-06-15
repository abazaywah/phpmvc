<h1>Detail Task</h1>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?= $data['task_name']?></h5>
    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="<?= BASEURL; ?>/task" class="card-link btn btn-dark" role="button">Back</a>
    <a href="<?= BASEURL; ?>/task/delete/<?= $data['id']?>" class="card-link btn btn-warning" role="button" onclick="return confirm('Apakah Anda yakin menghapus data <?= $data['task_name']; ?>?')">Delete</a>
  </div>
</div>