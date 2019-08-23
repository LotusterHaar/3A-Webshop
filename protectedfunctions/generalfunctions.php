<?php #haha https://tuneshop.online/general
startprotectedsession();

function startprotectedsession()
{
    session_start();
    setlocale(LC_MONETARY, 'nl_NL');
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
        'Omschrijving' => $articleinfo['ProductName'],
        'Prijs' => $articleinfo['Price'],
    );

    if (($articleinfo['Stock']>=1 && $soort == 'toevoegen') && isset( $_SESSION['shoppingcart'][$articleinfo['ID']])) {
        $_SESSION['infobox']='Artikel '.$articleinfo['SKU'].' - '.$articleinfo['ProductName']. ' zat al in winkelmand, een extra toegevoegd.';
        $_SESSION['shoppingcart'][$articleinfo['ID']]['Aantal'] += 1;
    }
    else if (($articleinfo['Stock']>=1 && $soort == 'toevoegen') && !isset( $_SESSION['shoppingcart'][$articleinfo['ID']])) {
        $_SESSION['shoppingcart'][$articleinfo['ID']] = $bestelling;
        $_SESSION['infobox']='Artikel '.$articleinfo['SKU'].' - '.$articleinfo['ProductName']. ' toegevoegd aan winkelmand.';

    }
    else if ($articleinfo['Stock']<1 && $soort == 'toevoegen') {
        $_SESSION['errorbox']='Artikel '.$articleinfo['SKU'].' - '.$articleinfo['ProductName']. ' is niet op vooraad en kan helaas niet besteld worden. Toegevoegd aan je herinneringlijst.';
        remindertoevoegen($productid,$articleinfo['ReminderList']);
    }
    else if (($articleinfo['Stock']>=1 && $soort == 'reminder')&& isset( $_SESSION['shoppingcart'][$articleinfo['ID']])) {
        $_SESSION['shoppingcart'][$articleinfo['ID']]['Aantal'] += 1;
        $_SESSION['infobox']='Artikel '.$articleinfo['SKU'].' - '.$articleinfo['ProductName']. ' is toch op voorraad maar zat al in winkelmand een extra toegevoegd.';
    }
    else if (($articleinfo['Stock']>=1 && $soort == 'reminder')&& !isset( $_SESSION['shoppingcart'][$articleinfo['ID']])) {
        $_SESSION['shoppingcart'][$articleinfo['ID']] = $bestelling;
        $_SESSION['infobox']='Artikel '.$articleinfo['SKU'].' - '.$articleinfo['ProductName']. ' is toch op voorraad, toegevoegd aan winkelmand.';
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
            parse_str($_SERVER['QUERY_STRING'], $queryresolved);

            $querystring="?";
            if (isset($queryresolved['zoeken']) && !empty($queryresolved['zoeken']))
                $querystring = $querystring ."zoeken=".$queryresolved['zoeken']."&";

            if (isset($queryresolved['aantal']) && !empty($queryresolved['aantal']))
                $querystring = $querystring ."aantal=".$queryresolved['aantal']."&";

            if (isset($queryresolved['pagina']) && !empty($queryresolved['pagina']))
                $querystring = $querystring ."pagina=".$queryresolved['pagina']."&";

            if (isset($queryresolved['categorieid']) && !empty($queryresolved['categorieid']))
                $querystring = $querystring ."categorieid=".$queryresolved['categorieid']."&";

            if (isset($queryresolved['categorienaam']) && !empty($queryresolved['categorienaam']))
                $querystring = $querystring . "categorienaam=".$queryresolved['categorienaam'];
            else
                $querystring=substr($querystring, 0, -1); // remove last characther

            header ("Location: /webshop/producten/".$querystring);
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
    $review['gemaakt']= 0;

    $database = db_con();
    $sql = "SELECT AVG(Score) AS AVGRATE FROM `review` WHERE ProductID=:productid";
    $stmt = $database->prepare($sql);
    $stmt->execute( [
        ':productid' => $productid,
    ]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $gemiddelde = $result['AVGRATE'];

    if (isLoggedin())
    {
        $sql = "SELECT count(1) AS Reviewgemaakt FROM `review` WHERE ProductID=:productid AND UserID=:userid";
        $stmt = $database->prepare($sql);
        $stmt->execute( [
            ':productid' => $productid,
            ':userid' => $_SESSION['ID'],
        ]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result['Reviewgemaakt']>0)
            $review['gemaakt'] = 1;
    }

    $totaal_aantal = 0;
    for($i=1; $i<=5; $i++)
    {
        $sql = "SELECT count(Score) as Totaal from `review` where ProductID=:productid and Score=:score";
        $stmt = $database->prepare($sql);
        $stmt->execute( [
            ':productid' => $productid,
            ':score' => $i,
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

function berekentotal() {
    $total =0;
    foreach ($_SESSION['shoppingcart'] as $artikel) {
        //Get extra info about the category
        $database = db_con();
        $sql = "SELECT `Price` FROM `product` WHERE Disabled!=1 AND ID=:id;";
        $stmt = $database->prepare($sql);
        $stmt->execute([
            ':id' => $artikel['ID'],
        ]);
        $artikelinfo = $stmt->fetch(PDO::FETCH_ASSOC);
        $database = null;

        $total += $artikel['Aantal'] * $artikelinfo['Price'];
    }

    return $total;
}