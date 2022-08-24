<?= $this->extend('template/admin') ;?>
<?= $this->section('head') ;?>
<?= $this->endSection() ;?>
<?= $this->section('content') ;?>
<div class="container">
  <form method="POST" class="rounded-3 bg-white p-3" novalidate>
    <div class="form-group mb-3">
      <label>Nama Lengkap</label>
      <input type="text" class="form-control <?= $validation->hasError('name')? 'is-invalid':''; ?>" name="name" placeholder="Nama Lengkap" value="<?= old('name')? old('name'):$user->name; ?>">
      <div class="invalid-feedback">
        <?= $validation->getError('name'); ?>
      </div>
    </div>
    <div class="form-group mb-3">
      <label>NIK</label>
      <input type="number" class="form-control" name="nik" readonly placeholder="Nomor NIK" value="<?= $user->nik; ?>">
    </div>
    <div class="form-group mb-3">
      <label>Tanggal Lahir</label>
      <input type="date" class="form-control <?= $validation->hasError('birth')? 'is-invalid':''; ?>" name="birth" placeholder="Tanggal Lahir" value="<?= old('birth')? old('birth'):$user->birth; ?>">
      <div class="invalid-feedback">
        <?= $validation->getError('birth'); ?>
      </div>  
    </div>
    <div class="form-group mb-3">
      <label>Email</label>
      <input type="email" class="form-control" readonly name="email" placeholder="Nama Lengkap" value="<?= old('email')? old('email'):$user->email; ?>">
    </div>
    <div class="form-group mb-3">
      <label>Alamat</label>
      <input type="text" class="form-control <?= $validation->hasError('address')? 'is-invalid':''; ?>" name="address" placeholder="Nama Lengkap" value="<?= old('address')? old('address'):$user->address; ?>">
      <div class="invalid-feedback">
        <?= $validation->getError('address'); ?>
      </div>  
    </div>
    <div class="form-group mb-3">
      <label>Provinsi</label>
      <input type="text" class="form-control <?= $validation->hasError('province')? 'is-invalid':''; ?>" name="province" placeholder="Nama Lengkap" value="<?= old('province')? old('province'):$user->province; ?>">
      <div class="invalid-feedback">
        <?= $validation->getError('province'); ?>
      </div>  
    </div>
    <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
  </form>
</div>
<?= $this->endSection() ;?>
<?= $this->section('script') ;?>
<?= $this->endSection() ;?>