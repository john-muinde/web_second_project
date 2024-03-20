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

<!-- Our prices in a table -->
<?php
$images = [
  ["id" => 1, "name" => "Mona Lisa by Leonardo da Vinci", "price" => 545894, "src" => "https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Mona_Lisa%2C_by_Leonardo_da_Vinci%2C_from_C2RMF_retouched.jpg/405px-Mona_Lisa%2C_by_Leonardo_da_Vinci%2C_from_C2RMF_retouched.jpg"],
  ["id" => 2, "name" => "Guernica by Pablo Picasso", "price" => 7368623, "src" => "https://upload.wikimedia.org/wikipedia/en/7/74/PicassoGuernica.jpg"],
  ["id" => 3, "name" => "Starry Night by Vincent van Gogh", "price" => 432343, "src" => "https://upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Van_Gogh_-_Starry_Night_-_Google_Art_Project.jpg/525px-Van_Gogh_-_Starry_Night_-_Google_Art_Project.jpg"],
  ["id" => 4, "name" => "Water Lilies by Claude Monet", "price" => 1289813, "src" => "https://upload.wikimedia.org/wikipedia/commons/thumb/6/66/Claude_Monet_-_The_Water_Lilies_-_Setting_Sun_-_Google_Art_Project.jpg/600px-Claude_Monet_-_The_Water_Lilies_-_Setting_Sun_-_Google_Art_Project.jpg"],
  ["id" => 5, "name" => "The Night Watch by Rembrandt", "price" => 1324123, "src" => "https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/The_Night_Watch_-_HD.jpg/570px-The_Night_Watch_-_HD.jpg"],
  ["id" => 6, "name" => "The Weeping Woman by Picasso", "price" => 3212321.00, "src" => "/assets/images/gallery/gallery-1.jpg"],
  ["id" => 6, "name" => "Sunflowers by Van Gogh", "price" => 6000.00, "src" => "/assets/images/gallery/gallery-6.jpg"],
  ["id" => 7, "name" => "The Scream by Edvard Munch", "price" => 7000.00, "src" => "/assets/images/gallery/gallery-7.jpg"],
  ["id" => 8, "name" => "The Kiss by Gustav Klimt", "price" => 8000.00, "src" => "/assets/images/gallery/gallery-8.jpg"],
];


?>
<div class="gallery-grid">
  <?php
  foreach ($images as $image) {
  ?>
    <div class="image-container">
      <div class="image-wrapper">
        <img src="<?= $image["src"] ?>" alt="<?= $image["name"] ?>" />
      </div>
      <div class="icon-wrapper">
        <div class="image-info">
          <span class="image-name" style="margin-bottom: 10px; "><?= $image["name"] ?></span>
          <span class="image-price" style="font-weight: bold;">Kshs. <?= number_format($image["price"], 2) ?></span>
        </div>
        <div class="image-icons">
          <i class="fa fa-heart-o wishlist-icon" style="font-size: 25px; cursor: pointer"></i>
          <i class="fa fa-shopping-cart cart-icon" style="font-size: 25px;  cursor: pointer"></i>
        </div>
      </div>
    </div>
  <?php
  }
  ?>
</div>

<?php
include 'includes/footer.php';
?>