function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    var passwordIcon = document.querySelector(".password_field_icon");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        passwordIcon.src = "/image/icon/Hide Password.svg"; 
    } else {
        passwordInput.type = "password";
        // Revert the icon to "Show Password"
        passwordIcon.src = "image/icon/Show Password.svg";
    }
}

function togglePasswordVisibilityForConfirmation() {
    var passwordInput = document.getElementById("password_confirmation");
    var passwordIcon = document.querySelector(".password_confirmation_field_icon");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        passwordIcon.src = "/image/icon/Hide Password.svg"; 
    } else {
        passwordInput.type = "password";
        // Revert the icon to "Show Password"
        passwordIcon.src = "image/icon/Show Password.svg";
    }
}