<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/../protectedfunctions/generalfunctions.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../protectedfunctions/dbfunctions.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../protectedfunctions/user.php');

if ($_SERVER['REQUEST_METHOD']=="POST" && isLoggedin()) {

    if (isset($_POST['verwijder'])) {
        $verwijderid = $_POST['verwijder'];
        unset($_POST['verwijder']);

        if (isset($_SESSION['shoppingcart'][$verwijderid])) {
            unset($_SESSION['shoppingcart'][$verwijderid]);
            $_SESSION['infobox'] = 'Artikel uit winkelwagen verwijderd';
        } else {
            $_SESSION['errorbox'] = 'Kan artikel ' . $verwijderid . ' niet uit winkelwagen verwijderen. Artikel niet gevonden';
        }
    }

    if (isset($_POST['herbereken'])) {
        unset($_POST['herbereken']);

        foreach ($_POST as $cartid => $number) {
            if (isset($_SESSION['shoppingcart'][$cartid]))
                $_SESSION['shoppingcart'][$cartid]['Aantal'] = $number;
        }
    }

    if (isset($_POST['afrekenen'])) {
        unset($_POST['afrekenen']);
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
                $_SESSION['infobox'] = "Order aangemaakt als betaald (ideal)";
                unset($_SESSION['shoppingcart']);
            } else {
                $_SESSION['errorbox'] = "Erg ging iets mis bij het toevoegen van de review";
            }
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