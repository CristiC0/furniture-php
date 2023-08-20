<?php
session_start();
$linkPrefix = "/LucruIndividual/PHP";
include 'Misc.php';
if (isset($_POST['productId']))
    $_SESSION['productDisplayedId'] = $_POST['productId'];

unset($_POST['productId']);

include "DBConnection.php";

$query = "SELECT * FROM produs WHERE id_produs=" . $_SESSION['productDisplayedId'];

$result = mysqli_query($connection, $query);
$infoProduct = mysqli_fetch_array($result);
$_SESSION['infoProduct'] = $infoProduct;
mysqli_close($connection);

header('Location: http://' . $_SERVER['SERVER_NAME'] . $linkPrefix . "/Product.php");
