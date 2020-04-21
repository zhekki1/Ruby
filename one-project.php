
<?php

$id = $_POST ["id_Project"];
$conn =  new mysqli ('localhost', 'root', '', 'rubygarage' );

   $sql = "SELECT * FROM task  WHERE id_project='$id'";
  $result = $conn->query($sql);
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc()){
				    $data[] = $row;
}

echo json_encode(array('Data' => $data));
		/*		$name = $row['name'];
				$status = $row['Status'];
				$priority = $row['priority'];
				$date = $row['date'];
				//echo $id;
			echo $name;
				echo $status ;
				echo $priority;
				echo $date; 
				
true;
*/




  
			

		
			
		}else{
			echo"oib,rf";
		}


 ?>
