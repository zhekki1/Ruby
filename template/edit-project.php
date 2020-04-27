<?php
$id = $_POST ["id"];
$project = $_POST ["project"];
$conn =  new mysqli ('localhost', 'yevhenmw_rubygar', 'I%ZFt4T8', 'yevhenmw_rubygar' );
$sql = "UPDATE project SET project='$project' WHERE id_project='$id'";
if($conn->query($sql) === TRUE) {
	echo "done";
}
$conn->close();
?>