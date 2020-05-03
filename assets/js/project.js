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
$('.create_project').click(function(){
	var Project = $('.project').val();
	var username = $('.username').text();
	if(Project){
        $.ajax({
        		type: 'POST',
        		url: 'template/project.php',
        		data: {project: Project,
        	    	   username: username
        		},
        		success: function(data) {
        			var id_project = data;
        		    $(".id-project").val(id_project);
        		    TaskAndProject();
        		    $('.project').val("");
        		    
        		}
    	});
	}
});
$(document).on('click', '.edit-project', function () {
	$(this).siblings("input").removeAttr("readonly");
    $(this).siblings(".save-edit-project").css("display","inline-block");
    $(this).css("display","none");
    $(this).siblings(".project-name").removeClass("project-name-diaplay");
        
})

$(document).on('click', '.save-edit-project', function () {
    var ProjectId = $(this).siblings('.project-id').val();
	var ProjectkNname = $(this).siblings('.project-name').val();
	if(ProjectkNname){
	    $(this).siblings("input").attr("readonly");
        $(this).siblings(".edit-project").css("display","inline-block");
        $(this).css("display","none");
        $(this).siblings(".project-name").addClass("project-name-diaplay");;
        $.ajax({
        		type: 'POST',
        		url: 'template/edit-project.php',
        		data: {ProjectkNname: ProjectkNname,
        		ProjectId: ProjectId
        		}
    	});
	}
})
$(document).on('click', '.delete-project', function () {
    var ProjectId = $(this).siblings('.project-id').val();
    $.ajax({
        		type: 'POST',
        		url: 'template/delete-project.php',
        		data: {ProjectId: ProjectId
        		},
        		success: function(data) {
    		    if(data == "done"){
    		        TaskAndProject();
    		    }
    		}
        		
    });
})