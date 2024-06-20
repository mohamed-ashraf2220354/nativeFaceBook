<?php
session_start();
require_once("classes.php");
$user = unserialize($_SESSION["user"]);
$comments = $user->mycomment($_REQUEST["post_id"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Comments</title>
</head>

<body>

    <div class="container">
        <div class="head">
            <h1>Post a Comment</h1>
        </div>
        <div>
            <span id="comment"><?= count($comments) ?></span> Comments
        </div>

        <?php
        foreach ($comments as $comment) {
            $user1 = $user->getUser($comment["user_id"]);
        ?>

        <div class="card mb-4">
            <div class="card-body">
                <p><?= $comment["comment"] ?></p>

                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                    <?php
                        if (!empty($user1[0]["image"])) {
                    ?>
                        <img src="<?= $user1[0]["image"] ?>" alt="avatar" width="25" height="25" />
                    <?php
                        }else{
                    ?>
                        <img src="image/user.png" alt="avatar" width="25" height="25" />
                    <?php
                        }
                        ?>
                        <p class="small mb-0 ms-2"><?= $user1[0]["name"] ?></p>
                    </div>
                    <div class="d-flex flex-row align-items-center">
                        <p class="small text-muted mb-0"><?= $comment["created_at"] ?></p>
                        <i class="far fa-thumbs-up mx-2 fa-xs text-body" style="margin-top: -0.16rem;"></i>
                    </div>
                </div>
            </div>
        </div>

        <?php
        }
        ?>

        <div class="text">
            <p>We are happy to hear from you</p>
        </div>
        <div class="comments"></div>
        <div class="commentbox">
            <img src="./image/User.jpg" alt="">
            <div class="content">
                <h2>Comment as: </h2>
                <input type="text" value="me" class="user">
                <div class="commentinput">
                    <form action="handle_comment.php" method="post">
                        <input type="text" placeholder="Enter comment" class="usercomment" name="comment">
                        <input type="hidden" name="post_id" value="<?= $_REQUEST["post_id"] ?>">
                        <div class="buttons">
                            <button type="submit">posts</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>