<?php 

$host ='localhost';
$port = '3307';
$dbName = 'TooDu_TaskSiteApp';
$username = 'root';
$passwrd = 'vt6cQeJn';

$dsn = "mysql:host={$host};port={$port};dbName={$dbName};charset=utf8";

try {
    $pdo = new PDO($dsn, $username, $passwrd);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     echo 'Database Connected mga Kadangals.....';
} catch(PDOException $e) {
    echo 'Connection Failed' . $e->getMessage(); 
}




