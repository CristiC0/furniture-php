<?php session_start(); ?>
<div id="menu-up">
    <div class="menu-up-element">
        <a onclick="menuChoose()">Menu</a>
    </div>
    <h1><a href="../index.php">Furniture</a></h1>
    <div class="menu-up-element" id="mini-menu">
        <div class="mini-menu-element">
            <span id="userName"><?php echo ($_SESSION['loggedIn']) ? ($_SESSION['currentUser']['name'] . "'s :") : "" ?></span>
        </div>
        <div class="mini-menu-element">
            <a href="Wishlist.php">Wishlist</a>
        </div>
        <div class="mini-menu-element"> <a href="Bag.php"> Bag</a></div>

        <div class="mini-menu-element">
            <a href="<?php echo ($_SESSION['loggedIn']) ? "Logout.php" : "Login.php" ?>"><?php echo ($_SESSION['loggedIn']) ? "Logout" : "Login" ?></a>
        </div>
    </div>
</div>