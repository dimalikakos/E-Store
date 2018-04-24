<?php
$DB_HOST = "";
$DB_USER = "";
$DB_PASS = "";
$DB_NAME = "";


try {
    $db = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);
// set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}