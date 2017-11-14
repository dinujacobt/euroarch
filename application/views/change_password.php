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
        <form action="<?= base_url() ?>admin/update_password" method="post">
            <h4 style="text-align: center">Change Password</h4>
            <?php if (isset($error)) {
                ?>
                <p class="error"><?= $error ?></p>
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
                <label for="old">Old Password</label>
                <input type="password" class="form-control" name="old" id="old" placeholder="Old Password">
                <span class="form-error"><?php echo form_error('old'); ?></span>
            </div>
            <div class="form-group">
                <label for="new">New Password</label>
                <input type="password" class="form-control" name="new" id="new" placeholder="New Password">
                <span class="form-error"><?php echo form_error('new'); ?></span>
            </div>
            <div class="form-group">
                <label for="new1">Confirm Password</label>
                <input type="password" class="form-control" id="new1" name="new1" placeholder="Confirm Password">
                <span class="form-error"><?php echo form_error('new1'); ?></span>
            </div>  
            
            <button type="submit" class="btn btn-primary">Update Password</button>
        </form>
    </div>
</section>
<?php
$this->load->view('footer.php');
