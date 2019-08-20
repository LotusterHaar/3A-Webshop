<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/generalfunctions.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/dbfunctions.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/user.php');
#reset all old session info
#resetsession();

#Browser already checks this but just to be sure
if (isset($_REQUEST['username']) && !empty($_REQUEST['username']))
{
    $username=$_REQUEST['username'];
}
else
{
    $_SESSION['error']="Geen gebruikersnaam opgegeven";
}
if (isset($_REQUEST['password']) && !empty($_REQUEST['password']))
{
    $password=$_REQUEST['password'];
}
else
{
    $_SESSION['error']="Geen wachtwoord opgegeven";
}
if (isset($_REQUEST['remember']) && $_REQUEST['remember']=='on')
    $_SESSION['forgetsession']=false;
else
    $_SESSION['forgetsession']=true;
if (isset($_SESSION['error']) && !empty($_SESSION['error']))
{
    toonRedirectHeader();
}
$database = db_con();
$sql = "SELECT * FROM User WHERE UserName = :username and Deleted=0";
$stmt = $database->prepare($sql);
$stmt->execute(['username' => $username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$database=null; #RESET database session
if ($user && password_verify($password, $user['Password']))
{
    unset($_SESSION['loginform']);
    foreach ($user as $key => $value){
        if ($key !== 'Password' && !empty($value))
            $_SESSION[$key]=$value; #Save all database values without Password
    }
    if (!isset($_SESSION['Prefix']))
        $_SESSION['Prefix'] = '';
}
else
{
    $_SESSION['error']="Gebruikersnaam of Wachtwoord onjuist";
    $_SESSION['loginform']=$username;
}
toonRedirectHeader();

function toonRedirectHeader(){
    if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']))
#echo ('--');
        header ("Location: ".$_SERVER['HTTP_REFERER']);
    else
#echo ('--');
        header ("Location: /");
    exit;
}
?>