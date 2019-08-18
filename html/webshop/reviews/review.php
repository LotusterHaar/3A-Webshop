<?php
include $_SERVER['DOCUMENT_ROOT'].'/../includes/header.html';
if ($_SERVER['REQUEST_METHOD']=='POST' && isLoggedin()) {
    echo ('<PRE>');
    print_r($_SERVER);
    print_r($_SESSION);
    print_r($_POST);
    echo ('</PRE>');

    parse_str($_SERVER['QUERY_STRING'], $queryresolved);

    if (isset($queryresolved['id']) && !empty($queryresolved['id'])) {
        $productid = $queryresolved['id'];

        //Bestaat review al?
        $database = db_con();
        $database_rw = db_con('rw');

        // Validate username
        if (empty($_POST['review'])) {
            $_SESSION['errorbox'] = "Er is geen review ingevuld"; //  Browser should check this but just in case
            toonRedirectHeader();
        } else {
            // Prepare a select statement
            $sql = "SELECT ReviewID FROM Review WHERE ProductID = :productID AND UserID = :userID);";

            if ($stmt = $database->prepare($sql)) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                // Attempt to execute the prepared statement
                if ($stmt->execute(['ProductID' => $productid,
                    'UserID' => $_SESSION['ID'],
                ])) {
                    if ($stmt->rowCount() == 1) {
                        $_SESSION['errorbox'] = "Deze review is al gemaakt";
                    } else {
                        toevoegenreview();
                    }
                } else {
                    $_SESSION['registration-error'] = "Er ging iets fout bij het aanmaken van de gebruiker, probeer het later nog eens.";
                }
            }

            if (isset($_SESSION['registration-error']) && !empty($_SESSION['registration-error'])) {
                toonRedirectHeader();
                die();
            }

        }
    }
  }

        if (isLoggedin())
            include '../content/reviewpagina.html';
        else
            include $_SERVER['DOCUMENT_ROOT'] . '../content/over-ons.html';


        include $_SERVER['DOCUMENT_ROOT'] . '/../includes/footer.html';

        function toevoegenreview()
        {
        }

?>

