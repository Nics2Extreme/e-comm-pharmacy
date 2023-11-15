<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <h3 class="text-muted text-center mb-3">Orders</h3>
                <table class="table table-striped bg-light text-center">
                    <thead>
                        <tr class="text-muted">
                            <th>#</th>
                            <th>Product</th>
                            <th>Amount</th>
                            <th>Order Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        getAdminOrders();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>