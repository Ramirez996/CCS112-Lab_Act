<?php 
include "cfg/db_connect.php";

$search_task = isset($_GET['search']) ? $_GET['search'] : '';

try {
    $sql = "select * from taskManage where taskTitle like :search order by taskId desc";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':search', '%' . $search_task . '%', PDO::PARAM_STR);
    $stmt->execute();
    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode(['status' => 'success', 'tasks' => $tasks]);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}

