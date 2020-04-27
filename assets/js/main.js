$(document).on('click', '.task-status', function () {
    if($(this).hasClass("task-status-on")){
         $(this).removeClass("task-status-on")
    }else{
        $(this).addClass("task-status-on")
    }
})
$( document ).ready(function() {
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
})
$(document).on('click', '.btn-task', function () {
	if(  $(this).siblings(".task-status").hasClass("task-status-on")){
	    var status = "done"
	}
	if(!($(this).siblings(".task-status").hasClass("task-status-on"))){
	    var status = "no"
	}
	var name = $(this).siblings(".task-name").val();
    var priority = $(this).siblings(".quantity-num").val();
    var date =  $(this).siblings(".date-task").val();
    var project = $(this).parent().prev().val();
    if(name != ""){
        $(".form-signin p").addClass("btn-task-answer")
        $.ajax({
    		type: 'POST',
    		url: 'template/task.php',
    		data: {task_name: name,
        		task_status: status,
        		priority: priority,
        		date:date,
        		id_project:project
    		},
    		success: function(data) {
    			var id_project = data;
    		$('.btn-task-answer').html(data);
    		}
		});
	    function sayHi() {
    	    $(".form-signin").css("display","none");
    		$(".project").val("");
    		$(".form-signin .task-name").val("");
    		$(".form-signin .quantity-num").val("1");
    	    $(".form-signin p").removeClass("btn-task-answer")
    	    $(".create_project").next().removeClass("ansver-project")
    	    $(".create_project").next().text("")
    	    $(".form-signin p").html("")
	    }
	    setTimeout(sayHi, 3000);
    }else{
        $('.task-name').css("border-color","red");
    }
})
$('.create_project').click(function(){
	var Project = $('.project').val();
	var username = $('.username').text();
	if(Project == ""){
		$('.project').css("border-color","red");
	}else{
	    $(".create_project").next().addClass("ansver-project")
		$('.project').css("border-color","grey");
    	$.ajax({
    		type: 'POST',
    		url: 'template/project.php',
    		data: {project: Project,
    	    	username: username
    		},
    		success: function(data) {
    			var id_project = data;
    		    $(".id-project").val(id_project);
    		    $('.ansver-project').html("Project added")
    		}		
		});
		function say() {
		var username = $('.username').text();
		$.ajax({
    		type: 'POST',
    		url: 'template/Oll-project.php',
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
$('.add-task').click(function () {
	var id = $(this).next().children().text();
    if($(this).next().hasClass("result-display")){
    	$(this).next().removeClass("result-display");
        $(this).next().empty();
    }
	$(this).next().next().addClass("new-task-project");
    $(this).next().next().append('<div><input type="text" class="task-name" placeholder="Task" required><div  class="task-status" ></div> Status <select class="quantity-num"><option value="1" selected="">1</option> <option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option> </select> <input type="date"  class="date-task" placeholder="date" required> <input  class="id-project" value='+id+'>  <button class="btn-task-pr" type="submit">Add task</button> <p class="ansver-p"></p></div>');
})
$(document).on('click', '.add-task', function () {
	var id = $(this).next().children().text();
    if($(this).next().next().hasClass("result-display")){
    	$(this).next().next().removeClass("result-display");
        $(this).next().next().empty();
    }
	$(this).next().next().addClass("new-task-project");
    $(this).next().next().append('<div class="new-task"><input type="text" class="task-name" placeholder="Task" required> <div  class="task-status" ></div> Status <select class="quantity-num"><option value="1" selected="">1</option> <option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option> </select>  <input type="date"  class="date-task" placeholder="date" required> <input  class="id-project" value='+id+'>  <button class="btn-task-pr" type="submit">Add task</button> <p class="ansver-p"></p></div>');
})
$(document).on('click', '.btn-task-pr', function () {
	if($(this).siblings(".task-status").hasClass("task-status-on")){
	    var status = "done"
	}
	if(!($(this).siblings(".task-status").hasClass("task-status-on"))){
	    var status = "no"
	}
   var id = $(this).prev().val();
   var taskDdate = $(this).siblings(".date-task").val();
   var priority = $(this).siblings(".quantity-num").val();
   var nameTask = $(this).siblings(".task-name").val();
   var answer = $(this).next();
   if(nameTask == ""){
	   $(this).siblings(".task-name").css("border-color","red");
   }else{
	   $(this).siblings(".task-name").css("border-color","grey");
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
    			$(".ansver-p").html(data);
    	    }
    	});
   }
})
$(document).on('click', '.project-name', function () {
    if($(this).next().children().hasClass("new-task")){
        $(this).next().children().removeClass("result-display");
        $(this).next().children().empty();
    }
    if($(this).next().hasClass("result-display")){
    	$(this).next().removeClass("result-display");
        $(this).next().empty();
    }else{
	    var id_Project = $(this).children().text();
    	$(this).next().addClass("result-display");
    	var sdd = $(this).next();
    	$.ajax({
	    	type: 'POST',
	    	url: 'template/one-project.php',
		    data: {id_Project: id_Project
		    },
	    	success: function(data) {
		    	var b = JSON.parse(data);  
			    var d=0;
			    for(var i=0; i < b.Data.length; i++){
    				var id = b.Data[i].id
    				var name = b.Data[i].name
    				var Status = b.Data[i].Status
    				var priority = b.Data[i].priority
    				var date = b.Data[i].date
    				if(Status == "done"){
    				sdd.append('<div class="project-task checked-task">  <input class="name" value='+name+'> <div  class="task-status task-status-on" ></div> Status <select class="quantity-num"><option  value='+priority+' selected>'+priority+'</option> <option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option> </select> <input type="date" value='+date+'> <input class="id-task" value='+id+'> <button type="submit" class="delete">delete</dutton><button class="edit">save change</dutton></div>');
    				}else{
    				    sdd.append('<div class="project-task" style="background: none"> <input class="name" value='+name+'>  <div  class="task-status" ></div> Status <select class="quantity-num"><option  value='+priority+' selected>'+priority+'</option> <option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option> </select> <input type="date" value='+date+'> <input class="id-task" value='+id+'> <button type="submit" class="delete">delete</dutton><button class="edit">save change</dutton></div>');
    				}
			   }
		    }
		});
    }
})
$(document).on('click', '.delete', function () {
   var id = $(this).prev().val();
   $(this).parent().css("display","none");
   $.ajax({
		type: 'POST',
		url: 'template/delete.php',
		data: {id: id
		},
		success: function(data) {}
	});
});
$(document).on('click', '.status', function () {
    if($(this).hasClass('off')){
        $(this).val('on')
        $(this).removeClass('off')
    }else{
        $(this).addClass("off")
        $(this).val('off')
    }
})
$(document).on('click', '.edit', function () {
    if($(this).siblings(".task-status").hasClass("task-status-on")){
	    var status = "done"
	    $(this).parent().addClass("checked-task")
	}
	if(!($(this).siblings(".task-status").hasClass("task-status-on"))){
	    var status = "no"
	    $(this).parent().removeClass("checked-task")
	}
    var id = $(this).siblings(".id-task").val();
    var taskDdate = $(this).prev().prev().prev().val();
    var priority =  $(this).siblings(".quantity-num").val();
    var nameTask = $(this).siblings(".name").val();
    if(nameTask == ""){
        $(this).siblings(".name").css("border-color","red")
    }else{
        $(this).siblings(".name").css("border-color","grey")
        $.ajax({
    		type: 'POST',
    		url: 'template/edit.php',
    		data: {id: id,
    		taskDdate : taskDdate,
    		priority:priority,
    		status:status,
    		nameTask:nameTask
    		},
    		success: function(data) {
    			$(this).next().html(data);
    		}
    	});
    }
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
		url: 'template/edit-project.php',
		data: {id: id,
		project:project		
		},
		success: function(data) {}
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
   $(this).prev().css("display","none");
   $(this).next().next().css("display","none");
   $(this).next().css("display","none");
   $(this).css("display","none");
   $(this).next().next().next().css("display","none");
   $.ajax({
		type: 'POST',
		url: 'template/delete-projecr.php',
		data: {id: id
		},
		success: function(data) {}
	});
	$.ajax({
		type: 'POST',
		url: 'template/delete-task.php',
		data: {id: id
		},
		success: function(data) {}
	});
});
$(".logout").click(function(){
    $.ajax({
    		type: 'POST',
    		url: 'logout-del.php',
    		data: {id: "id"
    		},
    		success: function(data) {}
    });
})
$(".test").click(function(){
    $.ajax({
    		type: 'POST',
    		url: 'sort.php',
    		data: {id: "id"
    		},
    		success: function(data) {}
    	});
})