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
    max-width: 100% !important;
    box-sizing: border-box !important;
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
        <p class="text-center">Mendaftar akun baru</p>
        <form method="POST" novalidate>
          <!-- <?php old(''); ?> -->
          <div class="form-group mb-3">
            <label class="form-label">NIK</label>
            <input type="text" class="form-control <?= $validation->hasError('nik')? 'is-invalid':''; ?>" name="nik" required minlength="16" maxlength="16" placeholder="Nomor NIK" value="<?= old('nik'); ?>" />
            <div class="invalid-feedback"><?= $validation->getError('nik'); ?></div>
          </div>
          <div class="form-group mb-2">
            <label class="form-label">Password</label>
            <input type="password" class="form-control mb-2 <?= $validation->hasError('password')? 'is-invalid':''; ?>" name="password" required minlength="8" placeholder="Password" value="<?= old('password'); ?>"/>
            <input type="password" class="form-control <?= $validation->hasError('password')? 'is-invalid':''; ?>" name="repeat_password" required minlength="8" placeholder="Ulangi password" value="<?= old('repeat_password'); ?>"/>
            <div class="invalid-feedback"><?= $validation->getError('password'); ?></div>
          </div>
          <div class="form-check ">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" id="showpassword" />
              Show Password
            </label>
          </div>
          <button class="btn btn-primary mt-3 w-100" type="submit">Selanjutnya</button>
        </form>
        <div class="text-center mt-4">Sudah punya akun? <a href="<?= base_url('login'); ?>">Masuk</a></div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ;?>
<?= $this->section('script') ;?>
<script>
  const inpPassword = document.querySelector("input[name=password]");
  const inpRPassword = document.querySelector("input[name=repeat_password]");
  const checkShowPass = document.getElementById("showpassword");

  checkShowPass.onchange = (e) => {
    if (e.target.checked) {
      inpPassword.type = "text";
      inpRPassword.type = "text";
    } else {
      inpPassword.type = "password";
      inpRPassword.type = "password";
    }
  };
</script>
<?= $this->endSection() ;?>
