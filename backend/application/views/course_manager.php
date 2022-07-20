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

<!--hidden for tinymce plugin-->
<div id="hidden-mce" style="display:none"></div>
<!--end hidden for tinymce plugin-->




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
                <h3>จัดการข้อมูลหลักสูตร</h3>
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
                    <h2>หลักสูตร<?=  $cinfo->name ?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
						
                  <div class="x_content">

       <!-- start accordion -->
                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">

                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                          <h4 class="panel-title">1.รหัสและชื่อหลักสูตร</h4>
                        </a>
								<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                          <div class="panel-body">
									  <form class="form-horizontal">
									  <div class="form-group">
										  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="code">รหัสหลักสูตร<span class="required">*</span>
										  </label>
										  <div class="col-md-6 col-sm-6 col-xs-12">
											 <input type="text" name="code" id="code" required="required" class="form-control col-md-7 col-xs-12" value="<?= $cinfo->code ?>">
										  </div>
									  </div>

									  <div class="form-group">
										  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ชื่อหลักสูตรภาษาไทย<span class="required">*</span>
										  </label>
										  <div class="col-md-6 col-sm-6 col-xs-12">
											 <input type="text" name="name" id="name" required="required" class="form-control col-md-7 col-xs-12" value="<?= $cinfo->name ?>">
										  </div>
									  </div>
									  <div class="form-group">
										  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ชื่อหลักสูตรภาษาอังกฤษ<span class="required"></span>
										  </label>
										  <div class="col-md-6 col-sm-6 col-xs-12">
											 <input type="text" name="nameENG" id="nameENG"  class="form-control col-md-7 col-xs-12"  value="<?= $cinfo->nameENG ?>">
										  </div>
									  </div>
									  <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button id="saveFirst" class="btn btn-primary"  type="button">บันทึก</button>
                        </div>
                      </div>
									</form>

                          </div> <!--end panel-body -->

                        </div><!--END COLOASPSE -->
                      </div><!--end panel-->

							 <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          <h4 class="panel-title">2.ชื่อปริญญาและสาขาวิชา</h4>
                        </a>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
                          <div class="panel-body">

									  <form class="form-horizontal">
									  <div class="form-group">
										  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="degree_name">ชื่อเต็มภาษาไทย<span class="required">*</span>
										  </label>
										  <div class="col-md-6 col-sm-6 col-xs-12">
											 <input type="text" name="degree_name" id="degree_name" required="required" class="form-control col-md-7 col-xs-12" value="<?= $cinfo->degree_name ?>">
										  </div>
									  </div>
									  <div class="form-group">
										  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ชื่อย่อภาษาไทย<span class="required"></span>
										  </label>
										  <div class="col-md-6 col-sm-6 col-xs-12">
											 <input type="text" name="degree_short_name" id="degree_short_name"  class="form-control col-md-7 col-xs-12"  value="<?= $cinfo->degree_short_name ?>">
										  </div>
									  </div>
									  <div class="form-group">
										  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ชื่อเต็มภาษาอังกฤษ<span class="required">*</span>
										  </label>
										  <div class="col-md-6 col-sm-6 col-xs-12">
											 <input type="text"  name="degree_nameENG" id="degree_nameENG"  required="required" class="form-control col-md-7 col-xs-12" value="<?= $cinfo->degree_nameENG ?>">
										  </div>
									  </div>
									  <div class="form-group">
										  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ชื่อย่อภาษาอังกฤษ<span class="required"></span>
										  </label>
										  <div class="col-md-6 col-sm-6 col-xs-12">
											 <input type="text" name="degree_short_nameENG" id="degree_short_nameENG"  class="form-control col-md-7 col-xs-12"  value="<?= $cinfo->degree_short_nameENG ?>">
										  </div>
									  </div>
									  <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button id="saveSecond" class="btn btn-primary" type="button">บันทึก</button>
                        </div>
                      </div>
									  </form>
	
	
                          </div> <!--end panel-body -->

                        </div><!--END COLOASPSE -->
                      </div><!--end panel-->


                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          <h4 class="panel-title">3.อาจารย์ประจำหลักสูตร</h4>
                        </a>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false" style="height: 0px;">
                          <div class="panel-body">
									<table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>ชื่อ-นามสกุล</th>
                                  <th>ตำแหน่ง</th>
                                </tr>
                              </thead>
                              <tbody>
										<tr>
                                  <th scope="row">1</th>
                                  <td><a class='nameSelect' href='#'><?= $managerName ?></a></td>
                                  <td>ประธานคณะกรรมการ</td>
										</tr>		

										<?php $counter=1; ?>
										<?php foreach($committee->result() as $cm ): 
												$cmName = $cm->firstName ." ".$cm->lastName; 	
												if($cm->forName !== NULL)
													$cmName = $cm->forName.$cmName;
											 
										?>
                                <tr>
                                  <th scope="row"><?= ++$counter ?></th>
                                  <td><a class='nameSelect' href='#'><?= $cmName ?></a>
											 	<span class='removeName' data-uid='<?= $cm->userID ?>'><i class="fa fa-times" aria-hidden="true" style="cursor:pointer"></i></span></td>
                                  <td>กรรมการ</td>
                                </tr>
										 <?php endforeach; ?>
											<tr>
                                  <th scope="row"></th>
                                  <td><a id='add-committee' href='#addCommittee' data-toggle='modal'>+เพิ่มกรรมการ</a></td>
                                  <td></td>
                                </tr>

                              </tbody>
                            </table>


                          </div> <!--end panel-body -->



                        </div><!--END COLOASPSE -->
                      </div><!--end panel-->



  

							</div>
                    <!-- end of accordion -->

                  </div><!--end xcontent-->
                </div> <!--end x pannel -->
              </div><!--end col-mdk-12-->
           </div><!--end row -->




          </div>
        </div><!--end right_col-->
<!-- /page content -->


