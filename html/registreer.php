<?php
require_once('../protectedfunctions/generalfunctions.php');
require_once('../protectedfunctions/dbfunctions.php');

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_error = $password_error = $confirm_password_error = "";

include '../includes/header.html';
include './registratiepagina.html';
include '../includes/footer.html';

