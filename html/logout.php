<?php
require_once('../protectedfunctions/generalfunctions.php');
fullydestroysession();
if ($_SERVER['HTTP_REFERER']<>0)
    header ("Location: "+$_SERVER['HTTP_REFERER']);
else
    header ("Location: /");
?>
