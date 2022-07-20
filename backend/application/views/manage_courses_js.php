<script>
	var targetObject=null;

	$("#confirmAction").on('show.bs.modal',function(e){
		//make ref to target object
		if(targetObject == null){
			console.log("target=null");
			targetObject = e.relatedTarget; 
		}else{
			console.log("target not null");
			console.log("set target object uid");
			$(targetObject).data("uid", $(e.relatedTarget).data("uid"));
			$(targetObject).data("manager-name", $(e.relatedTarget).data("manager-name"));
		}

		var action= $(targetObject).data("action");
		var uid = $(targetObject).data("uid");
		var courseID = $(targetObject).data("course-id");
		var managerName = $(targetObject).data("manager-name");
		
		console.log("target object uid="+uid);
		console.log("target object action="+action);
		console.log("target object courseID="+courseID);
		console.log("target manager name="+managerName);

		if( action === "addCourseManager" ){
			 $("#actionString").html("กำหนดให้เป็นประธานหลักสูตร");
			 $("#addCourseManager").modal('hide');
		}else if( action === "removeCourseManager" ){
			 $("#actionString").html("ยืนยันการลบประธานหลักสูตร");
		}
	});

	$("#confirmAction").on('hidden.bs.modal',function(e){
		var action= $(targetObject).data("action");

		if( action === "addCourseManager" ){
			if( $(targetObject).data("confirm-state") === false ){
		  		$("#addCourseManager").modal("show");
			}
			else{
				//already
				var action= $(targetObject).data("action");
				var uid = $(targetObject).data("uid");
				var courseID = $(targetObject).data("course-id");
				var managerName = $(targetObject).data("manager-name");

				var html = managerName +"<a class='remove-manager' href='#confirmAction' data-action='removeCourseManager' data-toggle='modal' ";
					 html+= " data-course-id='"+ courseID +"'>";
					 html+= " <i class='fa fa-remove'></i></a>";
				$(targetObject).parent().html(html); 
			}
		}
		else if( action === "removeCourseManager" ){
			//do nothing
		}
		//claims memory
		targetObject = null;
		console.log("targetObject="+targetObject);
	});

	$("#confirm-action").click(function(e){
	   console.log(targetObject);
		$(targetObject).data("confirm-state",true);
		var action = $(targetObject).data("action");
		var courseID = $(targetObject).data("course-id" ) ;

		if( action === "addCourseManager" ){  
			//update course manager and then hide modal
			var userID =  $(targetObject).data("uid" ) ;
			 $.post('<?=site_url("main/ajax_addCourseManager")?>',{ "courseID" : courseID, "userID" : userID  },function(data){
						  if(data.success === true ){
							 $("#confirmAction").modal('hide');

							 //location.reload(true);

						  }else{
							  alert("Something wrong!");
						  }
				  });//end post
		}//end if action == addCourseManager
		else if( action === "removeCourseManager") {
			//call remove course
			console.log("courseID="+ courseID );
			$.post('<?=site_url("main/ajax_removeCourseManager")?>',{ "courseID" : courseID },function(data){
						  if(data.success === true ){
							 $("#confirmAction").modal('hide');
							 var html= "<a data-toggle='modal'  data-action='addCourseManager' data-course-id='"+ courseID + "' href='#addCourseManager'>กำหนดประธานหลักสูตร</a>";
							 $(targetObject).parent().html(html);
						  }else{
							  alert("Something wrong!");
						  }
			 });//end post
		}//end if action == removeCourseManager
	});//end confirm-action click

	$("#dismiss-action").click(function(e){
		//console.log(e);
	   console.log(targetObject);
		$(targetObject).data("confirm-state",false);
		var action = $(targetObject).data("action");
		var courseID = $(targetObject).data("course-id" ) ;
		$("#confirmAction").modal('hide');
	});

	
	$("#addCourseManager").on('show.bs.modal',function(e){
		targetObject = e.relatedTarget;
		//var courseID = $(targetObject).data("course-id");
		//console.log(courseID);
		$("#searchUserText").show();
		$("#searchUserText").focus();
	});

	$("#addCourseManager").on('hidden.bs.modal',function(){
		$("#searchUserText").hide();
		$("#searchUserText").val(null);
		$('#searchResultPanel').hide();
		
		//claims memory
		//targetObject = null;
		//console.log("targetObject="+targetObject);

	});

	$("#searchUserText").on("keypress",function(e){
		if(e.which == 13){
			e.preventDefault();

			console.log( "<?= site_url('main/ajaxSearchUser')?>" + "?key=nameTH_em&val="+ $("#searchUserText").val());

			$.get("<?=site_url('main/ajaxSearchUser')?>", { key:"nameTH_em" ,val: $("#searchUserText").val() }, 
			function(data){
				console.log(data.length);
				$.each(data,function(key,user){
					console.log(user.userID+":"+user.forName+user.firstName+" "+user.lastName);
				});

				if(data.length == 0){
					alert("ไม่พบข้อมูลที่ค้นหา");
					$('#searchResultPanel').hide();
				}
				else{
					alert("พบข้อมูลที่ค้นหา"+ data.length +"รายการ");
					$('#searchResultPanel').show('slow');
					$("#searchResult").html("");
					var courseID = $(targetObject).data("course-id");
					console.log("course id="+courseID);
					$.each(data,function(key,user){
						var managerName = user.firstName+" "+user.lastName ;
						var html = "<a class='user-select btn btn-primary' data-toggle='modal' data-uid='"+user.userID+"' ";
					   html += "data-manager-name='" + managerName + "' data-action='addCourseManager' href='#confirmAction'>"+ managerName +"</a>";
						$("#searchResult").append(html);
					});
				}

			},"json");
		}
	});
</script>
