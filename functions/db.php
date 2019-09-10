<?php 

$user   = "root";
$host   = "localhost";
$pass   = "?>bismillah";
$dbname = "ubi";

$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass) or die("Db Gak connect");


?>