<?php
require_once("header.php");
$posts = $user->posts();
?>

<div class="container">
  <div class="left-panel">
    <ul>
      <li>
        <?php
        if (!empty($user->image)) {
        ?>
          <img src="<?= $user->image ?>" alt="avatar" width="50" height="50" style="border-radius: 50%;" />
        <?php
        } else {
        ?>
          <img src="./image/User.png" alt="profile pic" />
        <?php
        }
        ?>
        <i></i>
        <p class="name"><a style="text-decoration: none ;color: #333;" href="profile.php"><?= $user->name ?></a> </p>
      </li>
      <li>
        <i class="fa fa-user-friends"></i>
        <p class="name">Friends</p>
      </li>
      <li>
        <i class="fa fa-play-circle"></i>
        <p class="name">Videos</p>
      </li>
      <li>
        <i class="fa fa-flag"></i>
        <p class="name">Pages</p>
      </li>
      <li>
        <i class="fa fa-users"></i>
        <p class="name">Group</p>
      </li>
      <li>
        <i class="fa fa-bookmark"></i>
        <p class="name">Bookmark</p>
      </li>
      <li>
        <i class="fa fa-calendar-week"></i>
        <p class="name">Events</p>
      </li>
      <li>
        <i class="fa fa-bullhorn"></i>
        <p class="name">Ads</p>
      </li>
      <li>
        <i class="fa fa-hands-helping"></i>
        <p class="name">Offers</p>
      </li>
      <li>
        <i class="fa fa-briefcase"></i>
        <p class="name">Jobs</p>
      </li>
      <li>
        <i class="fa fa-star"></i>
        <p class="name">Favourites</p>
      </li>
      <li>
        <i class="fa fa-face-messenger">
          <img src="./image/messenger.png" alt="" />
        </i>
        <p class="name">Inbox</p>
      </li>
      <li>
        <i class="logout">
          <img src="./image/logout.png" alt="" />
        </i>
        <a href="handle_logout.php" style="  text-decoration: none;
  color: red;
  padding: 10px;">Log Out</a>
      </li>
    </ul>
    <div class="footer-links">
      <a href="">privacy</a>
      <a href="">Term</a>
      <a href="">Advance</a>
      <a href="">More</a>
    </div>
  </div>

  <div class="middle-panel">
    <div class="story-section">
      <div class="story create">
        <div class="dp-image">
          <img src="<?php if (!empty($user->image)) echo $user->image;
                    else echo './image/User.jpg' ?>" alt="profile pic" />
        </div>
        <span class="dp-container">
          <i class="fa fa-plus"></i>
        </span>
        <span class="name">create story</span>
      </div>
      <div class="story">
        <img src="./image/story4.jpg" alt="" />
        <div class="dp-container">
          <img src="./image/story.jpg" alt="" />
        </div>
        <p class="name">mohamed ashraf</p>
      </div>
      <div class="story">
        <img src="./image/story1.jpg" alt="" />
        <div class="dp-container">
          <img src="./image/story.jpg" alt="" />
        </div>
        <p class="name">karim mohamed</p>
      </div>
      <div class="story">
        <img src="./image/story2.jpg" alt="" />
        <div class="dp-container">
          <img src="./image/story.jpg" alt="" />
        </div>
        <p class="name">ali mohamed</p>
      </div>
      <div class="story">
        <img src="./image/story3.jpg" alt="" />
        <div class="dp-container">
          <img src="./image/story.jpg" alt="" />
        </div>
        <p class="name">mohamed ahmed</p>
      </div>
    </div>

    <div class="post">
      <div class="post-top">
        <div class="dp">
          <?php if (!empty($user->image)) echo "<img src='$user->image' alt='profile pic' />";
          else echo "<img src='image/User.png' alt='profile pic' />"; ?>
        </div>
        <a href="./posts.php" target="_self">
          <input type="text" class="text" placeholder="What's on your mind?">
        </a>
      </div>

      <div class="post-bottom">
        <div class="action">
          <i class="fa-solid fa-video"></i>
          <span>Live video</span>
        </div>
        <div class="action">
          <i class="fa-regular fa-images"></i>
          <span>Photo/Video</span>
        </div>
        <div class="action">
          <i class="fa-solid fa-face-smile"></i>
          <span>Feeling/Activity</span>
        </div>
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

    <script>
      const USERID = {
        name: null,
        identity: null,
        image: null,
        message: null,
        date: null
      }

      const userComment = document.querySelector(".usercomment");
      const publishBtn = document.querySelector("#publish");
      const comments = document.querySelector(".comments");
      const userName = document.querySelector(".user");
      const notify = document.querySelector(".notifyinput");

      userComment.addEventListener("input", e => {
        if (!userComment.value) {
          publishBtn.setAttribute("disabled", "disabled");
          publishBtn.classList.remove("abled")
        } else {
          publishBtn.removeAttribute("disabled");
          publishBtn.classList.add("abled")
        }
      })

      function addPost() {
        if (!userComment.value) return;
        USERID.name = userName.value;
        if (USERID.name === "me") {
          USERID.identity = false;
          USERID.image = "./image/user.jpg"
        } else {
          USERID.identity = true;
          USERID.image = "./image/user.jpg"
        }

        USERID.message = userComment.value;
        USERID.date = new Date().toLocaleString();
        let published =
          `<div class="parents">
            <img src="${USERID.image}">
            <div>
                <h1>${USERID.name}</h1>
                <p>${USERID.message}</p>
                <div class="engagements"><img src="./image/like.png" id="like"><img src="./image/share.png" alt=""></div>
                <span class="date">${USERID.date}</span>
            </div>    
        </div>`

        comments.innerHTML += published;
        userComment.value = "";
        publishBtn.classList.remove("abled")

        let commentsNum = document.querySelectorAll(".parents").length;
        document.getElementById("comment").textContent = commentsNum;

      }

      publishBtn.addEventListener("click", addPost);
    </script>

    </body>

    </html>