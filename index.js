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
function display_cart(){
    document.getElementById("cart-container").style.display = "block";
    display_on_cart();
    get_total_money();
    get_cart_number();
}
function hide_cart(){
    document.getElementById("cart-container").style.display = "none";
}
function display_on_cart(){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("row2").innerHTML = this.responseText;
    }
    xhttp.open("GET", "cart/cart.php");
    xhttp.send();
}
function increase_product(id,name){
    if(document.getElementById(id).innerHTML < 1000) document.getElementById(id).innerHTML++;
    update_cart(id,name);
}
function decrease_product(id,name){
    if(document.getElementById(id).innerHTML > 1) document.getElementById(id).innerHTML--;
    update_cart(id,name);
}
function update_cart(id,name){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        display_cart();
    }
    var num = document.getElementById(id).innerHTML;
    var name = document.getElementById(name).innerHTML;
    name = name.replace(" ","%20");
    xhttp.open("GET", "cart/update_cart.php?name="+name+"&num="+num);
    xhttp.send();

}
function delete_from_cart(name){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        display_cart();
    }
    var name = document.getElementById(name).innerHTML;
    name = name.replace(" ","%20");
    xhttp.open("GET", "cart/delete_from_cart.php?name="+name);
    xhttp.send();
}
function get_total_money(){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("total-money").innerHTML = this.responseText;
    }
    xhttp.open("GET", "cart/total_money.php");
    xhttp.send();
}
function logout(){
    document.cookie = "token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    location.reload();
}
function get_cart_number(){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("num_of_cart").innerHTML = this.responseText;
    }
    xhttp.open("GET", "cart/cart_number.php");
    xhttp.send();
}