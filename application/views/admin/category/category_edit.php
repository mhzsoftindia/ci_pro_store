<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-3">Edit Ctaegory</h3>
            </div>
            <div class="card-body">
                <?php
                if (!empty(validation_errors())) {
                    echo  '<div class="alert alert-danger" role="alert">' . validation_errors() . '</div>';
                } ?>
                <form method="POST" action="<?= base_url('category/update/'.$data->id); ?>">
                    <div class="form-group">
                        <label for="cat_name">Category Name</label>
                        <input id="cat_name" class="form-control" type="text" name="cat_name" value="<?= $data->category_name;?>">
                    </div>
                    <div class="form-group">
                        <label for="cat_descr">Description</label>
                        <!-- <input id="prod_desc" class="form-control" type="text" name="prod_desc"> -->
                        <textarea name="cat_descr" id="cat_descr" rows="6" class="form-control"><?= $data->description;?></textarea>
                    </div>
                  
                    <button class="btn btn-primary" type="submit">Update</button>
                </form>
            </div>=
        </div>

    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->