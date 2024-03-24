<?php
$page = "Gallery";
ob_start();
?>
<center>
  <h1>All you can see Gallery</h1>
</center>
<?php
$heroContent = ob_get_clean();
include 'includes/header.php';
?>
<h1 class="header-title text-center p-3">Artistic Gallery</h1>
<div class="gallery-grid">
  <?php
  foreach ($images as $image) {
    displayProduct($image, $wishlist, 'gallery.php');
  }
  ?>
</div>

<?php
include 'includes/footer.php';
?>