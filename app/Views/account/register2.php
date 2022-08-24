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
    <h2 class="text-center my-3">The Programmer</h2>
    <div class="card content">
      <div class="card-body">
        <?php if($validation->hasError('accept')): ?>
          <div class="alert alert-warning" role="alert">
            <strong>Mohon centang saya setuju.</strong>
          </div>
        <?php endif; ?>
        <form method="POST" novalidate>
          <!-- <?php old(''); ?> -->
          <div class="form-group mb-2">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control <?= $validation->hasError('name')?'is-invalid' : ''; ?>" name="name" required placeholder="Nama Lengkap" value="<?= old('name'); ?>" />
            <div class="invalid-feedback"><?= $validation->getError('name'); ?></div>
          </div>

          <div class="form-group mb-2">
            <label class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control <?= $validation->hasError('birth')?'is-invalid' : ''; ?>" name="birth" required value="<?= old('birth'); ?>" placeholder="Tanggal lahir" />
            <div class="invalid-feedback"><?= $validation->getError('birth'); ?></div>
          </div>

          <div class="form-group mb-2">
            <label class="form-label">Email</label>
            <input type="email" class="form-control <?= $validation->hasError('email')?'is-invalid' : ''; ?>" name="email" required placeholder="Email" value="<?= old('email'); ?>" />
            <div class="invalid-feedback"><?= $validation->getError('email'); ?></div>
          </div>
          <div class="form-group mb-2">
            <label class="form-label">Alamat</label>
            <input
              type="text"
              class="form-control <?= $validation->hasError('address')?'is-invalid' : ''; ?>"
              name="address"
              minlength="10"
              maxlength="100"
              required
              placeholder="Jl. Prof. Sudarto, Tembalang, Kec. Tembalang, Kota Semarang, Jawa Tengah 50275"
              value="<?= old('address'); ?>"
            />
            <div class="invalid-feedback"><?= $validation->getError('address'); ?></div>
          </div>
          <div class="form-group mb-2">
            <label class="form-label">Provinsi</label>
            <select class="form-select <?= $validation->hasError('name')?'is-invalid' : ''; ?>" name="province" required>
              <option value="" disabled selected>Pilih Provinsi</option>
              <option value="Jawa Barat" <?= old('province')==='Jawa Barat'? 'selected':''; ?>>Jawa Barat</option>
              <option value="Jawa Tengah" <?= old('province')==='Jawa Tengah'? 'selected':''; ?>>Jawa Tengah</option>
              <option value="Jawa Timur" <?= old('province')==='Jawa Timur'? 'selected':''; ?>>Jawa Timur</option>
            </select>
            <div class="invalid-feedback"><?= $validation->getError('province'); ?></div>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="accept" required/>
                Accept the <a href="#">terms</a>.
              </label>
            </div>
            <button class="btn btn-primary" type="submit">Daftar Sekarang</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ;?>
<?= $this->section('script') ;?>
<?= $this->endSection() ;?>
