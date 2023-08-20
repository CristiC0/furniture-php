<?php
session_start();
include 'Misc.php';
$linkPrefix = "/LucruIndividual/PHP/";

if (isset($_POST['bag'])) {
    $user = $_SESSION['currentUser'];
    echo " element: " . $_POST['bag'] . "<br>";
    $bag = $user['bag'];
    if (!$bag) {
        $bag = $_POST['bag'] . ',';
        echo " bagNULL: " . $bag . "<br>";
    } else {
        // $bag = explode(',', $bag);
        if (isInTheBag($_POST['bag'])) {
            $bag = removeFromBag($_POST['bag']);
        } else {
            $bag = addToBag($_POST['bag']);
        }
    }
    echo " bag: " . $bag . "<br>";
    // echo $bag;
    include 'DBConnection.php';
    $query = "UPDATE users SET bag='$bag' WHERE id_user=" . $user['id_user'];

    mysqli_query($connection, $query);

    $_SESSION['currentUser'] = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM users WHERE id_user=" . $user['id_user']));
    unset($_POST['bag']);
    echo   $_SESSION['currentUser']['bag'];
    mysqli_close($connection);

    echo "bagDel: " . $_POST['bagDel'];
    if ($_POST['bagDel'])
        header('Location: http://' . $_SERVER['SERVER_NAME'] . $linkPrefix . "Bag.php");
    else header('Location: http://' . $_SERVER['SERVER_NAME'] . $linkPrefix . "Product.php");
}


if (isset($_POST['wishlist'])) {
    $user = $_SESSION['currentUser'];
    echo " element: " . $_POST['wishlist'] . "<br>";
    $wishlist = $user['wishlist'];
    if (!$wishlist) {
        $wishlist = $_POST['wishlist'] . ',';
        echo " wishlistNULL: " . $wishlist . "<br>";
    } else {
        // $bag = explode(',', $bag);
        if (isInTheWishList($_POST['wishlist'])) {
            $wishlist = removeFromWishList($_POST['wishlist']);
        } else {
            $wishlist = addToWishList($_POST['wishlist']);
        }
    }
    echo " wishlist: " . $wishlist . "<br>";
    // echo $bag;
    include 'DBConnection.php';
    $query = "UPDATE users SET wishlist='$wishlist' WHERE id_user=" . $user['id_user'];

    mysqli_query($connection, $query);

    $_SESSION['currentUser'] = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM users WHERE id_user=" . $user['id_user']));

    echo   $_SESSION['currentUser']['wishlist'];
    mysqli_close($connection);
    header('Location: http://' . $_SERVER['SERVER_NAME'] . $linkPrefix . "Product.php");
}
