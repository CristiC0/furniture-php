// Variables
var openedsubmenu;

// When on phone opens the mini-menu
function menuChoose() {
    if (window.innerWidth > 750) {
        openSideMenu();
    } else {
        openSideMenuRes();
    }
}

// Opens te side menu
function openSideMenu() {
    document.getElementById("menu-side-back").style.display = "block";
    document.getElementById("menu-side").style.display = "block";
    document.getElementById("menu-side").style.animationName = "menuside";
    document.getElementById("close-menu").style.animationName = "closemove";
    document.getElementById("submenu-side").style.animationName = "menuside";
}

// Opens te side mini-menu
function openSideMenuRes() {
    document.getElementById("menu-side-back").style.display = "block";
    document.getElementById("menu-side-res").style.display = "block";
    document.getElementById("menu-side-res").style.animationName =
        "menusideresp";
}

// Closes te submenus
function closeSideMenu() {
    document.getElementById("menu-side-back").style.display = "none";
    if (window.innerWidth < 750) closeSideMenuRes();
    {
        document.getElementById("submenu-side").style.animationName =
            "menusidereverse";
    }
    if (openedsubmenu) closeSubMenu();
    setTimeout(function dummy3() {
        document.getElementById("close-menu").style.animationName =
            "closemovereverse";
        document.getElementById("submenu-side").style.animationName =
            "menusidereverse";
        document.getElementById("menu-side").style.animationName =
            "menusidereverse";
        document
            .getElementById("menu-side")
            .style.setProperty("--visibility-switch", "hidden");
    }, 300);
    setTimeout(menuDisplayreset, 1000);
}

// Closes the side mini-menu
function closeSideMenuRes() {
    document.getElementById("menu-side-res").style.animationName =
        "menusidereverseresp";
    return 0;
}

// Opens the sub-side menu
function openSubMenu(subm) {
    if (window.innerWidth < 700) {
        return 0;
    }
    document.getElementById("submenu-side").style.animationName = "submenuside";
    document.getElementById("close-menu").style.animationName = "closemovesec";
    document.getElementById("submenu-side").style.display = "block";
    document
        .getElementById("menu-side")
        .style.setProperty("--visibility-switch", "visible");
    document.getElementById("close-menu").style.animationName = "closemovesec";
    for (let i = 1; i < 3; i++)
        document.getElementById("submen" + i).style.display = "none";
    document.getElementById("submen" + subm).style.display = "flex";
    openedsubmenu = 1;
}

// Closes the sub-side menu
function closeSubMenu() {
    document.getElementById("submenu-side").style.animationName =
        "submenusidereverse";
    openedsubmenu = 0;

    document.getElementById("close-menu").style.animationName =
        "closemovesecreverse";
}

// Resets to default display of menu
function menuDisplayreset() {
    document.getElementById("menu-side").style.display = "none";
    document.getElementById("submenu-side").style.display = "none";
}

//Send from menus the type
function changesent(sentType) {
    console.log("QQQQQQQQQQQQQQQQQQQ");
    localStorage.setItem("catalogueType", sentType);
    console.log("senttype: " + sentType);
    console.log(localStorage.getItem("catalogueType"));
}
