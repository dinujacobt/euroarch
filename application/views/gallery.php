<?php
$this->load->view('header');
?>
<section class="gallery">
    <div class="container image_gallery">
        <h2>Our work Gallery</h2>

        <div id="container"></div>
        <div id="images">
            <?php
            if(!empty($images)){
            foreach ($images as $im) {
                ?>
                <div class="item">
                    <img  alt="no image" src="<?= base_url() ?>uploads/gallery_view/<?= $im['name'] ?>">                    
                    <br>
                </div>
                <?php
            }
            }else{?>
                <h4>Currently No Images to Display</h4>
           <?php  }
            ?>
        </div>
    </div>
</section>
<?php
$this->load->view('footer');
?>