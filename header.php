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
    <?php 
        require ('connection.php');

        if(isset($_COOKIE["token"])){
            $token = $_COOKIE["token"];
            $query = "SELECT * FROM user_token WHERE token='$token'";
            $id_user = $db->con->query($query)->fetch_assoc()["id"];
            $query = "SELECT * FROM user WHERE id='$id_user'";
            $username = $db->con->query($query)->fetch_assoc()["username"];
        }

    ?>
</head>

<body>
    <div id="main" class="text-color">
        <header>
            <div class="header__wrapper container d-sm-none d-md-flex justify-content-between align-items-center">
                <a href="./index.php" class="h-100 d-flex align-items-center header__logo">
                    <img 
                        src="./assets/img/CSPhone.png"
                        alt="CSPhone"
                        class="h-50"
                    >
                </a>
                <div class="header__search-bar input-group">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">All Brand</button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Samsung</a></li>
                        <li><a class="dropdown-item" href="#">Apple</a></li>
                        <li><a class="dropdown-item" href="#">Xiaomi</a></li>
                    </ul>
                    <input type="text" class="form-control" aria-label="Text input with dropdown button">
                    <div class="header__search-bar-icon">
                        <i class="bi bi-search"></i>
                    </div>
                </div>
                <div class="header__action d-flex justify-content-between align-items-center font-size-16 font-montserrat">
                    <div class="header__action-cart ms-4">
                        <i class="bi bi-cart3 me-1 font-size-20">
                            <span class="header__action-cart-number"></span>
                        </i>
                        <span>Cart</span>
                    </div>
                    
                    <?php if (isset($_COOKIE["token"])): ?>
                    <button class="header__action-account btn ms-4">
                        <i class="bi bi-person me-1 font-size-20"></i>
                        <span id="user_page_name"><?php echo "<b>".$username."</b>"; ?></span>
                    </button>

                    <button 
                        class="header__action-account btn ms-4" 
                        onclick="logOut()">
                        <i class="bi bi-box-arrow-left me-1 font-size-20"></i>
                        <span>Logout</span>
                    </button>
                    <?php else: ?>
                    
                    <button class="header__action-account btn ms-4" data-bs-toggle="modal" data-bs-target="#loginModal">
                        <i class="bi bi-person me-1 font-size-20"></i>
                        <span>Login</span>
                    </button>

                    <?php endif; ?>

                    <!-- Login Modal -->
                    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body px-5 py-4">
                                    <h2 class="text-center mb-3">Login</h2>
                                    <form method="POST" action="login.php">
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
                                <form method="POST" action="register.php">
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

<script>
    function logOut() {
        document.cookie = "token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        location.reload();
    }
</script>