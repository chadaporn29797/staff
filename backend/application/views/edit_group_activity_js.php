<!--research group activity script-->
<script>

var activity_table=$('#activity-table').DataTable(
	{
		"ajax": "<?= site_url("command/ajax_getGroupActivities/$groupID")?>",
	   rowId : 'activityID',
		bLengthChange: false,
		'dom': 'Bfrltip',
		//order: [ [0,'desc']],
		columnDefs: [
		{ "width" : "100px" , "targets" : 0 },
		{ "width" : "400px" , "targets" : 1},
		],
     "columns": [
            { title : "วันที่สร้าง", "data": "createDate" },
            { title : "ชื่อเรื่อง" ,"data": "title" },
            { title : "ผู้เพิ่ม" ,"data": "firstName" },
				{ "data" : null, 
				  "defaultContent" : "<button class='edit-activity btn btn-default'>Edit</button><button class='delete-activity btn btn-default'>Delete</button><button class='preview-activity btn btn-default'>Preview</button>"  }
      ],
		"buttons" : [
			   { text : "เพิ่มข่าว/กิจกรรม",
				  className : "btn btn-default",
				  action : function(){ 
				  		resetActivityForm();
				  		$('#add-new-activity')
						.modal({ keyboard: true, backdrop: 'static' })
						.modal('show');  
						//console.log($('#add-new-activity'));
					}  
				}
		]
	}
);

var research_table=$('#research-table').DataTable(
	{
		"ajax": "<?= site_url("command/ajax_getGroupResearches/$groupID")?>",
	   rowId : 'researchID',
		bLengthChange: false,
		'dom': 'Bfrltip',
		//order: [ [0,'desc']],
		columnDefs: [
		{ "width" : "400px" , "targets" : 0 },
		{ "width" : "200px" , "targets" : 1},
		],
     "columns": [
            { title : "ชื่องานวิจัย", "data": "title" },
            { title : "ผู้บันทึก" ,"data": "creator" },
				{ "data" : null, 
				  "defaultContent" : "<button class='edit-research btn btn-default'>Edit</button><button class='delete-research btn btn-default'>Delete</button><button class='preview-research btn btn-default'>Preview</button>"  }
      ],
		"buttons" : [
			   { text : "เพิ่มงานวิจัย",
				  className : "btn btn-default",
				  action : function(){ 
				  		resetResearchForm();
				  		$('#add-new-research')
						.modal({ keyboard: true, backdrop: 'static' })
						.modal('show');  
						//console.log($('#add-new-activity'));
					}  
				}
		]
	}
);





$('#activity-link-btn').click(function(){
		var link = $('#activity-link').val();
		var activityID=$('#save-activity-btn').data('id') ; 
		if( !link ){
			alert('กรุณาแนบลิงค์');
			return; 
		}

		$.post("<?= site_url('command/ajax_addActivityLink') ?>", 
			{ 
				link : link , 
				activityID : activityID,
				groupID : <?= $groupID ?>,
				title : $('#activity-title').val(),
				text : $('#activity-text').val()
			
			},
			function(data){
				 if(data.success == true){
						 var html = "<li><a href='"+link+"' target='_blank'>"+link+"</a>";
						 html +="<a class='delete-link' data-id='"+data.linkID+"' href='#'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a> </li>";
						 $('#activity-links ul').append(html);
						 $('#save-activity-btn').data('id', data.activityID);
						 $('#activity-link').val(null);
				 }else{ }

			},'json');

});


function resetActivityForm(){
	$('#activity-image').val(null);
	$('#activity-title').val(null);
	$('#activity-text').val(null);
	$('#activity-images ul').empty();
	$('#activity-links ul').empty();
}


function resetResearchForm(){
	$('#research-title').val(null);
	$('#research-summary').val(null);
	$('#upload-research').val(null);
   $('#research-documents ul').empty();
	$('#rmember-panel ul').empty();
}


//upload image onchange
$('#upload-image').change(function(){
	var file_data = $(this).prop('files')[0];   
	$('#activity-image').val(file_data.name);
});

