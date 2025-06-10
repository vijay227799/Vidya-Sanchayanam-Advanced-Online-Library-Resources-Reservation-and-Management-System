<?php 
// DB credentials.
define('DB_HOST','sql12.freesqldatabase.com');
define('DB_USER','sql12784015');
define('DB_PASS','6AYKI1Zv75');
define('DB_NAME','sql12784015');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>