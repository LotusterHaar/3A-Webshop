<?php #haha https://tuneshop.online/general
startprotectedsession();

function startprotectedsession()
{
    session_start();
}

function fullydestroysession()
{
#https://doc.bccnsoft.com/docs/php-docs-7-en/function.session-destroy.html

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
// Unset all of the session variables.
    $_SESSION = array();

// Finally, destroy the session.
    session_destroy();
}

function resetsession()
{
    $_SESSION = array();
}

function remindertoevoegen($reminderid) {
    //Ophalen uit database
    $database = db_con();
    $sql = "SELECT `ID`,`SKU`, `ProductName`, `Price`, `Stock` FROM `product` WHERE Disabled!=1 AND ID=".$reminderid.";";
    $stmt = $database->prepare($sql);
    $stmt->execute();
    $articleinfo = $stmt->fetch(PDO::FETCH_ASSOC);
    $database=null;
    $bestelling = array(
        'ID' => $articleinfo['ID'],
        'Aantal' => 1,
        'SKU' => $articleinfo['SKU'],
        'Omschrijving' => $articleinfo['ID'].'-'.$articleinfo['ProductName'],
        'Prijs' => $articleinfo['Price'],
    );

    if ($articleinfo['Stock']>=1) {
        $_SESSION['shoppingcart'][$articleinfo['ID']] = $bestelling;
        $_SESSION['infobox']='Artikel '.$articleinfo['SKU'].' - '.$articleinfo['ProductName']. ' is toch op voorraad toegevoegd aan winkelwagen.';
    }
    else {
        $_SESSION['infobox']='Artikel '.$articleinfo['SKU'].' - '.$articleinfo['ProductName']. ' toegevoegd aan je herinneringlijst.';
    }
}

function reviewinfo($productid){
    $database = db_con();
    $sql = "SELECT AVG(BeoordelingsCijfer) AS AVGRATE FROM `review` WHERE ProductID=:productid";
    $stmt = $database->prepare($sql);
    $stmt->execute( [
        ':productid' => $productid,
    ]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $gemiddelde = $result['AVGRATE'];

    $totaal_aantal = 0;
    for($i=1; $i<=5; $i++)
    {
        $sql = "SELECT count(BeoordelingsCijfer) as Totaal from `review` where ProductID=:productid and BeoordelingsCijfer=:cijfer ";
        $stmt = $database->prepare($sql);
        $stmt->execute( [
            ':productid' => $productid,
            ':cijfer' => $i,
        ]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $product[$i]=$result[0]['Totaal'];
        $totaal_aantal += $product[$i];
    }
    $review['totaal_aantal'] = $totaal_aantal;
    $review['product'] = $product;
    $review['gemiddelde'] = $gemiddelde;

    return $review;
}