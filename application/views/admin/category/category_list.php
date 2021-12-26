<!-- Begin Page Content -->
<div class="container-fluid">

    <a class="btn btn-primary float-right mb-2" href="<?= base_url('category/create_category'); ?>"><i class="fa fa-plus" aria-hidden="true"></i> Add Products</a>

    <!-- page content here -->
    <table id="table_id" class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Category</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row) { ?>
                <tr>
                    <td> <?= $row->id ?></td>
                    <td> <?= $row->category_name ?></td>
                    <td> <?= $row->description ?></td>
                    <td> <a href="<?php echo  base_url('category/edit/' . $row->id); ?>" class="btn-primary btn-sm">Edit</a></td>
                    <td> <a href="<?php echo  base_url('category/delete/' . $row->id); ?>" class="btn-danger btn-sm">Delete</a></td>
                   
                </tr>

            <?php } ?>
        </tbody>
    </table>
    
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
</script>