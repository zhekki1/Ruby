<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
    <title>
      </title>
<meta charset="UFT-8">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="  crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="  crossorigin="anonymous"></script>

<body>

<div class="main-bg-img">
	<div class="main-content-opacity">
 <div class="container">  
  <form action="" class="form-signin" method="POST">  
   <h2>Вход</h2>
   <input type="text" name="username" class="form-control" placeholder="Username" required>
   <input type="password" name="password" class="form-control" placeholder="password" required>
   <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
  </form>
 </div>
  </div>
   </div>
 <?php 
 session_start();
 require("conect.php");

 if(isset($_POST['username']) and isset($_POST['password'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  
   $query = "SELECT * FROM users WHERE name='$username' and password='$password'";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	$count = mysqli_num_rows($result);
	if($count == 1){		
		$_SESSION['name'] = $username;	
	
	} else {
		 $fsmsg="Ошибка";
	}
 }
	if(isset($_SESSION['name'])){
		/*$username = $_SESSION['name'];
		echo "hello". $username . "";
		*/
		
		session_start();
		$_SESSION['id_users'] = $id_users;
		header('Location: page.php');
	}
 ?>
</body>
</html>