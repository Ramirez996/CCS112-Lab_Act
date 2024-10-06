<?php 
include "cfg/db_connect.php";

$id = isset($_GET['id']) ? $_GET['id'] : '';

try { 
    $sql = "delete from taskManage where taskId = :id";
    $stmt = $pdo->prepare($sql);
    $params = ['id' => $id];
    $stmt->execute($params);
    echo json_encode(['status' => 'success']);

} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}