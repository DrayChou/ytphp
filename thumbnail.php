<?php
$vid=$_GET['vid'];

header('content-type:image/jpg;');
$vidimg='https://i.ytimg.com/vi/'.$vid.'/mqdefault.jpg';
$img=file_get_contents($vidimg);
echo $img;
?>