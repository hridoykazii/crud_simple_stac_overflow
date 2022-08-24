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
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Login</h2>
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
                                    $result = $user->login($_POST['username'],$_POST['password']);
                                    
                                    if(count($result)==1){
                                        session_start();
                                        $_SESSION['user_id']=$result[0]['id'];
                                        $_SESSION['username']=$result[0]['username'];

                                        header("location:dashboard.php");

                                    }else{
                                        echo '<p class="aleart aleart-danger">Invalid Credential!</p>';
                                    }
                                        
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
                                    <label>Password</label><input class="form-control" id="password" type="password" placeholder="Password" required="required" data-validation-required-message="Please enter your phone number." name="password" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <br />
                            <div id="success"></div>
                            <div class="form-group"><button class="btn btn-primary btn-xl" id="sendMessageButton" type="submit" name="submit">Login</button></div>
                            <p>If you not <a href="register.php">Register</a></p>

                        </form>
                    </div>
                </div>
            </div>
        </section>

<?php
include 'doc_end.php';
include 'footer.php';

?>