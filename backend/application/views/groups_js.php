<script src="<?= base_url('assets') ?>/js/fancybox/jquery.fancybox.min.js"></script>
<script src="<?= base_url('assets') ?>/js/typeahead/bootstrap3-typeahead.min.js"></script>
<script src="<?= base_url('assets') ?>/js/notify.js"></script>

<script>
var users ;
var members=[];

var $input = $('#group-members');
$('[data-toggle="popover"]').popover();

$('[data-fancybox]').fancybox({
			buttons : ['close'] ,
			iframe: {
				preload : false,
				css : {
						 width : '600px', 
						 height : '300px' ,
						 'background-color' : 'pink',
						 margin : '0' 
				}


			}
});


$.get("<?=site_url("main/ajax_getUsers")?>",function(data){
	users = data;
	$input.typeahead({ 
			source: data
	});
},"json");


$('.delete-group').click(function(e){
	 var groupName = $(this).data("name");
	 var groupID = $(this).data("id");
	 var r = confirm("ต้องการลบกลุ่ม "+groupName+" ใช่หรือไม่ ?");
	 if( r == true){
				$.post('<?= site_url('command/ajax_deleteGroup') ?>' , { groupID : groupID },function(data){ 
					if(data.success == true){
	 				 alert("delete success");
					 location.reload(true);
					}
				},"json");
	 }
});

$('.group-info').on('hidden.bs.popover',function(e){ console.log("hidden"); });

$('.group-info').on('shown.bs.popover',function(e){
	e.preventDefault();
	var $input = $(this);
	 var groupID = $(this).data("group-id"); 	
		$.get('<?= site_url('main/ajax_getGroupMembers') ?>' , { groupID : groupID },function(data){ 

			//console.log(data);
						
			var html = "<ul>";	
			$.each(data,function(index,info){
				 if( typeof info === 'object'){
				 	 html = html+"<li>"+ info["name"] +"</li>";
				  }
			});

			html+="<ul>";
			setTimeout(function(){
						 $input.attr('data-content',html);
						 var popover = $input.data('bs.popover');
						 popover.setContent();
						 popover.$tip.addClass(popover.options.placement);

			},2000);
	 },"json");
 });


$('#add-group-btn').click(function(){
   var groupName = $('#group-name').val();
	if( "" == groupName){
			$('#group-name').notify(  'กรุณาใส่ชื่อกลุ่ม',{ position : "top" });
			return;
	}

	if( null != groupName){
		//ajax check exist groupName
		$.get('<?= site_url('main/ajax_isExistGroup') ?>' , { name : groupName },function(data){ 
			if(data.exist == true ){
				console.log("exist");
				$('#group-name').notify(  'ชื่อกลุ่มถูกใช้แล้ว',{ position : "top" });
			}
			else{
				console.log("Not exist, Add new group");
				$.post('<?= site_url('main/ajax_addNewGroup') ?>' , { name : groupName, userID : <?= $userID ?>, members : members },function(data){ 
					console.log(data);
					if(data.success == true){
						console.log("wow");
						location.reload(true);
					}
				},"json");
		
			}
				
		}
		,"json");
	}

});


function addMember(current){
		console.log("add member ("+current.id+","+current.name+")" );
		members[members.length] = { id : current.id, name : current.name };
		var input = "<div class='col-md-5'><div class='alert alert-success alert-dismissible' data-id='"+current.id+"' role='alert'>";
  		input += "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+current.name+"</div></div>";
		$('#member-panel').append(input);
		$input.val(null);
		registerCloseBtn();
		$.each(members,function(key,val){ console.log( val ) });
		console.log("------------------------------");
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


function registerCloseBtn(){
		  $('.alert').off('closed.bs.alert');
		  $('.alert').on('closed.bs.alert',function (){
			  //console.log(this);
			  removeMember( $(this).data("id"));
		  })
}


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


/*
var numbers = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.whitespace,
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  local: states
});

// initialize the bloodhound suggestion engine
numbers.initialize();

$('#group-members').typeahead({
	items:6,
	source: numbers.ttAdapter()
})
*/
	 </script>
   
