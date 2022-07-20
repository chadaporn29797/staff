<script src="<?= base_url('Gentelella') ?>/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url('assets') ?>/js/fancybox/jquery.fancybox.min.js"></script>

<script>
	$('#delete-group').click(function(){
		var r=confirm("ยืนยันการลบกลุ่มนี้");
		if(r== true){
			$.post("<?= site_url("main/ajax_deleteGroup") ?>", { groupID : <?= $groupID ?> },function(data){
					if(data.success == true){
					  alert("delete success");
					  parent.jQuery.fancybox.getInstance().close();
					  parent.location.reload(true);
					}
			},"json" );
		}
	});

</script>
