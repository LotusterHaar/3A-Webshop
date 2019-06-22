<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/generalfunctions.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/dbfunctions.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../protectedfunctions/user.php');

$database = db_con();
$sql = "SELECT * FROM `product`";
$stmt = $database->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
$database = null; #RESET database session

print ('<pre>');
foreach ($products as $product) {

    echo('<div class="flex-column">
              <div class="imageBoxSmall"><img src="/webshop/producten/images/' . $product['Picture_Big'] . '" alt="Instrument">');
    echo(' <h1>');
    echo($product['ProductName']);
    echo('</h1>');
    echo('<div class="priceline"><h2>');
    echo($product['Price']);
    echo('</h2>');
    echo(' <button class="shopping-cart-button"><span><a href="#toevoegen=' . $product['ID'] . '"><i
                                        class="fa fa-cart-plus" aria-hidden="true"></i></a></span></button>');
    echo('</div>  </div>  </div>');
}
print ('</pre>');

