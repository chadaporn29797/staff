<script src="http://staff.sci.ubu.ac.th/assets/js/jquery.Jcrop.min.js"></script>
<script>
var canvas;
var image;
var tmpImage;
var jcrop_api;
var prefsize;
var crop_max_width = 450;
var crop_max_height = 450;
var isSave = false;
initImage();

$('#edit-btn').click(function(){
	$(this).prop('disabled',true);
	$('#save-btn').prop('disabled',false);
  
  $("#canvas").Jcrop({
	 //aspectRatio: 1,
	 bgColor: 'black',
	 bgOpacity: .4,
	 //minSize: [128,128],
	 //maxSize: [256,256],
    onSelect: selectcanvas,
    onRelease: clearcanvas,

  }, function() {
    jcrop_api = this;
	 if(!isSave){
  	 	jcrop_api.animateTo( [20,20,127,127 ]);
	 }
	 else{
	 	isSave = false;
	 }
  });
  clearcanvas();

});


$('#save-btn').click(function(e){
  e.preventDefault();
  var r = confirm("บันทึก เป็นรูปโปรไฟล์ปัจจุบันหรือไม่!");
  if (r == true) {
		applyCrop();
  		var blob = canvas.toDataURL('image/png');
		//console.log(blob);
		/*
		console.log(blob.toString());
  		//---Add file blob to the form data
  		$.post( "<?= site_url('main/ajax_upload_avatar') ?>", { "userID" : "<?= $info->ubu_mail ?>" ,"image" : blob },function(data){
				if(data.success == true){
				  alert("Success");
				  jcrop_api.release();
				  $(this).prop('disabled',true);
		        $('#edit-btn').prop('disabled',false);
				}
				else{
				  alert("Error");
				}
  	 	},"json");
		*/
	   var fd = new FormData();	
	  fd.append("userID","<?= $info->ubu_mail ?>" );
	  fd.append("image", blob);
	  var xhr = new XMLHttpRequest();
	  xhr.open("POST", "<?= site_url('main/ajax_upload_avatar') ?>"); 
	  //xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	  xhr.onreadystatechange = function(){
	  	  if (xhr.readyState === XMLHttpRequest.DONE) {
				console.log(xhr.responseText);
				$('#avatar-icon').prop('src', blob);
		  }
	  }
	  xhr.send(fd);

  }
});

function initImage(){
	canvas= null;
	image=new Image();
	image.src ="<?= base_url("../avatars/".$info->ubu_mail.".png")."?".rand() ?>" ;
	image.onload = function(e){
		 $("#crop-canvas").empty();
		 $("#crop-canvas").append("<canvas id=\"canvas\">");
		 canvas = $("#canvas")[0];
		 context = canvas.getContext("2d");
		 canvas.width = this.width;
		 canvas.height = this.height;
		 context.drawImage(this, 0, 0);
	}
}


$("#file").change(function() {
  loadImage(this);
	$('#edit-btn').prop('disabled',true);
	$('#save-btn').prop('disabled',false);
});

function loadImage(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    canvas = null;
    reader.onload = function(e) {
      image = new Image();
      image.onload = validateImage;
      image.src = e.target.result;
    }
    reader.readAsDataURL(input.files[0]);
  }
}

function validateImage() {
  if (canvas != null) {
    image = new Image();
    image.onload = restartJcrop;
    image.src = canvas.toDataURL('image/png');
  } else restartJcrop();
}

function dataURLtoBlob(dataURL) {
  var BASE64_MARKER = ';base64,';
  if (dataURL.indexOf(BASE64_MARKER) == -1) {
    var parts = dataURL.split(',');
    var contentType = parts[0].split(':')[1];
    var raw = decodeURIComponent(parts[1]);

    return new Blob([raw], {
      type: contentType
    });
  }
  var parts = dataURL.split(BASE64_MARKER);
  var contentType = parts[0].split(':')[1];
  var raw = window.atob(parts[1]);
  var rawLength = raw.length;
  var uInt8Array = new Uint8Array(rawLength);
  for (var i = 0; i < rawLength; ++i) {
    uInt8Array[i] = raw.charCodeAt(i);
  }

  return new Blob([uInt8Array], {
    type: contentType
  });
}

function restartJcrop() {
  if (jcrop_api != null) {
    jcrop_api.destroy();
  }
  $("#crop-canvas").empty();
  $("#crop-canvas").append("<canvas id=\"canvas\">");
  canvas = $("#canvas")[0];
  context = canvas.getContext("2d");
  canvas.width = image.width;
  canvas.height = image.height;
  context.drawImage(image, 0, 0);
  $("#canvas").Jcrop({
	 //aspectRatio: 1,
	 bgColor: 'black',
	 bgOpacity: .4,
	 //minSize: [128,128],
	 //maxSize: [256,256],
    onSelect: selectcanvas,
    onRelease: clearcanvas,

  }, function() {
    jcrop_api = this;
	 if(!isSave){
  	 	jcrop_api.animateTo( [20,20,127,127 ]);
	 }
	 else{
	 	isSave = false;
	 }
  });
  clearcanvas();
}

function clearcanvas() {
  prefsize = {
    x: 0,
    y: 0,
    w: canvas.width,
    h: canvas.height,
  };

	$('#edit-btn').prop('disabled',false);
	$('#save-btn').prop('disabled',true);
}

function selectcanvas(coords) {
  prefsize = {
    x: Math.round(coords.x),
    y: Math.round(coords.y),
    w: Math.round(coords.w),
    h: Math.round(coords.h)
  };

	$('#edit-btn').prop('disabled',true);
	$('#save-btn').prop('disabled',false);
}

function applyCrop() {
	isSave = true;
  canvas.width = prefsize.w;
  canvas.height = prefsize.h;
  context.drawImage(image, prefsize.x, prefsize.y, prefsize.w, prefsize.h, 0, 0, canvas.width, canvas.height);
  validateImage();
}

function applyScale(scale) {
  console.log("apllyScale("+scale+")");
  var tmp_image = new Image();
  tmp_image.src = image.src;

  tmp_image.width = tmp_image.width* scale;
  tmp_image.height = tmp_image.height* scale;

  if (scale == 1) return;
  //canvas.width = tmp_image.width ;
  //canvas.height = tmp_image.height;
  context.clearRect(0, 0, canvas.width, canvas.height);
  context.drawImage(tmp_image, 0, 0, tmp_image.width, tmp_image.height);
}

function applyRotate() {
  canvas.width = image.height;
  canvas.height = image.width;
  context.clearRect(0, 0, canvas.width, canvas.height);
  context.translate(image.height / 2, image.width / 2);
  context.rotate(Math.PI / 2);
  context.drawImage(image, -image.width / 2, -image.height / 2);
  validateImage();
}

function applyHflip() {
  context.clearRect(0, 0, canvas.width, canvas.height);
  context.translate(image.width, 0);
  context.scale(-1, 1);
  context.drawImage(image, 0, 0);
  validateImage();
}

function applyVflip() {
  context.clearRect(0, 0, canvas.width, canvas.height);
  context.translate(0, image.height);
  context.scale(1, -1);
  context.drawImage(image, 0, 0);
  validateImage();
}

$("#form").submit(function(e) {
  e.preventDefault();
});


</script>
