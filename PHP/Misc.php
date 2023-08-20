<?php
session_start();

function isInTheBag($element)
{
    $user = $_SESSION['currentUser'];
    $bag = $user['bag'];
    if (!isset($bag)) {
        return false;
    }
    $bag = explode(",", $bag);
    for ($i = 0; $i < count($bag) - 1; $i++) {
        if ($bag[$i] == $element) {
            return true;
        }
    }
    return false;
}

function removeFromBag($element)
{
    $res = "";
    $user = $_SESSION['currentUser'];
    $bag = $user['bag'];
    if (!isset($bag)) {
        return $res;
    }
    $bag = explode(",", $bag);
    var_dump($bag);
    for ($i = 0; $i < count($bag) - 1; $i++) {
        if ($bag[$i] == $element) continue;
        $res = $res . $bag[$i] . ",";
        echo "res: $res <br>";
    }
    return $res;
}
function addToBag($element)
{
    $user = $_SESSION['currentUser'];
    $bag = $user['bag'];

    return
        $bag . $element . ",";
}

function isInTheWishList($element)
{
    // echo "element: $element <br>";
    $user = $_SESSION['currentUser'];
    // var_dump($user);
    $wishlist = $user['wishlist'];
    // var_dump($wishlist);
    if (!isset($wishlist)) {
        return false;
    }
    $wishlist = explode(",", $wishlist);
    // var_dump($wishlist);
    for ($i = 0; $i < count($wishlist) - 1; $i++) {
        if ($wishlist[$i] == $element) {
            return true;
        }
    }
    return false;
}

function removeFromWishList($element)
{
    $res = "";
    $user = $_SESSION['currentUser'];
    $wishlist = $user['wishlist'];
    if (!isset($wishlist)) {
        return $res;
    }
    $wishlist = explode(",", $wishlist);
    var_dump($wishlist);
    for ($i = 0; $i < count($wishlist) - 1; $i++) {
        if ($wishlist[$i] == $element) continue;
        $res = $res . $wishlist[$i] . ",";
        echo "res: $res <br>";
    }
    return $res;
}
function addToWishList($element)
{
    $user = $_SESSION['currentUser'];
    $wishlist = $user['wishlist'];

    return
        $wishlist . $element . ",";
}
