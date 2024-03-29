<?php
include 'includes/session.php';
include 'includes/connect.php';

$images = [
    ["id" => 1, "name" => "Mona Lisa by Leonardo da Vinci", "price" => 545894, "src" => "https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Mona_Lisa%2C_by_Leonardo_da_Vinci%2C_from_C2RMF_retouched.jpg/405px-Mona_Lisa%2C_by_Leonardo_da_Vinci%2C_from_C2RMF_retouched.jpg"],
    ["id" => 2, "name" => "Guernica by Pablo Picasso", "price" => 7368623, "src" => "https://upload.wikimedia.org/wikipedia/en/7/74/PicassoGuernica.jpg"],
    ["id" => 3, "name" => "Starry Night by Vincent van Gogh", "price" => 432343, "src" => "https://upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Van_Gogh_-_Starry_Night_-_Google_Art_Project.jpg/525px-Van_Gogh_-_Starry_Night_-_Google_Art_Project.jpg"],
    ["id" => 4, "name" => "Water Lilies by Claude Monet", "price" => 1289813, "src" => "https://upload.wikimedia.org/wikipedia/commons/thumb/6/66/Claude_Monet_-_The_Water_Lilies_-_Setting_Sun_-_Google_Art_Project.jpg/600px-Claude_Monet_-_The_Water_Lilies_-_Setting_Sun_-_Google_Art_Project.jpg"],
    ["id" => 5, "name" => "The Night Watch by Rembrandt", "price" => 1324123, "src" => "https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/The_Night_Watch_-_HD.jpg/570px-The_Night_Watch_-_HD.jpg"],
    ["id" => 6, "name" => "The Weeping Woman by Picasso", "price" => 3212321.00, "src" => "/assets/images/gallery/gallery-1.jpg"],
    ["id" => 7, "name" => "Guernica by Picasso", "price" => 12321.00, "src" => "/assets/images/gallery/gallery-2.jpg"],
    ["id" => 8, "name" => "The Last Judgment by Michelangelo", "price" => 133323.00, "src" => "/assets/images/gallery/gallery-3.jpg"],
    ["id" => 9, "name" => "The Creation of Adam by Michelangelo", "price" => 433300.00, "src" => "/assets/images/gallery/gallery-4.jpg"],
    ["id" => 10, "name" => "The Starry Night by Van Gogh", "price" => 32123.00, "src" => "/assets/images/gallery/gallery-5.jpg"],
    ["id" => 11, "name" => "Sunflowers by Van Gogh", "price" => 3322312.00, "src" => "/assets/images/gallery/gallery-6.jpg"],
    ["id" => 12, "name" => "The Scream by Edvard Munch", "price" => 31232.00, "src" => "/assets/images/gallery/gallery-7.jpg"],
    ["id" => 13, "name" => "The Kiss by Gustav Klimt", "price" => 132312.00, "src" => "/assets/images/gallery/gallery-8.jpg"],
];

$wishlist = [];
if (isset($_SESSION['user'])) {
    $userId = $_SESSION['user']['id'];
    $wishlistQuery = mysqli_query($DB, "SELECT * FROM wishlist WHERE user_id = '$userId'");
    if ($wishlistQuery) {
        $wishlist = mysqli_fetch_all($wishlistQuery, MYSQLI_ASSOC);
    }
}

function displayProduct($product, $wishlist, $redirect = 'index.php')
{
    $isInWishlist = in_array($product['id'], array_column($wishlist, 'product_id')) ? 'fa-heart' : 'fa-heart-o';
    $formattedPrice = number_format($product["price"], 2);

    $html = <<<HTML
    <div class="image-container">
        <div class="image-wrapper">
            <img src="{$product["src"]}" alt="{$product["name"]}" />
        </div>
        <div class="icon-wrapper">
            <div class="image-info">
                <span class="image-name" style="margin-bottom: 10px;">{$product["name"]}</span>
                <span class="image-price" style="font-weight: bold;">Kshs. {$formattedPrice}</span>
            </div>
            <div class="image-icons">
                <i class="fa {$isInWishlist} wishlist-icon" style="font-size: 25px; cursor: pointer" onclick="addToWishlist({$product['id']},'{$redirect}')"></i>
            </div>
        </div>
    </div>
    HTML;
    echo $html;
}
