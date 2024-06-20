<?php
session_start();
require_once("classes.php");
$user = unserialize($_SESSION["user"]);
$likes = $user->mylikes($_REQUEST["post_id"]);
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.122.0">
  <title>Facebook</title>
  <link rel="shortcut icon" href="./image/logo.png" type="image/x-icon" />
  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/list-groups/">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link href="bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      width: 100%;
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
      --bd-violet-bg: #712cf9;
      --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

      --bs-btn-font-weight: 600;
      --bs-btn-color: var(--bs-white);
      --bs-btn-bg: var(--bd-violet-bg);
      --bs-btn-border-color: var(--bd-violet-bg);
      --bs-btn-hover-color: var(--bs-white);
      --bs-btn-hover-bg: #6528e0;
      --bs-btn-hover-border-color: #6528e0;
      --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
      --bs-btn-active-color: var(--bs-btn-hover-color);
      --bs-btn-active-bg: #5a23c8;
      --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
      z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
      display: block !important;
    }
  </style>
  <link href="list-groups.css" rel="stylesheet">
  <!-- Custom styles for this template -->
</head>

<body>
    <?php
    if (!empty($likes)) {
      foreach ($likes as $like) {
        $user1 = $user->getUser($like["user_id"]);
    ?>
  <div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-2">

        <div class="d-flex gap-2 w-100">
          <?php
          if (!empty($user1[0]["image"])) {
          ?>
            <img src="<?php echo $user1[0]["image"]; ?>" alt="twbs" width="20" height="20" class="rounded-circle flex-shrink-0">
          <?php
          } else {
          ?>
            <img src="image/user.png" alt="twbs" width="20" height="20" class="rounded-circle flex-shrink-0" />
          <?php
          }
          ?>
          <div>
            <h6 class="mb-0"><?= $user1[0]["name"] ?></h6>
          </div>
        </div>
      </div>
    <?php
      }
    }
    ?>
</body>

</html>