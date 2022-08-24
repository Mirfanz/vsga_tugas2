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
            <form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
              <div class="form-group mb-3">
                <label class="form-label">Bidang Keahlian</label>
                <input type="text" required class="form-control <?= $validation->hasError('bidang')? 'is-invalid':'';?>" name="bidang" value="<?= old('bidang'); ?>" list="listBidangKeahlian" placeholder="Bidang Keahlian" />
                <small class="invalid-feedback"><?= $validation->getError('bidang'); ?></small>
                <datalist id="listBidangKeahlian">
                  <option value="Teknik Kendaraan Ringan"></option>
                  <option value="Teknik Sepeda Motor"></option>
                  <option value="Teknik Elektronika"></option>
                  <option value="Teknik Komputer dan Jaringan"></option>
                  <option value="Multimedia"></option>
                  <option value="Teknik Informatika"></option>
                </datalist>
              </div>
              <div class="form-group mb-3">
                <label class="form-label">Riwayat Pelatihan <span class="text-muted">( optional )</span></label>
                <input type="text" name="pelatihan" value="<?= old('pelatihan'); ?>" class="form-control" placeholder="Riwayat Pelatihan">
              </div>
              <div class="form-group mb-3">
                <label class="form-label">Sertifikat <span class="text-muted">( optional )</span></label>
                <input type="file"  name="sertifikat" class="form-control <?= $validation->hasError('sertifikat')? 'is-invalid' : '';?>" >
                <small class="invalid-feedback"><?= $validation->getError('sertifikat'); ?></small>
                <small class="text-muted">masukkan semua sertifikat dalam file .pdf</small>
              </div>
              <div class="form-group mb-3">
                <label class="form-label">Project <span class="text-muted">( optional )</span></label>
                <input type="url" name="project" value="<?= old('project'); ?>" class="form-control <?= $validation->hasError('project')? 'is-invalid' : '';?>" placeholder="https://sesuatu.com">
                <small class="text-muted">url project yang pernah anda buat.</small>
              </div>
              <button class="btn btn-primary">Posting Portofolio</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ;?>
<?= $this->section('script') ;?>
<?= $this->endSection() ;?>
