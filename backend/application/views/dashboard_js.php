<script src="<?= base_url('assets') ?>/js/tinymce/tinymce.min.js"></script>


<!-- iCheck -->
<script>
	var titles = {
		en: {
			overview: "Research Overview",
			education: "Educational Background",
			award: "Awards and Hornours",
			scholarship: "Scholarships",
			working: "Working Experiences",
			publication: "Publications",
			skill: "Skills",
			training: "Trainings"

		},
		th: {
			overview: "ภาพรวมงานวิจัย",
			education: "ประวัติการศึกษา",
			award: "รางวัลและเกียรติยศ",
			scholarship: "ทุนการศึกษา",
			working: "ประสบการณ์การทำงาน",
			publication: "ผลงานตีพิมพ์",
			skill: "ทักษะอื่นๆ",
			training: "การฝึกอบรม"
		}

	};

	$('input').iCheck({
		checkboxClass: 'icheckbox_flat-green',
		radioClass: 'icheckbox_flat-green',
	});
	//title change event 
	toggle_language("<?= $info->language ?>");


	$('input').on('ifChecked', function(event) {
		var lang;
		if ($(this).attr('id') == 'english_title')
			lang = 'en';
		else
			lang = 'th';
		toggle_language(lang);
		$.post("<?= site_url('main/ajax_toggleLanguage') ?>", {
			userID: <?= $userID ?>,
			language: lang
		}, function(data) {
			if (data.success == true) {
				location.reload(true);

				console.log("update language to " + lang);
			}
		}, "json");
	});

	function toggle_language(lang) {
		$('.dashboard-title').each(function(index) {
			var id = $(this).attr('id');
			var text = titles[lang][id];
			$(this).html(text);
		});
	}

	$('.dashboard-title').click(function() {
		alert($(this).attr("id"));
	});
</script>

