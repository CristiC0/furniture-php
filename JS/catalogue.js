// All products array
var products = [];

// Variables
backgroundImages = [""];
var k;
var catalogue = "";
mainImgs = [];

// Call when window loads
window.onload = function () {
    // color();
    // declare();
    var definedType = localStorage.getItem("catalogueType");
    setInterval(changeMenuUpCat, 100);
    console.log("definedtype: " + definedType);

    var heightMenu = -document.getElementById("menu-up").offsetHeight;
    console.log(heightMenu);
    heightMenu = heightMenu.toString();

    document.getElementById("image-background").style.top = heightMenu + "px";
    if (definedType != undefined) setTimeout(show(definedType), 2000);
    color();
};

// Changes menu
function changeMenuUpCat() {
    let x = document.getElementById("menu-up");
    if (window.scrollY > 0) {
        x.style.animationName = "menuBackgr";
    } else {
        x.style.animationName = "";
        x.style.backgroundColor = "rgba(0,0,0,0)";
        x.style.color = "white";
    }
}

// Fill the catalogue
var currentProducts = [];
function show(type, fromArray = products) {
    localStorage.setItem("catalogueType", type);
    currentProducts = [];
    createCatalogue(type);
    mainImgChange(type);
    let k = 1;
    let cpIndex = 0;
    for (let i = 0; i < fromArray.length; i++) {
        if (type == fromArray[i].type || type == "all") {
            currentProducts[cpIndex++] = fromArray[i];
            document.getElementById("clel" + k).style.display = "block";
            document.getElementById("img" + k).style.backgroundImage =
                "url(" + fromArray[i].img + ")";
            document.getElementById("name" + k).innerHTML = fromArray[i].name;
            document.getElementById("price" + k).innerHTML =
                fromArray[i].price + "$";
            k++;
        }
    }
    // console.log(currentProducts);
    color();
}

// Create the catalogue
function createCatalogue(filter) {
    k = 1;
    catalogue = "";
    for (let i of products) {
        if (i.type == filter || filter == "all") {
            catalogue +=
                "<div class='cle' id='clel" +
                k +
                "'" +
                " onmouseover='iconsAppear(\"" +
                k +
                "\")' onmouseout='iconsDisappear(\"" +
                k +
                "\")'>   <div class='icons-hover'><div class='icons-buy'><img src='../Images/Icons/wishlist.svg' class='wishlist' id='wishlist" +
                k +
                "' onclick='wishlistAdd(\"" +
                k +
                "\")'></img><img src='../Images/Icons/shopping-bag.svg' class='bag' id='bag" +
                k +
                "' onclick='bagAdd(\"" +
                k +
                "\")'></img> </div></div> <a href='../HTML/Product.html' onclick='setProduct(\"" +
                k +
                "\")' class='prodlink'><div class='imgs' id='img" +
                k +
                "'></div><div class='info info1'><span id='name" +
                k +
                "'></span><span class='price' id='price" +
                k +
                "'></span></div></a></div>";
            k++;
        }
    }
    // document.getElementById("catalogue-list").innerHTML = catalogue;

    selected(filter);
}

// Start sorting
function sortStart(mode) {
    sort(mode, currentProducts);
    show(localStorage.getItem("catalogueType"), currentProducts);
}
// Sort the catalogue
function sort(mode, sortArray) {
    switch (mode) {
        case "Aa":
            sortArray.sort(dynamicSort("name"));
            break;
        case "Ad":
            sortArray.sort(dynamicSort("-name"));
            break;
        case "Na":
            sortArray.sort(dynamicSort("price", 1));
            break;
        case "Nd":
            sortArray.sort(dynamicSort("-price"), 1);
            break;
        default:
            break;
    }
    console.log(currentProducts);
}

// Sort an array of objects
function dynamicSort(property, n = 0) {
    var sortInd = 1;
    if (property[0] === "-") {
        sortInd = -1;
        property = property.substr(1);
    }
    return function (a, b) {
        var result =
            a[property] < b[property] ? -1 : a[property] > b[property] ? 1 : 0;
        return result * sortInd;
    };
}
// Show the current type selected
function selected(s) {
    let nodes = document.getElementById("list").childNodes;
    for (let i of nodes) {
        if (i.nodeName == "LI") i.style.color = "black";
        if (i.nodeName == "LI" && i.id == s) i.style.color = "orange";
    }
    console.log(s);
}

