<?php
/**
 * Created by PhpStorm.
 * User: lotus
 * Date: 18/06/2018
 * Time: 07:36
 */

$groenten = ["asperge", "aubergine", "broccoli", "witlof"];
$fruit = ["aardbeien", "kersen", "peren"];
$vlees = ["biefstuk", "kipfilet", "varkensvlees", "eendenborst"];

$eten = ["groenten" => $groenten, "fruit" => $fruit, "vlees" => $vlees];

echo "<h1>Mijn favorieten</h1>";
$keys = array_keys($eten);
for ($i = 0; $i < count($eten); $i++) {
    echo "<h2>" . $keys[$i] . "</h2>";
    foreach ($eten[$keys[$i]] as $key => $value) {
        echo "<li>". $value . "</li>";
    }
}
  
