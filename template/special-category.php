<?php
    shuffle($product_shuffle);

    // request method post
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['top_sale_submit'])){
            // call method addToCart
            $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
        }
    }

    $brand = array_map(function ($pro){ return $pro['item_brand']; }, $product_shuffle);
    $unique = array_unique($brand);
    sort($unique);
    shuffle($product_shuffle);

?>

<div class="special-category font-montserrat mt-4">
    <div class="container">
        <div class="row">
            <!-- Top Selling -->
            <div class="col-sm-6 col-md-4 mb-2">
                <h3 class="special-category__header border-bottom pb-2 mb-4">Top <span class="primary-color">Selling</span></h3>
                <?php
                    $count = 0;
                    foreach ($product_shuffle as $item) { 
                        if ($count == 3) break;
                ?>
                    <div class="d-flex special-category__product mb-3">
                        <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>"
                            class="d-flex justify-content-center border rounded">
                            <img src="<?php echo $item['item_image'] ?? "./assets/products/1.png"; ?>" alt="" class="h-100">
                        </a>
                        <div class="d-flex flex-column justify-content-around ms-3">
                            <a href="./product.php" class="font-size-16 font-semibold-600"><?= $item['item_name'] ?? "Unknown"; ?></a>
                            <div class="special-category__rating primary-color">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                            </div>
    
                            <p class="font-medium-500">$<?= $item['item_price'] ?? '0'; ?></p>
                        </div>
                    </div>
                <?php $count++; } ?>
            
            </div>
            
            <!-- Trending Product -->
            <div class="col-sm-6 col-md-4 mb-2">
                <h3 class="special-category__header border-bottom pb-2 mb-4">Trending <span class="primary-color">Product</span></h3>
                <?php $count = 0;
                    foreach ($product_shuffle as $item) { 
                        if ($count == 3) break;
                ?>
                    <div class="d-flex special-category__product mb-3">
                        <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>"
                            class="d-flex justify-content-center border rounded">
                            <img src="<?php echo $item['item_image'] ?? "./assets/products/1.png"; ?>" alt="" class="h-100">
                        </a>
                        <div class="d-flex flex-column justify-content-around ms-3">
                            <a href="./product.php" class="font-size-16 font-semibold-600"><?= $item['item_name'] ?? "Unknown"; ?></a>
                            <div class="special-category__rating primary-color">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                            </div>
    
                            <p class="font-medium-500">$<?= $item['item_price'] ?? '0'; ?></p>
                        </div>
                    </div>
                <?php $count++; } ?>
            </div>

            <!-- Recently Added -->
            <div class="col-sm-6 col-md-4 mb-2">
                <h3 class="special-category__header border-bottom pb-2 mb-4">Recently <span class="primary-color">Added</span></h3>
                <?php $count = 0;
                    foreach ($product_shuffle as $item) { 
                        if ($count == 3) break;
                    ?>
                    <div class="d-flex special-category__product mb-3">
                        <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>"
                            class="d-flex justify-content-center border rounded">
                            <img src="<?php echo $item['item_image'] ?? "./assets/products/1.png"; ?>" alt="" class="h-100">
                        </a>
                        <div class="d-flex flex-column justify-content-around ms-3">
                            <a href="./product.php" class="font-size-16 font-semibold-600"><?= $item['item_name'] ?? "Unknown"; ?></a>
                            <div class="special-category__rating primary-color">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                            </div>
    
                            <p class="font-medium-500">$<?= $item['item_price'] ?? '0'; ?></p>
                        </div>
                    </div>
                <?php  $count++; } ?>
            
            </div>
        </div>
    </div>
</div>