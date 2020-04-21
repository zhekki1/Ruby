

<html>
<head>
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>
    <title>
      </title>
<meta charset="UFT-8">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="  crossorigin="anonymous"></script>
<body>
<?php session_start();
$username = $_SESSION['username'];
?>
<div class="main-bg-img">
<a href="logout.php" class="logout"> logout </a>
	<div class="container"> 
		<h2>Hello i will help you keep your tasks</h2>
		<p class="username"><?php echo($username) ?></p>
		<div class="create-project">
		   <input type="text" class="project" placeholder="Name project" >
		   <button class="create_project" type="submit">create project</button>
			<button class="add-task-project">Add Task</button>
			<p class="ansver-project"></p>
	   </div>
	  
		<div class="form-signin">
		   <input type="text" class="task-name" placeholder="Задача" required>
		   <input type="text"  class="task-status" placeholder="Статус задачи" required list="status">
		   <datalist id="status">
			   <option value="New" />
			   <option value="Done" />	   
			   <option value="Work" />
		   </datalist>
		   <input  class="quantity-num" type="number" value="1" />	 
		   <input type="date"  class="date-task" placeholder="date" required>
		   <input  class="id-project">
		   <button class="btn-task" type="submit">Добавить задачу</button>
		   <p></p>
		</div>
		<div></div>   
	   <div id="oll-project">
		
	   </div>
	</div>
</div>
   

<script>
var username = $(".username").text();
$.ajax({
		type: 'POST',
		url: 'Oll-project.php',
		data: {username: username
		},
		success: function(data) {
		$('#oll-project').html(data);
		}
		}); 



	$(document).on('click', '.btn-task', function () {
		
	console.log("tree");
var name = $('.task-name').val();
var status = $('.task-status').val();
var priority = $('.quantity-num').val();
var date = $('.date-task').val();
var project = $('.id-project').val();

$.ajax({
		type: 'POST',
		url: 'task.php',
		data: {task_name: name,
		task_status: status,
		priority: priority,
		date:date,
		id_project:project
		},
		success: function(data) {
			var id_project = data;
			console.log (id_project)
		$('p').html(data);
		}
		});
		

})
$(".add-task-project").click(function() {
	console.log("yep");
$('.form-signin').append('<input type="text" class="task-name" placeholder="Задача" required> <input type="text"  class="task-status" placeholder="Статус задачи" required list="status"> <datalist id="status"> <option value="New" /> <option value="Done" />	<option value="Work" /> </datalist> <input  class="quantity-num" type="number" value="1" /> <input type="date"  class="date-task" placeholder="date" required>   <input  class="id-project"> <button class="btn-task" type="submit">Добавить задачу</button> <p></p>')
})

$('.create_project').click(function(){
	var Project = $('.project').val();
	var username = $('.username').text();
	console.log(username);
	if(Project == ""){
		$('.project').css("border-color","red");
	}else{
		
		$('.add-task-project').css("display","inline");
		$('.project').css("border-color","grey");
	$.ajax({
		type: 'POST',
		url: 'project.php',
		data: {project: Project,
		username: username
		},
		success: function(data) {
			var id_project = data;
			console.log (id_project)
		$(".id-project").val(id_project);
		$('.ansver-project').html("Проект добавлен")
		}		
		});
		function say() {
		var username = $('.username').text();
		$.ajax({
		type: 'POST',
		url: 'Oll-project.php',
		data: {username: username
		},
		success: function(data) {
		$('#oll-project').html(data);
		}
		});
		}
		setTimeout(say, 100);
		if($(".id_project").val() != "Ошибка"){
			$('.form-signin').css("display","block")
		}
	}
	});
	
	
	
	$(function() {

  (function quantityProducts() {
    var $quantityArrowMinus = $(".quantity-arrow-minus");
    var $quantityArrowPlus = $(".quantity-arrow-plus");
    var $quantityNum = $(".quantity-num");

    $quantityArrowMinus.click(quantityMinus);
    $quantityArrowPlus.click(quantityPlus);

    function quantityMinus() {
      if ($quantityNum.val() > 1) {
        $quantityNum.val(+$quantityNum.val() - 1);
      }
    }

    function quantityPlus() {
      $quantityNum.val(+$quantityNum.val() + 1);
    }
  })();

});

$(document).on('click', '.add-task', function () {
	var id = $(this).next().children().text();
	console.log(id)
	$(this).next().next().addClass("new-task-project");
	$('.new-task-project').append('<input type="text" class="task-name" placeholder="Задача" required> <input type="text"  class="task-status" placeholder="status" required list="status">	<datalist id="status"> <option value="New" /> <option value="Done" /> <option value="Work" /></datalist>  <input  class="num" type="number" value="1" />  <input type="date"  class="date-task" placeholder="date" required> <input  class="id-project" value='+id+'>  <button class="btn-task-pr" type="submit">Добавить задачу</button><p class="ansver-p"></p>');
})

