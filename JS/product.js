window.onload = function () {
    // prod = JSON.parse(localStorage.getItem("products"));
    // console.log(prod);
    // index = localStorage.getItem("index");
    // document.getElementById("image-background").style.backgroundImage =
    //     "url(" + prod[index].imgMain + ")";
    // document.getElementById("img1").style.backgroundImage =
    //     "url(" + prod[index].img + ")";
    // document.getElementById("img2").style.backgroundImage =
    //     "url(" + prod[index].imgOther1 + ")";
    // document.getElementById("img3").style.backgroundImage =
    //     "url(" + prod[index].imgOther2 + ")";
    // document.getElementById("name").innerHTML = prod[index].name;
    // document.getElementById("desc").innerHTML = prod[index].desc;
    // document.getElementById("price").innerHTML = prod[index].price + "$";
    // document.getElementById("height").innerHTML = prod[index].height;
    // document.getElementById("width").innerHTML = prod[index].width;
    // document.getElementById("depth").innerHTML = prod[index].depth;
    // document.getElementById("weight").innerHTML = prod[index].weight;

    setInterval(changeMenuUpProd, 100);
    var heightMenu = -document.getElementById("menu-up").offsetHeight;
    heightMenu = heightMenu.toString();
    document.getElementById("image-background").style.top = heightMenu + "px";
};
// Changes menu when moving
function changeMenuUpProd() {
    let x = document.getElementById("menu-up");
    if (window.scrollY > 0) {
        console.log(window.scrollY);
        x.style.animationName = "menuBackgr";
    } else {
        x.style.animationName = "";
        x.style.backgroundColor = "rgba(0,0,0,0)";
        x.style.color = "white";
    }
}
