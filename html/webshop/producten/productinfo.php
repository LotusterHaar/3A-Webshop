<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/generalfunctions.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/dbfunctions.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/user.php');

parse_str($_SERVER['QUERY_STRING'], $queryresolved);
if (isset($queryresolved['notify']) && !empty($queryresolved['notify']) && isLoggedin()) {
    toevoegen('reminder',$queryresolved['notify']);
    header('Location: '.$queryresolved['refererurl']);
    die();}
else if (isset($queryresolved['toevoegen']) && !empty($queryresolved['toevoegen']) && isLoggedin()) {
    echo ("Toevoegen: ".$queryresolved['toevoegen']);
    toevoegen('toevoegen',$queryresolved['toevoegen']);
    header('Location: '.$queryresolved['refererurl']);
    die();
}

include $_SERVER['DOCUMENT_ROOT'].'/../includes/header.html';
include '../content/productinfo.html';
include $_SERVER['DOCUMENT_ROOT'].'/../includes/footer.html';

?>