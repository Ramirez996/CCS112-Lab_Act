<?php 

$host ='localhost';
$port = '3306';
$dbName = 'TooDu_TaskSiteApp';
$username = 'root';
$passwrd = '';

$dsn = "mysql:host={$host};port={$port};dbname={$dbName};charset=utf8";

    try {
        $pdo = new PDO($dsn, $username, $passwrd);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo 'Connection Failed' . $e->getMessage(); 
    }




