// window.onload = function () {
//     bagCreate();
// };

// function bagCreate() {
//     bagItems = JSON.parse(localStorage.getItem("bagItems"));
//     console.log(bagItems);
//     bag = "";
//     k = 1;
//     totalPrice = 0;
//     prod = JSON.parse(localStorage.getItem("products"));
//     // console.log(prod);
//     // wishlistItems.push(wishlist);
//     for (let i of bagItems) {
//         for (let x of prod)
//             if (x.name == i) {
//                 console.log(i);
//                 bag +=
//                     "<div class='bag-element'><img src='" +
//                     x.img +
//                     "'><div class='bag-info'><a href='../HTML/Product.html' onclick='setProduct(\"" +
//                     x.name +
//                     "\")' class='prodlink'><div class='name' id='name" +
//                     k +
//                     "' >" +
//                     x.name +
//                     "</div></a><div class='desc' >" +
//                     x.desc +
//                     "</div></div><div class='priceinfo'><div class='price'>" +
//                     x.price +
//                     "$" +
//                     "</div><div class='remove' onclick='removeItem(\"" +
//                     k +
//                     "\")' ><u>REMOVE</u></div></div></div>";
//                 k++;
//                 console.log(bag);
//                 totalPrice += parseInt(x.price);
//             }
//     }
//     document.getElementById("container-bag-content").innerHTML = bag;
//     document.getElementById("price-total").innerHTML =
//         "Total: " + totalPrice + "$";
// }
// function removeItem(item) {
//     let removed = document.getElementById("name" + item).innerHTML;
//     console.log(removed);
//     for (let i in bagItems) {
//         if (removed == bagItems[i]) {
//             console.log(i);
//             bagItems.splice(i, 1);
//         }
//     }
//     localStorage.setItem("bagItems", JSON.stringify(bagItems));
//     bagCreate();
// }
// function setProduct(n) {
//     let products = JSON.parse(localStorage.getItem("products"));
//     for (i in products) {
//         if (n == products[i].name) {
//             // localStorage.setItem("products", JSON.stringify(products));
//             localStorage.setItem("index", i);
//         }
//     }
// }
