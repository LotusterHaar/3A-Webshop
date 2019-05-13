<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/generalfunctions.php');
fullydestroysession();
if ($_SERVER['HTTP_REFERER']<>0)
    header ("Location: "+$_SERVER['HTTP_REFERER']);
else
    header ("Location: /");
?>
