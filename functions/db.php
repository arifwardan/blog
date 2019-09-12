<?php 
class Database {

    public function db(){
        $user = "root";
        $pass = "?>bismillah";
        $dbhs = "localhost";
        $dbnm = "ubi";

        $db = new PDO("mysql:host=$dbhs;dbname=$dbnm", $user, $pass);
        return $db;
    }

}

$cek = new Database();
$db = $cek->db();

?>



<!-- 
$user   = "root";
$host   = "localhost";
$pass   = "?>bismillah";
$dbname = "ubi";

$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass) or die("Db Gak connect"); -->