$(document).on('click', '.btn-task-pr', function () {
	
	   var id = $(this).prev().val();
   var taskDdate = $(this).prev().prev().val();
   var priority = $(this).prev().prev().prev().val();
   var status = $(this).prev().prev().prev().prev().prev().val();
   var nameTask = $(this).prev().prev().prev().prev().prev().prev().val();

   if(nameTask == ""){
	   $(this).prev().prev().prev().prev().prev().prev().css("border-color","red");
   }else{
	   $(this).prev().prev().prev().prev().prev().prev().css("border-color","grey");
	$.ajax({
		type: 'POST',
		url: 'task.php',
		data: {task_name: nameTask,
		task_status: status,
		priority: priority,
		date:taskDdate,
		id_project:id
		},
		success: function(data) {
			var id_project = data;
			console.log (id_project)
			$('.ansver-p').html(data);
		
		}
	});
   }
})
$(document).on('click', '.project-name', function () {


if($(this).next().hasClass("result-display")){
	$(this).next().removeClass('result-task') 
	if($(this).next().is(':hidden')){
	$(this).next().css("display","block")
		 console.log("data")
}else{
	$(this).next().css("display","none") 
}
}else{
	var id_Project = $(this).children().text();
	console.log (id_Project);
	$(this).next().addClass("result-task");
	$(this).next().addClass("result-display");
	$.ajax({
		type: 'POST',
		url: 'one-project.php',
		data: {id_Project: id_Project
		},
		success: function(data) {
			var b = JSON.parse(data);  
			 console.log(data)
			 var d=0;
			  for(var i=0; i < b.Data.length; i++){
				var id = b.Data[i].id
				var name = b.Data[i].name
				var Status = b.Data[i].Status
				var priority = b.Data[i].priority
				var date = b.Data[i].date
				
				$('.result-task').append('<div class="project-task"> <input class="name" value='+name+'> <input class="status" value='+Status+' list="status"> <datalist id="status"> <option value="New" /> <option value="Done" /> <option value="Work" /> </datalist> <input type="number" class="num" value='+priority+'> <input type="date" value='+date+'> <input class="id-task" value='+id+'> <button type="submit" class="delete">удалить</dutton><button class="edit">сохранить изминения</dutton></div>');

			  }
		
		}
		});
}

})


$(document).on('click', '.delete', function () {
   var id = $(this).prev().val();
   console.log(id);
   $(this).parent().css("display","none");
   $.ajax({
		type: 'POST',
		url: 'delete.php',
		data: {id: id
		},
		success: function(data) {
			console.log (data)
			
		}
	});
});

$(document).on('click', '.edit', function () {
   var id = $(this).prev().prev().val();
   var taskDdate = $(this).prev().prev().prev().val();
   var priority = $(this).prev().prev().prev().prev().val();
   var status = $(this).prev().prev().prev().prev().prev().prev().val();
   var nameTask = $(this).prev().prev().prev().prev().prev().prev().prev().val();

  $.ajax({
		type: 'POST',
		url: 'edit.php',
		data: {id: id,
		taskDdate : taskDdate,
		priority:priority,
		status:status,
		nameTask:nameTask
		},
		success: function(data) {
			$(this).next().html(data);
			console.log (data)
			
		}
	});
});
$(document).on('click', '.edit-projecr', function () {
	$(this).text('save');
	$(this).addClass('edit-projecr-save');
	$(this).removeClass('edit-projecr');
	$(this).prev().css('display','block');
})
$(document).on('click', '.edit-projecr-save', function () {
	$(this).text('edit');
	$(this).prev().css('display','none');
	$(this).addClass('edit-projecr');
	$(this).removeClass('edit-projecr-save');
	var id = $(this).next().next().next().children().text();
	var project = $(this).prev().val();
  $.ajax({
		type: 'POST',
		url: 'edit-project.php',
		data: {id: id,
		project:project		
		},
		success: function(data) {
			console.log (data)
			
		}
	});
	function sayHi() {
	var username = $(".username").text();
		$.ajax({
		type: 'POST',
		url: 'Oll-project.php',
		data: {username: username
		},
		success: function(data) {
		$('#oll-project').html(data);
		}
		});
	  }
	setTimeout(sayHi, 100);
	
})
$(document).on('click', '.delete-projecr', function () {
   
   var id = $(this).next().next().children().text();
   console.log(id);
   $(this).prev().css("display","none");
  $(this).next().next().css("display","none");
  $(this).next().css("display","none");
  $(this).css("display","none");
   $(this).next().next().next().css("display","none");
  
   $.ajax({
		type: 'POST',
		url: 'delete-projecr.php',
		data: {id: id
		},
		success: function(data) {
			console.log (data)
			
		}
	});
	$.ajax({
		type: 'POST',
		url: 'delete-task.php',
		data: {id: id
		},
		success: function(data) {
			console.log (data)
			
		}
	});
});

</script>
</body>
</html>











