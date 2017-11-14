<?php $this->load->view('header') ?>
<div class="container">
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
</div>
<div class="cont">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.5095698571877!2d76.29463071434243!3d9.974699292868504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b080d352672520b%3A0xe5ebd09e8f4bcfe9!2sEuro-Arch+Systems+%26+Solutions+Pvt+Ltd!5e0!3m2!1sen!2sin!4v1509478145306" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    <div class="form">
        <div class="container">
            <div class="col-md-6">
                <form id="contact-form" method="post" action="<?= base_url() ?>contact/send_mail">
                    <h2>SENT MAIL</h2>
                    <input type="text" placeholder="Name" name="name" required=""><span class="form-error"><?php echo form_error('name'); ?></span>
                    <input type="email" placeholder="Email" name="email" required=""><span class="form-error"><?php echo form_error('email'); ?></span>
                    <input type="text" placeholder="Phone no" name="pno" required=""><span class="form-error"><?php echo form_error('pno'); ?></span>
                    <textarea name="message" placeholder=" Your Message" required=""></textarea><span class="form-error"><?php echo form_error('message'); ?></span>
                    
                    <br>
                    <input type="submit" value="Send Message">
                </form>
            </div>
            <div class="col-md-6">
                <div class="cinfo">
                    <h2>CONTACT INFO</h2>
                    <br>
                    <i class="fa fa-map-o"></i>Plakatt Colony,Cochin-17,<br>Kerala,India-682017.<br>
                    <i class="fa fa-phone"></i>+91484 4035173<br>
                    <i class="fa fa-phone" ></i>+91484 2203078<br>
                    <i class="fa fa-envelope"></i>info@euroarchindia.com
                </div>
            </div>
        </div>
    </div>

</div>

<?php
$this->load->view('footer')?>