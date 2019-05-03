<?php

function db_con($arg = NULL)
{
    if (isset($arg) && $arg == 'rw') {
        $DB_user = "tuneshop_rw";
        $DB_pass = "qaBKCjAm77ApHv9A";
    } else {
        $DB_user = "tuneshop_ro";
        $DB_pass = "VQFh52SR93yYcHPh";
    }

    $DB_host = "localhost";
    $DB_name = "tuneshop";

    try {
        $DB = new PDO("mysql:host={$DB_host};dbname={$DB_name}", $DB_user, $DB_pass);
        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DB->exec("SET CHARACTER SET utf8");
    } catch (PDOException $exception) {
        echo 'ERROR connecting to the database: ' . $exception->getMessage();
    }
    return $DB;

}

?>