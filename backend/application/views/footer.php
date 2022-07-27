        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <!-- <span class="float-md-left d-block d-md-inline-block">2018  &copy; Copyright <a class="text-bold-800 grey darken-2" href="https://themeselection.com" target="_blank">ThemeSelection</a></span> -->
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url('Gentelella') ?>/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url('Gentelella') ?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url('Gentelella') ?>/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?= base_url('Gentelella') ?>/vendors/nprogress/nprogress.js"></script>
	 <!-- Icheck -->
    <script src="<?= base_url('Gentelella') ?>/vendors/iCheck/icheck.min.js"></script>
 
    <!-- Custom Theme Scripts -->
    <script src="<?= base_url('Gentelella') ?>/build/js/custom.min.js"></script>
  </body>
</html>
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

	// $('.dashboard-title').click(function() {
	// 	alert($(this).attr("id"));
	// });
</script>