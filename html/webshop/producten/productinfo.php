<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/generalfunctions.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/dbfunctions.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/user.php');

parse_str($_SERVER['QUERY_STRING'], $queryresolved);
if (isset($queryresolved['notify']) && !empty($queryresolved['notify']) && isLoggedin()) {
    toevoegen('reminder',$queryresolved['notify']);

    //header('Location: /webshop/producten/');
    //die();
}
else if (isset($queryresolved['toevoegen']) && !empty($queryresolved['toevoegen']) && isLoggedin()) {
    toevoegen('product',$queryresolved['toevoegen']);
    //header('Location: /webshop/producten/');
    //die();
}

include $_SERVER['DOCUMENT_ROOT'].'/../includes/header.html';
include '../content/productinfo.html';
include $_SERVER['DOCUMENT_ROOT'].'/../includes/footer.html';

?>