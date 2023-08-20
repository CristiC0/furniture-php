<?php
session_start();
$linkPrefix = "LucruIndividual/";
unset($_SESSION['loggedIn']);
unset($_SESSION['currentUser']);
header('Location: http://' . $_SERVER['SERVER_NAME'] . "/" . $linkPrefix . "PHP/Login.php");
