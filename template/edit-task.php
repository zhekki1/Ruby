<?php
$id = $_POST ["ProjectId"];
$taskDdate = $_POST ["TaskDate"];
$priority = $_POST ["TaskPriority"];
$status = $_POST ["TaskStatus"];
$nameTask = $_POST ["TaskNname"];
require 'conectBd.php';
$conn = $connection;
$sql = "UPDATE task SET date='$taskDdate', priority='$priority', Status='$status', name='$nameTask' WHERE id='$id'";
if($conn->query($sql) === TRUE) {
	echo "done";
}
$conn->close();
?>