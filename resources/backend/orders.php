<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <h3 class="text-muted text-center mb-3">Orders</h3>
                <table class="table table-striped bg-light text-center">
                    <thead>
                        <tr class="text-muted">
                            <th>Prescription</th>
                            <th>#</th>
                            <th>Customer Name</th>
                            <th>Contact</th>
                            <th>Drop Off</th>
                            <th>Mode of Payment</th>
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