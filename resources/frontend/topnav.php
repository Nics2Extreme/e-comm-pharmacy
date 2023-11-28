<header>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-12">
            </div>

            <div class="col-md-4 col-12 text-center">
                <h2 class="my-md-3 site-title text-white">PharmaExpress</h2>
            </div>

            <div class="col-md-4 col-12 text-right">
            </div>
        </div>
    </div>

    <?php
    $find_notifications = query("Select * from inf where active = 1");
    $count_active = '';
    $notifications_data = array();
    $deactive_notifications_dump = array();
    while ($rows = mysqli_fetch_assoc($find_notifications)) {
        $count_active = mysqli_num_rows($find_notifications);
        $notifications_data[] = array(
            "n_id" => $rows['n_id'],
            "notifications_name" => $rows['notifications_name'],
            "message" => $rows['message']
        );
    }
    //only five specific posts
    $deactive_notifications = query("Select * from inf where active = 0 ORDER BY n_id DESC LIMIT 0,5");
    while ($rows = mysqli_fetch_assoc($deactive_notifications)) {
        $deactive_notifications_dump[] = array(
            "n_id" => $rows['n_id'],
            "notifications_name" => $rows['notifications_name'],
            "message" => $rows['message']
        );
    }

    ?>

    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="home.php">HOME <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shop.php">SHOP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">ABOUT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">CONTACT US</a>
                    </li>
                </ul>
            </div>
            <div class="navbar-nav">
                <ul class="nav navbar-nav">
                    <li><i class="fa fa-bell mx-3 pt-4" id="over" data-value="<?php echo $count_active; ?>" style="z-index:-99 !important;font-size:20px;color:black;"></i></li>
                    <?php if (!empty($count_active)) { ?>
                        <div class="round" id="bell-count" data-value="<?php echo $count_active; ?>"><span style="color: red;"><?php echo $count_active; ?></span></div>
                    <?php } ?>

                    <?php if (!empty($count_active)) { ?>
                        <div id="list">
                            <?php
                            foreach ($notifications_data as $list_rows) { ?>
                                <li id="message_items">
                                    <div class="message alert alert-warning" data-id=<?php echo $list_rows['n_id']; ?>>
                                        <span><?php echo $list_rows['notifications_name']; ?></span>
                                        <div class="msg">
                                            <p><?php
                                                echo $list_rows['message'];
                                                ?></p>
                                        </div>
                                    </div>
                                </li>
                            <?php }
                            ?>
                        </div>
                    <?php } else { ?>
                        <!--old Messages-->
                        <div id="list">
                            <?php
                            foreach ($deactive_notifications_dump as $list_rows) { ?>
                                <li id="message_items">
                                    <div class="message alert alert-danger" data-id=<?php echo $list_rows['n_id']; ?>>
                                        <span><?php echo $list_rows['notifications_name']; ?></span>
                                        <div class="msg">
                                            <p><?php
                                                echo $list_rows['message'];
                                                ?></p>
                                        </div>
                                    </div>
                                </li>
                            <?php }
                            ?>
                            <!--old Messages-->

                        <?php } ?>

                        </div>
                </ul>
                <div class="nav-item  rounded-circle mx-2 basket-icon">
                    <a href="checkout.php">
                        <i class="fas fa-shopping-cart p-2"></i>
                        <span>Cart</span>
                    </a>
                </div>
                <div class="nav-item  rounded-circle mx-2 basket-icon">
                    <a href="logout.php">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        <span>Logout</span>
                    </a>
                </div>

            </div>
        </nav>
    </div>
</header>