<?php
session_start();
if ($_SERVER['HTTP_REFERER'] == 'http://localhost/LucruIndividual/PHP/Register.php') {
    unset($_SESSION['nume']);
    unset($_SESSION['email']);
    unset($_SESSION['numeError']);
    unset($_SESSION['emailError']);
    unset($_SESSION['parolaError']);
    unset($_SESSION['noUser']);
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
    <link rel="stylesheet" href="../CSS/Login.css" />

    <script src="../JS/main.js"></script>

</head>

<body>

    <?php include "../HTML/UIComponents/SideMenu.html" ?>

    <?php include "../HTML/UIComponents/Header.php" ?>

    <div class="back-pos"></div>

    <div id="form-position">
        <form action="Validation.php" method="POST">
            <h2>Login</h2>
            <h3 id="error">
                <?php
                $errorList = array();
                if ($_SESSION['numeError']) array_push($errorList, $_SESSION['numeError']);
                if ($_SESSION['emailError']) array_push($errorList, $_SESSION['emailError']);
                if ($_SESSION['parolaError']) array_push($errorList, $_SESSION['parolaError']);
                if ($_SESSION['noUser']) array_push($errorList, $_SESSION['noUser']);
                // var_dump($errorList);
                if (count($errorList) > 0) {
                    echo $errorList[0];
                } else if ($_SESSION['loggedIn']) {
                    echo "<span style='color:green'> You are logged in!</span>";
                }
                ?>
            </h3>
            <div class="inputs-style">
                <label for="numeLog" class="<?php echo ($_SESSION['numeError']) ? "errorClass" : "" ?>">Name: </label>
                <input type="text" name="numeLog" id="numeLog" value="<?php echo ($_SESSION['numeError']) ? "" : $_SESSION['nume'] ?>" class="<?php echo ($_SESSION['numeError']) ? "errorClass" : "" ?>" />
            </div>
            <hr width="100%" class="<?php echo ($_SESSION['numeError']) ? "errorClass" : "" ?>" />
            <div class="inputs-style">
                <label for="emailLog" class="<?php echo ($_SESSION['emailError']) ? "errorClass" : "" ?>">Email: </label>
                <input type="email" name="emailLog" id="emailLog" value="<?php echo ($_SESSION['emailError']) ? "" : $_SESSION['email'] ?>" class="<?php echo ($_SESSION['emailError']) ? "errorClass" : "" ?>" />
            </div>
            <hr width="100%" class="<?php echo ($_SESSION['emailError']) ? "errorClass" : "" ?>" />
            <div class="inputs-style">
                <label for="passwordLog" class="<?php echo ($_SESSION['parolaError']) ? "errorClass" : "" ?>">Password:</label>
                <input type="password" name="passwordLog" id="passwordLog" value="<?php echo $parola ?>" class="<?php echo ($_SESSION['parolaError']) ? "errorClass" : "" ?>" />
            </div>
            <hr width="100%" class="<?php echo ($_SESSION['parolaError']) ? "errorClass" : "" ?>" />

            <button class="buttons" type="submit" name="signin" value="signin">Sign in</button>
            <!-- <button class="button-forg">Forgot your password?</button> -->

            <button class="buttons">
                <a href="Register.php">Create new account</a>
            </button>
        </form>

    </div>
    <?php

    // echo "name: " . $_SESSION['nume'] . "<br>";
    // echo "email: " . $_SESSION['email'] . "<br>";
    // echo "parola: " . $_SESSION['parola'] . "<br>";

    // echo "nameError: " . $_SESSION['numeError'] . "<br>";
    // echo "emailError: " . $_SESSION['emailError'] . "<br>";
    // echo "parolaError: " . $_SESSION['parolaError'] . "<br>";
    ?>

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