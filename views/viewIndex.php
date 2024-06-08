<link href="css/list-page.css" rel="stylesheet">
<link href="css/loader.css" rel="stylesheet">
</head>

<body>

    <div id="content">

        <?php include 'includes/navbar.php'; ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3">

                    <?php include 'includes/profile-card.php'; ?>

                </div>

                <div class="col-sm-7">

                    <div class="text-center p-3">
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

                <div class="col-sm-2">

                    <div class="text-center p-3 mt-5">
                        <a href="team.php" target="_blank">
                            <i class="creater-icon fa fa-users fa-5x" aria-hidden="true"></i>
                        </a>
                        <p><br>THE CREATORS</p>
                    </div>

                    <a href="forum.php" class="btn btn-warning btn-lg btn-block">KLiK Forum</a>
                    <a href="hub.php" class="btn btn-secondary btn-lg btn-block">KLiK Hub</a>
                    <br><br><br>
                    <a href="create-topic.php" class="btn btn-warning btn-lg btn-block">Create a Forum</a>
                    <a href="create-blog.php" class="btn btn-secondary btn-lg btn-block">Create a Blog</a>

                </div>
            </div>
        </div>
        <?php include 'includes/footer.php'; ?>
    </div>



    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>