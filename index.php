<?php
session_start();
$linkPrefix = "localhost/LucruIndividual";
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

    <link rel="icon" href="Images/Icons/TitleIcon.svg" type="image/svg" />

    <link rel="stylesheet" href="CSS/main.css" />
    <link rel="stylesheet" href="CSS/indexStyle.css" />


    <script src="JS/indexJs.js"></script>
    <script src="JS/main.js"></script>

</head>

<body>
    <div id="menu-side-back" onclick="closeSideMenu()"></div>
    <div id="close-menu" onclick="closeSideMenu()"></div>

    <div id="menu-side">
        <ul id="menu-side-main">
            <li>
                <a href="HTML/Catalogue.html" onclick="changesent('all')" onmouseover="openSubMenu('1')">Best Sections</a>
            </li>
            <li>
                <a href="HTML/Catalogue.html" onclick="changesent('all')" onmouseover="openSubMenu('2')">Catalogue</a>
            </li>
            <li>
                <a href="#" onmouseover="openSubMenu('3')">About</a>
            </li>
            <li>
                <a href="PHP/Login.php" onmouseover="closeSubMenu()">Login</a>
            </li>
            <li>
                <a href="HTML/Wishlist.html" onmouseover="closeSubMenu()">Wishlist</a>
            </li>
        </ul>

        <div class="social-media">
            <a href="">Facebook</a>-<a href="">Instagram</a>-<a href="">Twitter</a>
        </div>
    </div>

    <div id="menu-side-res">
        <ul>
            <li>
                <a href="HTML/Catalogue.html" onclick="changesent('all')">Best Sections</a>
            </li>
            <li>
                <a href="HTML/Catalogue.html" onclick="changesent('all')">Catalogue</a>
            </li>
            <li>
                <a href="#">About</a>
            </li>
            <li>
                <a href="PHP/Login.php">Login</a>
            </li>
            <li>
                <a href="HTML/Wishlist.html">Wishlist</a>
            </li>
            <li>
                <a href="PHP/Bag.php">Bag</a>
            </li>
        </ul>

        <div class="social-media">
            <a href="">Facebook</a>-<a href="">Instagram</a>-<a href="">Twitter</a>
        </div>
    </div>

    <div id="submenu-side">
        <div id="submen1">
            <ul>
                <li><a onclick="changesent('sofa')" href="HTML/Catalogue.html">Sofas</a></li>
                <li><a onclick="changesent('bed')" href="HTML/Catalogue.html">Beds</a></li>
                <li><a onclick="changesent('dining')" href="HTML/Catalogue.html">Dining</a></li>
                <li><a onclick="changesent('seating')" href="HTML/Catalogue.html">Seating</a></li>
                <li style="opacity: 0;"><a href="#"></a></li>
            </ul>
        </div>
        <div id="submen2">
            <ul>
                <li><a onclick="changesent('cupboard')" href="HTML/Catalogue.html">Cupboard</a></li>
                <li><a onclick="changesent('bookshelves')" href="HTML/Catalogue.html">Bookshelves</a></li>
                <li><a onclick="changesent('decor')" href="HTML/Catalogue.html">Decor</a></li>
                <li><a onclick="changesent('coffetable')" href="HTML/Catalogue.html">Coffe Tables</Table></a></li>
                <li style="opacity: 0;"><a></a></li>
            </ul>
        </div>
        <div id="submen3">
            <ul>
                <li><a href="#">About Us</a></li>
                <li><a>FAQ</a></li>
                <li><a>Stores</a></li>
                <li><a>Contacts</a></li>
                <li><a>Shipping Info</a></li>
            </ul>
        </div>
    </div>

    <div id="menu-up">
        <div class="menu-up-element">
            <a onclick="menuChoose()">Menu</a>
        </div>
        <h1><a href="#">Furniture</a></h1>
        <div class="menu-up-element" id="mini-menu">
            <div class="mini-menu-element">
                <span id="userName"><?php echo ($_SESSION['loggedIn']) ? ($_SESSION['currentUser']['name'] . "'s :") : "" ?></span>
            </div>
            <div class="mini-menu-element">
                <a href="PHP/Wishlist.php">Wishlist</a>
            </div>
            <div class="mini-menu-element"> <a href="PHP/Bag.php"> Bag</a></div>

            <div class="mini-menu-element">
                <a href="<?php echo ($_SESSION['loggedIn']) ? "PHP/Logout.php" : "PHP/Login.php" ?>"><?php echo ($_SESSION['loggedIn']) ? "Logout" : "Login" ?></a>
            </div>
        </div>
    </div>
    <header>
        <div id="slider">
            <div class="dark-mask"></div>
            <div class="menu-choose">
                <div class="radio" id="rad-but0" onclick="changeImg('Stock1.webp')"></div>
                <div class="radio" id="rad-but1" onclick="changeImg('Stock2.webp')"></div>
                <div class="radio" id="rad-but2" onclick='changeImg("Stock3.jpg")'></div>
                <div class="radio" id="rad-but3" onclick='changeImg("Stock4.jpg")'></div>
            </div>
        </div>
    </header>

    <div class="explore-area">
        <h2>Explore our furniture range</h2>
        <hr class="line" />
        <br />
        <!-- SELECT WHAT WE WILL SEE IN CATALOGUE -->
        <form action="PHP/CatalogueListLogic.php" method="POST">
            <input type="hidden" name="changeCategory">
            <div class="catalogue">
                <button type="submit" name="category" value="sofa" onclick="show('sofa')">
                    <div class="catalogue-element catalogue-element-sofa">
                        <div class="catalogue-element-sofa-icon"></div>
                        <div>Sofas</div>
                    </div>
                </button>
                <button type="submit" name="category" value="bed" onclick="show('bed')">
                    <div class="catalogue-element catalogue-element-bed">

                        <div class="catalogue-element-bed-icon"></div>
                        <div>Beds</div>

                    </div>
                </button>
                <button type="submit" name="category" value="dining" onclick="show('dining')">
                    <div class="catalogue-element catalogue-element-dining">

                        <div class="catalogue-element-dining-icon"></div>
                        <div>Dining</div>
                    </div>
                </button>
                <button type="submit" name="category" value="seating" onclick="show('seating')">
                    <div class="catalogue-element catalogue-element-seating">
                        <div class="catalogue-element-seating-icon"></div>
                        <div>Seating</div>
                    </div>
                </button>
                <button type="submit" name="category" value="cupboard" onclick="show('cupboard')">
                    <div class="catalogue-element catalogue-element-cupboard">
                        <div class="catalogue-element-cupboard-icon"></div>
                        <div>Cupboard</div>
                    </div>
                </button>
            </div>
            <br />
            <div class="catalogue">
                <button type="submit" name="category" value="bookshelves" onclick="show('bookshelves')">
                    <div class="catalogue-element catalogue-element-bookshelf">
                        <div class="catalogue-element-bookshelf-icon"></div>
                        <div>Bookshelves</div>
                    </div>
                </button>
                <button type="submit" name="category" value="decor" onclick="show('decor')">
                    <div class="catalogue-element catalogue-element-decor">
                        <div class="catalogue-element-decor-icon"></div>
                        <div>Decor</div>
                    </div>
                </button>
                <button type="submit" name="category" value="coffetable" onclick="show('coffetable')">
                    <div class="catalogue-element catalogue-element-coffetable">
                        <div class="catalogue-element-coffetable-icon"></div>
                        <div>Coffe Table</div>
                    </div>
                </button>
                <button type="submit" name="category" value="all" onclick="show('all')">
                    <div class="catalogue-element catalogue-element-all">
                        <div class="catalogue-element-all-icon"></div>
                        <div>All Furniture</div>
                    </div>
                </button>
        </form>
    </div>
    </div>

    <h2>A little about us</h2>
    <hr class="line" />

    <div class="grid-container">
        <div class="grid-element item1">
            <div class="text-position">
                <h3>Shop the best wooden furniture online for your home</h3>
                <p>
                    Your home is a canvas that reflects your personality,
                    life experiences, and beliefs. It’s more than just a
                    place to live, it’s a place of quiet solace and comfort.
                    Keeping that in mind, it’s crucial that when you select
                    home furniture, it should echo your individuality and
                    preferences. But why exhaust yourself by visiting brick
                    and mortar stores when you can comfortably choose your
                    favourite furniture online? At Furniture’s online
                    marketplace, you can now buy furniture online with
                    incredible convenience. Avoid the crowds, inordinate
                    delays, and endless bargaining while selecting the
                    latest furniture design on Furniture. Experiment with a
                    wide variety of furniture pieces designed with modern,
                    contemporary, traditional, minimalist, eclectic, and
                    vintage themes. With elegant designs and gorgeous
                    colours available on everything ranging from study room
                    furniture to living room furniture, you will certainly
                    be spoiled for choices.
                </p>
            </div>
        </div>
        <div class="grid-element item2">
            <img src="Images/ParagPhoto1.jpg" alt="Imagine" width="100%" />
        </div>
        <div class="grid-element item3">
            <img src="Images/ParagPhoto2.jpg" alt="Imagine" width="100%" />
        </div>
        <div class="grid-element item4">
            <div class="text-position">
                <h3>Furniture for all your needs</h3>
                <p>
                    Get creative and experiment with home furniture designs
                    that have been uniquely crafted for different areas of
                    the home. Depending on the specific needs and
                    requirements of each room, select furniture that is apt
                    according to the décor theme and purpose of the room.
                    Whether it’s bedroom furniture for a cosy bedroom or
                    living room furniture for a spacious living room,
                    Furniture has got it all. If space is a constraint in
                    your urban apartment, space saving furniture that is
                    innovatively designed to maximise space will be your
                    ideal option. However, if you’ve got generous space to
                    spare with a gorgeous well-lit patio, outdoor furniture
                    in bold colours will be your best bet. No matter what
                    your space, there’s something for every need at
                    Furniture.
                </p>
            </div>
        </div>
        <div class="grid-element item1">
            <div class="text-position">
                <h3>
                    Purchase furniture online from the finest place
                    possible:
                </h3>
                <p>
                    We offer the most optimum combination of aesthetics,
                    variety, dimensions, functionalities, and prices for
                    online furniture. From modern to traditional designs,
                    minimal to intricate details, muted to vibrant colours,
                    compact to spacious sizes, we offer practically every
                    type of furniture online to match your interior design.
                    You can find solutions for all types of spaces –
                    bedrooms, kitchens, passages, living rooms, dining
                    areas, study, balconies, guest rooms, entry foyers,
                    bars, and outdoors. You can easily get products that are
                    difficult to spot elsewhere during furniture online
                    shopping; for example room dividers, corner storage
                    units, and more.Whether it is a big purchase decision
                    like a bed, or a small one like a chair cushion, our
                    easy EMIs make buying smooth and reasonable for you. A
                    straightforward exchange policy serves as an assurance
                    of our exceptional product quality.
                </p>
            </div>
        </div>
        <div class="grid-element item2">
            <img src="Images/ParagPhoto3.jpg" alt="Imagine" width="100%" />
        </div>
    </div>

    <h2>Customers Stories</h2>
    <hr class="line" />

    <div class="customers">
        <div class="customer-but" id="customers-left" onclick="flipCustomers('l')">&lt</div>
        <div class="customer-but" id="customers-right" onclick="flipCustomers('r')">&gt</div>
        <div class="customer-slider">
            <div class="flip-pos" id="cust1">
                <div class="flip-front">
                    <img class="avatar" src="Images/Icons/user.svg" alt="Avatar Image" />
                    <div class="customer-info ">Arseni Eva-Madalina</div>
                    <div class="customer-img customer-img1"></div>
                    <div class="customer-review">
                        <q>Siteul e super-extrapuper</q><br>
                        <q>Echipa foarte buna,miau instalat bucătăria rapid și calitativ
                            Băieți de nota 10!!!</q>
                    </div>
                </div>
                <div class="flip-back">
                    <img class="avatar" src="Images/Icons/user.svg" alt="Avatar Image" />
                    <div class="customer-info">Donu Alexandru</div>
                    <div class="customer-img customer-img4"></div>
                    <div class="customer-review">
                        <q>Chiar dacă a fost anevoioasă procedura de livrare, aici am găsit cel mai avantajos preț pe piață. Nota 8 din 10 la deservire. Și un 10 bine meritat la calitate.</q> <br>

                    </div>
                </div>
            </div>
        </div>

        <div class="customer-slider">
            <div class="flip-pos" id="cust2">
                <div class="flip-front">
                    <img class="avatar" src="Images/Icons/user.svg" alt="Avatar Image" />
                    <div class="customer-info">Bogatu Vadim</div>
                    <div class="customer-img customer-img2"></div>
                    <div class="customer-review">
                        <q>Sunt satisfacut de calitatea mobilei, vreau sa mentionez ca este comoda si inspira locuintei o atmosfera placuta, ce ma face sa ma simt implinit.</q><br>
                        <!-- <q>Dar directoru saitului ii un *******</q> -->
                    </div>
                </div>
                <div class="flip-back">
                    <img class="avatar" src="Images/Icons/user.svg" alt="Avatar Image" />
                    <div class="customer-info">Dumitras Marius</div>
                    <div class="customer-img customer-img5"></div>
                    <div class="customer-review">
                        <q>Am procurat un set de oficiu, foarte mulțumit de companie și produs. Livrarea gratuita și in aceeași zi.</q>
                    </div>
                </div>
            </div>
        </div>
        <div class="customer-slider">
            <div class="flip-pos" id="cust3">
                <div class="flip-front">
                    <img class="avatar" src="Images/Icons/user.svg" alt="Avatar Image" />
                    <div class="customer-info">Cornescu Ana-Andreea</div>
                    <div class="customer-img customer-img3"></div>
                    <div class="customer-review">
                        <q>Mobila este de calitate superioara, iar asortimentul este foarte bogat! Recomand cu incredere .</q> <br>
                        <q>Nice place to find what you are looking for!</q> <br>
                        <q>Спасибо большое дизайн и качество работы супер!!!
                        </q> <br>
                        <q>Найприємніший магазин меблів, який я коли-небудь бачив</q>
                    </div>
                </div>
                <div class="flip-back">
                    <img class="avatar" src="Images/Icons/user.svg" alt="Avatar Image" />
                    <div class="customer-info">Lescenco Alina</div>
                    <div class="customer-img customer-img6"></div>
                    <div class="customer-review">
                        <q>1.Livrare rapidă, materiale de înaltă calitate, acest lucru este foarte important pentru mine ca tânără mamă</q> <br>
                        <q>2. Design de mobilier excelent, potrivit pentru cea mai la modă renovare. Recomand cu siguranță</q>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h2>Our Stores</h2>
    <hr class="line" />

    <div id="store-section">
        <div class="store">
            <div class="store-img store1"> <a href="HTML/Store1.php"> </a></div>
            <div class="store-adress">
                <p><b>Perth</b></p>
                <p class="store-adress-text">488 Stirling Highway</p>
                <p class="store-adress-text">Peppermint Grove</p>
                <p class="store-adress-text">WA 6011</p>

            </div>
        </div>
        <div class="store">
            <div class="store-img store2"><a href="HTML/Store2.php"> </a></div>
            <div class="store-adress">
                <p><b>Melbourne</b></p>
                <p class="store-adress-text">522 Church Street</p>
                <p class="store-adress-text">Richmond</p>
                <p class="store-adress-text">VIC 3121</p>
            </div>
        </div>
        <div class="store">
            <div class="store-img store3"><a href="HTML/Store3.php"> </a></div>
            <div class="store-adress">
                <p><b>Sydney</b></p>
                <p class="store-adress-text">42 Oxford Street</p>
                <p class="store-adress-text">Paddington</p>
                <p class="store-adress-text">NSW 2021</p>
            </div>
        </div>
    </div>

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