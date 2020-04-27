<?php
$id = $_POST ["id"];
$conn =  new mysqli ('localhost', 'yevhenmw_rubygar', 'I%ZFt4T8', 'yevhenmw_rubygar' );
$sql = "DELETE FROM task WHERE id='$id'";
if($conn->query($sql) === TRUE) {
	echo "done";
}
else{
	echo "eror";
}
$conn->close();
?>