<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/generalfunctions.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/dbfunctions.php');

$categorieID = str_replace('/webshop/productpagina-', '', $_SERVER['REQUEST_URI']);

if (is_numeric($categorieID))
{
    echo $categorieID;
    print_r($_SESSION);
}
else { // Categorie ID klopt niet (ga naar hoofdpagina)
    header ("Location: /"); 
}


?>