<?php
$id = $_POST ["id"];
$conn =  new mysqli ('localhost', 'yevhenmw_rubygar', 'I%ZFt4T8', 'yevhenmw_rubygar' );
$sql = "DELETE FROM project WHERE id_project='$id'";
if($conn->query($sql) === TRUE) {
	echo "done";
}
$conn->close();
?>