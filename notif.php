<?php
    if (session_status() == PHP_SESSION_NONE){
        session_start();

        }
?>

<div class="">
  <?php if(isset($_SESSION['flash'])): ?>
       <?php foreach ($_SESSION['flash'] as $type => $message): ?>
            <br>
             <div class="alert alert-<?= $type; ?> text-<?= $type; ?>" role="alert">

                    <?= $message; ?>
               
             </div>
       <?php endforeach; ?>
       <?php unset($_SESSION['flash']); ?>
  <?php endif; ?>
</div>
