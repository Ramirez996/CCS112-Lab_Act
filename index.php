<?php
require_once 'cfg/db_connect.php';
include 'fetch_task.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- for later design -->
  <link rel="icon" type="image/png"
    href="https://uxwing.com/wp-content/themes/uxwing/download/communication-chat-call/correct-icon.png">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.cdnfonts.com/css/satoshi" rel="stylesheet">
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
    crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <title>Too-Du -- Level up your productivity</title>

</head>

<!-- outer page used later for resizing-->

<body class="page">

  <!-- task app -->
  <div class="app">
    <header class="header">
      <p>Too-Du <img src="https://cdn-icons-png.flaticon.com/128/1828/1828644.png" class="icon" alt="logo-icon"></p>
    </header>

    <!-- sidebar for adding task -->
    <div class="add-task-sidebar">


      <!-- ADDING TASK-->
      <div class="form-container">

        <section class="create-task">
          <h1 class="add-heading">
            Create <span class="u-italic u-accent u-bolder">Task</span>now!
          </h1>
          <p class="add-heading-text">Start your day by being productive.</p>
          <form action="" method="post" id="form-group">
            <div class="form-grouper">
              <label for="taskTitle">Task Title</label>
              <input type="text" id="task--title" name="title" placeholder="Enter task title">
            </div>

            <div class="form-grouper">
              <label for="taskDescription">Task Description</label>
              <textarea id="task--description" name="description" placeholder="Enter task description"></textarea>
            </div>

            <div class="form-grouper">
              <label for="taskDeadline">Task Deadline</label>
              <input type="date" id="task--deadline" name="deadline">
            </div>

            <div class="form-grouper">
              <label for="taskPriority">Task Priority</label>
              <select id="task--priority" name="priority">
                <option value="Low" selected hidden>Select Priority</option>
                <option value="low">Low</option>
                <option value="high">High</option>
                <option value="Trivial">Trivial</option>
              </select>
            </div>

            <button class="btn--addtask" type="submit" name="submit_form">Create Task</button>
          </form>
      </div>
      </section>

    </div>


    <!-- Task Table Section -->
    <div class="view-table">

      <div class="tbl-view-body">
        <div class="tbl-header">
          <div class="active-header">
            <i class="fas fa-circle"></i>
            <p>Active Task</p>
          </div>
          <div class="search-container">
            <input type="search" placeholder="Search Task...">
            <i class="fas fa-search"></i>
          </div>
        </div>

        <table>
          <thead>
            <tr>
              <th>Task Id</th>
              <th>Title Description</th>
              <th>Status</th>
              <th>Priority</th>
              <th>Deadline</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- fetch task section -->
            <?php if (!empty($fetch_tasks)): ?>
              <?php foreach ($fetch_tasks as $display_task): ?>
                <tr>
                  <td><?php echo htmlspecialchars(($display_task['taskId'])) ?></td>
                  <td><?php echo htmlspecialchars(($display_task['taskTitle'])) ?></td>
                  <td><?php echo htmlspecialchars(($display_task['taskDescription'])) ?></td>
                  <td><?php echo htmlspecialchars(($display_task['taskDeadline'])) ?></td>
                  <td><?php echo htmlspecialchars(($display_task['taskPriority'])) ?></td>
                  <td>
                    <button class="btn--edit">Edit</button>
                    <button class="btn--delete">Delete</button>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <!-- <td colspan="7 style=" text-align: center">"Unfortunately no Task Exists"</td> -->
                <!-- <td>Tryas</td>
                <td>Try</td>
                <td>Try</td>
                <td>Try</td>
                <td>Try</td>
                <td>
                  <button class="btn--edit">Edit</button>
                  <button class="btn--delete">Delete</button>
                </td> -->
              </tr>
              <tr>
              <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>



    <section class="view-features">
      <section class="feature">
        <i class="fas fa-cogs feature_icon feature_icon--1"></i>
        <h2 class="second-heading">Add Task</h2>
        <p class="feature-text">Add and customize your favorite task providing aesthetic feels.</p>
      </section>
      <section class="feature">
        <i class="fa fa-check-circle feature_icon feature_icon--2" aria-hidden="true"></i>
        <h2 class="second-heading">Prioritize Important Task</h2>
        <p class="feature-text">Set priority and modify the status of each of every task.</p>
      </section>
      <section class="feature">
        <i class="fa fa-edit feature_icon feature_icon--3" aria-hidden="true"></i>
        <h2 class="second-heading">Change Task</h2>
        <p class="feature-text">Change the task everytime you needed a revision for your day.</p>
      </section>
    </section>
  </div>



  <script src='function.js'></script>
</body>

</html>