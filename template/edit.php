<?php
$id = $_POST ["id"];
$taskDdate = $_POST ["taskDdate"];
$priority = $_POST ["priority"];
$status = $_POST ["status"];
$nameTask = $_POST ["nameTask"];
$conn =  new mysqli ('localhost', 'yevhenmw_rubygar', 'I%ZFt4T8', 'yevhenmw_rubygar' );
$sql = "UPDATE task SET date='$taskDdate', priority='$priority', Status='$status', name='$nameTask' WHERE id='$id'";
if($conn->query($sql) === TRUE) {
	echo "done";
}
$conn->close();
?>