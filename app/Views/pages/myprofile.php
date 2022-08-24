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
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/img/poster-sonic.jpg'); ?>" alt="User profile picture" />
            </div>

            <h3 class="profile-username text-center"><?= $user->name; ?></h3>

            <p class="text-muted text-center"><?= $user->posisi; ?></p>

            <hr>
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

            <!-- </div> -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- About Me Box -->
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#">Layanan</a></li>
              <li class="nav-item"><a class="nav-link" href="<?= base_url('portofolio'); ?>">Portofolio</a></li>
              <li class="nav-item"><a class="nav-link" href="#settings">Pengaturan</a></li>
            </ul>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="content d-flex flex-wrap gap-4">
              <div class="card card-success">
                <div class="card-header">
                  <h4 class="mb-0">Lihat Pengunjung</h4>
                </div>
                <div class="card-body" style="max-width: 20rem">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, iste!</p>
                  <a href="#" class="btn btn-sm btn-success">Kunjungi Halaman</a>
                </div>
              </div>
              <div class="card card-success">
                <div class="card-header">
                  <h4 class="mb-0">Portofolio Saya</h4>
                </div>
                <div class="card-body" style="max-width: 20rem">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, iste!</p>
                  <a href="#" class="btn btn-sm btn-success">Kunjungi Halaman</a>
                </div>
              </div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>

<?= $this->endSection() ;?>
<?= $this->section('script') ;?>
<?= $this->endSection() ;?>
