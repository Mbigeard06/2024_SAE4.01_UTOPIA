<div class='card card-profile text-center'>
    <img alt="" class='card-img-top card-user-cover' src='img/user-cover.png'>
    <div class='card-block'>
        <a href='profile.php'>
            <img src='uploads/<?= $profilePicture ?>' class='card-img-profile' alt="Profile picture">
        </a>
        <?= $badge ?>
        <a href="edit-profile.php" title="Link to profile edition">
            <i class="fa fa-pencil fa-2x edit-profile"></i>
        </a>
        <h4 class='card-title'>
            <?= $username ?>
            <small class="text-muted">
                <?= $name ?>
            </small>
            <br>
            <small class="text-muted"><?= $headline ?></small>
            <br><br><br>
        </h4>
    </div>
</div>