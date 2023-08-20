<?php
$connection = mysqli_connect("127.0.0.1:3307", "root", "", "furniture");

if ($connection->connect_error) {
    die("Conectarea nu a avut loc: " . $connection->connect_error);
    exit();
} else {
    // echo "Conectare cu succes!";
}

// mysqli_close($connection);
