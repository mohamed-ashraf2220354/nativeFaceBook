<?php
require_once("header.php");
$posts = $user->myposts($user->id);
?>



<div class="profile-card">
  <div class="image">
    <img src="<?php if(!empty($user->image)) echo $user->image  ; else echo'./image/User.jpg' ?>"class="profile-img" />
    <form action="store_user_image.php" method="post" enctype="multipart/form-data">

    <input type="file" name="image" placeholder="Upload Image">
    <button type="submit" class="btn-warning">
      <i class="fa fa-upload"></i> 
    </button>
    </form>
  </div>

  <div class="text-data">
    <span class="name"><?= $user->name ?></span>
  </div>

  <div class="buttons">
    <a style="text-decoration: none" href="posts.php" class="button">Add Post</a>
    <button class="button">Message</button>
  </div>
</div>

<?php
    foreach ($posts as $post) {
      $user1 = $user->getUser($post["user_id"]);
    ?>
      <div class="middle-panel">
        <div class="post">
          <div class="post-top">
            <div class="dp">
              <img src="<?php if (!empty($user1[0]["image"])) echo $user1[0]["image"];
                        else echo './image/User.png' ?>" alt="">
            </div>
            <div class="post-info">
              <p class="name"> <?= $user1[0]["name"] ?></p>
              <span class="time">
                <?php
                $time = $post["created_at"];
                $date = date("F j, Y, g:i a", strtotime($time));
                echo $date;
                ?>
              </span>
            </div>
            <i class="fas fa-ellipsis-h"></i>
          </div>
          <div class="post-content">
            <?= $post["title"] ?>
            <?php
            if (!empty($post["image"])) {
            ?>
              <img class="" src="<?= $post["image"] ?>" />
            <?php
            }
            ?>
          </div>
          <div class="post-bottom">
            <div class="action">
              <?php
              if (!empty($user->myLike($post["id"], $user->id))) {
              ?>
                <a role="button" href="handle_like.php ?post_id=<?= $post["id"] ?> & like=no" class="btn btn-primary btn-lg btn-floating">
                  <i class="bi bi-heart-fill"></i>
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                  </svg>
                  <span>Like</span>
                </a>
              <?php
              } else {
              ?>
                <a role="button" href="handle_like.php ?post_id=<?= $post["id"] ?> & like=yes" class="btn btn-primary btn-lg btn-floating">
                  <i class="fa-regular fa-heart"></i>
                  <span>Like</span>
                </a>
              <?php
              }
              ?>
            </div>
            <div class="action">
              <i class="far fa-comments"></i>
              <a href="comments.php ?post_id=<?= $post["id"] ?>"><span>comments</span></a>
            </div>
            <div class="action">
              <a role="button" href="like.php ?post_id=<?= $post["id"] ?>" class="btn btn-primary btn-lg btn-floating">
                <i class="bi bi-clipboard2-pulse-fill"></i>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-pulse-fill" viewBox="0 0 16 16">
                  <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5" />
                  <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5M9.98 5.356 11.372 10h.128a.5.5 0 0 1 0 1H11a.5.5 0 0 1-.479-.356l-.94-3.135-1.092 5.096a.5.5 0 0 1-.968.039L6.383 8.85l-.936 1.873A.5.5 0 0 1 5 11h-.5a.5.5 0 0 1 0-1h.191l1.362-2.724a.5.5 0 0 1 .926.08l.94 3.135 1.092-5.096a.5.5 0 0 1 .968-.039Z" />
                </svg>
              </a>
              <span>Likes</span>
            </div>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
    