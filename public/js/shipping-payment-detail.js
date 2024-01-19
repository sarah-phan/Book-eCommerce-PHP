document.addEventListener("DOMContentLoaded", function() {
    // Set initial state for payment_by_cash_button based on the saved value
    setInitialState('payment_by_cash_button', 'payment_by_cash_content');
    setInitialState('payment_by_card_button', 'payment_by_card_content');
});

function expandButton(buttonId, contentId) {
    var button = document.getElementById(buttonId);
        var content = document.getElementById(contentId);
        // Check if the button is currently expanded
        var isExpanded = !content.classList.contains('hidden');

        // Collapse all buttons and contents
        var allButtons = document.querySelectorAll('.payment_choose_wrapper button');
        var allContents = document.querySelectorAll('.payment_choose_wrapper .payment_by_cash_content, .payment_choose_wrapper .payment_by_card_content');

        allButtons.forEach(function (btn) {
            btn.classList.remove('visible');
        });

        allContents.forEach(function (cnt) {
            cnt.classList.add('hidden');
        });

        // Expand the clicked button if it was not already expanded
        if (!isExpanded) {
            button.classList.add('visible');
            content.classList.remove('hidden');
        }

        var paymentMethod = (buttonId === 'payment_by_cash_button') ? 'Cash' : 'Card';
        document.getElementById('paymentMethod').value = paymentMethod;
}
function setInitialState(buttonId, contentId) {
    var button = document.getElementById(buttonId);
    var content = document.getElementById(contentId);

    var isExpanded = localStorage.getItem(buttonId === "payment_by_cash_button" ? "isCashButtonExpanded" : "isCardButtonExpanded");
    if (isExpanded === "true") {
        button.style.height = "auto";
        content.classList.add("visible");
        content.classList.remove("hidden");
    } else {
        button.style.height = "100%";
        content.classList.add("hidden");
        content.classList.remove("visible");

        // Set the initial value in localStorage to false
        localStorage.setItem(buttonId === "payment_by_cash_button" ? "isCashButtonExpanded" : "isCardButtonExpanded", false);
    }
}


