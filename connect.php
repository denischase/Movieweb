<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$host = 'localhost';
$user = 'root';
$password = '0542882552';
$dbname = 'userregistration';
$dsn = '';

try{
    $dsn = 'mysql:host=' .$host. ';dbname'.$dbname;

    $pdo = new PDO($dsn, $user, $password);
   // $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo 'connection failed: '.$e->getMessage();
}

?>

<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$host = 'localhost';
$user = 'root';
$password = '0542882552';
$dbname = 'userregistration';
$dsn = '';

try{
    $conn= mysqli_connect($host, $user, $password, $dbname);

   // $pdo = new PDO($dsn, $user, $password);
   // $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
   // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
    echo 'connection failed: '.$e->getMessage();
}

?>