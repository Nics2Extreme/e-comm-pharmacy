<?php

require_once("../../resources/config.php");
// echo __DIR__;

if (isset($_GET['completeOrderID'])) {
    $query = query("SELECT * FROM order_details WHERE order_id = " . escape_string($_GET['completeOrderID']) . " ");
    confirm($query);

    $query = query("UPDATE orders SET status = 'Confirmed' WHERE order_id = " . escape_string($_GET['completeOrderID']) . " ");

    $subject = "Order Completed";
    $comment = "Your order has been successfully completed!";

    $insert_query = query("INSERT INTO inf(notifications_name,message,active)VALUES('" . $subject . "','" . $comment . "','1')");


    redirect("../../public/admin/index.php?orders");
} else {
    redirect("../../public/admin/index.php?orders");
}
