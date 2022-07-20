<script src="<?= base_url('assets') ?>/js/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
  selector: 'textarea',
  height: 200,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'undo redo |  styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link ',
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css']
});

//submit overview
$('#submit-overview').click(function(e){

	var content =	tinymce.get('description').getContent();
	$.post( '<?= site_url('main/ajaxSetDescription') ?>', { 'userID' : <?= null == $userID ? 'null' : $userID  ?> ,'description': content }, function(data){
		if(data.success == true){
			$('#SuccessModal').modal("show");
		}
	},'json');
});



</script>
