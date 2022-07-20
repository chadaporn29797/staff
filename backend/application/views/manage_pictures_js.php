<script>

$('#manage-activity-pictures').click(function(e){
	e.preventDefault();


	tinymce.activeEditor.windowManager.open({
				title: "My html dialog",
				url: '<?= base_url("/filemanager/dialog.php?type=1&fldr=activity&filemanager_root=$courseID") ?>',
				width: 900,
				height: 600
	});

});
</script>
