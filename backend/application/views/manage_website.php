<?php
	if( $courseID == null){
		die ("กรุณาระบุรหัสหลักสูตร");
	}

	if($course->num_rows() == 0 ){
		die ("ยังไม่มีหลักสูตรนี้ในระบบ");
	}
	//check permission

	$this->load->model("CourseManager");
	if( !$this->CourseManager->isOwnCourse($courseID) ){
		die ("ขออภัยครับ ท่านไม่มีสิทธิ์จัดการหลักสูตนี้");
	}

	$cinfo = $course->row();
	$managerName = "ยังไม่กำหนด";
	if($cinfo->managerID != null){
		$managerName= $cinfo->firstName." ".$cinfo->lastName ;
		if($cinfo->forName !=null)
			$managerName = $cinfo->forName.$managerName ;
	}
?>

<!--confirm modal -->
  <div class="modal fade" id="successAction" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4>สถานะการดำเนินการ</h4>
        </div>
        <div class="modal-body">
			 <h2><div id="actionString">บันทึกข้อมูลสำเร็จ</div></h2>
	     </div>
        <div class="modal-footer">
          <button class="btn btn-default btn-default pull-left" data-dismiss="modal" ><span class="glyphicon glyphicon-ok"></span> ปิดหน้าต่าง </button>
        </div>
		  <!--end modal footer-->
      </div>
		  <!--end modal content-->
    </div>
		  <!--end modal dialog-->
  </div>
<!--end modal-->

<!--modal -->
  <div class="modal fade" id="addCommittee" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:blue;"><span class="glyphicon glyphicon-lock"></span> เพิ่มกรรมการหลักสูตร</h4>
        </div>
        <div class="modal-body">
          <form role="form">
            <div class="form-group">
              <label for='searchUserText'><i class="fa fa-search" aria-hidden="true"></i>ค้นหาบุคลากร</a></label>
              <input type="text" class="form-control" id="searchUserText" placeholder="พิมพ์ชื่อ หรือนามสกุลที่ต้องการค้น" >
            </div>
         </form>
			<div id="searchResultPanel" style="display:none">
				<strong>ผลการค้นหา</strong>
				<div id="searchResult">
				</div>
			</div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
        </div>
		  <!--end modal footer-->
      </div>
		  <!--end modal cotnent-->
    </div>
		  <!--end modal dialog-->
  </div>
<!--end modal-->


<!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="page-title">
              <div class="title_left">
                <h3>จัดการเว็ปไซต์ประจำหลักสูตร</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

           <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>หลักสูตร<?=  $cinfo->name ?><small> View your website <a href="http://grad.sci.ubu.ac.th/<?= $cinfo->url ?>" target="_blank"><i class="fa fa-external-link" aria-hidden="true"></i></a></small></h2>
                    <div class="clearfix"></div>
                  </div>
						
                  <div class="x_content">
						<textarea id="web-content"><?= $cinfo->detail ?></textarea>
						<input name="image" type="file" id="upload" class="hidden" onchange="">

                  </div><!--end xcontent-->
                </div> <!--end x pannel -->
              </div><!--end col-mdk-12-->
           </div><!--end row -->




          </div>
        </div><!--end right_col-->
<!-- /page content -->


