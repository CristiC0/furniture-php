<?php
// $linkPrefix = "localhost/LucruIndividual/";
session_start();
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
    <link rel="stylesheet" href="../CSS/Catalogue.css" />

    <script src="../JS/main.js"></script>
    <script src="../JS/catalogue.js"></script>

</head>

<body>
    <?php include "../HTML/UIComponents/SideMenu.html" ?>

    <?php include "../HTML/UIComponents/Header.php" ?>

    <div id="image-background">
        <div id="mask-image-background"></div>
    </div>

    <!-- <?php var_dump($_SESSION['userCurrent']);
            var_dump($_SESSION['loggedIn']);
            ?> -->
    <form action="CatalogueListLogic.php" method="POST">
        <input type="hidden" name="changeCategory">
        <div id="catalogue-menu-pos">
            <div id="catalogue-menu">
                <ul id="list">
                    <button type="submit" name="category" value="sofa" style="<?php echo ($_SESSION['catalogueCategory'] == 'sofa') ? "color:orange" : "" ?>">
                        <li id="sofa" onclick="show('sofa')">Sofas</li>
                    </button>
                    <button type="submit" name="category" value="bed">
                        <li id="bed" onclick="show('bed')">Beds</li>
                    </button>
                    <button type="submit" name="category" value="dining">
                        <li id="dining" onclick="show('dining')" style="<?php echo ($_SESSION['catalogueCategory'] == 'dining') ? "color:orange" : "" ?>">Dining</li>
                    </button>
                    <button type="submit" name="category" value="seating" style="<?php echo ($_SESSION['catalogueCategory'] == 'seating') ? "color:orange" : "" ?>">
                        <li id="seating" onclick="show('seating')">Seating</li>
                    </button>
                    <button type="submit" name="category" value="cupboard" style="<?php echo ($_SESSION['catalogueCategory'] == 'cupboard') ? "color:orange" : "" ?>">
                        <li id="cupboard" onclick="show('cupboard')">Cupboard</li>
                    </button>
                    <button type="submit" name="category" value="bookshelves" style="<?php echo ($_SESSION['catalogueCategory'] == 'bookshelves') ? "color:orange" : "" ?>">
                        <li id="bookshelves" onclick="show('bookshelves')">Bookshelves</li>
                    </button>
                    <button type="submit" name="category" value="decor" style="<?php echo ($_SESSION['catalogueCategory'] == 'decor') ? "color:orange" : "" ?>">
                        <li id="decor" onclick="show('decor')">Decor</li>
                    </button>
                    <button type="submit" name="category" value="coffetable">
                        <li id="coffetable" onclick="show('coffetable')" style="<?php echo ($_SESSION['catalogueCategory'] == 'coffetable') ? "color:orange" : "" ?>">Coffe Tables</li>
                    </button>
                    <button type="submit" name="category" value="all" style="<?php echo ($_SESSION['catalogueCategory'] == 'all') ? "color:orange" : "" ?>">
                        <li id="all" onclick="show('all')">All</li>
                    </button>



                </ul>
            </div>
        </div>
    </form>


    <?php include 'CatalogueList.php' ?>

    <?php include "../HTML/UIComponents/Footer.html" ?>
    <style>
        <?php include "../CSS/Catalogue.css" ?>
    </style>
</body>

</html>