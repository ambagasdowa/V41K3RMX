<?php
header('Cache-Control: no-cache, must-revalidate');

//Specify url path

$pathPHP = $_SERVER['DOCUMENT_ROOT'].'/public/uploads/photos/posts/';

$path='/public/uploads/photos/posts/';
if(!file_exists($pathPHP))
{

    mkdir($pathPHP,0755,true);
    chmod($pathPHP, 0755);
}

//Read image
$count = $_REQUEST['count'];
$b64str = $_REQUEST['hidimg-' . $count]; 
$imgname = $_REQUEST['hidname-' . $count]; 
$imgtype = $_REQUEST['hidtype-' . $count]; 

//Generate random file name here
if($imgtype == 'png'){
	$i = $imgname . '-' . base_convert(rand(),10,36) . '.png';
} else {
	$i = $imgname . '-' . base_convert(rand(),10,36) . '.jpg';
}

//Save image

require $_SERVER['DOCUMENT_ROOT'].'/libs/simpleImage.php';
/*$image = new \abeautifulsite\SimpleImage();
$image->load_base64($b64str);*/

$success = file_put_contents($pathPHP . $i, base64_decode($b64str));

if ($success===FALSE) {

  if (!file_exists($pathPHP)) {
    echo "<html><body onload=\"alert('Saving image to folder failed. Folder ".$pathPHP." not exists.')\"></body></html>";
  } else {
    echo "<html><body onload=\"alert('Saving image to folder failed. Please check write permission on " .$path. "')\"></body></html>";
  }
    
} else {
  //Replace image src with the new saved file
  echo "<html><body onload=\"parent.document.getElementById('img-" . $count . "').setAttribute('src','" . $path . $i . "');  parent.document.getElementById('img-" . $count . "').removeAttribute('id') \"></body></html>";
}


?>
