<?php
$id = $_POST ["ProjectId"];
$project = $_POST ["ProjectkNname"];
require 'conectBd.php';
$conn = $connection;
$sql = "UPDATE project SET project='$project' WHERE id_project='$id'";
if($conn->query($sql) === TRUE) {
	echo "done";
}
$conn->close();
?>