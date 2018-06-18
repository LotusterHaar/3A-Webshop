<?php
/*
$users = [
    [
        'username' => 'alex',
        'email' => 'alex@codecourse.com'
    ],
    ['username' => 'billy',
        'email' => 'billy@codecourse.com'
    ],
]; 

echo '<pre>', var_dump($users), '</pre>';


echo "Dit is " .$users[0]['email']


*/

echo "<ul>";
$myFavoriteMusic = ["Imagine Dragons", "Ed Sheeran", "Snow Patrol", "Coldplay", "Green Day", "Muse"];

for ($i = 0; $i< count($myFavoriteMusic); $i++){
    echo "<li>".$myFavoriteMusic[$i]."</li>";
}
echo"</ul>";

?>


