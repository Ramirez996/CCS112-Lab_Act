<?php 

include "cfg/db_connect.php";

$title =trim($_POST['title']);
$description = trim($_POST['description']);
$deadline = trim($_POST['deadline']);
$priority = trim($_POST['priority']);

if (!empty($title) && !empty($description) && !empty($deadline) && !empty($priority)) {
    try {   
     $sql = "insert into taskManage(taskTitle, taskDescription, taskDeadline, taskPriority) values(?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $title);
    $stmt->bindValue(2, $description);
    $stmt->bindValue(3, $deadline);
    $stmt->bindValue(4, $priority);
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    if ($stmt->execute()) {
        echo "Task Added Successfully";
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }   
     
} else {
    echo "Please fill all the fields";
}



