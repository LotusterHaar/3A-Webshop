<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/generalfunctions.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/dbfunctions.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/user.php');

parse_str($_SERVER['QUERY_STRING'], $queryresolved);
if (isset($queryresolved['notify']) && !empty($queryresolved['notify']) && isLoggedin()) {
    $notifyid= $queryresolved['notify'];
    print_r($_SESSION);
    echo ('Notify');

    toevoegen('reminder',$notifyid);

    header('Location: /webshop/producten/');
    die();
}

if (isset($queryresolved['id']) && !empty($queryresolved['id'])) {
    $artikelid = $queryresolved['id'];

    //Get extra info about the category
    $database = db_con();
    $sql = "SELECT * FROM `product` WHERE Disabled!=1 AND ID=:productid";
    $stmt = $database->prepare($sql);
    $stmt->execute([
        ':productid' => $artikelid,
    ]);
    $artikel = $stmt->fetch(PDO::FETCH_ASSOC);
    $database = null;

    if ($artikel['Stock'] > 0) {
        $opvoorraad = 'Ja';
    } else {
        $opvoorraad = 'Nee';
    }

    if (empty($artikel)) {
        header('Location: /webshop/producten/');
        die();
    }
}

include $_SERVER['DOCUMENT_ROOT'].'/../includes/header.html';
include '../content/productpagina.html';
include $_SERVER['DOCUMENT_ROOT'].'/../includes/footer.html';

?>