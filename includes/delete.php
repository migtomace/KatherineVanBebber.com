<?php

$file = file_get_contents("includes/gallerycontents.php");

$string =  "<div id=\"uploads/nban.jpg\">
<a class=\"example-image-link\" href=\"includes/uploads/nban.jpg\" data-lightbox=\"example-set\" data-title=\"Click the right half of the image to move forward.\"><img class=\"example-image\" src=\"includes/uploads/nban.jpg\" alt=\"testing\"/></a>
</div><hr />";


$my_file = "gallery.txt";
$handle = fopen($my_file, "w");
fwrite($handle,$file);
fclose($handle);



$newString = str_replace($string, "Replacement SUCCESS!!!", $file);
$new_file = "newgallery.php";
$new_handle = fopen($new_file, "w");
fwrite($new_handle, $newString);
fclose($new_handle);


?>