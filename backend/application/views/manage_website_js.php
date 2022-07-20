<script src="<?= base_url('assets') ?>/js/tinymce/tinymce.min.js"></script>
<script>

function saveContent(){
	var content = tinymce.get('web-content').getContent();
	console.log(content);
	$.post( '<?= site_url('main/ajax_saveWebContent') ?>' , { 'courseID' : <?= $courseID ?>, 'content' : content  } ,function(data){
		if(data.success == true){
			alert("บันทึกสำเร็จ");
		}
	},"json");
}

tinymce.init({
    selector:   "#web-content",
	 content_css : "<?=base_url('/assets/css/tinymce_style.css')?>,https://fonts.googleapis.com/css?family=Athiti|Chonburi|Itim|Kanit|Maitree|Mitr|Pattaya|Pridi|Prompt|Sriracha|Taviraj|Trirong", 
	 font_formats: 'Google Kanit=Kanit, sans-serif;Google Prompt=Prompt, sans-serif; Taviraj=Taviraj, serif; Trirong=Trirong, serif; Athiti=Athiti, sans-serif; Pridi=Pridi, serif; Itim=Itim, cursive; Mitr=Mitr, sans-serif; Chonburi=Chonburi, cursive; Maitree=Maitree, serif; Pattaya=Pattaya, sans-serif; Sriracha=Sriracha, cursive;',
	 fontsize_formats: ' 10pt 12pt 14pt 16pt 18pt 20pt 22pt 24pt 26pt 28pt 30pt 32pt 34pt 36pt',
	 menubar: false,
	 theme: 'modern',
	 branding: false,
    height: 400,
	 relative_urls: false,
	 remove_script_host: false,
	 document_base_url: "<?= base_url() ?>",
plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak imagetools",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons paste textcolor responsivefilemanager code fullscreen"
   ],
   toolbar1: " save fontselect   fontsizeselect | bold italic forecolor backcolor  styleselect removeformat |  bullist numlist link unlink ",
	toolbar2: " strikethrough underline  | alignleft aligncenter alignright  table outdent indent | responsivefilemanager |  anchor  print preview code fullscreen ",
   image_advtab: true,
	external_filemanager_path: "<?= base_url('/filemanager/')?>",
   filemanager_title: "Filemanager" ,
   filemanager_root: "<?= $courseID ?>" ,
   external_plugins: { "filemanager" : "<?= base_url('/filemanager/plugin.min.js') ?>" }
	,save_onsavecallback: function(){
	   var editor = tinymce.get('web-content');
		var content = editor.getContent();
		$.post( '<?= site_url('main/ajax_saveWebContent') ?>' , { 'courseID' : <?= $courseID ?>, 'content' : content  } ,function(data){
			if(data.success == true){
				editor.notificationManager.open({ 
					text: 'Save complete',
					type:  'success',
					timeout: 3000
				});
			}
		 },"json");
	 } //end save_callbak
	 

	});
</script>
