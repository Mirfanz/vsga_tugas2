<?= $this->extend('template/admin'); ?>
<?= $this->section('head'); ?>
<style>
  .profile-user-img {
    aspect-ratio: 1/1;
  }
</style>
<?= $this->endSection(); ?>
<?= $this->section('content') ;?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/img/poster-sonic.jpg'); ?>" alt="User profile picture" />
            </div>
            <h3 class="profile-username text-center"><?= $user->name; ?></h3>
            <p class="text-muted text-center"><?= $user->posisi; ?></p>
            <hr />
            <strong><i class="fas fa-book mr-1"></i> NIK</strong>
            <p class="text-muted"><?= $user->nik; ?></p>
            <strong><i class="fas fa-birthday-cake mr-1"></i> Ulang Tahun</strong>
            <p class="text-muted"><?= $user->birth; ?></p>
            <strong><i class="fas fa-map-location mr-1"></i> Alamat</strong>
            <p class="text-muted"><?= $user->address; ?></p>
            <strong><i class="fas fa-map-marker-alt mr-1"></i> Provinsi</strong>
            <p class="text-muted"><?= $user->province; ?></p>
            <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
            <p class="text-muted"><?= $user->email; ?></p>
          </div>
        </div>

      </div>
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link" href="<?= base_url('profile'); ?>">Layanan</a></li>
              <li class="nav-item"><a class="nav-link active" href="#">Portofolio</a></li>
              <li class="nav-item"><a class="nav-link" href="#settings">Pengaturan</a></li>
            </ul>
          </div>
          <div class="card-body">
            <div class="mb-4">
              <h5><i class="fa fa-graduation-cap"></i> Bidang Keahlian:</h5>
              <p><?= $user->bidang_keahlian; ?></p>
            </div>
            <div class="mb-4">
              <h5><i class="fa fa-book"></i> Riwayat Pelatihan:</h5>
              <?php if(!$user->riwayat_pelatihan): ?>
              <p>Belum pernah mengikuti pelatihan.</p>
              <?php else: ?>
                <?php $pelatihan = explode(',', $user->riwayat_pelatihan); ?>
                <?php  foreach($pelatihan as $p): ?>
                  <p class="mb-1"><i class="fa fa-arrows me-2"></i> <?= $p; ?></p>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
            <div class="mb-4">
              <h5><i class="fa fa-cubes"></i> Project:</h5>
              <?php if($user->riwayat_project): ?>
              <a href="<?= $user->riwayat_project; ?>" target="blank"><i class="fa fa-link"></i> <?= $user->riwayat_project; ?></a>
              <?php else: ?>
              <p>Belum memiliki project.</p>
              <?php endif; ?>
            </div>
            <div class="mb-4">
              <h5><i class="fa fa-file-contract"></i> Sertifikat:</h5>
              <?php if($user->sertifikat_dimiliki): ?>
              <a href="<?= base_url('assets/sertifikat/'.$user->sertifikat_dimiliki); ?>" target="blank"><i class="fa fa-link"></i> Lihat Sertifikat</a>
              <?php else: ?>
              <p>Belum memiliki sertifikat.</p>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ;?>
<?= $this->section('script') ;?>
<?= $this->endSection() ;?>
