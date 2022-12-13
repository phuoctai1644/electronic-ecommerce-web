<script>
    addEventListener('DOMContentLoaded', () => {
        const cartItems = JSON.parse(localStorage.getItem('cart-items')) ?? [];
        
        document.cookie = "cartItems = " + cartItems;
    })
</script>

<?php 
    function checkEmptyCart() {
        return !$_COOKIE['cartItems'];
    }

    if ($_COOKIE['cartItems']) {
        $php_var_val= $_COOKIE['cartItems'];
        $arr = explode(',', $php_var_val);
        $cartItem = array();
        $itemQuantity = array();
        $sub_total = 0;
        $total = 0;
        foreach($arr as $key => $value) {
            if ($key % 2 == 0) {
                array_push($cartItem, $product->getProductById($value));
            } else {
                array_push($itemQuantity, $value);
            }
        }
    
        foreach($cartItem as $key => $item) {
            foreach($item as $x) {
                $sub_total += $x['item_price'] * $itemQuantity[$key];
                $total = $sub_total;
            }
        }
    }
?>

<div class="cart-summary font-montserrat font-size-14">
    <div class="container">
        <h2 class="my-4 mt-md-4 mb-md-0">Cart Summary</h2>
        <div class="row flex-column-reverse flex-md-row">
            <div class="col-sm-12 col-md-6">
                <p class="font-size-14 my-3">Enter your details</p>
                <form action="" class="font-size-14">
                    <div class="d-flex mb-3">
                        <input type="email" class="form-control me-2" id="exampleInputEmail1" placeholder="First name">
                        <input type="email" class="form-control ms-2" id="exampleInputEmail1" placeholder="Last name">
                    </div>
                    <div class="mb-3 d-flex">
                        <input type="text" class="form-control me-2" placeholder="Country">
                        <input type="text" class="form-control ms-2" placeholder="City">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Address">
                    </div>

                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Phone number">
                    </div>

                    <button type="submit" class="btn primary-color-bg text-white w-100">Complete Order</button>
                </form>
            </div>

            <div class="col-sm-12 col-md-6">
                <div class="border rounded cart-list p-4 mb-3">
                    <?php if (!checkEmptyCart()): ?>
                    <?php foreach ($cartItem as $key => $item): 
                            foreach ($item as $x) :
                        ?>
                        
                    <div class="cart-item d-flex justify-content-between align-items-center py-3 border-bottom">
                        <div class="d-flex">
                            <div class="cart-item__img border d-block rounded p-2 me-3">
                                <img src="<?= $x['item_image'] ?? "./assets/img/product-1.jpg"; ?>" alt="item image" class="w-100">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h5 class="mb-3 font-size-18"><?= $x['item_name'] ?? "Unknown"; ?></h5>
                                <p>Quantity: <?= $itemQuantity[$key]; ?></p>
                            </div>
                        </div>
                        <span class="font-size-18 font-medium-500">$<?= $x['item_price'] ?? '0'; ?></span>
                    </div>
                    <?php endforeach;
                        endforeach; ?>
                    <?php else: ?>
                    <div class="d-flex align-items-center justify-content-center">
                        <h2 class="p-5">Cart is empty</h2>
                    </div>
                    <?php endif;?>
                    
                    <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                        <h5 class="font-size-16 ">Sub Total: </h4>
                        <p class="font-size-18 font-medium-500">$<?= checkEmptyCart() ? 0 : $sub_total ?>.00</p>
                    </div>

                    <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                        <h5 class="font-size-16 ">Shipping: </h4>
                        <p class="font-size-18 font-medium-500">Free</p>
                    </div>

                    <div class="d-flex justify-content-between align-items-center py-3">
                        <h5 class="font-size-16 ">Total: </h4>
                        <p class="font-size-18 font-medium-500">$<?= checkEmptyCart() ? 0 : $total; ?>.00</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>