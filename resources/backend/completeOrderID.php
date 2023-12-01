<?php

require_once("../../resources/config.php");
// echo __DIR__;

if (isset($_GET['completeOrderID'])) {
    $query = query("SELECT * FROM order_details WHERE order_id = " . escape_string($_GET['completeOrderID']) . " ");
    confirm($query);

        $query = query("UPDATE orders SET status = 'Confirmed' WHERE order_id = " . escape_string($_GET['completeOrderID']) . " ");

        $subject = "Order Completed";
        $comment = "Your order has been successfully completed!";

        $getUser = query( "SELECT * FROM orders WHERE order_id = " . escape_string($_GET['completeOrderID']) . " ");
        while ($row = $getUser->fetch_assoc()) {
            $insert_query = query("INSERT INTO inf(notifications_name,message,username,active)VALUES('" . $subject . "','" . $comment . "','" . $row['customerName'] . "','1')");
        }


    redirect("../../public/admin/index.php?orders");
} else {
    redirect("../../public/admin/index.php?orders");
}
