<?php 

define('DBHost', 'localhost');
define('DBPort', 3306);
define('DBName', 'hemal_project');
define('DBUser', 'root');
define('DBPassword', '618643');
require( __DIR__ . "/PDO.class.php");
$DB = new Db(DBHost, DBPort, DBName, DBUser, DBPassword);


?>