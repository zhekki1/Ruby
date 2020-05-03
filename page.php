<html>
    <head>
        <link rel="stylesheet" href="assets/css/style.css">        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </head>
    <title></title>
    <meta charset="UFT-8">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="  crossorigin="anonymous"></script>
    <script type="text/javascript" src="assets/js/main.css"></script>
    <body>
    <?php 
        $conn =  new mysqli ('localhost', 'yevhenmw_rubygar', 'I%ZFt4T8', 'yevhenmw_rubygar' );
        $sql = "SELECT * FROM name_users";
        $result = $conn->query($sql);
    	if($result->num_rows > 0){
    			while ($row = $result->fetch_assoc()){
    				$name_users = $row['name_users'];
    			}
    	}
    ?>

    <div class="main-bg-img">
        <a href="logout.php" class="logout"> logout </a>
    	<div class="container"> 
    		<h2>Hello i will help you keep your tasks</h2>
    		<p class="username"><?php echo $name_users; ?></p>
    		<div class="create-project">
    		    <input type="text" class="project" placeholder="Name project" >
    		    <button class="create_project" type="submit">create project</button>
    	        <div ></div>
    	    </div>
    	    <input  class="id-project">
    		<div class="form-signin">
    		   <input type="text" class="task-name" placeholder="Task" required>
    		   <div  class="task-status" ></div>Status
    		   <select class="quantity-num">
                    <option value="1">1</option>
                    <option selected value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
               </select>
    		   <input type="date"  class="date-task" placeholder="date" required>
    		   <button class="btn-task" type="submit">Save task</button>
    		   <p></p>
    		</div>
    		<div></div>   
    	    <div id="oll-project"></div>
    	</div>
    </div>
</body>
</html>











