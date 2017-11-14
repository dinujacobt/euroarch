<?php
$this->load->view('header');
?>
<section class="product-list-section">
    <div class="container">
        <div class="product-list">
            <div class="add_product">
                <a class="add-pdt btn btn-primary" href="<?= base_url() ?>admin/add_product">Add Product</a>
            </div>
            <h4>List of Products</h4>
            <div class="message-div">
                <?php
                if (isset($_SESSION['error'])) {
                    ?>
                    <p class="error"><?= $_SESSION['error'] ?></p>
                    <?php
                }
                if (isset($_SESSION['success'])) {
                    ?>
                    <p class="success"><?= $_SESSION['success'] ?></p>
                    <?php
                }
                ?>
            </div>

            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#active_p">Active</a></li>
                <li><a data-toggle="tab" href="#inactive_p">Inactive</a></li>

            </ul>

            <div class="tab-content">
                <div id="active_p" class="tab-pane fade in active">
                    <table id="active_p_table" class="table table-bordered table-hover table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Image</th>
                                <th>Rank</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($active as $row) {
                                ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $row['name']; ?></td>
                                    <td><?= $row['description']; ?></td>
                                    <td><?= $row['stock'] ?></td>
                                    <td><img src="<?= base_url() ?>uploads/admin_stock/<?= $row['image'] ?>" class="img-responsive thumb-image"/></td>
                                    <td><?= $row['rank'] ?></td>
                                    <td>
                                        <a href="<?= base_url() ?>admin/edit_product/<?= $row['id']; ?>">Edit</a>
                                        <a href="<?= base_url() ?>admin/status_change/<?= $row['id']; ?>/0">Inactive</a>
                                        <a href="<?= base_url() ?>admin/delete_product/<?= $row['id']; ?> " onclick="return confirm('Are you sure?')">Delete</a>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div id="inactive_p" class="tab-pane fade">
                    <table id="active_p_table" class="table table-bordered table-hover table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($inactive as $row) {
                                ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $row['name']; ?></td>
                                    <td><?= $row['description']; ?></td>
                                    <td><?= $row['stock'] ?></td>
                                    <td><img src="<?= base_url() ?>uploads/<?= $row['image'] ?>" class="img-responsive thumb-image"/></td>
                                    <td>
                                        <a href="<?= base_url() ?>admin/edit_product/<?= $row['id']; ?>">Edit</a>
                                        <a href="<?= base_url() ?>admin/status_change/<?= $row['id']; ?>/1">Active</a>
                                        <a href="<?= base_url() ?>admin/delete_product/<?= $row['id']; ?> " onclick="return confirm('Are you sure?')">Delete</a>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</section>

<?php
$this->load->view('footer');

