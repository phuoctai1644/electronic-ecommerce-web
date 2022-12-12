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
function display_cart(id_user){
    document.getElementById("cart-container").style.display = "block";
    display_on_cart(id_user);
}
function hide_cart(){
    document.getElementById("cart-container").style.display = "none";
}
function logout(){
    document.cookie = "token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    location.reload();
}

function add_to_cart(id_user,id_product){
    if(localStorage.getItem("cart") == null){
        localStorage.setItem("cart","[]");
    }
    let cart = JSON.parse(localStorage.getItem("cart"));
    let p = 1;
    for(let i = 0;i<cart.length;i++){
        if(cart[i].id_user == id_user && cart[i].id_product == id_product){
            p = 0;
            cart[i].num++;
            break;
        }
    }
    if(p){
        let p_name = document.getElementById("productname"+id_product).innerHTML;
        let p_cost = document.getElementById("productcost"+id_product).innerHTML;
        let p_img = document.getElementById("productimg"+id_product).src;
        let obj = {
            id_product: id_product,
            id_user: id_user,
            name: p_name,
            cost: p_cost,
            img: p_img,
            num:1
        }
        var old_data = JSON.parse(localStorage.getItem("cart"));
        old_data.push(obj);
        localStorage.setItem("cart",JSON.stringify(old_data));
    }
    else{
        localStorage.setItem("cart",JSON.stringify(cart));
    }
    display_on_cart(id_user);
    
}
function string_product(name,cost,img,num,id_user,id_product){
    let res = "<div class='products'>";
    res+= "<div style='display:grid;grid-template-columns:50% 50%;align-items:center;height:100%;'>";
    res+= "<div><img src="+img+"></div>";
    res+= "<div><b><span>"+name+"</span></b><br>";
    res+="<span style='color:green'>"+cost+"<span></div></div>";
    res+="<div class='button-cart'><button class='btn btn-light' id='btnX' onclick='delete_from_cart("+id_user+","+id_product+")'>X</button>";
    res+="<div><button class='btn' onclick='decrease("+id_user+","+id_product+")'>-</button>";
    res+="<span>"+num+"</span>";
    res+="<button class='btn' onclick='increase("+id_user+","+id_product+")'>+</button></div></div></div>";
    return res;
}
function display_on_cart(id_user){
    var cart = JSON.parse(localStorage.getItem("cart"));
    let res = "";
    for(let i = 0;i<cart.length;i++){
        if(cart[i].id_user == id_user){
            res+=string_product(cart[i].name,cart[i].cost,cart[i].img,cart[i].num,cart[i].id_user,cart[i].id_product);
        }
    }
    document.getElementById("row2").innerHTML = res;
    total_money(id_user);
}
function delete_from_cart(id_user,id_product){
    var cart = JSON.parse(localStorage.getItem("cart"));
    for(let i = 0;i<cart.length;i++){
        if(cart[i].id_user == id_user && id_product == cart[i].id_product){
            cart.splice(i,1); 
            localStorage.setItem("cart",JSON.stringify(cart));
            break;
        }
    }
    total_money(id_user);
    display_on_cart(id_user);
}
function increase(id_user,id_product){
    let cart = JSON.parse(localStorage.getItem("cart"));
    for(let i = 0;i<cart.length;i++){
        if(cart[i].id_user == id_user && cart[i].id_product == id_product){
            cart[i].num++;
            localStorage.setItem("cart",JSON.stringify(cart));
            break;
        }
    }
    total_money(id_user);
    display_on_cart(id_user);
}
function decrease(id_user,id_product){
    let cart = JSON.parse(localStorage.getItem("cart"));
    for(let i = 0;i<cart.length;i++){
        if(cart[i].id_user == id_user && cart[i].id_product == id_product){
            cart[i].num--;
            if(cart[i].num < 1) cart[i].num = 1;
            localStorage.setItem("cart",JSON.stringify(cart));
            break;
        }
    }
    total_money(id_user);
    display_on_cart(id_user);
}
function total_money(id_user){
    let cart = JSON.parse(localStorage.getItem("cart"));
    let res = 0;
    let num = 0;
    for(let i = 0;i<cart.length;i++){
        if(cart[i].id_user == id_user){
            res += cart[i].num*string_to_cost(cart[i].cost);
            num+=cart[i].num;
        }
    }
    document.getElementById("total-money").innerHTML = cost_to_string(res);
    document.getElementById("num_of_cart").innerHTML = num;
}
function string_to_cost(string){
    let res = "";
    for(let i = 0;i<string.length;i++){
        if(string[i] != '.' && i != string.length-1){
            res+=string[i];
        }
    }
    return res;
}
function cost_to_string(string){
    string = string.toString();
    let res = "";
    let n = 0;
    for(let i = string.length-1;i>=0;i--){
        if(n == 3){
            res = "."+res;
            n = 0;
        }
        res = string[i]+res;
        n++;
    }
    res+="đ";
    return res;
}

