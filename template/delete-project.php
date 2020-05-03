<?php
$id = $_POST ["ProjectId"];
require 'conectBd.php';
$conn = $connection;
$sql = "DELETE FROM project WHERE id_project='$id'";
if($conn->query($sql) === TRUE) {
    $sqlTask = "DELETE FROM task WHERE id_project='$id'";
    if($conn->query($sqlTask) === TRUE) {
	    echo "done";
    }
}

$conn->close();
?>