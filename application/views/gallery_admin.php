<?php
$this->load->view('header');
?>
<section class="gallery-admin">
    <div class="container image_gallery">
        <h2>Our work Gallery</h2>
        <div style="margin-bottom: 30px;" class="col-md-6">
            <form action="<?= base_url() ?>admin/add_gallery_image" method="post" enctype="multipart/form-data">
                
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
                    <label for="image">Select Image</label>
                    <input type="file" class="form-control" id="image" name="userfile" >
                </div>  
                <button type="submit" class="btn btn-primary">Add Image To List</button>
            </form>
        </div>
        <div  style="display: block;float: left;width: 100%;" id="container"></div>
        <div id="images">
            <?php
            
            foreach ($images as $im) {
                ?>
                <div class="item">
                    <img src="<?= base_url() ?>uploads/gallery_view/<?= $im['name'] ?>">
                    <a onclick="return confirm('Are you sure?')" href="<?= base_url() ?>admin/remove_image/<?= $im['id'] ?>">Remove Image</a>
                    <br>
                    <br>
                </div>
                <?php
            }
            ?>
        </div>







    </div>
</section>
<?php
$this->load->view('footer');
?>