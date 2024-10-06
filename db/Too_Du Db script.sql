CREATE DATABASE TooDu_TaskSiteApp;

USE TooDu_TaskSiteApp;


CREATE TABLE taskManage(
    taskId INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    taskTitle VARCHAR(45) NOT NULL,
    taskDescription LONGTEXT NOT NULL,
    taskDeadline DATE NOT NULL,
    taskPriority ENUM('High', 'Low', 'Trivial') DEFAULT 'Trivial'
);


SELECT * FROM taskManage;

insert into taskManage(taskTitle, taskDescription, taskDeadline, taskPriority) values('SAMPLE','SAMPLE','2025/01/10','Trivial');
