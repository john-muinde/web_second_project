<?php
$page = "Index";
ob_start();
?>
<center>
  <h1 class="header-title">Welcome to Artistic Gallery</h1>
</center>
<center>
  <p>
    Our Art gallery is one of the best art galleries in the world. We
    have a<br />
    wide range of paintings,sculptures, and other art forms. We have
    <br />
    paintings from the 16th century to the 21st century. We have
    paintings
    <br />
    from all the famous painters like
    <a href="https://en.wikipedia.org/wiki/Leonardo_da_Vinci" target="_blank">Leonardo da Vinci</a>,
    <a href="https://en.wikipedia.org/wiki/Pablo_Picasso" target="_blank">Pablo Picasso,</a><br />
    <a href="https://en.wikipedia.org/wiki/Vincent_van_Gogh" target="_blank">Vincent van Gogh</a>,
    <a href="https://en.wikipedia.org/wiki/Claude_Monet" target="_blank">Claude Monet</a>,
    <a href="https://en.wikipedia.org/wiki/Rembrandt" target="_blank">Rembrandt</a>, and many more.
  </p>
</center>
<?php
$heroContent = ob_get_clean();
include 'includes/header.php';
?>
<h1 class="header-title text-center p-3">Visit us for</h1>

<div class="card-container">
  <div class="card">
    <div class="image">
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Mona_Lisa%2C_by_Leonardo_da_Vinci%2C_from_C2RMF_retouched.jpg/405px-Mona_Lisa%2C_by_Leonardo_da_Vinci%2C_from_C2RMF_retouched.jpg" alt="" title="Mona Lisa - Leonardo da Vinci" />
    </div>
    <div class="text-content">
      <h3>Paintings</h3>
    </div>
  </div>
  <div class="card">
    <div class="image">
      <img src="/assets/images/picasso-sculpture.jpg" alt="" title="Picasso Sculpture" />
    </div>
    <div class="text-content">
      <h3>Sculptures</h3>
    </div>
  </div>
  <div class="card">
    <div class="image">
      <img src="/assets/images/michael-artifact.jpg" alt="" title="Painting - Picasso" />
    </div>
    <div class="text-content">
      <h3>Artifacts</h3>
    </div>
  </div>
  <div class="card">
    <div class="image">
      <img src="/assets/images/portrait-Michelangelo.jpeg" alt="" title="Self-portrait - Michael Angelo" />
    </div>
    <div class="text-content">
      <h3>Portraits</h3>
    </div>
  </div>
</div>

<h1 class="header-title text-center p-3">Art for Order</h1>

<div class="gallery-grid">
  <?php
  foreach ($images as $image) {
    displayProduct($image, $wishlist, 'index.php');
  }
  ?>
</div>

<?php
include 'includes/footer.php';
?>