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
  <img src="/assets/images/gallery/gallery-1.jpg" alt="random image" />
  <img src="/assets/images/gallery/gallery-2.jpg" alt="random image" />
  <img src="/assets/images/gallery/gallery-3.jpg" alt="random image" />
  <img src="/assets/images/gallery/gallery-4.jpg" alt="random image" />
  <img src="/assets/images/gallery/gallery-5.jpg" alt="random image" />
  <img src="/assets/images/gallery/gallery-6.jpg" alt="random image" />
  <img src="/assets/images/gallery/gallery-7.jpg" alt="random image" />
  <img src="/assets/images/gallery/gallery-8.jpg" alt="random image" />
</div>

<?php
include 'includes/footer.php';
?>