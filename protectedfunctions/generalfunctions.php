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

function toevoegen($soort,$productid) {
//Ophalen uit database
    echo ($soort.' product '.$productid);
    
    $database = db_con();
    $sql = "SELECT `ID`,`SKU`, `ProductName`, `Price`, `Stock`, `ReminderList` FROM `product` WHERE Disabled!=1 AND ID=".$productid.";";
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

    if ($articleinfo['Stock']>=1 && $soort == 'toevoegen') {
        $_SESSION['shoppingcart'][$articleinfo['ID']] = $bestelling;
        $_SESSION['infobox']='Artikel '.$articleinfo['SKU'].' - '.$articleinfo['ProductName']. ' toegevoegd aan winkelmand.';
    }
    else if ($articleinfo['Stock']<1 && $soort == 'toevoegen') {
        $_SESSION['errorbox']='Artikel '.$articleinfo['SKU'].' - '.$articleinfo['ProductName']. ' is niet op vooraad en kan helaas niet besteld worden. Toegevoegd aan je herinneringlijst.';
        remindertoevoegen($productid,$articleinfo['ReminderList']);
    }
    else if ($articleinfo['Stock']>=1 && $soort == 'reminder') {
        $_SESSION['shoppingcart'][$articleinfo['ID']] = $bestelling;
        $_SESSION['infobox']='Artikel '.$articleinfo['SKU'].' - '.$articleinfo['ProductName']. ' toegevoegd aan winkelmand.';
    }
        else if ($articleinfo['Stock']<1 && $soort == 'reminder') {
        $_SESSION['errorbox']='Artikel '.$articleinfo['SKU'].' - '.$articleinfo['ProductName']. ' is niet op vooraad en kan helaas niet besteld worden. Toegevoegd aan je herinneringlijst.';
        remindertoevoegen($productid,$articleinfo['ReminderList']);
    }
}

function remindertoevoegen($productid,$reminderlist)
{
    if (empty($reminderlist))
        $reminderlist = $_SESSION['ID'];
    else {
        $reminderarray = explode(",", $reminderlist);
        if (!in_array($_SESSION['ID'],$reminderarray))
            $reminderlist = $reminderlist . ',' . $_SESSION['ID'];
        else
            $_SESSION['errorbox']='Product staat al op je reminderlijst.';
            die();
    }

    //Ophalen uit database
    $database = db_con('rw');
    // Prepare an insert statement
    $sql = "UPDATE `product` SET ReminderList=:reminderlist WHERE ID=:productid";

    if ($stmt = $database->prepare($sql)) {
        if ($stmt->execute(
            [
                ':reminderlist' => $reminderlist,
                ':productid' => $productid,
            ]
        )) {
            //Success!
        } else {
            echo "Error: Er ging iets mis, probeer het later opnieuw.";
        }
    }
}

function reviewinfo($productid){
    $database = db_con();
    $sql = "SELECT AVG(Cijfer) AS AVGRATE FROM `review` WHERE ProductID=:productid";
    $stmt = $database->prepare($sql);
    $stmt->execute( [
        ':productid' => $productid,
    ]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $gemiddelde = $result['AVGRATE'];

    $totaal_aantal = 0;
    for($i=1; $i<=5; $i++)
    {
        $sql = "SELECT count(Cijfer) as Totaal from `review` where ProductID=:productid and Cijfer=:cijfer ";
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
    $review['gemiddelde'] = round($gemiddelde,2);

    return $review;
}