document.querySelectorAll('.add_to_cart_increase_button').forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var quantityInput = this.parentNode.querySelector('.product_quantity');
        quantityInput.stepUp();

        var cartWrapper = document.querySelector('.cart_wrapper')
        var addToCartWrapper = document.querySelector('.add_to_cart_wrapper')
        if (cartWrapper) {
            window.onload = updatePriceForCartDetail(cartWrapper);
        }
        if(addToCartWrapper){
            window.onload = updatePrice(this.closest('.row'));
        }
    });
});

document.querySelectorAll('.add_to_cart_decrease_button').forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var quantityInput = this.parentNode.querySelector('.product_quantity');
        if(quantityInput.value > 1){
            quantityInput.stepDown();
        }
        
        var cartWrapper = document.querySelector('.cart_wrapper')
        var addToCartWrapper = document.querySelector('.add_to_cart_wrapper')
        if (cartWrapper) {
            window.onload = updatePriceForCartDetail(cartWrapper);
        }
        if(addToCartWrapper){
            window.onload = updatePrice(this.closest('.row'));
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {

    var cartWrapper = document.querySelector('.cart_wrapper')
    var addToCartWrapper = document.querySelector('.add_to_cart_wrapper')

    if (cartWrapper) {
        window.onload = updatePriceForCartDetail(cartWrapper);
    }
    if(addToCartWrapper){
        window.onload = updatePrice(addToCartWrapper);
    }
});
