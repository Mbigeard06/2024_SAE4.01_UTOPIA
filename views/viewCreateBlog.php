<?php include 'includes/navbar.php'; ?>


<div class="bg-contact2" style="background-image: url('img/black-bg.jpg');">
    <div class="container-contact2">



        <div class="wrap-contact2">
            <form class="contact2-form" action="" method='post' enctype="multipart/form-data">

                <label class="btn btn-primary position-absolute mt-2 ml-2">
                    Change Cover Image <input type="file" id="imgInp" name='dp' hidden>
                </label>
                <img class="cover-img" src="img/blog-cover.png">

                <br><br><br>
                <span class="contact2-form-title">
                    Create a Blog
                </span>

                <span class="text-center">
                    
                </span>

                <div class="wrap-input2 validate-input" data-validate="Name is required">
                    <input class="input2" type="text" id="title" name="btitle">
                    <span class="focus-input2" data-placeholder="Blog Title"></span>
                </div>

                <div class="wrap-input2 validate-input" data-validate="Description is required">
                    <textarea class="input2" id="content" name="bcontent" rows="20"></textarea>
                    <span class="focus-input2" data-placeholder="Blog Content"></span>
                </div>

                <div class="container-contact2-form-btn">
                    <div class="wrap-contact2-form-btn">
                        <div class="contact2-form-bgbtn"></div>
                        <button class="contact2-form-btn" type="submit" name="create-blog-submit">
                            Create Blog
                        </button>

                    </div>
                </div>
                <div class="text-center">
                    <br><br><a class="btn btn-light btn-lg btn-block" href="blogs.php">
                        View All Blogs</a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    <?php include("css/comp-creation.css") ?>
</style>




