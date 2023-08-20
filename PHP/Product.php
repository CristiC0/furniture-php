<?php
session_start();
$infoProduct = $_SESSION['infoProduct'];
include 'Misc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />

    <meta name="description" content="Furniture store website inspired from a  couple of other furniture websites" />
    <meta name="keywords" content="Furniture,chair,bed,rooms,decor,catalogue-element-cupboard" />
    <meta name="author" content="Unknown" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Furniture</title>

    <link rel="icon" href="../Images/Icons/TitleIcon.svg" type="image/svg" />

    <link rel="stylesheet" href="../CSS/main.css" />
    <link rel="stylesheet" href="../CSS/Product.css" />

    <script src="../JS/main.js"></script>
    <script src="../JS/catalogue.js"></script>
    <script src="../JS/product.js"></script>

</head>

<body>
    <?php include "../HTML/UIComponents/SideMenu.html" ?>

    <?php include "../HTML/UIComponents/Header.php" ?>

    <div id="image-background">
        <div id="mask-image-background" style="background-image: url(data:image/webp;base64,<?php echo base64_encode($infoProduct['imgMain']) ?>"></div>
    </div>
    <div id="content">
        <div class="el" id="name-desc">
            <div id="name"><?php echo $infoProduct['name']  ?></div>
            <div id="desc"><?php echo $infoProduct['description'] ?></div>
        </div>
        <div class="el" id="buy">
            <div id="buy-opt">
                Your purchase includes:
                <ul>
                    <li>Home Delivery</li>
                    <li>Your part is covered for +10 years</li>
                    <li>Installation</li>
                </ul>
            </div>

            <div id="price">$<?php echo $infoProduct['price']  ?></div>
            <form action="ShoppingCarts.php" method="POST" id="shoppingCartButtons">
                <button class="buy-but" name="bag" value="<?php echo $infoProduct['id_produs'] ?>"><?php echo (isInTheBag($_SESSION['productDisplayedId'])) ? "Remove from the bag" : "Add to bag" ?></button>
                <button class="buy-but" name="wishlist" value="<?php echo $infoProduct['id_produs'] ?>"><?php echo (isInTheWishList($_SESSION['productDisplayedId'])) ? "Remove from wishlist" : "Add to wishlist" ?></button>
            </form>
        </div>
        <div class='el' id="img1" style="background-image:url(data:image/webp;base64,<?php echo base64_encode($infoProduct['imgOther1']) ?>)"> </div>
        <div class="el" id="details">
            <h3>Dimensions & Details:</h3>
            <div><b>Height(cm):<?php echo $infoProduct['height'] ?> </b><span id="height"></span></div>
            <div><b>Width(cm):<?php echo $infoProduct['width'] ?> </b><span id="width"></span></div>
            <div><b>Depth(cm):<?php echo $infoProduct['depth'] ?> </b><span id="depth"></span></div>
            <div><b>Weight(kg):<?php echo $infoProduct['weight'] ?> </b><span id="weight"></span></div>
        </div>
        <div class="el" id="img2" style="background-image:url(data:image/webp;base64,<?php echo base64_encode($infoProduct['img']) ?>)"></div>
        <img class='el imgs' id="img3" src="data:image/webp;base64,<?php echo base64_encode($infoProduct['imgOther2']) ?>"> </img>
    </div>

    <footer>
        <div id="footer-content">
            <div class="footer-left-flex">
                <div id="footer-logo">Furniture</div>
                <div id="footer-lists">
                    <ul>
                        <li><a href="">Design Consultation</a></li>
                        <li><a href="">Our Stores</a></li>
                        <li><a href="">Careers</a></li>
                        <li><a href="">Contacts</a></li>
                        <li><a href="">FAQs</a></li>
                    </ul>
                    <ul>
                        <li><a href="">Shipping Info</a></li>
                        <li><a href="">Care & Maintenance</a></li>
                        <li><a href="">Terms & Conditions</a></li>
                        <li>&copy;2021.All rights reserved</li>
                    </ul>
                </div>
            </div>
            <div id="footer-right-flex">
                <div><b>Keep in touch</b></div>
                <div class="txthlpfoot">
                    <p>Subscribe to our newsletter</p>
                </div>
                <div class="inputs-style">
                    <label for="emailLogfooter">Email: </label>
                    <input type="emailfooter" name="emailLogfooter" id="emailLogfooter" />
                </div>
                <hr width="100%" />
                <br />
                <b>Follow us</b>
                <div class="social-media">
                    <a href="">Facebook</a>-<a href="">Instagram</a>-<a href="">Twitter</a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>