<script>
	tinymce.init({
		selector: "textarea",
		height: 120,
		branding: false,
		plugins: [
			'advlist autolink lists link image charmap print preview anchor',
			'searchreplace visualblocks code fullscreen',
			'insertdatetime responsivefilemanager media table paste code'
		],
		toolbar: 'fullscreen undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent table | link responsivefilemanager',
		statusbar: false,
		menubar: false,
		paste_as_text: true,
		content_css: [
			'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
		],
		relative_urls: false,
		external_filemanager_path: "<?= base_url('filemanager') ?>/",
		filemanager_title: "Responsive Filemanager",
		external_plugins: {
			"filemanager": "<?= base_url('filemanager/plugin.min.js') ?>"
		},
		filemanager_root: "<?= $_SESSION['RF']['subfolder'] ?>"
	});


	// Prevent Bootstrap dialog from blocking focusin
	$(document).on('focusin', function(e) {
		if ($(e.target).closest(".mce-window").length) {
			e.stopImmediatePropagation();
		}
	});


	//RFM CALL BACK
	function responsive_filemanager_callback(field_id) {
		console.log(field_id);
		var url = jQuery('#' + field_id).val();
		alert('update ' + field_id + " with " + url);
		//your code 
	}

	//-------------------------------- Education --------------------------------//
	//addEductionModal success btn
	$('#addEducationModal .btn-success').on("click", function(e) {

		var content = tinymce.get('addEducationContent').getContent();
		$.post('<?= site_url('main/ajax_addDetail') ?>', {
			'userID': <?= $userID ?>,
			'detail': content,
			'tableName': 'education'
		}, function(data) {
			if (data.success == true) {
				location.reload(true);
			}
		}, "json");

	});

	$('#addEducationContent_bt').on("click", function(e) {

		var content = tinymce.get('addEducationContent').getContent();
		$.post('<?= site_url('main/ajax_addDetail') ?>', {
			'userID': <?= $userID ?>,
			'detail': content,
			'tableName': 'education'
		}, function(data) {
			if (data.success == true) {
				alert("เพิ่มสำเร็จ");
				location.reload(true);
			}
		}, "json");

	});


	$('.delete-education').click(function(e) {
		e.preventDefault();
		var target = $(this);
		var id = $(this).data("id");
		$.post('<?= site_url('main/ajax_deleteDetail') ?>', {
			'id': id,
			'tableName': 'education'
		}, function(data) {
			if (data.success == true) {
				alert("ลบสำเร็จ");
				$(target).closest('div .row').remove();
			}
		}, "json");
	});

	$('.delete-education2').click(function(e) {
		e.preventDefault();
		var target = $(this);
		var id = $(this).data("id");
		$.post('<?= site_url('main/ajax_deleteDetail') ?>', {
			'id': id,
			'tableName': 'education'
		}, function(data) {
			if (data.success == true) {
				alert("ลบสำเร็จ");
				$(target).closest('tbody tr').remove();
			}
		}, "json");
	});


	//editEduction Model action
	$('#editEducationModal').on('show.bs.modal', function(e) {
		$('#editEducationModal').data("id", $(e.relatedTarget).data("id"));
		var text = $(e.relatedTarget).parent().next().html();
		tinymce.get('editEducationContent').setContent(text);
	});


	$('.sort-education').on("click", function(e) {
		e.preventDefault();
		console.log($(this).data("id") + ":" + $(this).data("direction"));
		var id = $(this).data("id");
		var direction = $(this).data("direction");
		var sortOrder = $(this).data("sort-order");

		$.post('<?= site_url('main/ajax_sortDetail') ?>', {
			'tableName': 'education',
			'userID': <?= $userID ?>,
			'id': id,
			'sortOrder': sortOrder,
			'direction': direction
		}, function(data) {
			if (data.success == true) {
				location.reload(true);
			}
		}, "json");
	});


	$('#editEducationModal .btn-success').on("click", function(e) {
		$('#editEducationModal').modal("hide");
		var content = tinymce.get('editEducationContent').getContent();
		var id = $('#editEducationModal').data('id');
		console.log(content + ": " + id);
		$.post('<?= site_url('main/ajax_updateDetail') ?>', {
			'tableName': 'education',
			'id': id,
			'detail': content
		}, function(data) {
			if (data.success == true) {
				alert("บันทึกสำเร็จ");
				location.reload(true);
			}
		}, "json");
	});


	//-------------------------------- End Education --------------------------------//








	//-------------------------------- Awards --------------------------------//
	//addEductionModal success btn
	$('#addAwardModal .btn-success').on("click", function(e) {

		var content = tinymce.get('addAwardContent').getContent();
		$.post('<?= site_url('main/ajax_addDetail') ?>', {
			'userID': <?= $userID ?>,
			'detail': content,
			'tableName': 'award'
		}, function(data) {
			if (data.success == true) {
				location.reload(true);
			}
		}, "json");

	});

	$('#addAwardContent_bt').on("click", function(e) {

		var content = tinymce.get('addAwardContent').getContent();
		$.post('<?= site_url('main/ajax_addDetail') ?>', {
			'userID': <?= $userID ?>,
			'detail': content,
			'tableName': 'award'
		}, function(data) {
			if (data.success == true) {
				alert("เพิ่มสำเร็จ");
				location.reload(true);
			}
		}, "json");

	});





	$('.delete-award').click(function(e) {
		e.preventDefault();
		var target = $(this);
		var id = $(this).data("id");
		$.post('<?= site_url('main/ajax_deleteDetail') ?>', {
			'id': id,
			'tableName': 'award'
		}, function(data) {
			if (data.success == true) {
				alert("ลบสำเร็จ");
				$(target).closest('div .row').remove();
			}
		}, "json");
	});

	$('.delete-award2').click(function(e) {
		e.preventDefault();
		var target = $(this);
		var id = $(this).data("id");
		$.post('<?= site_url('main/ajax_deleteDetail') ?>', {
			'id': id,
			'tableName': 'award'
		}, function(data) {
			if (data.success == true) {
				alert("ลบสำเร็จ");
				$(target).closest('tbody tr').remove();
			}
		}, "json");
	});


	//editAward Model action
	$('#editAwardModal').on('show.bs.modal', function(e) {
		$('#editAwardModal').data("id", $(e.relatedTarget).data("id"));
		var text = $(e.relatedTarget).parent().next().html();
		tinymce.get('editAwardContent').setContent(text);
	});


	$('.sort-award').on("click", function(e) {
		e.preventDefault();
		console.log($(this).data("id") + ":" + $(this).data("direction"));
		var id = $(this).data("id");
		var direction = $(this).data("direction");
		var sortOrder = $(this).data("sort-order");

		$.post('<?= site_url('main/ajax_sortDetail') ?>', {
			'tableName': 'award',
			'userID': <?= $userID ?>,
			'id': id,
			'sortOrder': sortOrder,
			'direction': direction
		}, function(data) {
			if (data.success == true) {
				location.reload(true);
			}
		}, "json");
	});


	$('#editAwardModal .btn-success').on("click", function(e) {
		$('#editAwardModal').modal("hide");
		var content = tinymce.get('editAwardContent').getContent();
		var id = $('#editAwardModal').data('id');
		console.log(content + ": " + id);
		$.post('<?= site_url('main/ajax_updateDetail') ?>', {
			'tableName': 'award',
			'id': id,
			'detail': content
		}, function(data) {
			if (data.success == true) {
				alert("บันทึกสำเร็จ");
				location.reload(true);
			}
		}, "json");
	});


	//-------------------------------- End Awards --------------------------------//







	//-------------------------------- Scholarships --------------------------------//
	$('#addScholarshipModal .btn-success').on("click", function(e) {

		var content = tinymce.get('addScholarshipContent').getContent();
		$.post('<?= site_url('main/ajax_addDetail') ?>', {
			'userID': <?= $userID ?>,
			'detail': content,
			'tableName': 'scholarship'
		}, function(data) {
			if (data.success == true) {
				location.reload(true);
			}
		}, "json");

	});


	$('#addScholarshipContent_bt').on("click", function(e) {

		var content = tinymce.get('addScholarshipContent').getContent();
		$.post('<?= site_url('main/ajax_addDetail') ?>', {
			'userID': <?= $userID ?>,
			'detail': content,
			'tableName': 'scholarship'
		}, function(data) {
			if (data.success == true) {
				alert("เพิ่มสำเร็จ");
				location.reload(true);
			}
		}, "json");

	});


	$('.delete-scholarship').click(function(e) {
		e.preventDefault();
		var target = $(this);
		var id = $(this).data("id");
		$.post('<?= site_url('main/ajax_deleteDetail') ?>', {
			'id': id,
			'tableName': 'scholarship'
		}, function(data) {
			if (data.success == true) {
				alert("ลบสำเร็จ");
				$(target).closest('div .row').remove();
			}
		}, "json");
	});

	$('.delete-scholarship2').click(function(e) {
		e.preventDefault();
		var target = $(this);
		var id = $(this).data("id");
		$.post('<?= site_url('main/ajax_deleteDetail') ?>', {
			'id': id,
			'tableName': 'scholarship'
		}, function(data) {
			if (data.success == true) {
				alert("ลบสำเร็จ");
				$(target).closest('tbody tr').remove();
			}
		}, "json");
	});

	//editScholarship Model action
	$('#editScholarshipModal').on('show.bs.modal', function(e) {
		$('#editScholarshipModal').data("id", $(e.relatedTarget).data("id"));
		var text = $(e.relatedTarget).parent().next().html();
		tinymce.get('editScholarshipContent').setContent(text);
	});


	$('.sort-scholarship').on("click", function(e) {
		e.preventDefault();
		console.log($(this).data("id") + ":" + $(this).data("direction"));
		var id = $(this).data("id");
		var direction = $(this).data("direction");
		var sortOrder = $(this).data("sort-order");

		$.post('<?= site_url('main/ajax_sortDetail') ?>', {
			'tableName': 'scholarship',
			'userID': <?= $userID ?>,
			'id': id,
			'sortOrder': sortOrder,
			'direction': direction
		}, function(data) {
			if (data.success == true) {
				location.reload(true);
			}
		}, "json");
	});


	$('#editScholarshipModal .btn-success').on("click", function(e) {
		$('#editScholarshipModal').modal("hide");
		var content = tinymce.get('editScholarshipContent').getContent();
		var id = $('#editScholarshipModal').data('id');
		console.log(content + ": " + id);
		$.post('<?= site_url('main/ajax_updateDetail') ?>', {
			'tableName': 'scholarship',
			'id': id,
			'detail': content
		}, function(data) {
			if (data.success == true) {
				alert("บันทึกสำเร็จ");
				location.reload(true);
			}
		}, "json");
	});


	//-------------------------------- End Scholarships --------------------------------//




	//-------------------------------- Work_exps --------------------------------//
	$('#addWork_expModal .btn-success').on("click", function(e) {

		var content = tinymce.get('addWork_expContent').getContent();
		$.post('<?= site_url('main/ajax_addDetail') ?>', {
			'userID': <?= $userID ?>,
			'detail': content,
			'tableName': 'work_exp'
		}, function(data) {
			if (data.success == true) {
				location.reload(true);
			}
		}, "json");

	});

	$('#addWork_expContent_bt').on("click", function(e) {

		var content = tinymce.get('addWork_expContent').getContent();
		$.post('<?= site_url('main/ajax_addDetail') ?>', {
			'userID': <?= $userID ?>,
			'detail': content,
			'tableName': 'work_exp'
		}, function(data) {
			if (data.success == true) {
				alert("เพิ่มสำเร็จ");
				location.reload(true);
			}
		}, "json");

	});


	$('.delete-work_exp').click(function(e) {
		e.preventDefault();
		var target = $(this);
		var id = $(this).data("id");
		$.post('<?= site_url('main/ajax_deleteDetail') ?>', {
			'id': id,
			'tableName': 'work_exp'
		}, function(data) {
			if (data.success == true) {
				alert("ลบสำเร็จ");
				$(target).closest('div .row').remove();
			}
		}, "json");
	});

	$('.delete-work_exp2').click(function(e) {
		e.preventDefault();
		var target = $(this);
		var id = $(this).data("id");
		$.post('<?= site_url('main/ajax_deleteDetail') ?>', {
			'id': id,
			'tableName': 'work_exp'
		}, function(data) {
			if (data.success == true) {
				alert("ลบสำเร็จ");
				$(target).closest('tbody tr').remove();
			}
		}, "json");
	});

	//editWork_exp Model action
	$('#editWork_expModal').on('show.bs.modal', function(e) {
		$('#editWork_expModal').data("id", $(e.relatedTarget).data("id"));
		var text = $(e.relatedTarget).parent().next().html();
		tinymce.get('editWork_expContent').setContent(text);
	});


	$('.sort-work_exp').on("click", function(e) {
		e.preventDefault();
		console.log($(this).data("id") + ":" + $(this).data("direction"));
		var id = $(this).data("id");
		var direction = $(this).data("direction");
		var sortOrder = $(this).data("sort-order");

		$.post('<?= site_url('main/ajax_sortDetail') ?>', {
			'tableName': 'work_exp',
			'userID': <?= $userID ?>,
			'id': id,
			'sortOrder': sortOrder,
			'direction': direction
		}, function(data) {
			if (data.success == true) {
				location.reload(true);
			}
		}, "json");
	});


	$('#editWork_expModal .btn-success').on("click", function(e) {
		$('#editWork_expModal').modal("hide");
		var content = tinymce.get('editWork_expContent').getContent();
		var id = $('#editWork_expModal').data('id');
		console.log(content + ": " + id);
		$.post('<?= site_url('main/ajax_updateDetail') ?>', {
			'tableName': 'work_exp',
			'id': id,
			'detail': content
		}, function(data) {
			if (data.success == true) {
				alert("บันทึกสำเร็จ");
				location.reload(true);
			}
		}, "json");
	});


	//-------------------------------- End Work_exps --------------------------------//




	//-------------------------------- Publications --------------------------------//
	$('#addPublicationModal .btn-success').on("click", function(e) {

		var content = tinymce.get('addPublicationContent').getContent();
		$.post('<?= site_url('main/ajax_addDetail') ?>', {
			'userID': <?= $userID ?>,
			'detail': content,
			'tableName': 'publication'
		}, function(data) {
			if (data.success == true) {
				location.reload(true);
			}
		}, "json");

	});

	$('#addPublicationContent_bt').on("click", function(e) {

		var content = tinymce.get('addPublicationContent').getContent();
		$.post('<?= site_url('main/ajax_addDetail') ?>', {
			'userID': <?= $userID ?>,
			'detail': content,
			'tableName': 'publication'
		}, function(data) {
			if (data.success == true) {
				alert("เพิ่มสำเร็จ");
				location.reload(true);
			}
		}, "json");

	});


	$('.delete-publication').click(function(e) {
		e.preventDefault();
		var target = $(this);
		var id = $(this).data("id");
		$.post('<?= site_url('main/ajax_deleteDetail') ?>', {
			'id': id,
			'tableName': 'publication'
		}, function(data) {
			if (data.success == true) {
				alert("ลบสำเร็จ");
				$(target).closest('div .row').remove();
			}
		}, "json");
	});

	$('.delete-publication2').click(function(e) {
		e.preventDefault();
		var target = $(this);
		var id = $(this).data("id");
		$.post('<?= site_url('main/ajax_deleteDetail') ?>', {
			'id': id,
			'tableName': 'publication'
		}, function(data) {
			if (data.success == true) {
				alert("ลบสำเร็จ");
				$(target).closest('tbody tr').remove();
			}
		}, "json");
	});


	//editPublication Model action
	$('#editPublicationModal').on('show.bs.modal', function(e) {
		$('#editPublicationModal').data("id", $(e.relatedTarget).data("id"));
		var text = $(e.relatedTarget).parent().next().html();
		tinymce.get('editPublicationContent').setContent(text);
	});


	$('.sort-publication').on("click", function(e) {
		e.preventDefault();
		console.log($(this).data("id") + ":" + $(this).data("direction"));
		var id = $(this).data("id");
		var direction = $(this).data("direction");
		var sortOrder = $(this).data("sort-order");

		$.post('<?= site_url('main/ajax_sortDetail') ?>', {
			'tableName': 'publication',
			'userID': <?= $userID ?>,
			'id': id,
			'sortOrder': sortOrder,
			'direction': direction
		}, function(data) {
			if (data.success == true) {
				location.reload(true);
			}
		}, "json");
	});


	$('#editPublicationModal .btn-success').on("click", function(e) {
		$('#editPublicationModal').modal("hide");
		var content = tinymce.get('editPublicationContent').getContent();
		var id = $('#editPublicationModal').data('id');
		console.log(content + ": " + id);
		$.post('<?= site_url('main/ajax_updateDetail') ?>', {
			'tableName': 'publication',
			'id': id,
			'detail': content
		}, function(data) {
			if (data.success == true) {
				alert("บันทึกสำเร็จ");
				location.reload(true);
			}
		}, "json");
	});



	//-------------------------------- End Publications --------------------------------//



	//-------------------------------- Skills --------------------------------//
	$('#addSkillModal .btn-success').on("click", function(e) {

		var content = tinymce.get('addSkillContent').getContent();
		$.post('<?= site_url('main/ajax_addDetail') ?>', {
			'userID': <?= $userID ?>,
			'detail': content,
			'tableName': 'skill'
		}, function(data) {
			if (data.success == true) {
				location.reload(true);
			}
		}, "json");

	});

	$('#addSkillContent_bt').on("click", function(e) {

		var content = tinymce.get('addSkillContent').getContent();
		$.post('<?= site_url('main/ajax_addDetail') ?>', {
			'userID': <?= $userID ?>,
			'detail': content,
			'tableName': 'skill'
		}, function(data) {
			if (data.success == true) {
				alert("เพิ่มสำเร็จ");
				location.reload(true);
			}
		}, "json");

	});


	$('.delete-skill').click(function(e) {
		e.preventDefault();
		var target = $(this);
		var id = $(this).data("id");
		$.post('<?= site_url('main/ajax_deleteDetail') ?>', {
			'id': id,
			'tableName': 'skill'
		}, function(data) {
			if (data.success == true) {
				alert("ลบสำเร็จ");
				$(target).closest('div .row').remove();
			}
		}, "json");
	});

	$('.delete-skill2').click(function(e) {
		e.preventDefault();
		var target = $(this);
		var id = $(this).data("id");
		$.post('<?= site_url('main/ajax_deleteDetail') ?>', {
			'id': id,
			'tableName': 'skill'
		}, function(data) {
			if (data.success == true) {
				alert("ลบสำเร็จ");
				$(target).closest('tbody tr').remove();
			}
		}, "json");
	});


	//editSkill Model action
	$('#editSkillModal').on('show.bs.modal', function(e) {
		$('#editSkillModal').data("id", $(e.relatedTarget).data("id"));
		var text = $(e.relatedTarget).parent().next().html();
		tinymce.get('editSkillContent').setContent(text);
	});


	$('.sort-skill').on("click", function(e) {
		e.preventDefault();
		console.log($(this).data("id") + ":" + $(this).data("direction"));
		var id = $(this).data("id");
		var direction = $(this).data("direction");
		var sortOrder = $(this).data("sort-order");

		$.post('<?= site_url('main/ajax_sortDetail') ?>', {
			'tableName': 'skill',
			'userID': <?= $userID ?>,
			'id': id,
			'sortOrder': sortOrder,
			'direction': direction
		}, function(data) {
			if (data.success == true) {
				location.reload(true);
			}
		}, "json");
	});


	$('#editSkillModal .btn-success').on("click", function(e) {
		$('#editSkillModal').modal("hide");
		var content = tinymce.get('editSkillContent').getContent();
		var id = $('#editSkillModal').data('id');
		console.log(content + ": " + id);
		$.post('<?= site_url('main/ajax_updateDetail') ?>', {
			'tableName': 'skill',
			'id': id,
			'detail': content
		}, function(data) {
			if (data.success == true) {
				alert("บันทึกสำเร็จ");
				location.reload(true);
			}
		}, "json");
	});


	//-------------------------------- End Skills --------------------------------//




	//-------------------------------- Trainings --------------------------------//
	$('#addTrainingModal .btn-success').on("click", function(e) {

		var content = tinymce.get('addTrainingContent').getContent();
		$.post('<?= site_url('main/ajax_addDetail') ?>', {
			'userID': <?= $userID ?>,
			'detail': content,
			'tableName': 'training'
		}, function(data) {
			if (data.success == true) {
				location.reload(true);
			}
		}, "json");

	});

	$('#addTrainingContent_bt').on("click", function(e) {

		var content = tinymce.get('addTrainingContent').getContent();
		$.post('<?= site_url('main/ajax_addDetail') ?>', {
			'userID': <?= $userID ?>,
			'detail': content,
			'tableName': 'training'
		}, function(data) {
			if (data.success == true) {
				alert("เพิ่มสำเร็จ");
				location.reload(true);
			}
		}, "json");

	});


	$('.delete-training').click(function(e) {
		e.preventDefault();
		var target = $(this);
		var id = $(this).data("id");
		$.post('<?= site_url('main/ajax_deleteDetail') ?>', {
			'id': id,
			'tableName': 'training'
		}, function(data) {
			if (data.success == true) {
				alert("ลบสำเร็จ");
				$(target).closest('div .row').remove();
			}
		}, "json");
	});

	$('.delete-training2').click(function(e) {
		e.preventDefault();
		var target = $(this);
		var id = $(this).data("id");
		$.post('<?= site_url('main/ajax_deleteDetail') ?>', {
			'id': id,
			'tableName': 'training'
		}, function(data) {
			if (data.success == true) {
				alert("ลบสำเร็จ");
				$(target).closest('tbody tr').remove();
			}
		}, "json");
	});


	//editTraining Model action
	$('#editTrainingModal').on('show.bs.modal', function(e) {
		$('#editTrainingModal').data("id", $(e.relatedTarget).data("id"));
		var text = $(e.relatedTarget).parent().next().html();
		tinymce.get('editTrainingContent').setContent(text);
	});


	$('.sort-training').on("click", function(e) {
		e.preventDefault();
		console.log($(this).data("id") + ":" + $(this).data("direction"));
		var id = $(this).data("id");
		var direction = $(this).data("direction");
		var sortOrder = $(this).data("sort-order");

		$.post('<?= site_url('main/ajax_sortDetail') ?>', {
			'tableName': 'training',
			'userID': <?= $userID ?>,
			'id': id,
			'sortOrder': sortOrder,
			'direction': direction
		}, function(data) {
			if (data.success == true) {
				location.reload(true);
			}
		}, "json");
	});


	$('#editTrainingModal .btn-success').on("click", function(e) {
		$('#editTrainingModal').modal("hide");
		var content = tinymce.get('editTrainingContent').getContent();
		var id = $('#editTrainingModal').data('id');
		console.log(content + ": " + id);
		$.post('<?= site_url('main/ajax_updateDetail') ?>', {
			'tableName': 'training',
			'id': id,
			'detail': content
		}, function(data) {
			if (data.success == true) {
				alert("บันทึกสำเร็จ");
				location.reload(true);
			}
		}, "json");
	});


	//-------------------------------- End Skills --------------------------------//


	$('#editOverviewModal').on("show.bs.modal", function(e) {
		var text = $(e.relatedTarget).closest('div').next().html();
		console.log(text);
		tinymce.get('editOverviewContent').setContent(text);

	});



	//editOverviewModal success btn
	$('#editOverviewModal button.btn-success').on("click", function(e) {
		var content = tinymce.get('editOverviewContent').getContent();
		console.log(content + ": " + content);
		$.post('<?= site_url('main/ajax_updateOverview') ?>', {
			'userID': <?= $userID ?>,
			'description': content
		}, function(data) {
			if (data.success == true) {
				alert("บันทึกสำเร็จ");
				$('#editOverviewModal').modal("hide");
				location.reload(true);
			}
		}, "json");


	});
</script>