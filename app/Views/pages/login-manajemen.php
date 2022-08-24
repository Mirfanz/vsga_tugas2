<?= $this->extend('template/admin'); ?>

<?= $this->section('head') ;?>
<style>
  .w-max {
    width: max-content !important;
  }
</style>
<?= $this->endSection() ;?>
<?= $this->section('content') ;?>
<div class="container">
<table class="table table-striped table-responsive-md rounded-3 bg-white table-bordered">
  <thead>
    <tr>
      <th class="w-max">No</th>
      <th class="w-max">Tanggal</th>
      <th>Posisi</th>
      <th>Nama</th>
      <th>Platform</th>
      <th>Ip Address</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=0; ?>
    <?php foreach($datas as $data): ?>
    <?php $i++; ?>
    <tr>
      <th class="w-max" scope="row"><?= $i; ?></th>
      <td class="w-max" style="width: max-content;"><?= date('D, d/M/Y - H:i:s', $data['time']); ?></td>
      <td><?= $data['posisi']; ?></td>
      <td><?= $data['name']; ?></td>
      <td><?= $data['platform']; ?></td>
      <td><?= $data['ip']; ?></td>
    </tr>
    <?php endforeach; ?>
    
  </tbody>
</table>

</div>
<?= $this->endSection() ;?>

