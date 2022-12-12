function login_on() {
    document.getElementById("login-container").style.display = "block";
}
function login_off() {
    document.getElementById("login-container").style.display = "none";
}
function register_on() {
    document.getElementById("register-container").style.display = "block";
}
function register_off() {
    document.getElementById("register-container").style.display = "none";
}
function login_to_register(){
    document.getElementById("login-container").style.display = "none";
    document.getElementById("register-container").style.display = "block";
}
function register_to_login(){
    document.getElementById("register-container").style.display = "none";
    document.getElementById("login-container").style.display = "block";
}