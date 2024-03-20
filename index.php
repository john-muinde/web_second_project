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
<center>
  <table border="1">
    <tr>
      <th>Art Image</th>
      <th>Artwork</th>
      <th>Artist</th>
      <th>Price (KES)</th>
    </tr>
    <tr>
      <!-- Image -->
      <td>
        <a href="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Mona_Lisa%2C_by_Leonardo_da_Vinci%2C_from_C2RMF_retouched.jpg/405px-Mona_Lisa%2C_by_Leonardo_da_Vinci%2C_from_C2RMF_retouched.jpg" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Mona_Lisa%2C_by_Leonardo_da_Vinci%2C_from_C2RMF_retouched.jpg/405px-Mona_Lisa%2C_by_Leonardo_da_Vinci%2C_from_C2RMF_retouched.jpg" alt="The Last Supper" width="100" height="100" /></a>
      </td>

      <td>
        <a href="https://en.wikipedia.org/wiki/Mona_Lisa" target="_blank">Mona Lisa</a>
      </td>
      <td>Leonardo da Vinci</td>
      <td>KES 500,000,000</td>
    </tr>
    <tr>
      <!-- Guernica Image -->
      <!-- Image -->
      <td>
        <a href="https://upload.wikimedia.org/wikipedia/en/7/74/PicassoGuernica.jpg" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/en/7/74/PicassoGuernica.jpg" alt="The Last Supper" width="100" height="100" /></a>
      </td>
      <td>
        <a href="https://en.wikipedia.org/wiki/Guernica" target="_blank">Guernica</a>
      </td>
      <td>
        <a href="https://en.wikipedia.org/wiki/Pablo_Picasso" target="_blank"></a>
        Pablo Picasso
      </td>
      <td>KES 400,000,000</td>
    </tr>
    <tr>
      <!-- Image -->
      <td>
        <a href="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Van_Gogh_-_Starry_Night_-_Google_Art_Project.jpg/525px-Van_Gogh_-_Starry_Night_-_Google_Art_Project.jpg" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Van_Gogh_-_Starry_Night_-_Google_Art_Project.jpg/525px-Van_Gogh_-_Starry_Night_-_Google_Art_Project.jpg" alt="The Last Supper" width="100" height="100" /></a>
      </td>
      <td>
        <a href="https://en.wikipedia.org/wiki/The_Starry_Night" target="_blank">
          Starry Night</a>
      </td>
      <td>Vincent van Gogh</td>
      <td>KES 300,000,000</td>
    </tr>
    <tr>
      <!-- Image -->
      <td>
        <a href="https://upload.wikimedia.org/wikipedia/commons/thumb/6/66/Claude_Monet_-_The_Water_Lilies_-_Setting_Sun_-_Google_Art_Project.jpg/600px-Claude_Monet_-_The_Water_Lilies_-_Setting_Sun_-_Google_Art_Project.jpg" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/66/Claude_Monet_-_The_Water_Lilies_-_Setting_Sun_-_Google_Art_Project.jpg/600px-Claude_Monet_-_The_Water_Lilies_-_Setting_Sun_-_Google_Art_Project.jpg" alt="The Last Supper" width="100" height="100" /></a>
      </td>

      <td>
        <a href="https://en.wikipedia.org/wiki/Water_Lilies" target="_blank">Water Lilies</a>
      </td>
      <td>Claude Monet</td>
      <td>KES 200,000,000</td>
    </tr>
    <tr>
      <!-- Image -->
      <td>
        <a href="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/The_Night_Watch_-_HD.jpg/570px-The_Night_Watch_-_HD.jpg" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/The_Night_Watch_-_HD.jpg/570px-The_Night_Watch_-_HD.jpg" alt="The Last Supper" width="100" height="100" /></a>
      </td>

      <td>
        <a href="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/The_Night_Watch_-_HD.jpg/570px-The_Night_Watch_-_HD.jpg" target="_blank">The Night Watch</a>
      </td>
      <td>Rembrandt</td>
      <td>KES 100,000,000</td>
    </tr>
  </table>
</center>

<?php
include 'includes/footer.php';
?>