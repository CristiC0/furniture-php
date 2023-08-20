<?php
session_start();
$_SESSION['fromValidation'] = 1;
$linkPrefix = "/LucruIndividual/PHP/";
function generalValidation($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

$nume = $email = $parola = $noUser = "";
$numeError = $emailError = $parolaError = $errorEmailAlredyExist = $errorNameAlredyExist = "";
unset($_SESSION['accountCreated']);


if (empty($_POST['numeLog'])) {
    $numeError = "Introduceti numele!";
} else {
    $nume = generalValidation($_POST['numeLog']);
    if (!preg_match("/^[a-zA-Z -]{3,10}$/", $nume)) {
        $numeError = "Numele trebuie sa contina de la 3 la 10 litere!";
    }
}


if (empty($_POST['emailLog'])) {
    $emailError = "Introduceti emailul!";
} else {
    $email = generalValidation($_POST['emailLog']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Adresa de email nu este valida!";
    }
}


if (empty($_POST['passwordLog'])) {
    $parolaError = "Introduceti parola!";
} else {
    $parola = generalValidation($_POST['passwordLog']);
    if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{4,8}$/", $parola)) {
        $parolaError = "Parola trebuie sa contina o literă mică, o literă mare, o cifră, si sa fie intre 4-8 lungime!";
    }
}

$_SESSION['numeError'] = $numeError;
$_SESSION['emailError'] = $emailError;
$_SESSION['parolaError'] = $parolaError;

$correct = !($numeError || $emailError || $parolaError);
echo "Correct: $correct <br>";
var_dump($_POST);
echo "<br>Nume: $nume <br>";
echo "Email: $email <br>";
echo "Parola: $parola <br>";

echo "NumeError: $numeError <br>";
echo "EmailError: $emailError <br>";
echo "ParolaError: $parolaError <br>";
if (isset($_POST['register'])) {

    include 'DBConnection.php';

    $query = "SELECT * FROM users WHERE name='$nume'";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        $errorNameAlredyExist = "Numele de utilizator exista deja!";
    }
    $_SESSION['errorNameAlreadyExists'] = $errorNameAlredyExist;

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        $errorEmailAlredyExist = "Utilizator cu acest email deja exista!";
    }
    $_SESSION['errorEmailAlreadyExists'] = $errorEmailAlredyExist;

    echo "errorNameAlreadyExists: " . $_SESSION['errorNameAlreadyExists'] . "<br>";
    echo "errorEmailAlreadyExists: " . $_SESSION['errorEmailAlreadyExists'] . "<br>";

    if ($correct && !$errorNameAlredyExist && !$errorEmailAlredyExist) {
        $input_password = md5($parola);
        $query = "INSERT INTO users (name, email, password) VALUES ('$nume', '$email', '$input_password')";
        mysqli_query($connection, $query);
        $_SESSION['accountCreated'] = true;
        $nume = $email = $parola = "";
        $_SESSION['nume'] = $nume;
        $_SESSION['email'] = $email;
        mysqli_close($connection);
        header('Location: http://' . $_SERVER['SERVER_NAME'] . $linkPrefix  . "Login.php");
    } else {
        $_SESSION['nume'] = $nume;
        $_SESSION['email'] = $email;
        mysqli_close($connection);
        $parola = "";
        header('Location: http://' . $_SERVER['SERVER_NAME'] . $linkPrefix . "Register.php");
    }
}
// var_dump($_POST);
if (isset($_POST['signin'])) {

    include 'DBConnection.php';
    // echo "!!!!!!!!!!!!!!!!!<br>";
    $query = "SELECT * FROM users WHERE name='$nume'";
    $result = mysqli_query($connection, $query);
    // var_dump($result);
    echo "mysqli_num_rows(result): " . mysqli_num_rows($result) . "<br>";
    if (mysqli_num_rows($result) < 1) {
        $noUser = "NU exista asa utilizator !";
    }
    $_SESSION['noUser'] = $noUser;

    $result = mysqli_fetch_array($result);
    if ($result)
        if ($correct && $nume == $result['name'] && $email == $result['email'] && md5($parola) == $result['password']) {
            echo "LOGEDIN!!!!!!!!!!!!!!!<br>";
            $_SESSION['loggedIn'] = true;
            $_SESSION['currentUser'] = $result;
            $nume = $email = $parola = "";
            unset($_SESSION['nume']);
            unset($_SESSION['email']);
            unset($_SESSION['numeError']);
            unset($_SESSION['emailError']);
            unset($_SESSION['parolaError']);
            unset($_SESSION['noUser']);
            header('Location: http://' . $_SERVER['SERVER_NAME'] . "/LucruIndividual/index.php");
        } else {
            $_SESSION['nume'] = $nume;
            $_SESSION['email'] = $email;
            mysqli_close($connection);

            $parola = "";
            header('Location: http://' . $_SERVER['SERVER_NAME'] . $linkPrefix . "Login.php");
        }
}

// delete from users WHERE id_user>0;

// alter TABLE users AUTO_INCREMENT=1;