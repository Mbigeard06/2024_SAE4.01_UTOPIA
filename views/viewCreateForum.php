    <?php include 'includes/navbar.php'; ?>


    <div class="bg-contact2" style="background-image: url('img/banner.png');">
        <div class="container-contact2">
            <div class="wrap-contact2">
                <form class="contact2-form" method="post" action="index.php?action=create-forum">
                    <span class="contact2-form-title">
                        Create A Forum
                    </span>

                    <span class="text-center">

                    </span>



                    <div class="wrap-input2 validate-input" data-validate="Name is required">
                        <input class="input2" type="text" name="topic-subject">
                        <span class="focus-input2" data-placeholder="Forum Subject"></span>
                    </div>


                    <label>Category</label>
                    <select class="form-control" name="topic-cat">

                        <?php foreach ($categories as $category) { ?>
                            <option value=<?= $category->getIdCategory() ?>><?= $category->getName() ?></option>
                        <?php } ?>

                    </select><br><br>


                    <div class="wrap-input2 validate-input" data-validate="Description is required">
                        <textarea class="input2" name="post-content"></textarea>
                        <span class="focus-input2" data-placeholder="Forum Question"></span>
                    </div>

                    <div class="container-contact2-form-btn">
                        <div class="wrap-contact2-form-btn">
                            <div class="contact2-form-bgbtn"></div>
                            <button class="contact2-form-btn" type="submit" name="create-topic">
                                Create Forum
                            </button>
                        </div>
                    </div>

                    <div class="text-center">
                        <br><br><a class="btn btn-light btn-lg btn-block" href="topics.php">
                            View Forums</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <style>
        <?php include("css/comp-creation.css"); ?>
    </style>




    <script src="js/creation-main.js"></script>