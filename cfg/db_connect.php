<?php 

//database credentials 
$host ='localhost';
$port = '3306';
$dbName = 'TooDu_TaskSiteApp';
$username = 'root';
$passwrd = '';
//made the dsn string
$dsn = "mysql:host={$host};port={$port};dbname={$dbName};charset=utf8";

//try block    
    try {
        //create a new PDO instance
        $pdo = new PDO($dsn, $username, $passwrd);

        //set the PDO to throw exceptions on error
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        //when error, catch here -> 
        echo 'Connection Failed' . $e->getMessage(); 
    }




