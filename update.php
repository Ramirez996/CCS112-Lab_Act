<?php 

require "cfg/db_connect.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $taskId = htmlspecialchars($_POST['task_id']);
    $taskTitle = htmlspecialchars($_POST['title']);
    $taskDescription = htmlspecialchars($_POST['description']);
    $taskDeadline = htmlspecialchars($_POST['deadline']);
    $taskPriority = htmlspecialchars($_POST['priority']);

    $sql = 'UPDATE taskManage SET taskTitle = :taskTitle, taskDescription = :taskDescription, taskDeadline = :taskDeadline, taskPriority = :taskPriority WHERE taskId = :taskId';

    $stmt = $pdo->prepare($sql);

    $params = [
        ':taskId' => $taskId,
        ':taskTitle' => $taskTitle,
        ':taskDescription' => $taskDescription,
        ':taskDeadline' => $taskDeadline,
        ':taskPriority' => $taskPriority
    ];

    if ($stmt->execute($params)) {
        echo json_encode(['message'=> 'Task updated successfully.']);
    } else {    
        echo "Error: " . $stmt->errorInfo()[2];
    }
}