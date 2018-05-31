<?php
/**
 * Created by PhpStorm.
 * User: lotus
 * Date: 31/05/2018
 * Time: 20:47
 */

session_start();
$_SESSION["loggedIn"]= true;
$_SESSION["userName"]= "Lotus";

header('Location: start.php');
