<?php
include $_SERVER['DOCUMENT_ROOT'].'/../includes/header.html';
if (isLoggedin())
include './content/winkelwagen.html';
else
    include $_SERVER['DOCUMENT_ROOT'].'/../content/over-ons.html';
include $_SERVER['DOCUMENT_ROOT'].'/../includes/footer.html';
?>