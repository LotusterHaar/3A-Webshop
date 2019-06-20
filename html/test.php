<?php
require_once('../protectedfunctions/generalfunctions.php');
require_once('../protectedfunctions/dbfunctions.php');
$database = db_con();
$database2 = db_con();
$sql = "SELECT `CategoryName`, `MainCategoryID` FROM `maincategory` ORDER BY `CategoryOrder` ASC";
$stmt = $database->prepare($sql);
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
$database=null; #RESET database session

print ('<pre>');
foreach ($categories as $categoryName) {
    print ('Resolven van categorie: '.$categoryName['MainCategoryID']."\r\n");
    print_r($categoryName);
    $sqlQuery = "SELECT * FROM `category` WHERE `MainCategoryID`=:categoryID ORDER BY  `CategoryOrder` ASC";
    $query = $database2->prepare($sqlQuery);
    $query->execute(['categoryID' => $categoryName['MainCategoryID']]);
    print ('Subcategorie: '."\r\n");
    $subcategory = $query->fetchAll(PDO::FETCH_ASSOC);
    print_r($subcategory);
}
print ('</pre>');
