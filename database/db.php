<?php
namespace App\Database;
require(__DIR__ . "/PDO.class.php");
define('DBHost', '127.0.0.1');
define('DBPort', 3306);
define('DBName', 'infostart');
define('DBUser', 'root');
define('DBPassword', '12345678');
$db = new DB(DBHost, DBPort, DBName, DBUser, DBPassword);


?>