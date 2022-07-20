<script src="<?= base_url('assets') ?>/js/fancybox/jquery.fancybox.min.js"></script>
<script src="<?= base_url('assets') ?>/js/typeahead/bootstrap3-typeahead.min.js"></script>
<script src="<?= base_url('assets') ?>/js/notify.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.15/b-1.3.1/se-1.2.2/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>

<?php $this->load->view('edit_group_activity_js', array( "groupID" => $groupID ) ); ?>

<script>
var users ;
var members=[];
var rmembers=[];
var $input = $('#group-members');
var $rmember = $('#research-members');


$.get("<?=site_url("main/ajax_getUsers")?>",function(data){
	users = data;
	$input.typeahead({ 
			source: data
	});

	$rmember.typeahead({ 
			source: data
	});

},"json");

function registerCloseBtn(){
		  $('.alert').off('closed.bs.alert');
		  $('.alert').on('closed.bs.alert',function (){
			  removeMember( $(this).data("id"));
		  })
}


function addMember(current){
		console.log("add member ("+current.id+","+current.name+")" );
		//ajax check if not exist 
		$.get("<?= site_url("command/ajax_isExistMember")?>"
		      , { groupID : <?= $groupID ?> , userID : current.id }
				, function(data){
							if(data.exist == true ){
								alert("User Exist");	
							}

							else {
										members[members.length] = { id : current.id, name : current.name };
										var input = "<div class='col-md-5'><div class='alert alert-success alert-dismissible' data-id='"+current.id+"' role='alert'>";
										input += "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+current.name+"</div></div>";
										$('#member-panel').append(input);
										$input.val(null);
										registerCloseBtn();
										$.each(members,function(key,val){ console.log( val ) });
										console.log("------------------------------");
							}
									},"json" );
}

function removeMember(id){
		for(var i=0; i < members.length; i++){
			var member = members[i];
			if( member.id == id ){
				members.splice(i,1);	
				$.each(members,function(key,val){ console.log( val ) });
				break;
			}
		}
}


function uploadImage(){
		var file_data = $('#upload-image').prop('files')[0];   
		if( file_data == null ){
			alert('กรุณาเลือกไฟล์ก่อนนะครับ');
			return; 
		}
		$('#activity-image').val(file_data.name);
		if(file_data != null){
				var form_data = new FormData();                  
				var groupID=<?= $groupID ?> ;
				form_data.append('file', file_data);
				form_data.append('groupID',<?= $groupID ?>);
				$.ajax({
								url: '<?= site_url('command/upload_group_image') ?>', // point to server-side PHP script 
								dataType: 'json',  // what to expect back from the PHP script, if anything
								cache: false,
								contentType: false,
								processData: false,
								data: form_data,                         
								type: 'post',
								success: function(data){
									alert("Upload Successfull");
									location.reload(true);
								}
				 });
		  }

}






//upload image onchange
$('#upload-image').change(function(){
	var file_data = $(this).prop('files')[0];   
	uploadImage();
});


$('#save-research-btn').click( function(){

	if(!$('#research-title').val()){
		alert('กรุณาใส่ชื่องานวิจัย');
		$('#research-title').focus();
		return;
	}
	if(!$('#research-summary').val()){
		alert('กรุณาระบุสรุปงานวิจัย');
		$('#research-summary').focus();
		return;
	}

	 var groupID= <?= $groupID ?>;
	 var  title = $('#research-title').val();
	 var summary = $('#research-summary').val();
	 var researchID =$(this).data('id');
	 $.post('<?= site_url('command/ajax_addResearch') ?>'
		  	, { groupID : groupID , title : title , summary : summary , researchID : researchID  }
		   ,function(data){
					  if(data.success == true){
						  location.reload(true);
					  }else{
						  alert(data.message);
					  }
	},"json");
	 	 
});




$('#upload-research').change(function(){
	var file_data = $(this).prop('files')[0];   
	$('#research-file').val(file_data.name);
});

$('#research-file-btn').click(function(){
		var file_data = $('#upload-research').prop('files')[0];   
		if( file_data == null ){
			alert('กรุณาเลือกไฟล์ก่อนนะครับ');
			return; 
		}
		//$('#research-file').val(file_data.name);
		if(file_data != null){
				var form_data = new FormData();                  

				var researchID=$('#save-research-btn').data('id') ; 
				console.log("researchID="+researchID);
				form_data.append('file', file_data);
				form_data.append('groupID',<?= $groupID ?>);
				form_data.append('title',$('#research-title').val());
				form_data.append('summary',$('#research-summary').val());
				form_data.append('researchID', researchID);
				$.ajax({
								url: '<?= site_url('command/upload_research_document') ?>', // point to server-side PHP script 
								dataType: 'json',  // what to expect back from the PHP script, if anything
								cache: false,
								contentType: false,
								processData: false,
								data: form_data,                         
								type: 'post',
								success: function(data){
								  if(data.success == true){
											 var html = "<li><a href='<?=base_url('../files/groups')."/$groupID/research" ?>/"+data.upload_data.file_name+"' target='_blank'>";
											 html+= data.upload_data.orig_name+"</a>";
											 html +="<a class='delete-research-document' data-id='"+data.documentID+"' href='#'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a> </li>";
											 html+= "</li>"
											 $('#research-documents ul').append(html);
											 $('#save-research-btn').data('id', data.researchID);
											 $('#research-file').val(null);
					 						 $('#upload-research').val(null);
											console.log("researchID="+data.researchID);
								  }else{
											 alert(data.message);
								  }
								}
				 });
		  }
});


