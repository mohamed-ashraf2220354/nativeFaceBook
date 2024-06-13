<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Facebook Posts</title>
    <link rel="stylesheet" href="css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  </head>
  <body>
    <div class="container">
      <div class="wrapper">
        <section class="post">
          <header>Create Post</header>
          <form action="handle_post.php" method="post" enctype="multipart/form-data">
            <div class="content">
              <img src="./image/logo.png" alt="logo">
              <div class="details">
                <p>your posts</p>
                <div class="privacy">
                  <i class="fas fa-user-friends"></i>
                  <span>Friends</span>
                  <i class="fas fa-caret-down"></i>
                </div>
              </div>
            </div>
            <textarea placeholder="What's on your mind?" spellcheck="false" name="title" required></textarea>
            <input type="file" name="image">
            <div class="theme-emoji">
              <img src="icons/theme.svg" alt="theme">
              <img src="icons/smile.svg" alt="smile">
            </div>
            <div class="options">
              <p>Add to Your Post</p>
              <ul class="list">
                <li><img src="icons/gallery.svg" alt="gallery"></li>
                <li><img src="icons/tag.svg" alt="gallery"></li>
                <li><img src="icons/emoji.svg" alt="gallery"></li>
                <li><img src="icons/mic.svg" alt="gallery"></li>
                <li><img src="icons/more.svg" alt="gallery"></li>
              </ul>
            </div>
            <button>Post</button>
          </form>  
  </body>
</html>
