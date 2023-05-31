var lfContainer = document.querySelector("#login-form-container")
var rfContainer = document.querySelector("#register-form-container")

// Switch to registration form
function showRegister() {
    let lbtn = document.querySelector("#show-lform")
    let rbtn = document.querySelector("#show-rform")

    rbtn.classList.add("disabled")
    lbtn.classList.remove("disabled")

    rfContainer.classList.remove("d-none")
    lfContainer.classList.add("d-none")
}

function showLogin() {
    let lbtn = document.querySelector("#show-lform")
    let rbtn = document.querySelector("#show-rform")

    rbtn.classList.remove("disabled")
    lbtn.classList.add("disabled")

    lfContainer.classList.remove("d-none")
    rfContainer.classList.add("d-none")
}