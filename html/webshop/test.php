<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/generalfunctions.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/user.php');

print ("<PRE>");
print_r($_SERVER);

print ("Session:");
    print_r($_SESSION);



?>