// Color the the floating icons respectively
function color() {
    wishlistItems = JSON.parse(localStorage.getItem("wishlistItems"));
    bagItems = JSON.parse(localStorage.getItem("bagItems"));
    for (let i = 1; i < k; i++) {
        for (p of wishlistItems) {
            if (document.getElementById("name" + i).innerHTML == p) {
                document.getElementById("wishlist" + i).style.filter =
                    "invert(76%) sepia(84%) saturate(3191%) hue-rotate(359deg) brightness(101%) contrast(102%)";
                document.getElementById("wishlist" + i).style.opacity = "1";
            }
        }
    }
    for (let i = 1; i < k; i++) {
        for (p of bagItems) {
            if (document.getElementById("name" + i).innerHTML == p) {
                document.getElementById("bag" + i).style.filter =
                    "invert(76%) sepia(84%) saturate(3191%) hue-rotate(359deg) brightness(101%) contrast(102%)";
                document.getElementById("bag" + i).style.opacity = "1";
            }
        }
    }
}

// Fade In the Icons
function iconsAppear(n) {
    document.getElementById("wishlist" + n).style.animationName = "fadeIn";
    document.getElementById("bag" + n).style.animationName = "fadeIn";
}

// Fade Out the Icons
function iconsDisappear(n) {
    document.getElementById("wishlist" + n).style.animationName = "fadeOut";
    document.getElementById("bag" + n).style.animationName = "fadeOut";
    color();
}

// Change the menu when moving
function changeMenuUp() {
    let x = document.getElementById("menu-up");
    if (window.scrollY > 0) {
        console.log(window.scrollY);
        x.style.animationName = "menuBackgr";
    } else {
        x.style.animationName = "";
        x.style.backgroundColor = "";
        x.style.color = "";
    }
}

// Select the product for the Product page
function setProduct(n) {
    let namecur = document.getElementById("name" + n).innerHTML;
    for (i in products) {
        if (namecur == products[i].name) {
            localStorage.setItem("products", JSON.stringify(products));
            localStorage.setItem("index", i);
        }
    }
}

// Add an Item to wishlist
function wishlistAdd(n) {
    let namecur = document.getElementById("name" + n).innerHTML;
    document.getElementById("wishlist" + n).style.filter =
        "invert(76%) sepia(84%) saturate(3191%) hue-rotate(359deg)brightness(101%) contrast(102%)";
    wishlistItems = JSON.parse(localStorage.getItem("wishlistItems"));
    for (i of products) {
        let jump;
        if (namecur == i.name) {
            jump = 1;
            for (j in wishlistItems) {
                console.log("wishlistItems[j]:" + wishlistItems[j]);
                if (wishlistItems[j] == namecur) {
                    jump = 0;
                    wishlistItems.splice(j, 1);
                    document.getElementById("wishlist" + n).style.filter = "";
                    document.getElementById("wishlist" + n).style.opacity = "0";
                }
            }
        }
        if (jump) {
            wishlistItems.push(i.name);
            document.getElementById("wishlist" + n).style.filter =
                " invert(76%) sepia(84%) saturate(3191%) hue-rotate(359deg) brightness(101%) contrast(102%)";
        }
    }
    localStorage.setItem("wishlistItems", JSON.stringify(wishlistItems));
}

// Add an Item to Bag
function bagAdd(n) {
    let namecur = document.getElementById("name" + n).innerHTML;
    document.getElementById("bag" + n).style.filter =
        "invert(76%) sepia(84%) saturate(3191%) hue-rotate(359deg)brightness(101%) contrast(102%)";
    bagItems = JSON.parse(localStorage.getItem("bagItems"));
    for (i of products) {
        let jump;
        if (namecur == i.name) {
            jump = 1;
            for (j in bagItems) {
                if (bagItems[j] == namecur) {
                    jump = 0;
                    bagItems.splice(j, 1);
                    document.getElementById("bag" + n).style.filter = "";
                    document.getElementById("bag" + n).style.opacity = "0";
                }
            }
        }
        if (jump) {
            bagItems.push(i.name);
            document.getElementById("bag" + n).style.filter =
                " invert(76%) sepia(84%) saturate(3191%) hue-rotate(359deg) brightness(101%) contrast(102%)";
        }
    }
    localStorage.setItem("bagItems", JSON.stringify(bagItems));
}

// Change the image to correspond the type
function mainImgChange(n) {
    document.getElementById("image-background").style.animationName =
        "transImg";
    setTimeout(function dummy1() {
        document.getElementById("image-background").style.animationName = "";
    }, 400);
    setTimeout(function dummy2() {
        document.getElementById("image-background").style.backgroundImage =
            "url(../Images/Catalogue/MainImgs/" + n + ".jpg)";
    }, 200);
}
