<?php
include 'doc_start.php';
include 'header.php';
include 'core/User.php';

$user = new User();

?>
<br>
<br>
<br>
<br>
<br>
<br>
<!-- Contact Section-->
<section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Register</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Contact Section Form-->
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->

                        <?php
                                if (isset($_POST['submit'])){
                                    $user->register($_POST['username'], $_POST['password'], $_POST['email']);
                                }
                         ?>
                        <form id="contactForm" name="sentMessage" novalidate="novalidate" action="" method="POST">
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Name</label><input class="form-control" id="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter your name." name="username"/>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Email Address</label><input class="form-control" id="email" type="email" placeholder="Email Address" required="required" data-validation-required-message="Please enter your email address." name="email"/>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Password</label><input class="form-control" id="password" type="password" placeholder="Password" required="required" data-validation-required-message="Please enter your phone number." name="password" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <br />
                            <div id="success"></div>
                            <div class="form-group"><button class="btn btn-primary btn-xl" id="sendMessageButton" type="submit" name="submit">Register</button></div>
                            <p class="alert alert-success">if you alredy register!<a href="login.php"> Login Here</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </section>

<?php
include 'doc_end.php';
include 'footer.php';

?>