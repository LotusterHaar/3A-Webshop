<?php
require_once('../protectedfunctions/generalfunctions.php');
require_once('../protectedfunctions/dbfunctions.php');

if($_SERVER['REQUEST_METHOD']=="POST"){
    $database = db_con('rw');
    //$_SESSION['registration-error'] = "test";
    //print_r($_SERVER);
    //die();
    unset ($_SESSION['Registerform-values']);
    unset ($_SESSION['registration-error']);

    // Fill Registerform-values
    foreach($_POST as $key => $value)
        $_SESSION['Registerform-values'] = array_push_assoc($_SESSION['Registerform-values'], $key, $value );

    // Validate username
    if(empty($_SESSION['Registerform-values']['username'])){
        $_SESSION['registration-error'] = "Voer een gebruikersnaam in"; //  Browser should check this but just in case
        toonRedirectHeader();
    } else{
        $_SESSION['registration-error'] = "Voer een gebruikersnaam in"; //  Browser should check this but just in case
        // Prepare a select statement
        $sql = "SELECT ID FROM user WHERE UserName = :username and Deleted!=1;";

        if($stmt = $database->prepare($sql)){
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Attempt to execute the prepared statement
            if($stmt->execute(['username' => $_SESSION['Registerform-values']['username']])){
                if($stmt->rowCount() == 1){
                    $_SESSION['registration-error'] = "Deze gebruikersnaam is al bezet";
                } else{
                    $username = $_SESSION['Registerform-values']['username'];
                }
            } else{
                $_SESSION['registration-error'] = "Er ging iets fout bij het aanmaken van de gebruiker, probeer het later nog eens.";
            }
        }

        if (isset($_SESSION['registration-error']) && !empty($_SESSION['registration-error']))
        {
            toonRedirectHeader();
        }

        // Close statement
        unset($stmt);
    }

    // Validate password
    if(empty($_SESSION['Registerform-values']['password'])){
        $_SESSION['registration-error'] = "Vul een wachtwoord in";
    } elseif(strlen($_SESSION['Registerform-values']['password']) < 6){
        $_SESSION['registration-error'] = "Het wachtwoord moet minstens 6 karakters hebben";
    } else{
        $password = $_SESSION['Registerform-values']['password'];
    }

    // Validate confirm password
    if(empty($_SESSION['Registerform-values']['confirm-password'])){
        $_SESSION['Registerform-values']= "Bevestig het wachtwoord";
    } else{
        $confirm_password = $_SESSION['Registerform-values']['confirm-password'];
        if($password != $confirm_password){
            $_SESSION['registration-error'] = "Het wachtwoord komt niet overeen.";
        }
    }

    print_r($_SESSION);
    die();
    // Check input errors before inserting in database
    if(empty($_SESSION['registration-error']) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO `user` (`UserName`, `FirstName`, `Prefix`, `Surname`, `Adress`, `HouseNumber`, `ZipCode`, `City`, `PhoneNumber`, `E-Mail`, `Gender`, `Avatar`, `Password`, `Deleted`) VALUES
        (username, :firstname, :prefix, :surname, :address`, :housenumber`, :zipcode, :city, :phonenumber, :email, :gender, :avatar, :password, :deleted)";
        $sql = "INSERT INTO user (username, password) VALUES (:username, :password)";

        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            echo ('Password: '.$_REQUEST['password'].' = ' . password_hash($_REQUEST['password'],PASSWORD_DEFAULT));
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                //Success!
                // Redirect to login page
                unset ($_SESSION['Registerform-values']);
                header("location: index.php");
            } else{
                echo "Error: Er ging iets mis, probeer het later.";
            }
        }

        // Close statement
        unset($stmt);
    }

    // Close connection
    unset($database);
    $database=null; #RESET database session
}
else {
    include '../includes/header.html';
    include './content/registratiepagina.html';
    include '../includes/footer.html';
    //Cleanup
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
