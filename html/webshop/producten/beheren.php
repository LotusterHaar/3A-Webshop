<?php
include $_SERVER['DOCUMENT_ROOT'].'/../includes/header.html';
if (isAdmin())
    include '../content/productenbeheren.html';
else
    include $_SERVER['DOCUMENT_ROOT'].'/content/over-ons.html';
include $_SERVER['DOCUMENT_ROOT'].'/../includes/footer.html';
?>