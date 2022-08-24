<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Include Libreries -->
    <?= $this->include('template/_libh') ;?>
    <!-- Others -->
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>" />
    <title><?= isset($title)?$title .' - The Programmer':'The Programmer'; ?></title>
    <?= $this->renderSection('head') ;?>
  </head>
  <body>
    <?= $this->renderSection('content') ;?>
    <!-- <div class="container position-fixed bg-black bottom-0 end-0 start-0" style="z-index: 10000; overflow: visible !important">
      <a href="#" class="btn-to-top"><i class="bx bxs-chevrons-up"></i></a>
    </div> -->
    <div class="toast-container position-fixed bottom-0 end-0 pb-3 px-3"></div>
    
    <!-- Libraries -->
    <?= $this->include('template/_libf'); ?>
    <script src="<?= base_url('js/app.js'); ?>"></script>
    <?= $this->renderSection('script') ;?>
  </body>
</html>
