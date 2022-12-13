<?php
    if(!isset($_COOKIE["token"])){
        header("location:index.html");
    }
    else{
        $db = new mysqli("localhost","root","","electronic-ecommerce");
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
        $token = $_COOKIE["token"];
        $query = "SELECT * FROM user_token WHERE token='$token'";
        $id_user = $db->query($query)->fetch_assoc()["id"];
        $query = "SELECT * FROM user WHERE id='$id_user'";
        $username = $db->query($query)->fetch_assoc()["username"];
        $db->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="icon" type="image/x-icon" href="./assets/img/logo.svg"> -->
    <title>Electronic Store</title>

    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Splider Show -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <link rel="stylesheet" href="./style.css">
</head>
<body onload="total_money(<?php echo $id_user; ?>)">
    <div id="main" class="text-color">
        <!-- Start header -->
        <header>
            <div class="header__wrapper container d-sm-none d-md-flex justify-content-between align-items-center">
                <div class="h-100 d-flex align-items-center header__logo">
                    <img 
                        src="./assets/img/CSPhone.png"
                        alt="CSPhone"
                        class="h-50"
                    >
                </div>
                <div class="header__search-bar input-group">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">All Category</button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Smartphone</a></li>
                        <li><a class="dropdown-item" href="#">Tablet</a></li>
                        <li><a class="dropdown-item" href="#">Laptop</a></li>
                    </ul>
                    <input type="text" class="form-control" aria-label="Text input with dropdown button">
                    <div class="header__search-bar-icon">
                        <i class="bi bi-search"></i>
                    </div>
                </div>
                <div class="header__action d-flex justify-content-between align-items-center font-size-16 font-montserrat">
                    <div class="header__action-cart ms-4" onclick="display_cart(<?php echo $id_user; ?>)">
                        <i class="bi bi-cart3 me-1 font-size-20">
                            <span id="num_of_cart">0</span>
                        </i>
                        <span>Cart</span>
                    </div>
                    <button class="header__action-account btn ms-4" data-bs-toggle="modal" data-bs-target="#loginModal">
                        <i class="bi bi-person me-1 font-size-20"></i>
                        <span id="user_page_name"><?php echo "<b>".$username."</b>"; ?></span>
                    </button>
                    <button class="header__action-account btn ms-4" onclick="logout()">
                        <b>Logout</b>
                    </button>
                    <!-- Login Modal -->
                    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body px-5 py-4">
                                    <h2 class="text-center mb-3">Login</h2>
                                    <form method="POST" action="./login.php">
                                        <div class="mb-3">
                                          <label for="email-input" class="form-label">Email address</label>
                                          <input type="email" name="email" id="email-input" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                          <label for="password-input" class="form-label">Password</label>
                                          <input type="password" name="password" id="password-input" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn primary-color">Forgot password?</button>
                                        </div>
                                        <button type="submit" class="btn w-100 mb-3 primary-color-bg text-white">Login</button>

                                        <p>Not a member?<button type="button" class="btn primary-color" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Register Modal -->
                    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-body px-5 py-4">
                              <h2 class="text-center mb-3">Register</h2>
                              <form method="POST" action="./register.php">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username" id="username" class="form-control">
                                  </div>
                                <div class="mb-3">
                                  <label for="email" class="form-label">Email address</label>
                                  <input type="email" name="email" id="email" class="form-control">
                                </div>
                                <div class="mb-3">
                                  <label for="password" class="form-label">Password</label>
                                  <input type="password" name="password" id="password" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="confirm-password" class="form-label">Confirm Password</label>
                                    <input type="password" name="cf-password" id="confirm-password" class="form-control">
                                  </div>
                                <button type="submit" class="btn w-100 mb-3 primary-color-bg text-white">Register</button>

                                <p>Already have account?<button type="button" class="btn primary-color" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button></p>
                            </form>

                            </div>
                          </div>
                        </div>
                    </div>
                
                    <div class="header__action--mobile ms-4">
                        <i class="bi bi-list font-size-24"></i>
                        
                        <div class="header__menu--mobile">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                  <a class="nav-link active" aria-current="page" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="#">About</a>
                                </li>
                                <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Store</a>
                                  <ul class="dropdown-menu font-size-120">
                                    <li><a class="dropdown-item" href="#">AAAAAAAAAAA</a></li>
                                    <li><a class="dropdown-item" href="#">BBBBBBBBB</a></li>
                                  </ul>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link disabled">Contact</a>
                                </li>
                              </ul>
                        </div>
                    </div>

                </div>
            </div>

            <div class="header__wrapper--mobile">
                <div class="container d-flex align-items-center justify-content-between h-100">
                    <div class="header__mobile-menu px-3">
                        <i class="bi bi-list font-size-24"></i>
                        <ul class="nav nav-tabs header__mobile-menu-list">
                            <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">About</a>
                            </li>
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Store</a>
                              <ul class="dropdown-menu font-size-120">
                                <li><a class="dropdown-item" href="#">AAAAAAAAAAA</a></li>
                                <li><a class="dropdown-item" href="#">BBBBBBBBB</a></li>
                              </ul>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link disabled">Contact</a>
                            </li>
                          </ul>
                    </div>

                    <div class="d-flex align-items-center h-100">
                        <img src="./assets/img/CSPhone.png" alt="" class="h-50">
                    </div>

                    <div class="header__mobile-account px-3">
                        <i class="bi bi-person me-1 font-size-24"></i>
                    </div>
                </div>
            </div>
        </header>
        
        <div class="navbar font-montserrat">
            <div class="container d-none d-md-flex">
                <div class="dropdown navbar__category">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-list"></i>
                        Tất cả danh mục
                    </button>
                    <ul class="dropdown-menu font-size-14">
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="bi bi-phone"></i>
                                Điện thoại
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="bi bi-tablet"></i>
                                Máy tính bảng
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="bi bi-laptop"></i>
                                Máy tính xách tay
                            </a>
                        </li>
                    </ul>
                </div>

                <ul class="d-flex align-items-center"> 
                    <li><a href="/">Home</a></li>
                    <li class="ms-5"><a href="/about.html">About</a></li>
                    <li class="dropdown ms-5">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Store
                        </button>
                        <ul class="dropdown-menu font-size-14">
                            <li><a class="dropdown-item" href="#">
                                <i class="bi bi-geo-alt"></i>
                                123, Nguyen Tri Phuong, Tan Binh, HCM
                            </a></li>
                            <li><a class="dropdown-item" href="#">
                                <i class="bi bi-geo-alt"></i>
                                123, Nguyen Tri Phuong, Tan Binh, HCM
                            </a></li>
                        </ul>
                    </li>
                    <li class="dropdown ms-5">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Contact
                        </button>
                        <ul class="dropdown-menu font-size-14">
                            <li><a class="dropdown-item" href="#">
                                0984.000.000
                            </a></li>
                            <li><a class="dropdown-item" href="#">
                                0124.345.677
                            </a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="navbar__social d-flex align-items-center">
                    <li><a href=""><i class="bi bi-facebook"></i></a></li>
                    <li class="ms-2"><a href=""><i class="bi bi-twitter"></i></a></li>
                    <li class="ms-2"><a href=""><i class="bi bi-instagram"></i></a></li>
                    <li class="ms-2"><a href=""><i class="bi bi-youtube"></i></a></li>
                </ul>
            </div>

            <div class="header__search-bar container input-group d-sm-flex d-md-none">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">All Category</button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Smartphone</a></li>
                    <li><a class="dropdown-item" href="#">Tablet</a></li>
                    <li><a class="dropdown-item" href="#">Laptop</a></li>
                </ul>
                <input type="text" class="form-control" aria-label="Text input with dropdown button">

                <div class="header__search-bar-icon">
                    <i class="bi bi-search"></i>
                </div>
            </div>
        </div>

        <div class="d-flex align-items-center slideshow">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-9">
                        <section class="splide rounder border" aria-label="Basic Structure Example">
                            <div class="splide__track">
                              <ul class="splide__list">
                                <li class="splide__slide">
                                    <img class="w-100" src="./assets/img/slide-show/slide-1.png" alt="">
                                </li>
                                <li class="splide__slide">
                                    <img class="w-100" src="./assets/img/slide-show/slide-2.png" alt="">
                                </li>
                                <li class="splide__slide">
                                    <img class="w-100" src="./assets/img/slide-show/slide-3.png" alt="">
                                </li>
                              </ul>
                            </div>
                        </section>
                    </div>
                    <div class="col-md-0 col-lg-3 d-none d-lg-block">
                        <div class="slide__show-special font-open-sans rounded border">
                            <h3 class="text-color mb-3">Chuyển hàng</h3>
                            <p class="primary-color mb-4">Free Ship</p>
                            <button class="btn btn-buy-now font-size-16 text-white">
                                Mua ngay
                                <i class="bi bi-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                    <div class="col-6 col-sm-4 col-md-3">
                        <div class="product-item__wrap d-flex flex-column justify-content-between border rounded p-3 mb-4">
                            <div class="product__item-img h-50 mx-auto">
                                <img src="./assets/img/product/product-1.jpg" alt="product-img" class="h-100" id="productimg1">
                            </div>
                            <p class="font-size-12 text-color">Điện thoại</p>
                            <p class="product__item-name font-size-16 header-color font-semibold-600" id="productname1">iPhone 12 Pro Max</p>
                            <ul class="product__item-rating primary-color">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                            </ul>

                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <span class="font-medium-500 font-size-16 header-color me-3" id="productcost1">15.999.000đ</span>
                                <button class="btn btn-add-product primary-color-bg text-white font-size-12" onclick="add_to_cart(<?php echo $id_user; ?>,1)">
                                    <i class="bi bi-cart-plus"></i>
                                    Add
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <div class="product-item__wrap d-flex flex-column justify-content-between border rounded p-3 mb-4">
                            <div class="product__item-img h-50 mx-auto">
                                <img src="./assets/img/product/product-1.jpg" alt="product-img" class="h-100" id="productimg2">
                            </div>
                            <p class="font-size-12 text-color">Điện thoại</p>
                            <p class="product__item-name font-size-16 header-color font-semibold-600" id="productname2">iPhone 12 Pro Max</p>
                            <ul class="product__item-rating primary-color">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                            </ul>

                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <span class="font-medium-500 font-size-16 header-color me-3" id="productcost2">15.999.000đ</span>
                                <button class="btn btn-add-product primary-color-bg text-white font-size-12" onclick="add_to_cart(<?php echo $id_user; ?>,2)">
                                    <i class="bi bi-cart-plus"></i>
                                    Add
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <div class="product-item__wrap d-flex flex-column justify-content-between border rounded p-3 mb-4">
                            <div class="product__item-img h-50 mx-auto">
                                <img src="./assets/img/product/product-1.jpg" alt="product-img" class="h-100" id="productimg3">
                            </div>
                            <p class="font-size-12 text-color">Điện thoại</p>
                            <p class="product__item-name font-size-16 header-color font-semibold-600" id="productname3">iPhone 12 Pro Max</p>
                            <ul class="product__item-rating primary-color">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                            </ul>

                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <span class="font-medium-500 font-size-16 header-color me-3" id="productcost3">15.999.000đ</span>
                                <button class="btn btn-add-product primary-color-bg text-white font-size-12" onclick="add_to_cart(<?php echo $id_user; ?>,3)">
                                    <i class="bi bi-cart-plus"></i>
                                    Add
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <div class="product-item__wrap d-flex flex-column justify-content-between border rounded p-3 mb-4">
                            <div class="product__item-img h-50 mx-auto">
                                <img src="./assets/img/product/product-1.jpg" alt="product-img" class="h-100">
                            </div>
                            <p class="font-size-12 text-color">Điện thoại</p>
                            <p class="product__item-name font-size-16 header-color font-semibold-600">iPhone 12 Pro Max</p>
                            <ul class="product__item-rating primary-color">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                            </ul>

                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <span class="font-medium-500 font-size-16 header-color me-3">15.999.000đ</span>
                                <button class="btn btn-add-product primary-color-bg text-white font-size-12">
                                    <i class="bi bi-cart-plus"></i>
                                    Add
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <div class="product-item__wrap d-flex flex-column justify-content-between border rounded p-3 mb-4">
                            <div class="product__item-img h-50 mx-auto">
                                <img src="./assets/img/product/product-1.jpg" alt="product-img" class="h-100">
                            </div>
                            <p class="font-size-12 text-color">Điện thoại</p>
                            <p class="product__item-name font-size-16 header-color font-semibold-600">iPhone 12 Pro Max</p>
                            <ul class="product__item-rating primary-color">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                            </ul>

                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <span class="font-medium-500 font-size-16 header-color me-3">15.999.000đ</span>
                                <button class="btn btn-add-product primary-color-bg text-white font-size-12">
                                    <i class="bi bi-cart-plus"></i>
                                    Add
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <div class="product-item__wrap d-flex flex-column justify-content-between border rounded p-3 mb-4">
                            <div class="product__item-img h-50 mx-auto">
                                <img src="./assets/img/product/product-1.jpg" alt="product-img" class="h-100">
                            </div>
                            <p class="font-size-12 text-color">Điện thoại</p>
                            <p class="product__item-name font-size-16 header-color font-semibold-600">iPhone 12 Pro Max</p>
                            <ul class="product__item-rating primary-color">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                            </ul>

                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <span class="font-medium-500 font-size-16 header-color me-3">15.999.000đ</span>
                                <button class="btn btn-add-product primary-color-bg text-white font-size-12">
                                    <i class="bi bi-cart-plus"></i>
                                    Add
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <div class="product-item__wrap d-flex flex-column justify-content-between border rounded p-3 mb-4">
                            <div class="product__item-img h-50 mx-auto">
                                <img src="./assets/img/product/product-1.jpg" alt="product-img" class="h-100">
                            </div>
                            <p class="font-size-12 text-color">Điện thoại</p>
                            <p class="product__item-name font-size-16 header-color font-semibold-600">iPhone 12 Pro Max</p>
                            <ul class="product__item-rating primary-color">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                            </ul>

                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <span class="font-medium-500 font-size-16 header-color me-3">15.999.000đ</span>
                                <button class="btn btn-add-product primary-color-bg text-white font-size-12">
                                    <i class="bi bi-cart-plus"></i>
                                    Add
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <div class="product-item__wrap d-flex flex-column justify-content-between border rounded p-3 mb-4">
                            <div class="product__item-img h-50 mx-auto">
                                <img src="./assets/img/product/product-1.jpg" alt="product-img" class="h-100">
                            </div>
                            <p class="font-size-12 text-color">Điện thoại</p>
                            <p class="product__item-name font-size-16 header-color font-semibold-600">iPhone 12 Pro Max</p>
                            <ul class="product__item-rating primary-color">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                            </ul>

                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <span class="font-medium-500 font-size-16 header-color me-3">15.999.000đ</span>
                                <button class="btn btn-add-product primary-color-bg text-white font-size-12">
                                    <i class="bi bi-cart-plus"></i>
                                    Add
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <div class="product-item__wrap d-flex flex-column justify-content-between border rounded p-3 mb-4">
                            <div class="product__item-img h-50 mx-auto">
                                <img src="./assets/img/product/product-1.jpg" alt="product-img" class="h-100">
                            </div>
                            <p class="font-size-12 text-color">Điện thoại</p>
                            <p class="product__item-name font-size-16 header-color font-semibold-600">iPhone 12 Pro Max</p>
                            <ul class="product__item-rating primary-color">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                            </ul>

                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <span class="font-medium-500 font-size-16 header-color me-3">15.999.000đ</span>
                                <button class="btn btn-add-product primary-color-bg text-white font-size-12">
                                    <i class="bi bi-cart-plus"></i>
                                    Add
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <div class="product-item__wrap d-flex flex-column justify-content-between border rounded p-3 mb-4">
                            <div class="product__item-img h-50 mx-auto">
                                <img src="./assets/img/product/product-1.jpg" alt="product-img" class="h-100">
                            </div>
                            <p class="font-size-12 text-color">Điện thoại</p>
                            <p class="product__item-name font-size-16 header-color font-semibold-600">iPhone 12 Pro Max</p>
                            <ul class="product__item-rating primary-color">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                            </ul>

                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <span class="font-medium-500 font-size-16 header-color me-3">15.999.000đ</span>
                                <button class="btn btn-add-product primary-color-bg text-white font-size-12">
                                    <i class="bi bi-cart-plus"></i>
                                    Add
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="special-category font-montserrat mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-4 mb-2">
                        <h3 class="special-category__header border-bottom pb-2 mb-4">Top <span class="primary-color">Selling</span></h3>
                        <div class="d-flex special-category__product mb-3">
                            <div class="w-50 d-flex justify-content-center border rounded">
                                <img src="./assets/img/product/product-1.jpg" alt="" class="h-100">
                            </div>
                            <div class="d-flex flex-column justify-content-around ms-3">
                                <p class="font-size-16 font-semibold-600">Product name</p>
                                <div class="special-category__rating primary-color">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star"></i>
                                </div>

                                <p class="font-size-12 text-color">Additional text</p>
                                <p class="font-medium-500">15.999.000đ</p>
                            </div>
                        </div>

                        <div class="d-flex special-category__product mb-3">
                            <div class="w-50 d-flex justify-content-center border rounded">
                                <img src="./assets/img/product/product-1.jpg" alt="" class="h-100">
                            </div>
                            <div class="d-flex flex-column justify-content-around ms-3">
                                <p class="font-size-16 font-semibold-600">Product name</p>
                                <div class=".special-category__rating primary-color">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star"></i>
                                </div>

                                <p class="font-size-12 text-color">Additional text</p>
                                <p class="font-medium-500">15.999.000đ</p>
                            </div>
                        </div>

                        <div class="d-flex special-category__product mb-3">
                            <div class="w-50 d-flex justify-content-center border rounded">
                                <img src="./assets/img/product/product-1.jpg" alt="" class="h-100">
                            </div>
                            <div class="d-flex flex-column justify-content-around ms-3">
                                <p class="font-size-16 font-semibold-600">Product name</p>
                                <div class="special-category__rating primary-color">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star"></i>
                                </div>

                                <p class="font-size-12 text-color">Additional text</p>
                                <p class="font-medium-500">15.999.000đ</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4 mb-2">
                        <h3 class="special-category__header border-bottom pb-2 mb-4">Trending <span class="primary-color">Product</span></h3>
                        <div class="d-flex special-category__product mb-3">
                            <div class="w-50 d-flex justify-content-center border rounded">
                                <img src="./assets/img/product/product-1.jpg" alt="" class="h-100">
                            </div>
                            <div class="d-flex flex-column justify-content-around ms-3">
                                <p class="font-size-16 font-semibold-600">Product name</p>
                                <div class="special-category__rating primary-color">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star"></i>
                                </div>

                                <p class="font-size-12 text-color">Additional text</p>
                                <p class="font-medium-500">15.999.000đ</p>
                            </div>
                        </div>

                        <div class="d-flex special-category__product mb-3">
                            <div class="w-50 d-flex justify-content-center border">
                                <img src="./assets/img/product/product-1.jpg" alt="" class="h-100">
                            </div>
                            <div class="d-flex flex-column justify-content-around ms-3">
                                <p class="font-size-16 font-semibold-600">Product name</p>
                                <div class="special-category__rating primary-color">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star"></i>
                                </div>

                                <p class="font-size-12 text-color">Additional text</p>
                                <p class="font-medium-500">15.999.000đ</p>
                            </div>
                        </div>

                        <div class="d-flex special-category__product mb-3">
                            <div class="w-50 d-flex justify-content-center border">
                                <img src="./assets/img/product/product-1.jpg" alt="" class="h-100">
                            </div>
                            <div class="d-flex flex-column justify-content-around ms-3">
                                <p class="font-size-16 font-semibold-600">Product name</p>
                                <div class="special-category__rating primary-color">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star"></i>
                                </div>

                                <p class="font-size-12 text-color">Additional text</p>
                                <p class="font-medium-500">15.999.000đ</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4 mb-2">
                        <h3 class="special-category__header border-bottom pb-2 mb-4">Recently <span class="primary-color">Added</span></h3>
                        <div class="d-flex special-category__product mb-3">
                            <div class="w-50 d-flex justify-content-center border rounded">
                                <img src="./assets/img/product/product-1.jpg" alt="" class="h-100">
                            </div>
                            <div class="d-flex flex-column justify-content-around ms-3">
                                <p class="font-size-16 font-semibold-600">Product name</p>
                                <div class="special-category__rating primary-color">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star"></i>
                                </div>

                                <p class="font-size-12 text-color">Additional text</p>
                                <p class="font-medium-500">15.999.000đ</p>
                            </div>
                        </div>

                        <div class="d-flex special-category__product mb-3">
                            <div class="w-50 d-flex justify-content-center border rounded">
                                <img src="./assets/img/product/product-1.jpg" alt="" class="h-100">
                            </div>
                            <div class="d-flex flex-column justify-content-around ms-3">
                                <p class="font-size-16 font-semibold-600">Product name</p>
                                <div class="special-category__rating primary-color">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star"></i>
                                </div>

                                <p class="font-size-12 text-color">Additional text</p>
                                <p class="font-medium-500">15.999.000đ</p>
                            </div>
                        </div>

                        <div class="d-flex special-category__product mb-3">
                            <div class="w-50 d-flex justify-content-center border rounded">
                                <img src="./assets/img/product/product-1.jpg" alt="" class="h-100">
                            </div>
                            <div class="d-flex flex-column justify-content-around ms-3">
                                <p class="font-size-16 font-semibold-600">Product name</p>
                                <div class="special-category__rating primary-color">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star"></i>
                                </div>

                                <p class="font-size-12 text-color">Additional text</p>
                                <p class="font-medium-500">15.999.000đ</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-form font-montserrat mt-4 py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6">
                        <h2 class="header-color">Stay home & get your daily needs from our shop</h2>

                        <p class="font-size-14">Start your daily with <span>CSPhones</span></p>
                        <form action="" class="w-75 mt-4">
                            <input type="email" class="form-control mb-3 font-size-14" placeholder="Enter your email address">
                            <input type="text" class="form-control mb-3 font-size-14" placeholder="Enter your phone number">
                            <button class="btn btn-subscribe primary-color-bg text-white w-100">Subscribe</button>
                        </form> 
                    </div>

                    <div class="d-none d-sm-block col-sm-12 col-md-6 my-auto mt-sm-5">
                        <img src="./assets/img/contact-form/shipping.png" alt="" class="w-100">
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <div class="footer__wrapper container my-5 font-open-sans">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-4">
                        <div class="footer__logo mt-3 mb-5 font-montserrat header-color" >
                            <h1>CSPhones</h1>
                        </div>

                        <ul class="footer__social d-flex align-items-center my-4">
                            <li><a href=""><i class="bi bi-facebook"></i></a></li>
                            <li class="ms-2"><a href=""><i class="bi bi-twitter"></i></a></li>
                            <li class="ms-2"><a href=""><i class="bi bi-instagram"></i></a></li>
                            <li class="ms-2"><a href=""><i class="bi bi-youtube"></i></a></li>
                        </ul>

                        <ul class="footer__contact font-open-sans font-size-14">
                            <li class="my-3">
                                <i class="bi bi-telephone primary-color me-2"></i>
                                +84 1234567890
                            </li>

                            <li class="my-3">
                                <i class="bi bi-envelope primary-color me-2"></i>
                                admin@gmail.com
                            </li>
                            
                            <li class="my-3">
                                <i class="bi bi-geo-alt primary-color me-2"></i>
                                1231, Boston, US                                     
                            </li>

                        </ul>
                    </div>

                    <div class="footer__section col-6 col-sm-4 col-md-2">
                        <p class="font-size-20 font-montserrat font-semibold-600 header-color">Company</p>
                        <ul class="font-family-open-sans">
                            <li class="my-3 font-size-14"><a href="">About Us</a></li>
                            <li class="my-3 font-size-14"><a href="">Service</a></li>
                            <li class="my-3 font-size-14"><a href="">Case Studies</a></li>
                            <li class="my-3 font-size-14"><a href="">Contact</a></li>
                        </ul>
                    </div>

                    <div class="footer__section col-6 col-sm-4 col-md-3">
                        <p class="font-size-20 font-montserrat font-semibold-600 header-color">Account</p>
                        <ul class="font-family-open-sans">
                            <li class="my-3 font-size-14"><a href="">Sign In</a></li>
                            <li class="my-3 font-size-14"><a href="">View Cart</a></li>
                            <li class="my-3 font-size-14"><a href="">Track My Order</a></li>
                            <li class="my-3 font-size-14"><a href="">Compare products</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-sm-4 col-md-3">
                        <p class="font-size-20 font-montserrat font-semibold-600 header-color">Download</p>
                        
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- cart -->
    <div id="cart-container">
        <div style="width:100%;height:100%;" onclick="hide_cart()"></div>
        <div class="cart">
            <div class="cart-row">
                <div class="row1">
                    <span>Giỏ hàng</span>
                </div>
                <div class="row2" id="row2"></div>
                <div class="row3" style="position: relative;">
                    <span style="position: absolute;top:40%;">Tổng cộng: </span>
                    <span id="total-money" style="color:red;position: absolute;right:0;top:40%;">0</span>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="./main.js"></script> 
</body>
</html>