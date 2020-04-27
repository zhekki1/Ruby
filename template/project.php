<?php
    $connection = mysqli_connect('localhost', 'yevhenmw_rubygar', 'I%ZFt4T8');
    $select_db = mysqli_select_db($connection, 'yevhenmw_rubygar');
    $project = $_POST ["project"];
    $username = $_POST ["username"];
    if(isset($_POST['project']) ){
      $project = $_POST['project'];
      $query = "INSERT INTO project (project, username) VALUES ('$project', '$username')";
      $result = mysqli_query($connection, $query);
        if($result){
        	$select_db =  new mysqli ('localhost', 'yevhenmw_rubygar', 'I%ZFt4T8', 'yevhenmw_rubygar' );
        	$sql = "SELECT * FROM project WHERE project='$project'";
        	$result = $select_db->query($sql);
        	while($row = $result->fetch_assoc()){
            	$id_project  = $row["id_project"];
        	}
           echo ($id_project);
        }else{
        	echo( "Ошибка");
        }
    }
?>