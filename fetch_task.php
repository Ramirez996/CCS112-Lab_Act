<?php 
include "cfg/db_connect.php";

try {
    $sql = "select * from taskManage order by taskDeadline asc";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $fetch_tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Fetch Error: " .$e->getMessage();
}

?>