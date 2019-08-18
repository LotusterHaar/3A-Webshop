<?php
include $_SERVER['DOCUMENT_ROOT'].'/../includes/header.html';

if ($_SERVER[REQUEST_METHOD]=='POST' && isLoggedin()) {
    echo ('<PRE>');
    print_r($_SERVER);
    print_r($_SESSION);
    print_r($_POST);
    echo ('</PRE>');

    die();
}

if (isLoggedin())
    include './content/reviewpagina.html';
else
    include $_SERVER['DOCUMENT_ROOT'].'/../content/over-ons.html';
include $_SERVER['DOCUMENT_ROOT'].'/../includes/footer.html';
?>