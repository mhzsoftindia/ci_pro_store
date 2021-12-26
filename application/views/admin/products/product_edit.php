<!-- Begin Page Content -->

<div class="container-fluid">
    <div class="card">
        <div class="card">
            <div class="card-header">
            <h3 class="mb-3">Edit Product</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="<?= base_url('products/update/'.$product->id);?>">
                    <div class="form-group">
                        <label for="prod_name">Product Name</label>
                        <input id="prod_name" class="form-control" type="text" name="prod_name" value="<?= $product->name;?>">
                    </div>
                    <div class="form-group">
                        <label for="prod_descr">Description</label>
                        <textarea name="prod_descr" id="prod_descr" rows="6" class="form-control"><?= $product->description;?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="skprod_sku">SKU</label>
                        <input id="prod_sku" class="form-control" type="text" name="prod_sku" value="<?= $product->sku;?>">
                    </div>
                    <div class="form-group">
                        <label for="prod_price">Price</label>
                        <input id="prod_price" class="form-control" type="text" name="prod_price" value="<?= $product->price;?>">
                    </div>
                    <button class="btn btn-primary" type="submit">Update</button>
                </form>
            </div>
        </div>
     
    </div>
   

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->