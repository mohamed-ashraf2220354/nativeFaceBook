<?php
require_once("header.php");
$myposts = $user->myposts($user->id);
?>

<div class="container">
  <div class="left-panel">
    <ul>
      <li>
        <i class="profile"></i>
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
          <img src="./image/user.png" alt="">
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
    foreach ($myposts as $post) {
    ?>
      <div class="middle-panel">
        <div class="post">
          <div class="post-top">
            <div class="dp">
              <img src="<?php if (!empty($user->image)) echo $user->image;
                        else echo './image/User.jpg' ?>" alt="">
            </div>
            <div class="post-info">
              <p class="name"> <?= $user->name ?></p>
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