<?php
require_once("../resources/config.php");
?>

<?php
include(Front_End . DS . "header.php");
?>


<div class="container">

    <!-- Items in the cart -->
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3">
                <div class="pt-4 wish-list">
                    <p class="text-center bg-danger">
                        <?php
                        displayMessage();
                        ?>
                    </p>

                    <h1>Shopping Cart</h1>

                    <form action="" method="post" enctype="multipart/form-data">
                        <?php
                        checkout();
                        ?>
                        <input type="hidden" name="cmd" value="_cart">
                        <input type="hidden" name="business" value="ChikoMutandwaBeds@business.com">
                        <input type="hidden" name="upload" value="1">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Sub-total</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                cart();
                                ?>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <label for="customerName">Customer Name</label>
                            <select class="form-select" name="customerName">
                                <?php if($_SESSION['username']){?>
                                    <option value="<?php echo $_SESSION['username']?>"><?php echo $_SESSION['username']?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact Number</label>
                            <input type="text" class="form-control" name="contact">
                        </div>
                        <div class="form-group">
                            <label for="dropoff">Drop-off</label><br>
                            <select class="form-select" name="dropoff">
                                <option selected>Select Drop-off</option>
                                <option value="1">Binondo</option>
                                <option value="1">Ermita</option>
                                <option value="1">Intramuros</option>
                                <option value="1">Malate</option>
                                <option value="1">Paco</option>
                                <option value="2">Pandacan</option>
                                <option value="2">Quiapo</option>
                                <option value="2">Sampaloc</option>
                                <option value="2">San Andres</option>
                                <option value="2">San Miguel</option>
                                <option value="3">San Nicaolas</option>
                                <option value="3">Santa Ana</option>
                                <option value="3">Santa Cruz</option>
                                <option value="3">Santa Mesa</option>
                                <option value="3">Tondo</option>
                            </select>
                        </div>

                        <!-- Order Summary -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <div class="pt-4 wish-list">
                                        <div class="col-xs-4 pull-right ">
                                            <h2>Order Summary</h2>
                                            <table class="table" cellspacing="0">
                                                <tr class="cart-subtotal">
                                                    <th>Items:</th>
                                                    <td>
                                                        <span class="amount">
                                                            <?php
                                                            echo isset($_SESSION['itemQuantity']) ? $_SESSION['itemQuantity'] : $_SESSION['itemQuantity'] = "0";
                                                            ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr class="shipping">
                                                    <th>Shipping and Handling</th>
                                                    <td>Free Shipping</td>
                                                </tr>

                                                <tr class="order-total">
                                                    <th>
                                                        <div>
                                                            <strong>
                                                                The Total Amount
                                                            </strong>
                                                            <strong>
                                                                <p class="mb-0">(including VAT)</p>
                                                            </strong>
                                                        </div>
                                                    </th>
                                                    <td>
                                                        <strong>
                                                            <span class="amount">
                                                                P <?php
                                                                    echo isset($_SESSION['itemTotal']) ? $_SESSION['itemTotal'] : $_SESSION['itemTotal'] = "0";
                                                                    ?>
                                                            </span>
                                                        </strong>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="payment">
                                <h2>For E-Wallet (GCash) Payments</h2>
                                <img src="images/qr.jpg" alt="qr">
                                <p>Total Amount to be paid: <strong>
                                        <span class="amount">
                                            P <?php
                                                echo isset($_SESSION['itemTotal']) ? $_SESSION['itemTotal'] : $_SESSION['itemTotal'] = "0";
                                                ?>
                                        </span>
                                    </strong></p>
                                <label for="refno">After scanning the QR Code, please pay the displayed amount and input the Ref. No. provided for confirmation</label>
                                <input type="text" class="form-control" name="ref" minlength="13" maxlength="13" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                <hr>
                                <h2>For Cash-On-Delivery</h2>
                                <p>Total Amount to be paid: <strong>
                                        <span class="amount">
                                            P <?php
                                                echo isset($_SESSION['itemTotal']) ? $_SESSION['itemTotal'] : $_SESSION['itemTotal'] = "0";
                                                ?>
                                        </span>
                                    </strong></p>
                                <label for="refno">Please ready the eaxt amount to be paid before delivery arrival.</label>
                            </div>
                        </div>
                        <!-- /Order Summary -->
                        <?php
                        if (isset($_SESSION['itemQuantity']) && $_SESSION['itemQuantity'] >= 1) {
                        ?>
                            <button type="submit" class="btn btn-primary" name="checkout">Checkout</button>
                        <?php
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Items in the cart -->
</div>
<?php
include(Front_End . DS . "footerheader.php");
?>
<?php
include(Front_End . DS . "footer.php");
?>