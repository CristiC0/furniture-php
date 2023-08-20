<?php
session_start();
$linkPrefix = "LucruIndividual/";
// include "DBConnection.php";
if (isset($_POST['category']) || $_SESSION['catalogueCategory'] != $_POST['category']) {
    $_SESSION['catalogueCategory'] = $_POST['category'];
    $category = $_POST['category'];
    unset($_POST['changeCategory']);
}
echo $_POST['category'] . "<br>";
echo $_SESSION['catalogueCategory'] . "<br>";
echo "Catalogue $category:";
//  else if (isset($_SESSION['catalogueCategory'])) {
//     $category = $_SESSION['catalogueCategory'];
// }
// var_dump($category);

// var_dump($result);
// // var_dump(mysqli_fetch_array($result));
// $_SESSION['productsList'] = $result;
// mysqli_close($connection);

header('Location: http://' . $_SERVER['SERVER_NAME'] . "/" . $linkPrefix . "PHP/Catalogue.php");
