<?php

parse_str($_SERVER['QUERY_STRING'], $queryresolved);
if (isset($queryresolved['verwijderen']) && !empty($queryresolved['verwijderen'])) {
    $artikelid=$queryresolved['verwijderen'];

    if (isset($_SESSION['shoppingcart'][$artikelid]))
    {
        unset($_SESSION['shoppingcart'][$artikelid]);
        $_SESSION['infobox'] = 'Artikel uit winkelwagen verwijderd';
    }
    else
    {
        $_SESSION['errorbox'] = 'Kan artikel '.$artikelid.' niet uit winkelwagen verwijderen. Artikel niet gevonden';
    }


}

include $_SERVER['DOCUMENT_ROOT'].'/../includes/header.html';

if (isLoggedin())
    include './content/winkelwagen.html';
else
    include $_SERVER['DOCUMENT_ROOT'].'/../content/over-ons.html';
include $_SERVER['DOCUMENT_ROOT'].'/../includes/footer.html';
?>