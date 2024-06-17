

<body>


    <div id="signup">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 offset-sm-1">

                    <div class="signup-left position-fixed text-center">

                        <img src="img/200.png" alt="logo klik">
                        <br><br><br>
                        
                        <form id="signup-form" action="index.php?action=signup" method='post' enctype="multipart/form-data">


                    </div>
                </div>

                <?php
                if (isset($exception)) {
                    echo (
                        '<div class="alert alert-danger" role="alert">
                            <strong>Error: </strong>'.$exception.'
                        </div>'
                    );
                }
                ?>

                <div class="col-sm-6 offset-sm-6 text-center">
                    <label for="name">Username</label>
                    <input type="text" class="form-control" id="name" name="uid" placeholder="Username" maxlength="25">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="mail" placeholder="Email" title="Please enter a valid email address, e.g., user@example.com">


                    <label for="pwd">Password</label>
                    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password">
                    <label for="pwd-repeat">Confirmation</label>
                    <input type="password" class="form-control" id="pwd-repeat" name="pwd-repeat" placeholder="Repeat Password">

                    <label for="f-name">First Name</label>
                    <input type="text" class="form-control" id="f-name" name="f-name" placeholder="First name" maxlength="35">

                    <label for="l-name">Last Name</label>
                    <input type="text" class="form-control" id="l-name" name="l-name" placeholder="Last name" maxlength="35">

                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="m">Man</option>
                        <option value="w">Woman</option>
                        <option value="dwts">Don't want to say</option>
                    </select>

                    <div id="profile_pic">
                        <img id="blah" class="rounded" src="" alt="" class="img-responsive rounded" style="height: 200px; width: 190px; object-fit: cover;">
                        <br><br><label class="btn btn-primary ">
                            Set Avatar <input type="file" id="imgInp" name='dp' hidden>
                        </label>
                        <p class="text-muted mt-10">Maximum size: 5MB, 320x320 pixels</p>
                    </div>

                    <input type="submit" class="btn btn-light btn-lg" name="signup-submit" value="Signup">
                    

                    </form>


                    <div id="bottom_page">
                        

                        <a href="index.php">
                            <p hidden>_</p>
                            <i class="fa fa-sign-in fa-2x social-icon" aria-hidden="true" href="login.php"></i>
                        </a>
                    </div>

                </div>

            </div>
        </div>





        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <script>
            $('#blah').attr('src', 'uploads/default.png');

            function readURL(input) {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp").change(function() {
                readURL(this);
            });
        </script>