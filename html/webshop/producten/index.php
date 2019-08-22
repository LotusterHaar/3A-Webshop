<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/generalfunctions.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/dbfunctions.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/user.php');

parse_str($_SERVER['QUERY_STRING'], $queryresolved);

if (isset($queryresolved['registreren'])) {
    header ("Location: /webshop/registreer");
    die();
}
$categorieid = 22; // Standaard bij Piano's beginnen
$aantal = 10; // Standaard aantal per pagina
$pagina = 1; //Standaard beginpagina
$totalpages = 1;
//print_r($_SERVER);
parse_str($_SERVER['QUERY_STRING'], $queryresolved);

if (isset($queryresolved['zoeken']) && !empty($queryresolved['zoeken'])) {
    $zoeken = $queryresolved['zoeken'];
}

if (isset($queryresolved['categorieid']) && !empty($queryresolved['categorieid'])) {
    //Get extra info about the category
    $database = db_con();
    $sql = "SELECT `CategoryID`,`CategoryName`,`MainCategoryID` FROM `category` WHERE Disabled!=1 AND CategoryID=:CategoryID;";
    $stmt = $database->prepare($sql);
    $stmt->execute([
        ':CategoryID' => $queryresolved['categorieid'],
    ]);
    $categorieinfo = $stmt->fetch(PDO::FETCH_ASSOC);
    $database = null;
    if (isset($categorieinfo['CategoryID']))
        $categorieid = $categorieinfo['CategoryID'];
    else
        $categorieid = 0;

    if (isset($categorieinfo['CategoryNaam']))
        $categorienaam = $categorieinfo['CategoryNaam'];
}

if (isset($queryresolved['aantal']) && !empty($queryresolved['aantal']) && is_numeric($queryresolved['aantal'])) {
    $aantal = $queryresolved['aantal'];
}

if (isset($queryresolved['pagina']) && !empty($queryresolved['pagina']) && is_numeric($queryresolved['pagina'])) {
    $pagina = $queryresolved['pagina'];
}

// Toevoegen aan Winkelwagen

if (isset($queryresolved['toevoegen']) && !empty($queryresolved['toevoegen']) && is_numeric($queryresolved['toevoegen']) && isLoggedin()) {

    toevoegen('toevoegen', $queryresolved['toevoegen']);
    if (isset($queryresolved['toevoegen']))
        unset ($queryresolved['toevoegen']);
}

// Toevoegen aan Reminder
if (isset($queryresolved['reminder']) && !empty($queryresolved['reminder']) && is_numeric($queryresolved['reminder']) && isLoggedin()) {

    toevoegen('reminder', $queryresolved['reminder']);
    if (isset($queryresolved['reminder']))
        unset ($queryresolved['reminder']);
}

include $_SERVER['DOCUMENT_ROOT'].'/../includes/header.html';
include '../content/productoverzicht.html';
include $_SERVER['DOCUMENT_ROOT'].'/../includes/footer.html';
?>