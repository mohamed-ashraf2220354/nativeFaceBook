<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
</head>

<body>

    <div class="container">
        <div class="head">
            <h1>Post a Comment</h1>
        </div>
        <div><span id="comment">0</span> Comments</div>
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