<?php
$linkPrefix = "/LucruIndividual/PHP/";
session_start();
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

    <link rel="stylesheet" href="../CSS/Bag.css">
    <link rel="stylesheet" href="../CSS/main.css" />

    <script src="../JS/bag.js"></script>
    <script src="../JS/main.js"></script>
</head>

<body>
    <?php include "../HTML/UIComponents/SideMenu.html" ?>

    <?php include "../HTML/UIComponents/Header.php" ?>


    <div id="container-bag-content">
        <?php
        $bag = $_SESSION['currentUser']['bag'];
        $bag = explode(",", $bag);
        $sumTotal = 0;
        include 'DBConnection.php';
        for ($i = 0; $i < count($bag) - 1; $i++) {
            $query = "SELECT * FROM produs WHERE id_produs=" . $bag[$i];
            $product = mysqli_fetch_array(mysqli_query($connection, $query));
            $sumTotal += $product['price'];
        ?>
            <div class='bag-element'><img src="data:image/webp;base64,<?php echo base64_encode($product['img']) ?>">
                <div class='bag-info'><a href='Product.php' onclick='setProduct()' class='prodlink'>
                        <div class='name' id='name<?php echo $product['id_product'] ?>'> <?php echo $product['name'] ?> </div>
                    </a>
                    <div class='desc'><?php echo $product['description'] ?> </div>

                </div>
                <div class='priceinfo'>
                    <div class='price'>$<?php echo $product['price'] ?></div>
                    <form action="ShoppingCarts.php" method="POST">
                        <input type="hidden" name="bagDel" value="true" id="bagDel">
                        <button type="submit" name="bag" value="<?php echo $product['id_produs'] ?>" class="removeButton">
                            <div class='remove' onclick='removeItem()'><u>REMOVE</u></div>
                        </button>
                    </form>
                </div>
            </div>


        <?php
        }
        mysqli_close($connection); ?>
    </div>
    <div id="buy-section">
        <div id="buy-section-pos">
            <div id="price-total">$<?php echo $sumTotal ?></div> <br>
            <button id="buy-button">Buy all the items</button>
        </div>
    </div>
    <?php include '../HTML/UIComponents/Footer.html' ?>
</body>

</html>