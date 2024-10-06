<?php
require_once 'cfg/db_connect.php';

$stmt = $pdo->prepare('SELECT * FROM taskManage ORDER BY taskDeadline DESC');
$stmt->execute();
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>