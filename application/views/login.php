<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->load->view('header');
?>
<section class="login-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="login-form-link">Login</a>
                            </div>

                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
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
                                <form id="login-form" action="<?= base_url() ?>login/login_fn" method="post" role="form" style="display: block;">
                                    <div class="form-group">
                                        <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                            </div>
                                        </div>
                                    </div>
                                    <!--                                    <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-lg-12">
                                                                                    <div class="text-center">
                                                                                        <a href="https://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>-->
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$this->load->view('footer');
