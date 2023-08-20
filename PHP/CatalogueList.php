<?php
$linkPrefix = "localhost/LucruIndividual/";
include 'Misc.php';
// echo "Catalogue category:";
// var_dump($_SESSION['catalogueCategory']);
// var_dump($_POST['changeCategory']);
include "DBConnection.php";
// if (!isset($_SESSION['catalogueCategory']) && !isset($_POST['changeCategory'])) {

//     $_SESSION['catalogueCategory'] = $_POST['category'];
//     $category = $_POST['category'];

//     unset($_POST['changeCategory']);
//     // if (!isset($_SESSION['products']))
//     //     include "LoadData.php";

//     // $products = $_SESSION['products'];
//     // var_dump($products);
//     $query = "SELECT * FROM produs WHERE type='$category'";
//     $result = mysqli_query($connection, $query);
//     $_SESSION['productsList'] = $result;
//     // header('Location: http://' . $_SERVER['SERVER_NAME'] . $linkPrefix . "Catalogue.php");
// } else {
//     $result = $_SESSION['productsList'];
// }
?>
<form action="ProductLoading.php" method="POST" id="catalogue-list">
    <?php
    include 'DBConnection.php';
    $category = $_SESSION['catalogueCategory'];
    if ($_SESSION['catalogueCategory'] != 'all')
        $query = "SELECT id_produs,name,img,price FROM produs WHERE type='$category'";
    else $query = "SELECT id_produs,name,img,price FROM produs";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0)
        for ($i = 0; $i <  mysqli_num_rows($result); $i++) {
            $row = mysqli_fetch_array($result);
    ?>
        <div>
            <button type="submit" name="productId" value="<?php echo $row['id_produs'] ?>">
                <div class='cle' id='clel<?php echo $i ?>' onmouseover="iconsAppear('<?php echo $i ?>')" onmouseout=" iconsDisappear('<?php echo $i ?>')">
                    <div class='icons-hover'>
                        <div class='icons-buy'>
                            <img class="wishlist <?php echo (isInTheWishList($row['id_produs'])) ? "inList" : "" ?>" src='../Images/Icons/wishlist.svg' id='wishlist<?php echo $i ?>'>

                            <img src='../Images/Icons/shopping-bag.svg' class="bag <?php echo (isInTheBag($row['id_produs'])) ? "inList" : "" ?>" id='bag<?php echo $i ?>'>

                        </div>
                    </div>
                    <img class='imgs' src="data:image/webp;base64,<?php echo base64_encode($row['img']) ?>"> </img>
                    <div class='info'><span><?php echo $row['name'] ?></span>
                        <span class='price'><?php echo $row['price'] ?>$</span>
                    </div>
                    </a>
                </div>
            </button>
        </div>
    <?php }
    mysqli_close($connection); ?>
</form>