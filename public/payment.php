<?php
require_once("../resources/config.php");
?>

<?php
include(Front_End . DS . "header.php");
?>

<div class="container mx-auto">
    <div class="row">
        <div class="e-wallet col-lg-6">
            <h2>For E-Wallet (GCash) Payments</h2>
            <img src="images/qr.jpg" alt="qr">
            <form action="success.php" method="POST">
                <p>Total Amount to be paid: <strong>
                        <span class="amount">
                            P <?php
                                echo isset($_SESSION['itemTotal']) ? $_SESSION['itemTotal'] : $_SESSION['itemTotal'] = "0";
                                ?>
                        </span>
                    </strong></p>
                <label for="refno">After scanning the QR Code, please pay the displayed amount and input the Ref. No. provided for confirmation</label>
                <input type="text" class="form-control" name="ref" required minlength="13" maxlength="13" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                <button type="submit" name="submit" class="btn btn-info">Confirm</button>
            </form>
        </div>

        <div class="cod col-lg-6">
            <h2>For Cash-On-Delivery</h2>
            <form action="success.php" method="POST">
                <p>Total Amount to be paid: <strong>
                        <span class="amount">
                            P <?php
                                echo isset($_SESSION['itemTotal']) ? $_SESSION['itemTotal'] : $_SESSION['itemTotal'] = "0";
                                ?>
                        </span>
                    </strong></p>
                <label for="refno">Please ready the eaxt amount to be paid before delivery arrival.</label>
                <button type="submit" name="submit" class="btn btn-info">Confirm</button>
            </form>
        </div>
    </div>
</div>

<?php
include(Front_End . DS . "footerheader.php");
?>
<?php
include(Front_End . DS . "footer.php");
?>