<?php include 'config.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta name="viewport" content="width=device-width" />
    <meta name="robots" content="noindex,nofollow" />
    <meta charset="UTF-8">
    <title><?=$title?></title>
    <script src="https://use.fontawesome.com/6a71565c22.js"></script>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/gallery.css">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Mrs+Sheppards|Sue+Ellen+Francisco|Patrick+Hand+SC" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet"> 
    <link rel="stylesheet" href="css/lightbox.min.css">
    
</head>
<body>
    <nav>
        <ul class="topnav" id="myTopnav">
          <li><a href="index.php" class="<?=$home?>">HOME</a></li>
          <li><a href="art.php" class="<?=$art?>">ART</a></li>
          <li><a href="music.php" class="<?=$music?>">MUSIC</a></li>
          <li><a href="gallery.php" class="<?=$gallery?>">GALLERY</a></li>
          <li><a href="bookings.php" class="<?=$bookings?>">BOOKINGS</a></li>
          <li><a href="contact.php" class="<?=$contact?>">CONTACT</a></li>
          <li class="icon"> <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a> </li>
        </ul>
    </nav>

    <!-- END INCLUDES "includes/top.php" -->