<script src="<?= base_url('assets') ?>/js/tinymce/tinymce.min.js"></script>
<script>

	$('body').on('mouseover','.nameSelect',function(){
		console.log(this);
		$('.removeName').hide();
		$(this).closest('tr').find('span').show();
	});

	$('body').on('click','.removeName',function(){
	   var userID = $(this).data("uid");
		var tr = $(this).closest('tr');
		console.log("userid="+userID);
		console.log("courseID="+<?= $courseID ?>);
		console.log("here");

	 	$.post('<?=site_url("main/ajax_removeCommittee") ?>',{ "courseID" : <?= $courseID ?>, "userID" : userID  },function(data){
				 if(data.success === true ){
				 	 console.log("yeah");
				    $(tr).remove();
				 }
				 else{
				 	console.log(data);
				 }
		},"json" );
	});

	$('body').on('click','.user-select',function(){
			var userID =  $(this).data("uid" ) ;
			var committeeName = $(this).data("committee-name");
			console.log("userID="+userID);
			console.log("committeeName="+committeeName);
			 $.post('<?=site_url("main/ajax_addCommittee")?>',{ "courseID" : <?= $courseID ?>, "userID" : userID  },function(data){
						  if(data.success === true ){
						 	 var prev = $('body').find('table:first').find('tr:last').prev();
							 var num = parseInt( prev.find('th:first').html() );
							 num = num+1; 
							 var html = "<tr><th>"+num+"</th><td>";
								 html+=  "<a class='nameSelect' href='#'>"+committeeName+"</a>&nbsp;&nbsp;";
								 html+=  "<span class='removeName' data-uid='"+ userID +"' style='display:none;cursor:pointer'><i class='fa fa-times' aria-hidden='true'></i></span>";
								 html += "</td><td>กรรมการ</td></tr>";
							 $(prev).after(html) ;	
						  		
							 $("#addCommittee").modal('hide');
						  }else{
							  alert("Something wrong!");
						  }
				  });//end post

	});


/*
	$('#addCommittee').click(function(e){
		e.preventDefault();
		var prev = $(this).closest('table').find('tr:last').prev();
		var num = parseInt( prev.find('th:first').html() );
		num = num+1; 
      var html = "<tr><th>"+num+"</th><td>";
			html+=  "<a class='nameSelect' href='#'>abcName</a>&nbsp;&nbsp;";
			html+=  "<span class='removeName' style='display:none;cursor:pointer'><i class='fa fa-times' aria-hidden='true'></i></span>";
			html += "</td><td></td></tr>";
		$(prev).after(html) ;	
	});
*/

	$('#saveFirst').click(function(e){
		e.preventDefault();

		$.post('<?= site_url("main/ajax_saveCourseInfo1") ?>',{ 
					"courseID" : <?= $courseID ?>, 
					"code" : $('#code').val(),  
					"name" : $('#name').val(),  
					"nameENG" : $('#nameENG').val()  
					},
					function(data){
						  if(data.success === true ){
							 $("#successAction").modal('show');
						  }else{
							  alert("Something wrong!");
						  }
		},"json");//end post

	});

	$('#saveSecond').click(function(e){
		e.preventDefault();
		$.post('<?= site_url("main/ajax_saveCourseInfo2") ?>',{ 
					"courseID" : <?= $courseID ?>, 
					"degree_name" : $('#degree_name').val(),  
					"degree_nameENG" : $('#degree_nameENG').val(),  
					"degree_short_name" : $('#degree_short_name').val(),  
					"degree_short_nameENG" : $('#degree_short_nameENG').val()  
					},
					function(data){
						  if(data.success === true ){
							 $("#successAction").modal('show');
						  }else{
							  alert("Something wrong!");
						  }
		},"json");//end post

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
					$.each(data,function(key,user){
						var committeeName = user.firstName+" "+user.lastName ;
						var html = "<a class='user-select btn btn-primary' data-uid='"+user.userID+"' ";
					   html += "data-committee-name='" + committeeName + "' href='#'>"+ committeeName +"</a>";
						$("#searchResult").append(html);
					});
				}

			},"json");
		}
	});

</script>

<script>
tinymce.init({
    selector:   "#hidden-mce",
	 menubar: false,
	 theme: 'modern',
});

</script>
