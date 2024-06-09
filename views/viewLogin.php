<section id="cover">
    <div id="cover-caption">
        <div class="container">
            <div class="col-sm-10 offset-sm-1">
                <img src='img/200.png' alt="">
                <h5 class="text-black">Spreading Ideas</h5>
                <br>
                <?php
                if (isset($exception)) {
                    echo (
                        '<div class="alert alert-danger" role="alert">
                            <strong>Error: </strong>'.$exception.'
                        </div>'
                    );
                }
                /*

                if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'emptyfields') {
                        echo '<div class="alert alert-danger" role="alert">
                                        <strong>Error: </strong>Fill In All The Fields
                                      </div>';
                    } else if ($_GET['error'] == 'nouser') {
                        echo '<div class="alert alert-danger" role="alert">
                                        <strong>Error: </strong>Username does not exist
                                      </div>';
                    } else if ($_GET['error'] == 'wrongpwd') {;
                        echo '<div class="alert alert-danger" role="alert">
                                        <strong>Error: </strong>Wrong password - 
                                         <a href="reset-pwd.php" class="alert-link">Forgot Password?</a>
                                      </div>';
                    } else if ($_GET['error'] == 'sqlerror') {
                        echo '<div class="alert alert-danger" role="alert">
                                        <strong>Error: </strong>Website error. Contact admin to have it fixed
                                      </div>';
                    }
                } else if (isset($_GET['newpwd'])) {
                    if ($_GET['newpwd'] == 'passwordupdated') {
                        echo '<div class="alert alert-success" role="alert">
                                        <strong>Password Updated </strong>Login with your new password
                                      </div>';
                    }
                }
                */ ?>
                <form method="post" action="index.php?action=connexion" class="form-inline justify-content-center">
                    <div class="form-group">
                        <label for="name_login" class="sr-only">Name</label>
                        <input type="text" id="name_login" name="mailuid" class="form-control form-control-lg mr-1" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="password_login" class="sr-only">Email</label>
                        <input type="password" id="password_login" name="pwd" class="form-control form-control-lg mr-1" placeholder="Password">
                    </div>
                    <input type="submit" id="btn_login" name="login-submit" value="Login">
                </form>
                <br>
                <p>Don't have an account yet ? Signup <a id="link_signup_login" href="index.php?action=signup">here</a></p>

                <br><br>
                <div class="position-absolute login-icons">
                    <a href="contact.php" title="Leads to a page to send the developers an email.">
                        <i class="fa fa-envelope fa-2x social-icon"></i>
                    </a>
                    <a href="https://github.com/msaad1999/KLiK--PHP-coded-Social-Media-Website" title="Leads to a page to send the developers an email.">
                        <i class="fa fa-github fa-2x social-icon"></i>
                    </a>
                </div>


            </div>
        </div>
    </div>
</section>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>