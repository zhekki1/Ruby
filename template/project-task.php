<?php
require 'conectBd.php';
$conn = $connection;
$username = $_POST ["username"];
$sql = "SELECT * FROM project WHERE username='$username'";
$result = $conn->query($sql);
if($result){
	while ($row = $result->fetch_assoc()){
		$id = $row['id_project'];
		?>
		<div class="project-and-task">
		    <div class="text-projext">
		        <input class="project-id" value="<?php echo $row["id_project"]?>" readonly>
		        <input class="project-name project-name-diaplay" value="<?php echo $row["project"]?>" readonly>
            	<button class="edit-project"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
            	<button class="save-edit-project"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
            	<button class="delete-project"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
            	<hr class="line">
        	</div>
        	<form class="form-task" onsubmit="return false;">  
        		 <?php echo "<input name='ProjectId' class='project-id' value='".$row['id_project']."'>" ?>
            	<span class="plus-task">+</span> <input  class="name-task"  placeholder="Task" required>
            		 <select class="prioryty-task" >
            		     <option  selectedvalue="1">1</option>
                         <option  value="2">2</option>
                         <option value="3">3</option>
                         <option value="4">4</option>
                    </select>
            		 <input type="date"  class="date-task">
            		 <button class="add-task"  type="submit">add task</button>
        	 </form>
        	 
        	 <?php
        	     $sql2 = "SELECT * FROM task WHERE id_project='$id'";
        	     $result2 = $conn->query($sql2);
        	     if($result2){
        	         while ($row2 = $result2->fetch_assoc()){
        	             ?>
        	             <form class="form-Oll-task task-disaple" onsubmit="return false;"> 
        	                 <input class="task-id" value="<?php echo $row2['id'] ?>">
        	                 <input type="checkbox" class="status-task" <?php if($row2['Status'] == "true") echo("checked") ?> disabled>
        	                 <input name="TaskNname" class="name-task"  value="<?php echo $row2['name'] ?>" required readonly>
            		         <select class="prioryty-task"  disabled>
                		         <option  selectedvalue="<?php echo $row2['priority'] ?>"><?php echo $row2['priority'] ?></option>
                                 <option  value="1">1</option>
                                 <option  value="2">2</option>
                                 <option value="3">3</option>
                                 <option value="4">4</option>
                             </select>
            		         <input type="date" class="date-task"  value="<?php echo $row2['date'] ?>" readonly>
            		         <button class="edit-task"><i class="fa fa-pencil-square-o" aria-hidden="true" onclick="drawShelves(); return false;"></i></button>
            		         <button class="save-edit-task"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
            		         <button class="delete-task"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
        	             </form>
        	             <?php
        	            
        	         }
        	     }
        	 ?>
		</div>
<?php
	}
}


$conn->close();

?>