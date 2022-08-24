<?= $this->extend('template/blank'); ?>
<?= $this->section('head'); ?>
<style>
  .wrapper {
    width: 100vw;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .content {
    max-width: 100%;
    box-sizing: border-box; 
    box-shadow: 0 5px 25px -5px gray;
  }
  .form-control {
    width: 20rem;
    max-width: 100%;
  }
</style>
<?= $this->endSection(); ?>
<?= $this->section('content') ;?>
<div class="wrapper">
  <div>
    <h2 class="text-center mb-4">The Programmer</h2>
    <div class="card content">
      <div class="card-body">
        <p class="text-center">Masuk ke akun saya</p>
        <form method="POST" novalidate>
          <!-- <?php old(''); ?> -->
          <div class="form-group mb-3">
            <label class="form-label">Nomor NIK</label>
            <!-- <button class="btn btn-secondary" type="button"><i class="fa fa-envelope"></i></button> -->
            <input type="text" name="nik" required minlength="16" maxlength="16" class="form-control <?= $validation->hasError('nik')?'is-invalid':''; ?>" placeholder="Nomor NIK" value="<?= old('nik'); ?>" />
            <div class="invalid-feedback">
              <?= $validation->getError('nik'); ?>
            </div>
          </div>
          <div class="form-group mb-3">
            <label class="form-label">Password</label>
            <!-- <button class="btn btn-secondary" type="button"><i class="fa fa-lock"></i></button> -->
            <input type="password" name="password" required class="form-control <?= $validation->hasError('password')?'is-invalid':''; ?>" placeholder="Password" />
            <div class="invalid-feedback">
              <?= $validation->getError('password'); ?>
            </div>
          </div>
          <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember" />
                Remember me
              </label>
            </div>
            <button class="btn btn-primary mt-2" type="submit"><i class="fa fa-sign-in-alt"></i> MASUK</button>
          </div>
        </form>
        <div class="text-center mt-4">Belum punya akun? <a href="<?= base_url('register'); ?>">Daftar</a></div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ;?>
<?= $this->section('script') ;?>
<?= $this->endSection() ;?>