$('#add-research-member-btn').click(function(){
	var current = $rmember.typeahead("getActive");
	var researchID=$('#save-research-btn').data('id') ; 
	//addResearchMember(current);
	$.post("<?= site_url("command/ajax_addResearchMember")?>"
		      , { 
						researchID : researchID 
						,userID : current.id 
						,groupID : <?= $groupID ?>
						,title : $('#research-title').val()
						,summary : $('#research-summary').val()
					}
				, function(data){
						 if(data.success == true ){
								var html = "<li>"+current.name;
								html +="<a class='delete-research-member' data-id='"+data.id+"' href='#'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a> </li>";
							  $('#rmember-panel ul').append(html);
							  $rmember.val(null);
							 $('#save-research-btn').data('id', data.researchID);
						 }
						 else{
						 	 alert("ไม่สามารถเพิ่มได้");
						 }
	},"json" );

	
});

 $('#rmember-panel').on('click','.delete-research-member',function(){
	var userID= $(this).data("id");
	var researchID=$('#save-research-btn').data('id') ; 
	var that = this ;
	 if( confirm( "ท่านต้องการลบสมาชิกท่านนี้ ใช่หรือ่ไม่ ?" )){
		  $.post('<?= site_url('command/ajax_deleteResearchMember') ?>'
		  , { userID : userID, researchID : researchID }
		  ,function(data){
		  	if(data.success == true){
				var ul = that.parentNode;
				ul.parentNode.removeChild(ul);
			}else{
				alert(data.message);
			}
		  },"json");
	 }

 });

$('#research-documents').on('click','.delete-research-document',function(){
	var documentID= $(this).data("id");
	var groupID= <?= $groupID ?>;
	var that = this ;
	 if( confirm( "ท่านต้องการลบสมาชิกท่านนี้ ใช่หรือ่ไม่ ?" )){
		  $.post('<?= site_url('command/ajax_deleteResearchDocument') ?>'
		  , { documentID : documentID , groupID : groupID }
		  ,function(data){
		  	if(data.success == true){
				var ul = that.parentNode;
				ul.parentNode.removeChild(ul);
			}else{
				alert(data.message);
			}
		  },"json");
	 }

 });


$('#research-table tbody').on('click', 'button.delete-research', function(){
		  var data = research_table.row( $(this).parents('tr') ).data();
		  var researchID = data.researchID;
		  if( confirm("ต้องการลบงานวิจัยนี้ ใช่หรือไม่?")){
		  		$.post('<?= site_url('command/ajax_deleteGroupResearch') ?>', { researchID : researchID, groupID : <?= $groupID ?> },
				  function(data){
						if(data.success == true){
							location.reload(true);
						}else{
							alert('Error');
						}
					},"json"
				);
		  }

});

$('#activity-table tbody').on('click', 'button.preview-activity', function(){
		  var data = activity_table.row( $(this).parents('tr') ).data();
		  alert("Preview"+ data.activityID);
});




$('#add-member-btn').click(function(){
	var current = $input.typeahead("getActive");
	if( current.id == <?= $userID?>){
		return;
	}
	if(current){
		//loop in array
		var exist=false;
		for(var i=0; i < members.length; i++){
			var member = members[i];
			console.log(i+":"+member.id+","+member.name);
			if( member.id == current.id ){
				exist = true;
				console.log("exist");
				break;
			}
			//	
		}
		(exist != true)&&addMember(current);
	}
});


$('#edit-groupName-btn').click(function(){
	$.post('<?= site_url('command/ajax_updateGroupName') ?>' , 
			{ groupID : <?= $groupID ?>, name : $('#e-groupName').val()  }
			,function(data){ 
				if(data.success == true){
					location.reload(true);
				}else{
					alert("Error");
				}
			}
	,"json");
});

$('#edit-shortDescription-btn').click(function(){
		$.post('<?= site_url('command/ajax_updateGroupDescription') ?>' , 
				{ groupID : <?= $groupID ?>, shortDescription : $('#e-shortDescription').val()  }
			,function(data){ 

				if(data.success == true){
					location.reload(true);
				}else{
					alert("Error");
				}
			}
		,"json");
});

$('#edit-detail-btn').click(function(){
		$.post('<?= site_url('command/ajax_updateGroupDetail') ?>' , 
				{ groupID : <?= $groupID ?>, detail : $('#e-detail').val()  }
			,function(data){ 

				if(data.success == true){
					location.reload(true);
				}else{
					alert("Error");
				}
			}
		,"json");
});


$('#save-member-btn').click(function(){
   	var groupID = <?= $groupID ?> ;
		$.post('<?= site_url('command/ajax_addGroupMembers') ?>' , { groupID : groupID, members : members },function(data){ 
				if(data.success == true){
						location.reload(true);
				}else{
					alert('มีข้อผิดพลาดในการเพิ่มสมาชิก');
					location.reload(true);
				}
		},"json");
		
				

});


$('.remove-user').click(function(e){
		e.preventDefault();
		if( confirm("ต้องการลบสมาชิกใช่หรือไม่ ? ")){
			console.log("delete group=<?=$groupID?> userID ="+$(this).data("id"));
			$.post('<?= site_url('command/ajax_deleteGroupMember') ?>' , { groupID : <?= $groupID ?>, userID : $(this).data("id") },function(data){ 
				if(data.success == true){
						location.reload(true);
				}else{
					alert('มีข้อผิดพลาดในการลบสมาชิก');
				}
		},"json");

		}

});


</script>
