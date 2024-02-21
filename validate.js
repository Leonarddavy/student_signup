function capitalizeRegistrationNumber(input) {
    var regNumber = input.value;
    // Split the registration number by "/"
    var parts = regNumber.split('/');

    for (var i = 0; i < parts.length; i++) {
        parts[i] = parts[i].toUpperCase();
    }
    input.value = parts.join('/');
}

function validateForm() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("cpassword").value;

    // Check if the password and confirm password match
    if (password !== confirmPassword) {
        alert("Password and Confirm Password do not match!");
        return false;
    }

    // Check if the password has at least 8 characters
    if (password.length < 8) {
        alert("Password should have at least 8 characters!");
        return false;
    }

    // Check if the password contains different characters
    if (!hasDifferentCharacters(password)) {
        alert("Password should contain different symbols and characters!");
        return false;
    }

    return true;
}

// Helper function to check if a password contains different characters
function hasDifferentCharacters(password) {
    // Use a Set to check for uniqueness of characters
    var charSet = new Set(password);

    // If the size of the Set is equal to the length of the password, all characters are different
    return charSet.size === password.length;
}


// function addAreaCode() {
//     var phoneNumberInput = document.getElementById("phonenumber");
//     var currentPhoneNumber = phoneNumberInput.value;

//     // Check if the phone number does not start with "254" and its length is less than 11 characters
//     if (!currentPhoneNumber.startsWith("00") && currentPhoneNumber.length < 11) {
//         phoneNumberInput.value = "" + currentPhoneNumber;
//     }
//     return true;
// }

function validateAndAddAreaCode() {
  validateForm();
}
