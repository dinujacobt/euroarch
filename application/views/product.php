<?php $this->load->view('header') ?>

<div class="pbody">
    <div class="container">
        <div class="matter">
            <div class="pro">
                <div class="col-md-6 proitem">
                    <img src="<?= theme ?>images/progress.png" class="img-responsive">
                    <h4>PROGRESS PROFILES</h4>
                    <p>The wide range of products is the result of over 28 years of research and development applied to the most advanced technologies.</p>
                    <a href="#" class="proct_link">
                        Details<i class="ion-android-send" ></i>
                    </a>
                </div>
                <!--            <div class="col-md-6 proitem">
                                <img src="<?= theme ?>images/moeding.jpg" class="img-responsive">
                                <h4>MOEDING</h4>
                                <p>Innovative leader in the insulated,rainscreen facade segment.Goal is to undertake projects and provide references.</p>
                                <a href="#" class="proct_link">
                                    Details<i class="ion-android-send" ></i>
                                </a>
                            </div>
                            <div class="col-md-6 proitem">
                                <img src="<?= theme ?>images/divider.png" class="img-responsive" >
                                <h4>DIVIDERS</h4>
                                <p>Dividers folding partition provides a full turnkey solutions including design.</p>
                                <a href="#" class="proct_link">
                                    Details<i class="ion-android-send" ></i>
                                </a>
                            </div>-->
                <div class="col-md-6 proitem">
                    <img src="<?= theme ?>images/afs.png" class="img-responsive">
                    <h4>AFS</h4>
                    <p>Architectural facade solutions,Based <br>in Netherlands specialized in manufacturing high end metal panel systems.</p>
                    <a href="#" class="proct_link">
                        Details<i class="ion-android-send" ></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <?php echo $pagination; ?>
            </div>
        </div>
        <?php foreach ($products as $row) { ?>
            <div class="col-md-6">
                <div class="product">
                    <div class="pimage">
                        <?php if($row['image']!=NULL) {?>
                        <img class="img-responsive" alt="no image" src="<?= base_url() ?>uploads/stock_view/<?= $row['image'] ?>">
                        <?php } 
                        else{ ?>
                        <p class="no-img" style="color: #fff;padding: 10px;">No Image</p>
                        <?php }
                        ?>
                    </div>
                    <div class="pdata">
                        <h4><?= $row['name'] ?></h4>
                        <p><?= $row['description'] ?></p>
                        <p>Stock : <?= $row['stock'] ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</div>
<?php
$this->load->view('footer')?>