<div class="container-fluid news pt-5">
    <div class="row">
        <div class="col-md-6 col-12 pl-5">
            <h4 class="primary-color font-roboto m-0 p-0">
                Need Help? Call Us
            </h4>
            <p class="m-0 p-0 text-secondary">
                Support Team 24/7 At +63 (992) 760-1825
            </p>
        </div>
        <div class="col-md-4 col-12 my-md-0 my-3 pl-md-0 pl-5">
            <input type="text" class="form-control border-0 bg-light" placeholder="Enter Your email Address">
        </div>
        <div class="col-md-2 col-12 my-md-0 my-3 pl-md-0 pl-5">
            <button class="btn bg-primary-color text-white">Subscribe</button>
        </div>
    </div>
</div>

<div class="container text-center py-4">
    <small class="text-secondary py-4">PharmaExpress © 2020 Online Store. All Rights Reserved.</small>
</div>

</footer>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
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
                        url: './connection/deactive.php',
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

        $('#notify').on('click', function(e) {
            e.preventDefault();
            var name = $('#notifications_name').val();
            var ins_msg = $('#message').val();
            if ($.trim(name).length > 0 && $.trim(ins_msg).length > 0) {
                var form_data = $('#frm_data').serialize();
                $.ajax({
                    url: './connection/insert.php',
                    type: 'POST',
                    data: form_data,
                    success: function(data) {
                        location.reload();
                    }
                });
            } else {
                alert("Please Fill All the fields");
            }


        });
    });
</script>
<script src="./js/main.js"></script>
</body>

</html>