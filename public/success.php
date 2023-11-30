<?php
require_once("../resources/config.php");
?>

<?php
include(Front_End . DS . "header.php");
?>

<div class="container mx-auto">
    <h1>Order has been received. Your delivery will arrive in <?php echo ($_SESSION['dropoff'] === 1) ? '20' : ($_SESSION['dropoff'] === 2 ? '25' : '30') ?> minutes. Please wait for a notification in regards to the order.</h1>
</div>

<?php
include(Front_End . DS . "footerheader.php");
?>
<?php
include(Front_End . DS . "footer.php");
?>