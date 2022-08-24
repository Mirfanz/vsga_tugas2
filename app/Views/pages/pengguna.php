<?= $this->extend('template/admin') ;?>
<?= $this->section('head') ;?>
<style>
  .content{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(15rem, 1fr));
    gap: 1rem;
    /* background-color: red; */
  }
  .card-user{
    transition: all 300ms;
    background: white;
  }
  .card-user:hover{
    transform: translateY(-.5rem);
    z-index: 10;
    /* background: linear-gradient(to top,rgb(220, 220, 220)5%,white 95%); */
    box-shadow: 0 10px 25px -10px lightgray;
  }
  .user-image{
    width: 5rem;
    aspect-ratio: 1/1;
    border-radius: 50%;
  }
</style>
<?= $this->endSection() ;?>

<?= $this->section('content') ;?>
<div class="container mb-3">
  <div class="content">
    <?php foreach($datas as $data) : ?>
    <div class="card mb-0 card-user">
      <div class="card-body d-flex flex-column align-items-center gap-3 text-center">
        <img class="user-image shadow" src="<?= base_url('assets/img/poster-sonic.jpg'); ?>" alt="IMG">
        <div>
          <h6 class="mb-0"><?= $data['name']; ?></h6>
          <div class="text-muted"><?= $data['posisi']; ?></div>
        </div>
        <div class="d-flex gap-1">
          <a href="<?= base_url('profile/'.$data['uid']); ?>" class="btn btn-sm btn-primary">Kunjungi</a>
          <div class="dropdown">
            <button data-bs-toggle="dropdown" class="btn btn-sm btn-secondary"><i class="fa fa-gear"></i></button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="triggerId">
              <?php if($posisi === 'Admin'): ?>
              <a class="dropdown-item" href="<?= base_url('user/jadianggota/'.$data['uid']); ?>">Jadikan Anggota</a>
              <a class="dropdown-item" href="<?= base_url('user/jadiketua/'.$data['uid']); ?>">Jadikan Ketua</a>
              <a class="dropdown-item" href="<?= base_url('user/jadisekretariat/'.$data['uid']); ?>">Jadikan Sekretariat</a>
              <?php endif; ?>
              <?php if($posisi === 'Sekretariat'): ?>
              <a class="dropdown-item" href="<?= base_url('user/jadianggota/'.$data['uid']); ?>">Jadikan Anggota</a>
              <?php endif; ?>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-center" href="<?= base_url('portofolio/'.$data['uid']); ?>">Lihat Portofolio</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>
<?= $this->endSection() ;?>

<?= $this->section('script') ;?>
<?= $this->endSection() ;?>
