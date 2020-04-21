<?php
$id = $_POST ["id"];
$conn =  new mysqli ('localhost', 'root', '', 'rubygarage' );
$sql = "DELETE FROM task WHERE id='$id'";
if($conn->query($sql) === TRUE) {
	echo "done";
}
else{
	echo "eror";
}


$conn->close();
?>