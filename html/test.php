<?php
require_once('../protectedfunctions/generalfunctions.php');
require_once('../protectedfunctions/dbfunctions.php');
$database = db_con();
$sql = "SELECT `CategoryName` FROM `maincategory` ORDER BY `CategoryOrder` ASC";
$stmt = $database->prepare($sql);
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
$database=null; #RESET database session
print ('<pre>');
print_r($categories);
print ('</pre>');