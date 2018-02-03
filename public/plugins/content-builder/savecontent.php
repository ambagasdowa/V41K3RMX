<?php

if ($_POST['content']) {

    $myFile = $_SERVER['DOCUMENT_ROOT']."/ednahotel/webhotels/".$_POST['hotel']."/paginas/".$_POST['pagina'].".html";
    $stringData = $_POST['content'];
    file_put_contents($myFile,$stringData);
	echo $stringData;
}
?>