$('#activity-image-btn').click(function(){
		var file_data = $('#upload-image').prop('files')[0];   
		if( file_data == null ){
			alert('กรุณาเลือกไฟล์ก่อนนะครับ');
			return; 
		}
		$('#activity-image').val(file_data.name);
		if(file_data != null){
				var form_data = new FormData();                  
				var activityID=$('#save-activity-btn').data('id') ; 
				//console.log("activityID="+activityID);
				form_data.append('file', file_data);
				form_data.append('groupID',<?= $groupID ?>);
				form_data.append('title',$('#activity-title').val());
				form_data.append('text',$('#activity-text').val());
				form_data.append('activityID', activityID);
				$.ajax({
								url: '<?= site_url('command/upload_activity_image') ?>', // point to server-side PHP script 
								dataType: 'json',  // what to expect back from the PHP script, if anything
								cache: false,
								contentType: false,
								processData: false,
								data: form_data,                         
								type: 'post',
								success: function(data){
								  if(data.success == true){
											 var html = "<li><a href='<?=base_url('uploads')?>/"+data.upload_data.file_name+"' target='_blank'>";
											 html+= data.upload_data.orig_name+"</a>";
											 html +="<a class='delete-image' data-id='"+data.imageID+"' href='#'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a> </li>";
											 html+= "</li>"
											 $('#activity-images ul').append(html);
											 $('#save-activity-btn').data('id', data.activityID);
											 $('#activity-image').val(null);
					 						 $('#upload-image').val(null);
								  }else{
											 alert(data.message);
								  }
								}
				 });
		  }
});



 $('#activity-links').on('click','.delete-link',function(){
	var linkID= $(this).data("id");
	var that = this ;
	 if( confirm( "ท่านต้องการลบลิงค์ ใช่หรือ่ไม่ ?" )){
		  $.post('<?= site_url('command/ajax_deleteActivityLink') ?>'
		  , { linkID : linkID }
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

$('#activity-images').on('click','.delete-image',function(){
	var imageID= $(this).data("id");
	var that = this ;
	 if( confirm( "ท่านต้องการลบรูป ใช่หรือ่ไม่ ?" )){
		  $.post('<?= site_url('command/delete_activity_image') ?>'
		  , { imageID : imageID, groupID : <?= $groupID?> }
		  ,function(data){
		  	if(data.success == true){
				alert("ลบรูปสำเร็จ");
				var ul = that.parentNode;
				ul.parentNode.removeChild(ul);
			}else{
				alert(data.message);
			}
		  },"json");
	 }
	 	 
});


$('#save-activity-btn').click( function(){

	if(!$('#activity-title').val()){
		alert('กรุณาใส่หัวข้อข่าว/กิจกรรม');
		$('#activity-title').focus();
		return;
	}
	if(!$('#activity-text').val()){
		alert('กรุณาใส่เนื้อหาข่าว/กิจกรรม');
		$('#activity-text').focus();
		return;
	}

	 var groupID= <?= $groupID ?>;
	 var  title = $('#activity-title').val();
	 var text = $('#activity-text').val();
	 var activityID =$(this).data('id');
	 $.post('<?= site_url('command/ajax_addActivity') ?>'
		  	, { groupID : groupID , title : title , text : text , activityID : activityID  }
		   ,function(data){
					  if(data.success == true){
						  location.reload(true);
					  }else{
						  alert(data.message);
					  }
	},"json");
	 	 
});

$('#research-table tbody').on('click', 'button.edit-research', function(){
		  var researchID = research_table.row( $(this).parents('tr') ).data().researchID;
		  $.get("<?= site_url('command/ajax_getGroupResearch') ?>/"+researchID,
		  	 	 function(data){
				 	console.log(data.info);
				 	console.log(data.documents);
				 	console.log(data.members);

					var info = data.info;	
					$('#research-title').val(info.title);
					$('#research-summary').val(info.summary);

					$('#save-research-btn').data('id',researchID) ; 

					$('#research-documents ul').empty();
					$.each(data.documents,function(key,rdoc){
								var html = "<li><a href='<?=base_url('../files/groups')."/$groupID/research" ?>/"+rdoc.file_name+"' target='_blank'>";
								html+= rdoc.orig_name+"</a>";
								html +="<a class='delete-research-document' data-id='"+rdoc.documentID+"' href='#'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a> </li>";
								html+= "</li>"
								$('#research-documents ul').append(html);
					});

					$('#rmember-panel ul').empty();
					$.each(data.members,function(key,member){
								var html = "<li>"+( member.forName == null ? "" : member.forName )+member.firstName+" "+member.lastName;
								html +="<a class='delete-research-member' data-id='"+member.userID+"' href='#'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a> </li>";
							  $('#rmember-panel ul').append(html);
							  $rmember.val(null);

					});

					$('#add-new-research')
						.modal({ keyboard: true, backdrop: 'static' })
						.modal('show');  

		   },"json"); 
});


$('#activity-table tbody').on('click', 'button.edit-activity', function(){
		  var activityID = activity_table.row( $(this).parents('tr') ).data().activityID;
		  $.get("<?= site_url('command/ajax_getActivity') ?>/"+activityID,
		  	 	 function(data){
				 	console.log(data.info);
				 	console.log(data.images);
				 	console.log(data.links);

					var info = data.info;	
					$('#activity-title').val(info.title);
					$('#activity-text').val(info.text);

					$('#save-activity-btn').data('id',activityID) ; 

					$('#activity-images ul').empty();
					$.each(data.images,function(key,image){
						//console.log(image.file_name);
						//console.log(image.imageID);
						//console.log(image.orig_name);
						var html = "<li><a href='<?=base_url("../files/groups/$groupID/activity")?>/"+image.file_name+"' target='_blank'>";
						html+= image.orig_name+"</a>";
						html +="<a class='delete-image' data-id='"+image.imageID+"' href='#'>";
						html +="<span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a> </li>";
						html+= "</li>";
						$('#activity-images ul').append(html);
					});

					$('#activity-links ul').empty();
					$.each(data.links,function(key,link){
						 var html = "<li><a href='"+link.linkTarget+"' target='_blank'>"+link.linkTarget+"</a>";
						 html +="<a class='delete-link' data-id='"+link.linkID+"' href='#'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a> </li>";
						 $('#activity-links ul').append(html);
					});
				  $('#activity-link').val(null);


					$('#add-new-activity')
						.modal({ keyboard: true, backdrop: 'static' })
						.modal('show');  

		   },"json"); 
});

$('#activity-table tbody').on('click', 'button.delete-activity', function(){
		  var data = activity_table.row( $(this).parents('tr') ).data();
		  var activityID = data.activityID;
		  if( confirm("ต้องการลบข่าว/กิจกรรมนี้ ใช่หรือไม่?")){
		  		$.post('<?= site_url('command/ajax_deleteActivity') ?>', { activityID : activityID, groupID : <?= $groupID ?> },
				  function(data){
						if(data.success == true){
							//alert('ลบสำเร็จ');
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



</script>


