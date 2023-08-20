// window.onload = function () {
//     wishlist = JSON.parse(localStorage.getItem("wishlistItems"));
//     prod = JSON.parse(localStorage.getItem("products"));
//     table =
//         "<table><tr><th>Name</th><th>Type</th><th>Height</th><th>Width</th><th>Depth</th><th>Weight</th><th>Img</th><th>Price</th></tr>";

//     for (let i of wishlist) {
//         for (let x of prod)
//             if (x.name == i) {
//                 table +=
//                     "<tr><td>" +
//                     i +
//                     "</td><td>" +
//                     x.type +
//                     "</td><td>" +
//                     x.height +
//                     "</td><td>" +
//                     x.width +
//                     "</td><td>" +
//                     x.depth +
//                     "</td><td>" +
//                     x.weight +
//                     "</td><td><img class='wishImg' src='" +
//                     x.img +
//                     "'></img></td><td>" +
//                     x.price+ "$" +
//                     "</td>";
//             }
//     }
//     table += "</table>";
//     document.getElementById("table").innerHTML = table;
// };
