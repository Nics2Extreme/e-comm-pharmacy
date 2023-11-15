<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <h3 class="text-muted text-center mb-3">Products</h3>
                <h3 class="text-center bg-success">
                    <?php
                    displayMessage();
                    ?>
                </h3>
                <table class="table table-striped bg-light text-center">
                    <thead>
                        <tr class="text-muted">
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Price</th>
                            <th>Price Discount</th>
                            <th>Quantity</th>
                            <th>Availability</th>
                            <th>Delivery</th>
                            <th>Removing Products</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        getAdminProducts();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>