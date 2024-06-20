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
                 ?>

                


                <form method="post" action="index.php?action=connexion" class="form-inline justify-content-center">
                    <div class="form-group">
                        <label for="name_login" class="sr-only">Name</label>
                        <input type="text" id="name_login" name="mailuid" class="form-control form-control-lg mr-1" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="password_login" class="sr-only">Email</label>
                        <input type="password" id="password_login" name="pwd" class="form-control form-control-lg mr-1" placeholder="Password">
                    </div>
                    <div class="form-group-captcha">
                        <label for="captcha"><?=$captcha->getQuestion(); ?></label>
                        <?php
                            foreach ($captcha->getChoices() as $choice) {
                                echo '<div class="form-check">
                                        <input class="form-check-input" type="radio" name="captcha" value="' . $choice . '" required>
                                        <label class="form-check-label">' . $choice . '</label>
                                    </div>';
                            }
                        ?>                
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
                <div id="myModal" class="modal">

                    <!-- Contenu du pop-up -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <p>Pour améliorer nos services et vous offrir une expérience personnalisée, nous devons stocker vos données personnelles. En continuant, vous consentez à ce stockage. Veuillez confirmer votre accord pour que nous puissions continuer à vous offrir une meilleure expérience utilisateur.</p>
                        <div class="modal-buttons">
                            <button class="modal-button accept" id="acceptBtn">J'accepte</button>
                            <button class="modal-button reject" id="rejectBtn">Je refuse</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="js/login.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>