var username = $(".username").text();
function TaskAndProject(){
    $.ajax({
    		type: 'POST',
    		url: 'template/project-task.php',
    		data: {username: username
    		},
    		success: function(data) {
    		$('#oll-project').html(data);
    		}
    });
}
$( document ).ready(function() {
TaskAndProject();
})
$(document).on('click', '.add-task', function () {
	var ProjectId = $(this).siblings('.project-id').val();
	var TaskNname = $(this).siblings('.name-task').val();
	var TaskPriority = $(this).siblings('.prioryty-task').val();
	var TaskDate = $(this).siblings('.date-task').val();
	if(TaskNname){
        $.ajax({
        		type: 'POST',
        		url: 'template/task.php',
        		data: {ProjectId: ProjectId,
        	    	   TaskNname: TaskNname,
        	    	   TaskPriority: TaskPriority,
        	    	   TaskDate: TaskDate
        		},
        		success: function(data) {
        		    if(data == "done"){
        		        TaskAndProject();
        		    }
        		}
    		});
	}
});

$(document).on('click', '.delete-task', function () {
	var ProjectId = $(this).siblings('.task-id').val();
    $.ajax({
    		type: 'POST',
    		url: 'template/delete-task.php',
    		data: {ProjectId: ProjectId
    		},
    		success: function(data) {
    		    if(data == "done"){
    		        TaskAndProject();
    		    }
    		}
	});
});
$(document).on('click', '.edit-task', function () {
    $(this).siblings("input").removeAttr("readonly");
    $(this).siblings("select").removeAttr("disabled");
    $(this).siblings(".status-task").removeAttr("disabled");
    $(this).siblings(".save-edit-task").css("display","inline-block");
    $(this).css("display","none");
    $(this).parent().removeClass("task-disaple");
})

$(document).on('click', '.save-edit-task', function () {
    var ProjectId = $(this).siblings('.task-id').val();
	var TaskNname = $(this).siblings('.name-task').val();
	var TaskPriority = $(this).siblings('.prioryty-task').val();
	var TaskDate = $(this).siblings('.date-task').val();
	var TaskStatus = $(this).siblings(".status-task").is(":checked");
	if(TaskNname){
	    $(this).siblings("input").attr('readonly', true);
	    $(this).siblings("select").attr('disabled', true);
	    $(this).siblings(".status-task").attr('disabled', true);
        $(this).siblings(".edit-task").css("display","inline-block");
        $(this).css("display","none");
        $(this).parent().addClass("task-disaple");;
        $.ajax({
        		type: 'POST',
        		url: 'template/edit-task.php',
        		data: {ProjectId: ProjectId,
        	    	   TaskNname: TaskNname,
        	    	   TaskPriority: TaskPriority,
        	    	   TaskDate: TaskDate,
        	    	   TaskStatus: TaskStatus
        		}
    	});
	}
})


