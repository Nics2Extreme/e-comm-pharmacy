<?php
require_once("../../resources/config.php");
?>
<?php
include(Back_End . DS . "header.php");
?>
<div class="container-fluid" style="margin-top: 150px; margin-left: 30px">
    <?php
    if (isset($_GET['dashboard'])) {
        include(Back_End . DS . "/dashboard.php");
        include('bargraph.php');
    }

    if (isset($_GET['orders'])) {
        include(Back_End . DS . "/orders.php");
    }

    if (isset($_GET['get_order'])) {
        include(Back_End . DS . "/order_details.php");
    }

    if (isset($_GET['completeOrderID'])) {
        include(Back_End . DS . "/completeOrderID.php");
    }

    if (isset($_GET['categories'])) {
        include(Back_End . DS . "/categories.php");
    }

    if (isset($_GET['products'])) {
        include(Back_End . DS . "/products.php");
    }


    if (isset($_GET['addproducts'])) {
        include(Back_End . DS . "/addproducts.php");
    }


    if (isset($_GET['addcategories'])) {
        include(Back_End . DS . "/addcategories.php");
    }

    if (isset($_GET['users'])) {
        include(Back_End . DS . "/users.php");
    }


    if (isset($_GET['adduser'])) {
        include(Back_End . DS . "/adduser.php");
    }

    if (isset($_GET['deleteProductID'])) {
        include(Back_End . DS . "/deleteProductsID.php");
    }

    if (isset($_GET['deleteCategoryID'])) {
        include(Back_End . DS . "/deleteCategoryID.php");
    }

    if (isset($_GET['deleteUserID'])) {
        include(Back_End . DS . "/deleteUserID.php");
    }

    if (isset($_GET['slider'])) {
        include(Back_End . DS . "/slider.php");
    }

    ?>
</div>

<?php
include(Back_End . DS . "footer.php");
?>