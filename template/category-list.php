<?php 
    shuffle($product_shuffle);

?>

<div class="category-list font-montserrat header-color mt-4">
    <div class="container">
        <div class="align-items-center justify-content-between mb-3 d-none d-md-flex">
            <h3 class="category-list__header">Sản phẩm nổi bật</h3>
            <ul class="d-flex align-items-center font-size-14">
                <li class="me-3"><a href="" class="category-list__item">Điện thoại</a></li>
                <li class="me-3"><a href="" class="category-list__item">Máy tính bảng</a></li>
                <li class="me-3"><a href="" class="category-list__item">Máy tính xách tay</a></li>
                <li><a href="" class="category-list__item">Đông hồ thông minh</a></li>
            </ul>
        </div>

        <div class="category-list--mobile d-flex d-md-none align-items-center justify-content-between mb-3">
            <h3 class="category-list__header">Sản phẩm nổi bật</h3>
            <div class="dropdown">
                <button class="btn primary-color-bg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Điện thoại
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Điện thoại</a></li>
                    <li><a class="dropdown-item" href="#">Máy tính bảng</a></li>
                    <li><a class="dropdown-item" href="#">Máy tính xách tay</a></li>
                    <li><a class="dropdown-item" href="#">Đông hồ thông minh</a></li>
                </ul>
            </div>
        </div>

        <div class="row">
            <?php foreach ($product_shuffle as $item) { ?>
            <div class="col-6 col-sm-4 col-md-3">
                <div class="product-item__wrap d-flex flex-column justify-content-between border rounded p-3 mb-4">
                    <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>"
                        class="product__item-img h-50 mx-auto">
                    <!-- <a href="./product.php" class="product__item-img h-50 mx-auto"> -->
                        <!-- <img src="./assets/img/product/product-1.jpg" alt="product-img" class="h-100"> -->
                        <img src="<?= $item['item_image'] ?? "./assets/img/product-1.jpg"; ?>" alt="product-img" class="h-100">

                    </a>
                    <p class="font-size-12 text-color">Điện thoại</p>
                    <a href="./product.php" class="product__item-name font-size-16 header-color font-semibold-600"><?= $item['item_name'] ?? "Unknown"; ?></a>
                    <ul class="product__item-rating primary-color">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star"></i>
                    </ul>

                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <span class="font-medium-500 font-size-16 header-color me-3"><?= $item['item_price'] ?? '0'; ?></span>
                        <button class="btn btn-add-product primary-color-bg text-white font-size-12" onclick="addToCart()">
                            <i class="bi bi-cart-plus"></i>
                            Add
                        </button>
                    </div>
                </div>
            </div>
            <?php } ?>
            <!-- <div class="col-6 col-sm-4 col-md-3">
                <div class="product-item__wrap d-flex flex-column justify-content-between border rounded p-3 mb-4">
                    <a href="./product.php" class="product__item-img h-50 mx-auto">
                        <img src="./assets/img/product/product-1.jpg" alt="product-img" class="h-100">
                    </a>
                    <p class="font-size-12 text-color">Điện thoại</p>
                    <a href="./product.php" class="product__item-name font-size-16 header-color font-semibold-600">iPhone 12 Pro Max</a>
                    <ul class="product__item-rating primary-color">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star"></i>
                    </ul>

                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <span class="font-medium-500 font-size-16 header-color me-3">15.999.000đ</span>
                        <button class="btn btn-add-product primary-color-bg text-white font-size-12" onclick="addToCart()">
                            <i class="bi bi-cart-plus"></i>
                            Add
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <div class="product-item__wrap d-flex flex-column justify-content-between border rounded p-3 mb-4">
                    <a href="./product.php" class="product__item-img h-50 mx-auto">
                        <img src="./assets/img/product/product-1.jpg" alt="product-img" class="h-100">
                    </a>
                    <p class="font-size-12 text-color">Điện thoại</p>
                    <a href="./product.php" class="product__item-name font-size-16 header-color font-semibold-600">iPhone 12 Pro Max</a>
                    <ul class="product__item-rating primary-color">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star"></i>
                    </ul>

                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <span class="font-medium-500 font-size-16 header-color me-3">15.999.000đ</span>
                        <button class="btn btn-add-product primary-color-bg text-white font-size-12" onclick="addToCart()">
                            <i class="bi bi-cart-plus"></i>
                            Add
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <div class="product-item__wrap d-flex flex-column justify-content-between border rounded p-3 mb-4">
                    <a href="./product.php" class="product__item-img h-50 mx-auto">
                        <img src="./assets/img/product/product-1.jpg" alt="product-img" class="h-100">
                    </a>
                    <p class="font-size-12 text-color">Điện thoại</p>
                    <a href="./product.php" class="product__item-name font-size-16 header-color font-semibold-600">iPhone 12 Pro Max</a>
                    <ul class="product__item-rating primary-color">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star"></i>
                    </ul>

                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <span class="font-medium-500 font-size-16 header-color me-3">15.999.000đ</span>
                        <button class="btn btn-add-product primary-color-bg text-white font-size-12" onclick="addToCart()">
                            <i class="bi bi-cart-plus"></i>
                            Add
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <div class="product-item__wrap d-flex flex-column justify-content-between border rounded p-3 mb-4">
                    <a href="./product.php" class="product__item-img h-50 mx-auto">
                        <img src="./assets/img/product/product-1.jpg" alt="product-img" class="h-100">
                    </a>
                    <p class="font-size-12 text-color">Điện thoại</p>
                    <a href="./product.php" class="product__item-name font-size-16 header-color font-semibold-600">iPhone 12 Pro Max</a>
                    <ul class="product__item-rating primary-color">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star"></i>
                    </ul>

                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <span class="font-medium-500 font-size-16 header-color me-3">15.999.000đ</span>
                        <button class="btn btn-add-product primary-color-bg text-white font-size-12" onclick="addToCart()">
                            <i class="bi bi-cart-plus"></i>
                            Add
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <div class="product-item__wrap d-flex flex-column justify-content-between border rounded p-3 mb-4">
                    <a href="./product.php" class="product__item-img h-50 mx-auto">
                        <img src="./assets/img/product/product-1.jpg" alt="product-img" class="h-100">
                    </a>
                    <p class="font-size-12 text-color">Điện thoại</p>
                    <a href="./product.php" class="product__item-name font-size-16 header-color font-semibold-600">iPhone 12 Pro Max</a>
                    <ul class="product__item-rating primary-color">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star"></i>
                    </ul>

                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <span class="font-medium-500 font-size-16 header-color me-3">15.999.000đ</span>
                        <button class="btn btn-add-product primary-color-bg text-white font-size-12" onclick="addToCart()">
                            <i class="bi bi-cart-plus"></i>
                            Add
                        </button>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>