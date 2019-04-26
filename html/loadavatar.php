<?php
session_start();

if (isset($_SESSION["avatar"]) && $_SESSION["avatar"] <> '' && file_exists('../avatar'+$_SESSION['avatar']))
{
    $file="../avatar/".$_SESSION["avatar"];
}
else
{
    $file="../avatar/avatar.jpg";
}

$file=realpath($file);


$ntct = Array( "1" => "image/gif",
                   "2" => "image/jpeg", #Thanks to "Swiss Mister" for noting that 'jpg' mime-type is jpeg.
                   "3" => "image/png",
                   "6" => "image/bmp",
                   "17" => "image/ico");

if (file_exists($file) && filesize($file) > 11)
{
header('Content-type: ' . $ntct[exif_imagetype($file)]);
header('Content-Length: ' . filesize($file));
readfile($file);

}
die;
?>
