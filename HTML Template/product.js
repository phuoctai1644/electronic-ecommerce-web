
function addToCart() {
    const cartNumber = document.querySelector('.header__action-cart-number');
    let quantity = localStorage.getItem('cart-quantity') ?? 0;

    cartNumber.innerHTML = ++quantity;

    localStorage.setItem('cart-quantity', quantity++);
}

addEventListener('load', () => {
    const cartNumber = document.querySelector('.header__action-cart-number');
    cartNumber.innerHTML = localStorage.getItem('cart-quantity') ?? 0;
})