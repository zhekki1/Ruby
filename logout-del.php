<?php
$conn =  new mysqli ('localhost', 'yevhenmw_rubygar', 'I%ZFt4T8', 'yevhenmw_rubygar' );
$sql = "DELETE FROM name_users";
if($conn->query($sql) === TRUE) {
	echo "done";
}
else{
	echo "eror";
}
?>