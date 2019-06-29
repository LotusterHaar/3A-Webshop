<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/generalfunctions.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/dbfunctions.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/user.php');

parse_str($_SERVER['QUERY_STRING'], $queryresolved);

if (isset($queryresolved['registreren'])) {
    header ("Location: /webshop/registreer");
    die();
}

include $_SERVER['DOCUMENT_ROOT'].'/../includes/header.html';
include './content/productoverzicht.html';
include $_SERVER['DOCUMENT_ROOT'].'/../includes/footer.html';
?>