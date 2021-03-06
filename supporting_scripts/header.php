<?php

?>
<!doctype html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Shubh Jain Vivah</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="shortcut icon" href="/6df2b309.favicon.ico">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="stylesheet" href="styles/dfc57042.vendor.css"/>
        <link rel="stylesheet" href="styles/0b548053.main.css"/>
    </head>
    <body>
        <!--[if lt IE 10]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="home">Shubh Jain Vivah</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="about">About</a></li>
                    <li><a href="search">Search</a></li>
                    <li><a href="register">Register</a></li>
                    <li><a href="contact-us">Contact Us</a></li>
                    <?php
                        if(isset($_SESSION['user'])) {
                            $user = new User(Encryption::decrypt($_SESSION['user']));
                            $username = ucfirst($user->data()->username);
                        }
                    ?>
                    <li><?php echo (isset($_SESSION['user']))? "<a href='logout'>" . $username . "</a>" : "<a href='login'>Login</a>";?></li>
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </div><!-- /.container -->
        </nav>