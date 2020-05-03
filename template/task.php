<?php
require("conect.php");
if(isset($_POST['TaskNname']) && isset($_POST['ProjectId'])){
    $ProjectId = $_POST['ProjectId'];
    $TaskNname = $_POST['TaskNname'];
    $TaskPriority = $_POST['TaskPriority'];
    $TaskDate = $_POST['TaskDate'];
    $query = "INSERT INTO task (name , id_project, priority, date) VALUES ('$TaskNname', '$ProjectId', '$TaskPriority', '$TaskDate')";
    $result = mysqli_query($connection, $query);
    if($result){
        echo("done");
    }else{
        echo("Error");
    }
}
?>