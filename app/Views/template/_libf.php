<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="<?= base_url('library/fontawesome/js/all.min.js'); ?>"></script>
<script>
  <?php if(session()->getFlashdata('success')!=null): ?>
    Swal.fire({title:"Success!", text:"<?= session()->getFlashdata("success"); ?>", icon:"success"});
  <?php endif; ?>
  <?php if(session()->getFlashdata('warning')!=null): ?>
    Swal.fire({title:"Warning!", text:"<?= session()->getFlashdata("warning"); ?>", icon:"warning"});
  <?php endif; ?>
  <?php if(session()->getFlashdata('error')!=null): ?>
    Swal.fire({title:"Error!", text:"<?= session()->getFlashdata("error"); ?>", icon:"error"});
  <?php endif; ?>
</script>