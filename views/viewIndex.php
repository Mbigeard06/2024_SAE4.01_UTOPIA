<link href="css/list-page.css" rel="stylesheet">
<link href="css/loader.css" rel="stylesheet">


<?php include 'includes/navbar.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">

            <?php include 'includes/profile-card.php'; ?>

        </div>

        <div class="col-sm-7">

            <div class="center-index p-3">
                <img src="img/200.png">
                <h2 class='text-muted'>DASHBOARD</h2>
                <br>
            </div>


            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="forum-tab" data-toggle="tab" href="#forum" role="tab" aria-controls="forum" aria-selected="true">Recent Forums</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="blog-tab" data-toggle="tab" href="#blog" role="tab" aria-controls="blog" aria-selected="false">Recent Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="poll-tab" data-toggle="tab" href="#poll" role="tab" aria-controls="poll" aria-selected="false">Recent Polls</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="event-tab" data-toggle="tab" href="#event" role="tab" aria-controls="event" aria-selected="false">Recent Events</a>
                </li>
            </ul>

            <br>
            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="forum" role="tabpanel" aria-labelledby="forum-tab">

                    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
                        <img class="mr-3" src="img/200.png" alt="" width="48" height="48">
                        <div class="lh-100">
                            <h1 class="mb-0 text-white lh-100">Latest Forums</h1>
                        </div>
                    </div>

                    <div class="row mb-2">

                        <?php foreach ($forums as $forum) { ?>
                            <div class="col-md-6">
                                <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                                    <a href="posts.php?topic=<?= $forum->getIdForum() ?>">
                                        <img class="card-img-left flex-auto d-none d-lg-block blogindex-cover" src="img/forum-cover.png" alt="Card image cap">
                                    </a>
                                    <div class="card-body d-flex flex-column align-items-start">
                                        <strong class="d-inline-block mb-2 text-primary text-center  ml-auto">
                                            <i class="fa fa-chevron-up" aria-hidden="true"></i><br>
                                        </strong>
                                        <h6 class="mb-0">
                                            <a class="text-dark" href="posts.php?topic='<?= $forum->getIdForum() ?>'">
                                                <?= substr(ucwords($forum->getSubject()), 0, 15) ?>...</a>
                                        </h6>
                                        <small class="mb-1 text-muted"><?= date("F jS, Y", strtotime($forum->getDate()->format('Y-m-d H:i:s'))) ?></small>
                                        <small class="card-text mb-auto">Created By : <?= ucwords($forum->getCreator()->getUsername()) ?></small>
                                        <a href="posts.php?topic=<?= $forum->getIdForum() ?>">Go To Forum</a>
                                    </div>

                                </div>
                            </div>
                        <?php } ?>

                    </div>

                </div>

                <div class="tab-pane fade" id="blog" role="blog" aria-labelledby="blog-tab">

                    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
                        <img class="mr-3" src="img/200.png" alt="" width="48" height="48">
                        <div class="lh-100">
                            <h1 class="mb-0 text-white lh-100">Latest Blogs</h1>
                        </div>
                    </div>

                    <div class="row mb-2">

                        <?php foreach ($blogs as $blog) { ?>
                            <div class="col-md-6">
                                <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                                    <div class="card-body d-flex flex-column align-items-start">
                                        <strong class="d-inline-block mb-2 text-primary">
                                            <i class="fa fa-thumbs-up" aria-hidden="true"></i><?= $blog->getVotes() ?>
                                        </strong>
                                        <h6 class="mb-0">
                                            <a class="text-dark" href="blog-page.php?id=<?= $blog->getIdBlog() ?>"><?= substr($blog->getTitle(), 0, 10) ?>...</a>
                                        </h6>
                                        <small class="mb-1 text-muted"><?= strtotime($blog->getDate()->format('Y-m-d H:i:s')) ?></small>
                                        <small class="card-text mb-auto"><?= substr($blog->getContent(), 0, 40) ?>...</small>
                                        <a href="blog-page.php?id=<?= $blog->getIdBlog() ?>">Continue reading</a>
                                    </div>
                                    <a href="blog-page.php?id=<?= $blog->getIdBlog() ?>">
                                        <img class="card-img-right flex-auto d-none d-lg-block blogindex-cover" src="uploads/<?= $blog->getImage() ?>" alt="Card image cap">
                                    </a>
                                </div>
                            </div>
                        <?php } ?>

                    </div>

                </div>

                <div class="tab-pane fade" id="poll" role="poll" aria-labelledby="poll-tab">

                    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
                        <img class="mr-3" src="img/200.png" alt="" width="48" height="48">
                        <div class="lh-100">
                            <h1 class="mb-0 text-white lh-100">Latest Polls</h1>
                        </div>
                    </div>

                    <div class="my-3 p-3 bg-white rounded shadow-sm">

                    </div>

                </div>

                <div class="tab-pane fade" id="event" role="event" aria-labelledby="event-tab">

                    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
                        <img class="mr-3" src="img/200.png" alt="" width="48" height="48">
                        <div class="lh-100">
                            <h1 class="mb-0 text-white lh-100">Upcoming Events</h1>
                        </div>
                    </div>

                    <div class="my-3 p-3 bg-white rounded shadow-sm">



                    </div>

                </div>

            </div>

        </div>

        <div class="col-sm-2 mt-5 leftDivIndex">
            <br><br>
            <a href="index.php?action=create-forum" class="btn btn-warning btn-lg btn-block mt-5">Create a Forum</a>
            <a href="index.php?action=create-blog" class="btn btn-secondary btn-lg btn-block">Create a Blog</a>
        </div>

    </div>
</div>
<?php include 'includes/footer.php'; ?>    </div>



    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

