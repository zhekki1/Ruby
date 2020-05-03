<?php
$id = $_POST ["ProjectId"];
require 'conectBd.php';
$conn = $connection;
$sql = "DELETE FROM task WHERE id='$id'";
if($conn->query($sql) === TRUE) {
	echo "done";
}
else{
	echo "eror";
}
$conn->close();
?>