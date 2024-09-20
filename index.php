<?php 
require_once 'db_connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- for later design -->
    <link rel="icon" type="image/png" href="https://uxwing.com/wp-content/themes/uxwing/download/communication-chat-call/correct-icon.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.cdnfonts.com/css/satoshi" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous">
    <title>Too-Du -- Level up your productivity</title>

</head>

<!-- outer page used later for resizing-->
<body class="page">

    <!-- task app -->
    <div class="app">
        
        <header class="header">
            <p>Too-Du
                <img src="https://cdn-icons-png.flaticon.com/128/1828/1828644.png" class="icon" alt="logo-icon">
            </p>
        </header>

        <!-- sidebar for adding task-->
        <div class="add-task-sidebar">

            
             <!-- ADDING TASK-->
              <div class="form-container">

                <section class="create-task">
                    <h1 class="add-heading">
                        Create <span class="u-italic u-accent u-bolder">Task</span>‎ ‎ now!
                    </h1>
                      <p class="add-heading-text">Start your day by being productive.</p>
                      <form action="blank" method="post">
                        <div class="form-grouper">
                          <label for="taskTitle">Task Title</label>
                          <input type="text" id="task--title" name="taskTitle" placeholder="Enter task title">
                        </div>
                        
                        <div class="form-grouper">
                          <label for="taskDescription">Task Description</label>
                          <textarea id="task--description" name="taskDescription" placeholder="Enter task description"></textarea>
                        </div>
                    
                        <div class="form-grouper">
                          <label for="taskDeadline">Task Deadline</label>
                          <input type="date" id="task--deadline" name="taskDeadline">
                        </div>
                    
                        <div class="form-grouper">
                          <label for="taskPriority">Task Priority</label>
                          <select id="task--priority" name="taskPriority">
                            <option value="low">Low</option>
                            <option value="high">High</option>
                            <option value="critical">Critical</option>
                          </select>
                        </div>
                        
                        <button type="submit">Create Task</button>
                      </form>
                </div> 
            </section>  

          </div>


        <section class="view-table">  

          <section class="tbl-view-body">
          <section class="tbl-header">
            <h1>Active Task</h1>

            <div class="input-group">
              <input type="search" placeholder="Search Task...">
              <i class="fas fa-search"></i>
            </div>
          </section>
          <table class="">
            <tr>
              <th>Task Id</th>
              <th>Title Description</th> 
              <th>Status</th>
              <th>Priority</th>
              <th>Deadline</th>
              <th>Actions</th>
            </tr>
            <tr style="height: 50px;">
              <td><center>41</center></td>
              <td><center>Smith</center></td>
              <td><center>married</center></td>
              <td><center>sports</center></td>
              <td><center>1</center></td>
            </tr>
         
          </table>
        </section>
      </section>


        

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


    
    
</body>
</html>