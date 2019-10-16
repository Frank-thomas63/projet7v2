<?php
session_start();

$_SESSION['captcha'] = mt_rand(1000,9999);
$img=imagecreatetruecolor(100,40);
$font = 'police/police.ttf';
$fill_color = imagecolorallocate($img, 200, 200, 200);
$text_color = imagecolorallocate($img, 250, 250, 250);
imagettftext($img, 23, 0, 12, 34, $text_color, $font, $_SESSION['captcha']);

header('Content-type:image/jpeg');
imagejpeg($img);
imagedestroy($img);
?>
