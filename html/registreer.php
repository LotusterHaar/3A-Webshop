<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/generalfunctions.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/dbfunctions.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/user.php');

if($_SERVER['REQUEST_METHOD']=="POST") {
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
    if (empty($_SESSION['Registerform-values']['username'])) {
        $_SESSION['registration-error'] = "Voer een gebruikersnaam in"; //  Browser should check this but just in case
        toonRedirectHeader();
    } else {
        // Prepare a select statement
        $sql = "SELECT ID FROM user WHERE UserName = :username and Deleted!=1;";

        if ($stmt = $database->prepare($sql)) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Attempt to execute the prepared statement
            if ($stmt->execute(['username' => $_SESSION['Registerform-values']['username']])) {
                if ($stmt->rowCount() == 1) {
                    $_SESSION['registration-error'] = "Deze gebruikersnaam is al bezet";
                } else {
                    $username = $_SESSION['Registerform-values']['username'];
                }
            } else {
                $_SESSION['registration-error'] = "Er ging iets fout bij het aanmaken van de gebruiker, probeer het later nog eens.";
            }
        }

        if (isset($_SESSION['registration-error']) && !empty($_SESSION['registration-error'])) {
            toonRedirectHeader();
        }

        // Close statement
        unset($stmt);
    }

    // Validate password
    if (empty($_SESSION['Registerform-values']['password'])) {
        $_SESSION['registration-error'] = "Vul een wachtwoord in";
        toonRedirectHeader();
    } elseif (strlen($_SESSION['Registerform-values']['password']) < 6) {
        $_SESSION['registration-error'] = "Het wachtwoord moet minstens 6 karakters hebben";
        toonRedirectHeader();
    } else {
        $password = $_SESSION['Registerform-values']['password'];
    }

    // Validate confirm password
    if (empty($_SESSION['Registerform-values']['confirm_password'])) {
        $_SESSION['Registerform-values'] = "Bevestig het wachtwoord";
        toonRedirectHeader();
    } else {
        $confirm_password = $_SESSION['Registerform-values']['confirm_password'];
        if ($password != $confirm_password) {
            $_SESSION['registration-error'] = "Het wachtwoord komt niet overeen.";
            toonRedirectHeader();
        }
    }

    // Check input errors before inserting in database
    if (empty($_SESSION['registration-error'])) {

        // Prepare an insert statement
        $sql = "INSERT INTO `user` (UserName, FirstName, Prefix, Surname, Address, HouseNumber, ZipCode, City, PhoneNumber, EMail, Gender, Avatar, Password) VALUES
        (:username, :firstname, :prefix, :surname, :address, :housenumber, :zipcode, :city, :phonenumber, :email, :gender, :avatar, :password)";

        if ($stmt = $database_rw->prepare($sql)) {
            $_SESSION['Registerform-values']['password'] = password_hash($_SESSION['Registerform-values']['password'], PASSWORD_DEFAULT);
            if ($stmt->execute(
                [
                    ':username' => $_SESSION['Registerform-values']['username'],
                    ':firstname' => $_SESSION['Registerform-values']['firstname'],
                    ':prefix' => $_SESSION['Registerform-values']['prefix'],
                    ':surname' => $_SESSION['Registerform-values']['surname'],
                    ':address' => $_SESSION['Registerform-values']['address'],
                    ':housenumber' => $_SESSION['Registerform-values']['housenumber'],
                    ':zipcode' => $_SESSION['Registerform-values']['zipcode'],
                    ':city' => $_SESSION['Registerform-values']['city'],
                    ':phonenumber' => $_SESSION['Registerform-values']['phonenumber'],
                    ':email' => $_SESSION['Registerform-values']['email'],
                    ':gender' => $_SESSION['Registerform-values']['gender'],
                    ':avatar' => $_SESSION['Registerform-values']['username'],
                    ':password' => $_SESSION['Registerform-values']['password'],
                ]
            )) {
                //Success!
                // Redirect to login page
                unset ($_SESSION['Registerform-values']);
                header("location: /);
            } else {
                echo "Error: Er ging iets mis, probeer het later.";
            }
        }

        // Close statement
        unset($stmt);


        // Close connection
        unset($database);
        $database = null; #RESET database session
    }
}
else {
    include $_SERVER['DOCUMENT_ROOT'].'/../includes/header.html';
    include './content/registratiepagina.html';
    include $_SERVER['DOCUMENT_ROOT'].'/../includes/footer.html';
    //Cleanup old errors
    unset ($_SESSION['registration-error']);
    unset ($_SESSION['Registerform-values']);
}

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