<?php
include 'operations.php';
$page = "Wishlist";
$body_class = "overflow";
$cont_class = "h-100";
$extraCss = '
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css" rel="stylesheet" />
 <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css" />
';
ob_start();
?>

<section class="h-100" style="margin-top: 20vh">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-normal mb-0 text-white">My Wishlist</h3>
                    <!-- <div>
                        <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
                    </div> -->
                </div>



                <?php
                if (empty($wishlist)) { ?>
                    <div class="card rounded-3 mb-4">
                        <div class="card-body p-4">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <h5 class="text-center">No items in your wishlist</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } else {
                    foreach ($wishlist as $wishlistItem) {

                        $item = [];
                        foreach ($images as $product) {
                            if ($product['id'] == $wishlistItem['product_id']) {
                                $item = $product;
                                break;
                            }
                        }

                        if (isset($item) && !empty($item)) {
                            $isInWishlist = in_array($item['id'], array_column($wishlist, 'product_id')) ? 'fa-heart' : 'fa-heart-o';
                            $formattedPrice = number_format($item["price"], 2);
                    ?>
                            <div class="card rounded-3 mb-4">
                                <div class="card-body p-4">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <img src="<?= $item['src'] ?>" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <p class="lead fw-normal mb-2"><?= $item['name'] ?></p>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h5 class="mb-0">Kshs. <?= $formattedPrice ?></h5>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <i class="fa <?= $isInWishlist ?> wishlist-icon" style="font-size: 25px; cursor: pointer" onclick='addToWishlist(<?= $item["id"] ?>, "wishlist.php")'></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <?php
                        }
                    }
                }
                ?>

                <div class="card">
                    <div class="card-body">
                        <a href="add_to_wishlist.php?action=clear" class="btn btn-outline-primary btn-lg" style="border-color: var(--primary); color: var(--primary);">Clear Wishlist</a>
                        <a href="gallery.php" class="btn btn-primary btn-lg" style="background-color: var(--primary);">Continue to the Gallery</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<?php
$heroContent = ob_get_clean();
include 'includes/header.php';

$success = "";
$unsuccess = "";

include 'includes/footer.php';
?>