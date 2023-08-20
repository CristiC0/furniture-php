<?php
session_start();
$linkPrefix = "/LucruIndividual/PHP/";
if (!isset($_SESSION['loggedIn'])) {
    header('Location: http://' . $_SERVER['SERVER_NAME'] . $linkPrefix . "Login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />

    <meta name="description" content="Furniture store website inspired from other couple of furniture websites" />
    <meta name="keywords" content="Furniture,chair,bed,rooms,decor,catalogue-element-cupboard" />
    <meta name="author" content="Unknown" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Furniture</title>

    <link rel="icon" href="../Images/Icons/TitleIcon.svg" type="image/svg" />

    <link rel="stylesheet" href="../CSS/main.css" />
    <link rel="stylesheet" href="../CSS/Wishlist.css" />

    <script src="../JS/wishlist.js"></script>
    <script src="../JS/main.js"></script>

</head>

<body>
    <?php include "../HTML/UIComponents/SideMenu.html" ?>

    <?php include "../HTML/UIComponents/Header.php" ?>

    <div id="content-container">
        <table>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Height</th>
                <th>Width</th>
                <th>Depth</th>
                <th>Weight</th>
                <th>Img</th>
                <th>Price</th>
            </tr>
            <?php
            $wishlist = $_SESSION['currentUser']['wishlist'];
            $wishlist = explode(",", $wishlist);
            include 'DBConnection.php';
            for ($i = 0; $i < count($wishlist) - 1; $i++) {
                $query = "SELECT * FROM produs WHERE id_produs=" . $wishlist[$i];
                $product = mysqli_fetch_array(mysqli_query($connection, $query));
            ?>
                <tr>
                    <td>
                        <?php echo $product['name']  ?>
                    </td>
                    <td>
                        <?php echo $product['type'] ?>
                    </td>
                    <td>
                        <?php echo $product['height'] ?>
                    </td>
                    <td>
                        <?php echo $product['width'] ?>
                    </td>
                    <td>
                        <?php echo $product['depth'] ?>
                    </td>
                    <td>
                        <?php echo $product['weight'] ?>
                    </td>
                    <td>
                        <img class="wishImg" src="data:image/webp;base64,<?php echo base64_encode($product['img']) ?>">
                    </td>
                    <td>
                        <?php echo $product['price'] ?> $
                    </td>
                </tr>

            <?php
            }
            mysqli_close($connection); ?>
        </table>
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