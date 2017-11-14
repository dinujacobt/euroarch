<?php $this->load->view('header') ?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="<?= theme ?>images/img_asfi.jpg" alt=""/>
        </div>

        <div class="item">
            <img src="<?= theme ?>images/img_koun.jpg" alt=""/>
        </div>

        <div class="item">
            <img src="<?= theme ?>images/img_main.jpg" alt=""/>

        </div>
        <div class="item">
            <img src="<?= theme ?>images/img_qfs.jpg" alt=""/>
        </div>
        <div class="item">
            <img src="<?= theme ?>images/img_qas.jpg" alt=""/>
        </div>
    </div>

    <!-- Left and right controls -->

</div>
<div class="matter">
    <div class="container">
        <div class="head">
            <div class="col-md-12">
                <h1>EUROARCH</h1>
                <p>Euro-Arch Systems & Solutions Private Limited is the all kerela distributors of wide range of products from renowned international companies.
                    dummy text dummy text dummy text dummy text dummy text dummy text dummy text dummy text dummy text dummy text dummy text dummy text dummy text dummy text</p>
            </div>
            <br>
            <img src="<?= theme ?>images/line.png" class="line img-responsive">
        </div>
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
    <div class="fstrip">
        <div class="container">
            <a href="<?= base_url() ?>stock">
                <div class="button1">
                    Check stock availability here
                </div>
            </a>

        </div>
    </div>
    <?php $this->load->view('footer') ?>