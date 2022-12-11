document.addEventListener( 'DOMContentLoaded', function() {
    var splide = new Splide( '.splide' );
    splide.mount();
  } );

addEventListener('load', () => {
  const cartNumber = document.querySelector('.header__action-cart-number');
  cartNumber.innerHTML = localStorage.getItem('cart-quantity') ?? 0;
})