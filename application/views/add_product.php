<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->load->view('header.php');
?>
<section class="add-product-section">  
    <div class="add-product">
        <form action="<?= base_url() ?>admin/add_product_fn" method="post" enctype="multipart/form-data">
            <h4 style="text-align: center">Add Product</h4>
            <?php if (isset($error)) {
                ?>
                <div class="error"><?= $error ?></div>
                <?php }
            ?>
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
            <div class="form-group">
                <label for="name">Product Name</label>
                <input value='<?php echo set_value('name') ?>' type="text" class="form-control" name="name" id="name" placeholder="Product Name">
                <span class="form-error"><?php echo form_error('name'); ?></span>
            </div>
            <div class="form-group">
                <label for="description">Product Description</label>
                <textarea class="form-control" placeholder="Product Description" id="description" name="description"><?php echo set_value('description') ?></textarea>
                <span class="form-error"><?php echo form_error('description'); ?></span>
            </div>
            <div class="form-group">
                <label for="stock">stock</label>
                <input type="text" value='<?php echo set_value('stock') ?>' class="form-control" id="stock" name="stock" placeholder="Stock">
                <span class="form-error"><?php echo form_error('stock'); ?></span>
            </div>  
            <div class="form-group">
                <label for="image">Product Image</label>
                <input type="file" class="form-control" id="image" name="userfile" >
                <span class="form-error"><?php echo form_error('userfile'); ?></span>
            </div>  
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
</section>
<?php
$this->load->view('footer.php');
