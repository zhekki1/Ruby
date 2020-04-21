<?php
$id = $_POST ["id"];
$conn =  new mysqli ('localhost', 'root', '', 'rubygarage' );
$sql = "DELETE FROM project WHERE id_project='$id'";
if($conn->query($sql) === TRUE) {
	echo "done";
}
$conn->close();
?>