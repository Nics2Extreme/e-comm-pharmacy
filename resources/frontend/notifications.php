<?php
$find_notifications = query("Select * from inf where username = '" . $_SESSION['username'] . "' AND active = 1");
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

<!DOCTYPE HTML>
<html>

<head>
    <style>
        .round {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            position: relative;
            background: red;
            display: inline-block;
            padding: 0.3rem 0.2rem !important;
            margin: 0.3rem 0.2rem !important;
            left: -18px;
            top: 10px;
            z-index: 99 !important;
        }

        .round>span {
            color: white;
            display: block;
            text-align: center;
            font-size: 1rem !important;
            padding: 0 !important;
        }

        #list {

            display: none;
            top: 60px;
            position: absolute;
            right: 2%;
            background: #ffffff;
            z-index: 100 !important;
            width: 25vw;
            margin-left: -37px;

            padding: 0 !important;
            margin: 0 auto !important;


        }

        .message>span {
            width: 100%;
            display: block;
            color: red;
            text-align: justify;
            margin: 0.2rem 0.3rem !important;
            padding: 0.3rem !important;
            line-height: 1rem !important;
            font-weight: bold;
            border-bottom: 1px solid white;
            font-size: 1.8rem !important;

        }

        .message>.msg {
            width: 90%;
            margin: 0.2rem 0.3rem !important;
            padding: 0.2rem 0.2rem !important;
            text-align: justify;
            font-weight: bold;
            display: block;
            word-wrap: break-word;


        }
    </style>
    <script>
        $(document).ready(function() {
            var ids = new Array();
            $('#over').on('click', function() {
                $('#list').toggle();
            });

            //Message with Ellipsis
            $('div.msg').each(function() {
                var len = $(this).text().trim(" ").split(" ");
                if (len.length > 12) {
                    var add_elip = $(this).text().trim().substring(0, 65) + "…";
                    $(this).text(add_elip);
                }

            });


            $("#bell-count").on('click', function(e) {
                e.preventDefault();

                let belvalue = $('#bell-count').attr('data-value');

                if (belvalue == '') {

                    console.log("inactive");
                } else {
                    $(".round").css('display', 'none');
                    $("#list").css('display', 'block');

                    // $('.message').each(function(){
                    // var i = $(this).attr("data-id");
                    // ids.push(i);

                    // });
                    //Ajax
                    $('.message').click(function(e) {
                        e.preventDefault();
                        $.ajax({
                            url: 'deactive.php',
                            type: 'POST',
                            data: {
                                "id": $(this).attr('data-id')
                            },
                            success: function(data) {

                                console.log(data);
                                location.reload();
                            }
                        });
                    });
                }
            });
        });
    </script>
</head>

<body>
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

</html>