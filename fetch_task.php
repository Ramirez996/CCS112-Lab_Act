<?php

require 'cfg/db_connect.php';

$stmt = $pdo->prepare('select * from taskManage order by taskDeadline desc');

$stmt->execute();

$tasks = $stmt->fetchAll();


?>
