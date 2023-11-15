<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <h3 class="text-muted text-center mb-3">Categories</h3>
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
                            <th>Remove Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        getAdminCategories();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>