


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../css/upload.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

</head>
<body>

<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

<!--create side navigation-->
<aside class="CMSnav" id="mySidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <p>Pages: </p>
    <a href="clickArt">Art</a>
    <a href="clickGallery">Gallery</a>
    <a href="clickVideos">Videos</a>
    </aside>

    <script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("container").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("container").style.marginLeft = "0";
    document.body.style.backgroundColor = "#fff";
}
</script>

<div id="container">
<header><h1>Edit Gallery Content</h1></header>


    <iframe class="gallery"
src="https://www.katherinevanbebber.com/KatherineVanBebber.com/gallery.php">
</iframe> 
   
<div class="upload">
    <h3>Image Upload</h3>

<fieldset>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <h6>Select image to upload:</h6>
    <input type="file" name="fileToUpload" id="fileToUpload"><br>
    <input type="submit" value="Upload Image" name="submit">
        
    <div id="feedback"></div>

        <?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "<script>document.getElementById(\"feedback\").innerHTML = \"File is an image - " . $check["mime"] . ".<br>\";</script>";
        $uploadOk = 1;
    } else {
        echo "<script>document.getElementById(\"feedback\").innerHTML = \"File is not an image.<br>\";</script>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.<br>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "<script>document.getElementById(\"feedback\").innerHTML = \"Sorry, your file is too large.<br>\";</script>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "<script>document.getElementById(\"feedback\").innerHTML = \"Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>\";</script>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<script>document.getElementById(\"feedback\").innerHTML = \"Sorry, your file was not uploaded.<br>\"; </script>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $fname = basename( $_FILES["fileToUpload"]["name"]);
        echo "<script>document.getElementById(\"feedback\").innerHTML = \"The file \"" . $fname . "\" has been uploaded.<br>\";</script>";

       // exec('python delete.py', $output, $return);

       
     


        $txt = "<div id=\"uploads/". $fname . "\">
     <a class=\"example-image-link\" href=\"includes/uploads/" . $fname . "\" data-lightbox=\"example-set\" data-title=\"Click the right half of the image to move forward.\"><img class=\"example-image\" src=\"includes/uploads/" . $fname . "\" alt=\"testing\"/></a>
   </div><hr />";
        $myfile = file_put_contents('gallerycontents.php', $txt , FILE_APPEND | LOCK_EX);

    } else {
        
        echo "<script>document.getElementById(\"feedback\").innerHTML = \"Sorry, there was an error uploading your file.<br>\";</script>";
    }
}
        ?>
        
</form>
<p id="files"></p>
<?php

//delete uploaded image
if (array_key_exists('delete_file', $_POST)) {
    $filename = "uploads/" . $_POST['delete_file'];
    if (file_exists($filename)) {
      unlink($filename);
      echo 'File '.$filename.' has been deleted';

     
    } else {
      echo 'Could not delete '.$filename.', file does not exist';
    }
  }

  

  //print out all uploaded images
  $log_directory = 'uploads';

$results_array = array();

if (is_dir($log_directory))
{
        if ($handle = opendir($log_directory))
        {
                //Notice the parentheses I added:
                while(($file = readdir($handle)) !== FALSE)
                {
                        $results_array[] = $file;
                }
                closedir($handle);
        }
}

//Output findings
foreach($results_array as $value)
{
    echo "<script>document.getElementById(\"files\").innerHTML += \"" . $value . "<br />\";</script>";
}
?>

<form method="post">
  <input type="text" name="delete_file" />
  <input type="submit" value="Delete image" />
</form>

    
    </fieldset>
    </div>

</div> <!--end container-->
    
</body>
</html>