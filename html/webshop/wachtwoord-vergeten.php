<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/generalfunctions.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/dbfunctions.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/user.php');

if ($_SERVER['REQUEST_METHOD']=="POST" && !isLoggedin()) {
    $database = db_con();
    $database_rw = db_con('rw');

    unset ($_SESSION['Registerform-values']);
    unset ($_SESSION['registration-error']);

    $_SESSION['Registerform-values'] = array();
    // Fill Registerform-values
    foreach ($_POST as $key => $value) {
        $_SESSION['Registerform-values'] = array_push_assoc($_SESSION['Registerform-values'], $key, $value);
    }

    // Validate username
    if (empty($_SESSION['Registerform-values']['EmailRecovery'])) {
        $_SESSION['registration-error'] = "Voer een E-Mail adres in"; //  Browser should check this but just in case
        toonRedirectHeader();
    } else {
        $_SESSION['infobox'] = "Als u mail adres is geregistreerd zal er (een keer per 24 uur) een recovery token gestuurd worden (check ook uw spambox)";

        // Prepare a select statement
        $sql = "SELECT ID,EMail, Token, RecoveryDate FROM user WHERE Email = :Email and Deleted!=1;";

        if ($stmt = $database->prepare($sql)) {
            // Attempt to execute the prepared statement
            if ($stmt->execute(['Email' => $_SESSION['Registerform-values']['EmailRecovery']])) {
                if ($stmt->rowCount() == 1) {
                    $recovery = $stmt->fetch(PDO::FETCH_ASSOC);
                    $userid = $recovery['ID'];
                    $email = $recovery['EMail'];
                    if (empty($recovery['RecoveryDate']) || (!empty($recovery['RecoveryDate']) && mktime() >= strtotime('+1 day', $recovery['RecoveryDate']))) {
                        $recoverydate = mktime();
                        $token = md5(uniqid('', true));

                        // Prepare an insert statement
                        $sql = "UPDATE `user` SET Token=:token, RecoveryDate=:recoverydate WHERE `ID` = :id";

                        if ($stmt2 = $database_rw->prepare($sql)) {

                            if ($stmt2->execute(
                                [
                                    ':token' => $token,
                                    ':recoverydate' => $recoverydate,
                                    ':id' => $userid,
                                ]
                            )) {
                                //Success!
                                echo("GELUKT!");

                                // SEND MAIL WITH TOKEN
                                $headers = "From: support@tuneshop.online\r\n";
                                $headers .= "Reply-To:  noreply@tuneshop.online\r\n";
                                $headers .= "MIME-Version: 1.0\r\n";
                                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                                $message = '<html><body>';
                                $message .= '<img src="http://localhost/images/logo_tuneshop_aqua.png" alt="Tuneshop Logo" />';


                                $message .= '<A HREF="localhost/webshop/wachtwoord-vergeten?token=' . $token . "Klik op deze link om het wachtwoord te resetten</A>";
                                $message .= "</body></html>";
                                if (!mail($email, "Tuneshop.online Wachtwoord Vergeten", $message, $headers)) {
                                    $_SESSION['registration-error']= 'Er is een probleem opgetreden met versturen van de wachtwoord vergeten mail.';
                                }
                            }


                            unset ($_SESSION['Registerform-values']);

                            // Redirect to login page
                            header("location: /");
                        } else {
                            echo "Error: Er ging iets mis, probeer het later.";
                        }
                        // Close statement
                        unset($stmt);

                        // Close connection
                        unset($database);
                        $database = null; #RESET database session

                    }

                }


            }
        }


//        if (isset($_SESSION['infobox']) && !empty($_SESSION['infobox'])|| isset($_SESSION['registration-error']) && !empty($_SESSION['registration-error'])) {
//            toonRedirectHeader();
//        }

        // Close statement
        unset($stmt);
    }
    // Close connection
    unset($database);
    $database = null; #RESET database session

    // Close connection
    unset($database_rw);
    $database_rw = null; #RESET database session

}
    include $_SERVER['DOCUMENT_ROOT'].'/../includes/header.html';
    include './content/wachtwoord-vergeten.html';


    include $_SERVER['DOCUMENT_ROOT'].'/../includes/footer.html';
    //Cleanup old errors
    unset ($_SESSION['registration-error']);
    unset ($_SESSION['Registerform-values']);


function toonRedirectHeader(){
    unset($database);
    $database=null; #RESET database session

    if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']))
#echo ('--');
        header ("Location: ".$_SERVER['HTTP_REFERER']);
    else
#echo ('--');
        header ("Location: /");
    exit;
}

function array_push_assoc($array, $key, $value){
if (!empty(trim($value)))
    $array[$key] = trim($value);
return $array;
}

function checkIfSetAndShow($key)
{
    if (isset($_SESSION['Registerform-values'][$key]) && !empty($_SESSION['Registerform-values'][$key]))
            echo $_SESSION['Registerform-values'][$key];
}
?>