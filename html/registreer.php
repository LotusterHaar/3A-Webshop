<?php
require_once('../protectedfunctions/generalfunctions.php');
require_once('../protectedfunctions/dbfunctions.php');

if($_SERVER['REQUEST_METHOD']=="POST"){
    $database = db_con('rw');
    //$_SESSION['registration-error'] = "test";
    //print_r($_SERVER);
    //die();
    echo ('<PRE>');
    $_SESSION['Registerform-values'] = array();
    foreach($_POST as $key => $value) {
        echo "POST parameter '$key' has '$value'";
        $_SESSION['Registerform-values'] = array_push_assoc($_SESSION['Registerform-values'], $key, $value );
    }

    // Validate username
    if(empty(trim($_POST['username']))){
        $_SESSION['registration-error'] = "Voer een gebruikersnaam in"; //  Browser should check this but just in case
        toonRedirectHeader();
    } else{
        $_SESSION['registration-error'] = "Voer een gebruikersnaam in"; //  Browser should check this but just in case
        // Prepare a select statement
        $sql = "SELECT ID FROM user WHERE UserName = :username and Deleted!=1;";

        if($stmt = $database->prepare($sql)){
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Attempt to execute the prepared statement
            if($stmt->execute(['username' => $_POST["username"]])){
                if($stmt->rowCount() == 1){
                    $_SESSION['registration-error'] = "Deze gebruikersnaam is al bezet";
                } else{
                    $username = trim($_POST["username"]);
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
    if(empty(trim($_POST["password"]))){
        $password_err = "Vul een wachtwoord in";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Het wachtwoord moet minstens 6 karakters hebben";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Bevestig het wachtwoord";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Het wachtwoord komt niet overeen.";
        }
    }

    // Check input errors before inserting in database
    if(empty($_SESSION['registration-error']) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO `user` (`UserName`, `FirstName`, `Prefix`, `Surname`, `Adress`, `HouseNumber`, `ZipCode`, `City`, `PhoneNumber`, `E-Mail`, `Gender`, `Avatar`, `Password`, `Deleted`) VALUES
        (username, :firstname, :prefix, :surname, :address`, :housenumber`, :zipcode, :city, :phonenumber, :email, :gender, :avatar, :password, :deleted)";
        $sql = "INSERT INTO user (username, password) VALUES (:username, :password)";

        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: login.php");
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
$array[$key] = $value;
return $array;
}

function checkIfSetAndShow($key)
{
    if (isset($key) && !empty($key))
        echo $key;
}
?>
