<?php
require_once("header.php");
$myposts = $user->myposts($user->id);
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
    <button class="button">your story</button>
    <button class="button">Message</button>
  </div>
</div>

<?php
foreach ($myposts as $post) {
?>
  <div class="middle-panel">
    <div class="post">
      <div class="post-top">
        <div class="dp">
          <img src="<?php if(!empty($user->image)) echo $user->image  ; else echo'./image/User.jpg' ?>" alt="">
        </div>
        <div class="post-info">
          <p class="name"><?= $user->name ?></p>
          <span class="time"><?= $post["created_at"] ?></span>
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
          <i class="fa-regular fa-heart"></i>
          <span class="text">like</span>
        </div>
        <div class="action">
          <i class="far fa-comments"></i>
          <a href="comments.php"><span>comments</span></a>
        </div>
        <div class="action">
          <i class="fa-regular fa-share-from-square"></i>
          <span>share</span>
        </div>
      </div>
    </div>
    
  </div>
  </div>

  </div>


<?php
}
?>