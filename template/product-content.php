<?php
    $item_id = $_GET['item_id'] ?? 1;
    foreach ($product->getProduct() as $item) :
        if ($item['item_id'] == $item_id) :
?>

<div class="product-content font-montserrat text-color">
    <div class="container py-4">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="product__image border rounded p-3">
                    <!-- <img src="./assets/img/product/product-1.jpg" alt="Product image" class="d-block h-100 mx-auto"> -->
                    <img src="<?php echo $item['item_image'] ?? "./assets/img/products/1.png" ?>" alt="Product image" class="d-block h-100 mx-auto">
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="product__info-wrap d-flex flex-column h-100">
                    <p class="primary-color font-size-14 font-medium-500 mb-3">Smartphone</p>
                    <p class="header-color font-size-24 font-semibold-600"><?php echo $item['item_name'] ?? "Unknown"; ?></p>

                    <ul class="primary-color mt-2">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star"></i>
                    </ul>

                    <p class="product__price mt-3">$<?php echo $item['item_price'] ?? 0; ?></p>
                    <p class="mt-2 font-size-14">iPhone 14 được nâng cấp toàn diện từ camera cho đến hiệu năng và hầu hết là những thông số hàng đầu trong giới smartphone.</p>
                    <div class="product__action mt-3">
                        <div>
                            <button class="btn btn-product-type btn-product-type--active">128GB</button>
                            <button class="btn btn-product-type">256GB</button>
                            <button class="btn btn-product-type">512GB</button>
                        </div>

                        <div class="mt-3 d-flex flex-column d-sm-inline-block">
                            <button class="btn btn-product__buy-now font-medium-500 px-4 py-2 mb-2" onclick="buyNow(<?php echo $item['item_id']; ?>)">Buy now</button>
                            <button class="btn btn-product__add-cart font-medium-500 px-4 py-2 mb-2" onclick="addToCart(<?php echo $item['item_id']; ?>)">
                                <i class="bi bi-cart-plus me-2"></i>
                                Add to cart
                            </button>
                        </div>
                    </div>

                </div>
            </div>  
        </div>
    </div>
</div>

<?php
    endif;
    endforeach;
?>