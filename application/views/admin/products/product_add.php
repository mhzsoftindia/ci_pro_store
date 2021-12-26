<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-3">Add Product</h3>
            </div>

            <div class="card-body">
                <?php
                if (!empty(validation_errors())) {
                    echo  '<div class="alert alert-danger" role="alert">' . validation_errors() . '</div>';
                } ?>
                <form method="POST" action="<?= base_url('products/add'); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="prod_name">Product Name</label>
                        <input id="prod_name" class="form-control" type="text" name="prod_name">
                    </div>
                    <div class="form-group">
                        <label for="prod_descr">Description</label>
                        <!-- <input id="prod_desc" class="form-control" type="text" name="prod_desc"> -->
                        <textarea name="prod_descr" id="prod_descr" rows="6" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="skprod_sku">SKU</label>
                        <input id="prod_sku" class="form-control" type="text" name="prod_sku">
                    </div>
                    <div class="form-group">
                        <label for="prod_price">Price</label>
                        <input id="prod_price" class="form-control" type="text" name="prod_price">
                    </div>
                    <div class="form-group">
                        <label for="prod_img">Product image</label>
                        <input id="prod_img" class="form-control" type="file" name="prod_img">
                    </div>

                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>

    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->