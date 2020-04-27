<?php
require("conect.php");
 if(isset($_POST['task_name']) && isset($_POST['task_status'])){
    $task_name = $_POST['task_name'];
	$task_status = $_POST['task_status'];
	$priority = $_POST['priority'];
	$date = $_POST['date'];
	$id_project = $_POST['id_project'];
	$query = "INSERT INTO task (name, Status, priority, date, id_project) VALUES ('$task_name', '$task_status', '$priority', '$date', '$id_project')";
    $result = mysqli_query($connection, $query);
    if($result){
      echo("Task added");
    }else{
    	echo("Ошибка");
    }
 }
?>