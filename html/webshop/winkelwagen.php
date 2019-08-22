<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/../protectedfunctions/generalfunctions.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../protectedfunctions/dbfunctions.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../protectedfunctions/user.php');

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

function savecart()
{
//Ophalen uit database
    $database_rw = db_con('rw');
// Prepare an insert statement
    $sql = "INSERT INTO `orders` (UserID, Date, Cart, Total) VALUES
                                    (:userid, :data, :cart, :total)";

    if ($stmt = $database_rw->prepare($sql)) {
        if ($stmt->execute(
            [
                ':userid' => $_SESSION['ID'],
                ':data' => date("Y-m-d"),
                ':cart' => serialize($_SESSION['shoppingcart']),
                ':total' => 123.53,
            ]
        )) {
            //Success!
            $_SESSION['infobox'] = "Winkelwagenopgeslagen";
            unset($_SESSION['shoppingcart']);
        } else {
            $_SESSION['errorbox'] = "Erg ging iets mis bij het toevoegen van de review";
        }
    }
}

include $_SERVER['DOCUMENT_ROOT'].'/../includes/header.html';

if (isLoggedin())
    include './content/winkelwagen.html';
else
    include $_SERVER['DOCUMENT_ROOT'].'/../content/over-ons.html';
include $_SERVER['DOCUMENT_ROOT'].'/../includes/footer.html';
?>