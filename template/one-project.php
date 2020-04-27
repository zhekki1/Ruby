<?php
    $id = $_POST ["id_Project"];
    $conn =  new mysqli ('localhost', 'yevhenmw_rubygar', 'I%ZFt4T8', 'yevhenmw_rubygar' );
    $sql = "SELECT * FROM task  WHERE id_project='$id'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
    	while ($row = $result->fetch_assoc()){
    		$data[] = $row;
        }
        echo json_encode(array('Data' => $data));
    }else{
    	echo"oib,rf";
    }
?>
