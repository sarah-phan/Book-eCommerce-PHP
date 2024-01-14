// function updatePrice(row) {
//     var quantityInputs = row.querySelectorAll('.product_quantity');
//     var total = 0;
    
//     quantityInputs.forEach(function (quantityInput, index) {
//         var pricePerUnit = 163800;
//         var subtotal = quantityInput.value * pricePerUnit;
//         var subtotalElement = row.querySelectorAll('.temporary_product_price')[index];
//         subtotalElement.innerHTML = subtotal.toLocaleString() + " ₫";
//         total += subtotal;
//         var totalElement = row.querySelector('.total_product_price');
//         if (totalElement != 0) {
//             totalElement.innerHTML = total.toLocaleString() + " ₫";
//         }
//     });
// }

document.querySelectorAll('.add_to_cart_increase_button').forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var quantityInput = this.parentNode.querySelector('.product_quantity');
        quantityInput.stepUp();
        updatePrice(this.closest('.row'));
    });
});

document.querySelectorAll('.add_to_cart_decrease_button').forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var quantityInput = this.parentNode.querySelector('.product_quantity');
        if(quantityInput.value > 0){
            quantityInput.stepDown();
        }
        updatePrice(this.closest('.row'));
    });
});

document.addEventListener('DOMContentLoaded', function() {

//     var cartWrapper = document.querySelector('.cart_wrapper')
    var addToCartWrapper = document.querySelector('.add_to_cart_wrapper')

//     if (cartWrapper) {
//         updatePrice(cartWrapper);
//     }
    if(addToCartWrapper){
        window.onload = updatePrice(addToCartWrapper);
    }
});
