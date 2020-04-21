<?php
$id = $_POST ["id"];
$project = $_POST ["project"];

$conn =  new mysqli ('localhost', 'root', '', 'rubygarage' );
 
$sql = "UPDATE project SET project='$project' WHERE id_project='$id'";
if($conn->query($sql) === TRUE) {
	echo "done";
}
$conn->close();
?>