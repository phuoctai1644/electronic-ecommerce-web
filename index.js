var cartItems = JSON.parse(localStorage.getItem('cart-items')) ?? [];

addEventListener('load', () => {
    const cartNumber = document.querySelector('.header__action-cart-number');
    cartNumber.innerHTML = localStorage.getItem('cart-quantity') ?? 0;
})
  
function addToCart(itemId) {
    const cartNumber = document.querySelector('.header__action-cart-number');
    let quantity = localStorage.getItem('cart-quantity') ?? 0;
    cartNumber.innerHTML = ++quantity;

    if (cartItems) {
        const index = cartItems.findIndex(item => item[0] === itemId);
        if (index !== -1) {
            cartItems[index][1]++;
        } else {
            cartItems = [...cartItems, [itemId, 1]]
        }
    }
    localStorage.setItem('cart-quantity', quantity++);
    localStorage.setItem('cart-items', JSON.stringify(cartItems));
}

function buyNow(itemId) {
    addToCart(itemId);
    window.location.href = './cart.php';
}

function logOut() {
    document.cookie = "token=; cartItems=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; ";
    localStorage.removeItem('cart-quantity');
    localStorage.removeItem('cart-items');
    location.reload();
}