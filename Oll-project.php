<?php
$conn =  new mysqli ('localhost', 'root', '', 'rubygarage' );

$username = $_POST ["username"];
		$sql = "SELECT * FROM project WHERE username='$username'";
		
		
		//$sql = "SELECT * FROM project";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc()){
				
				$id = $row['id_project'];
				?>
				<div class="project-and-task">
				<?php
				echo "<input class='edit-projecr-input' value='".$row['project']."'/> <button class='edit-projecr'>edit</button><button class='delete-projecr'>delete</button> <button class='add-task'>add task</button>  <div class='project-name'>". $row["project"];
				echo "<div class='project_id'>".$row['id_project']."</div>  </div>"; ?>
				<div>
					
				</div>
				</div>
				<?php
			
			}
		}
		$conn->close();
		?>