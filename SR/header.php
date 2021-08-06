<?php
  session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Turto Search Bot</title>
        <!-- PWA Conversion -->
        <link rel="manifest" href="manifest.json">
        <script>
            if('serviceWorker' in navigator){
              navigator.serviceWorker.register('sw.js');
          };
        </script>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Simple line icons-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <!-- jQuery CDN -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <a class="menu-toggle rounded" href="#"><i class="fas fa-bars"></i></a>
        <nav id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="#page-top">Turto Search Bot</a></li>

                <?php
                  if (isset($_SESSION["userID"])) {
                    echo "
                      <li class='sidebar-nav-item'><a href='#search'>Search Location</a></li>
                      <li class='sidebar-nav-item'><a href='#mapping'>View Mapping</a></li>
                      <li class='sidebar-nav-item'><a href='#pinned'>Pinned</a></li>
                      <li class='sidebar-nav-item'><a href='#healt'>Health</a></li>
                      <li class='sidebar-nav-item'><a href='#camera'>Camera</a></li>
                      <li class='sidebar-nav-item'><a href='#analytics'>Analytics</a></li>
                      <li class='sidebar-nav-item'><a href='includes/logout.inc.php'>Logout</a></li>
                    ";
                  }
                  else {
                    echo "
                      <li class='sidebar-nav-item'><a href='signup.php'>Signup</a></li>
                      <li class='sidebar-nav-item'><a href='login.php'>Login</a></li>
                    ";
                  }
                ?>

            </ul>
        </nav>
