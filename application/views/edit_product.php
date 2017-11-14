<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!isset($this->session->userdata['user_id'])) {
    $this->load->view('login');
    exit;
}
$this->load->view('header.php');
?>
<section class="add-product-section">  
    <div class="add-product">
        <form action="<?= base_url() ?>admin/update_product_fn" method="post" enctype="multipart/form-data">
            <h4 style="text-align: center">Edit Product</h4>
            <div class="message-div">
                <?php if (isset($error)) {
                    ?>
                    <div class="error"><?= $error ?></div>
                <?php }
                ?>
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
                <input type="text" class="form-control" name="name" id="name" value="<?= $name ?>" placeholder="Product Name">
                <input type="hidden" class="form-control" name="id" id="id" value="<?= $id ?>">
                <span class="form-error"><?php echo form_error('name'); ?></span>
            </div>
            <div class="form-group">
                <label for="description">Product Description</label>
                <textarea class="form-control" placeholder="Product Description"  id="description" name="description"><?= $description ?></textarea>
                <span class="form-error"><?php echo form_error('description'); ?></span>
            </div>
            <div class="form-group">
                <label for="stock">stock</label>
                <input type="text" class="form-control" id="stock" value="<?= $stock ?>" name="stock" placeholder="Stock">
                <span class="form-error"><?php echo form_error('stock'); ?></span>
            </div>
            <div class="form-group">
                <label for="Rank">Rank</label>
                <input type="text" class="form-control" id="rank" value="<?= $rank ?>" name="rank" placeholder="Rank">
                <span class="form-error"><?php echo form_error('rank'); ?></span>
            </div>  
            <div class="form-group" style="display: block;float: left;">
                <label for="image">Change Product Image</label>
                <div class="p_edit_image col-md-6">
                    <img class="img-responsive" src="<?= base_url() ?>uploads/stock_view/<?= $image ?>">
                </div>
                <div class="col-md-6">
                    <input type="file" class="form-control " id="image" name="userfile" >
                    <span class="form-error"><?php echo form_error('userfile'); ?></span>
                </div>
            </div> 
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Product</button>
            </div>
        </form>
    </div>
</section>
<?php
$this->load->view('footer.php');
