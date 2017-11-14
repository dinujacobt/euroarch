<!DOCTYPE HTML>
<html>
    <head>
        <title>Euroarch</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?= theme ?>images/eurologo.png" />
        <link href="<?= theme ?>fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= theme ?>css/bootstrap.css" rel='stylesheet' type='text/css'/>
        <link href="<?= theme ?>css/euro.css" rel='stylesheet' type='text/css'/>
        <link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel='stylesheet' type='text/css'/>

    </head>
    <body>
        <div class="strip">
            <div class="container">
                <a href="tel:+91484 4035173"><i class="fa fa-phone" ></i>+91484 4035173</a>
                <a  href="mailto:info@euroarchindia.com"><i   class="fa fa-envelope-o" ></i>info@euroarchindia.com</a>

                <?php
                if (!isset($this->session->userdata['user_id'])) {
                    ?>
                    <a href="<?= base_url() ?>login">
                        <span><i class="fa fa-sign-in" ></i>LOGIN</span>
                    </a>
                    <?php
                } else {
                    ?>
                    <a href="<?= base_url() ?>admin">
                        <span><i class="fa fa-product-hunt" ></i>Products</span>
                    </a>
                    <a href="<?= base_url() ?>admin/gallery">
                        <span><i class="fa fa-file-image-o"></i>Gallery</span>
                    </a>
                    <a href="<?= base_url() ?>admin/profile">
                        <span><i class="fa fa-user" ></i>Profile</span>
                    </a>
                    <a href="<?= base_url() ?>login/logout">
                        <span><i class="fa fa-sign-out" ></i>LOGOUT</span>
                    </a>
                    <?php
                }
                ?>

            </div>
        </div>
        <div class="logostrip">
            <div class="container">
                <div class="logo">
                    <a href="<?= base_url() ?>" ><img src="<?= theme ?>images/eurologo.png" alt=""/>
                        EUROARCH</a>
                </div>
                <ul class="navi">
                    <a href="<?= base_url() ?>"><li>HOME</li></a>
                    <!--<li><a href="<?= base_url() ?>about">ABOUT</a></li>-->
                    <a href="<?= base_url() ?>stock"><li>STOCK</li></a>
                    <a href="<?= base_url() ?>gallery"><li>GALLERY</li></a>
                    <a href="<?= base_url() ?>contact"><li>CONTACT</li></a>
                </ul>
            </div>
        </div>