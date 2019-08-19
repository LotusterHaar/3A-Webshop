<?php
include $_SERVER['DOCUMENT_ROOT'].'/../includes/header.html';
if ($_SERVER['REQUEST_METHOD']=='POST' && isLoggedin()) {
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
            $sql = "SELECT ReviewID FROM Review WHERE ProductID = :productID AND UserID = :userID;";

            if ($stmt = $database->prepare($sql)) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                // Attempt to execute the prepared statement
                if ($stmt->execute([
                    'productID' => $productid,
                    'userID' => $_SESSION['ID'],
                ])) {
                    if ($stmt->rowCount() == 1) {
                        $_SESSION['errorbox'] = "Deze review is al gemaakt, je kan als gebruiker maar een keer je review opgeven per product";
                    } else {
                        toevoegenreview();
                    }
                } else {
                    $_SESSION['errorbox'] = "Erg ging iets mis bij controleren van de review";
                }
            }

            if (isset($_SESSION['errorbox']) && !empty($_SESSION['errorbox'])) {
                include '../content/reviewpagina.html';
                include $_SERVER['DOCUMENT_ROOT'] . '/../includes/footer.html';
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
            echo ('Toevoegenreview');
            parse_str($_SERVER['QUERY_STRING'], $queryresolved);
            if (isset($queryresolved['id']) && !empty($queryresolved['id'])) {
                $productid = $queryresolved['id'];

                //Ophalen uit database
                $database_rw = db_con('rw');
                // Prepare an insert statement
                $sql = "INSERT INTO `review` (ProductID, UserID, Cijfer, Review, Datum) VALUES
                                            (:productid, :userid, :cijfer, :review, :datum)";
                echo ($sql);
                if ($stmt = $database_rw->prepare($sql)) {
                    if ($stmt->execute(
                        [
                            ':productid' => $productid,
                            ':userid' => $_SESSION['ID'],
                            ':cijfer' => $_POST['cijfer'],
                            ':review' => $_POST['review'],
                            ':datum' => date("Y-m-d"),
                        ]
                    )) {
                        //Success!
                    } else {
                        $_SESSION['errorbox'] = "Erg ging iets mis bij het toevoegen van de review";
                    }
                }
            }
        }

?>

