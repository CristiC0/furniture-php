// Global variables
var indexImages = 1;
var imgs = ["Stock1.webp", "Stock2.webp", "Stock3.jpg", "Stock4.jpg"];

//OnLoad calls
window.onload = function setup() {
    // localStorage.clear();
    declare();
    changeImgauto();

    setInterval(changeMenuUp, 100);

    //Make the first button white when index loads & Position the menu (required because of stupidity)
    document.getElementById("rad-but0").style.backgroundColor = "white";
    var heightMenu = -document.getElementById("menu-up").offsetHeight;
    heightMenu = heightMenu.toString();
    document.getElementById("slider").style.top = heightMenu + "px";
};

// Declare some things first time
function declare() {
    console.log("loc:" + localStorage.length);
    console.log(localStorage);
    if (localStorage.length < 2) {
        console.log("Messes up");
        var wishlistItems = [];
        var bagItems = [];
        localStorage.setItem("wishlistItems", JSON.stringify(wishlistItems));
        localStorage.setItem("bagItems", JSON.stringify(bagItems));
        localStorage.setItem("products", JSON.stringify(products));
        console.log(localStorage);
    }
}

//Change the background color of menu when scrolling
function changeMenuUp() {
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

//Carousel
function changeImgauto() {
    autoSetImg = setInterval(function dummy0() {
        let currentImage = imgs[indexImages++];
        if (indexImages == 4) indexImages = 0;
        changeImg(currentImage, 0);
    }, 10000);
}

// Change the image
function changeImg(pic, clicked = 1) {
    if (clicked) {
        clearInterval(autoSetImg);
        changeImgauto();
    }
    indexImages = parseInt(pic.match(/\d/));
    checkRadio();
    if (indexImages == 4) {
        indexImages = 0;
    }
    document.getElementById("slider").style.animationName = "transImg";
    setTimeout(function dummy1() {
        document.getElementById("slider").style.animationName = "";
    }, 400);
    setTimeout(function dummy2() {
        document.getElementById("slider").style.backgroundImage =
            "url(Images/" + pic + ")";
    }, 200);
}

//Carousel indicator
function checkRadio() {
    for (let index = 0; index < 4; index++) {
        let x = document.getElementById("rad-but" + index);
        x.style.backgroundColor = "";
    }
    document.getElementById(
        "rad-but" + (indexImages - 1)
    ).style.backgroundColor = "white";
}

// Customers review next page
function flipCustomers(d) {
    if (d == "r") {
        for (let i = 1; i < 4; i++) {
            console.log("cust" + i);
            flipCustomersAction(i, "-180deg");
        }
        document.getElementById("customers-left").style.color = "orange";
        document.getElementById("customers-right").style.color = "grey";
    } else if (d == "l") {
        for (let i = 1; i < 4; i++) {
            flipCustomersAction(i, "0deg");
        }
        document.getElementById("customers-left").style.color = "grey";
        document.getElementById("customers-right").style.color = "orange";
    }
}

//Rotate the current review
function flipCustomersAction(i, deg) {
    setTimeout(function dummy7() {
        document.getElementById("cust" + i).style.transform =
            "rotateY(" + deg + ")";
    }, 200 * i);
}
