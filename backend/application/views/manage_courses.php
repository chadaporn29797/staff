<!--confirm modal -->
  <div class="modal fade" id="confirmAction" data-action="addCourseManager" data-confirm-state="false" data-course-id="null" data-manager-id="null" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4>ยืนยันการดำเนินการ</h4>
        </div>
        <div class="modal-body">
			 <h2><div id="actionString">กำหนดให้เป็นประธานหลักสูตร?</div></h2>
	     </div>
        <div class="modal-footer">
          <button id='confirm-action' class="btn btn-default btn-default pull-left" ><span class="glyphicon glyphicon-ok"></span> Confirm</button>
          <button id='dismiss-action' class="btn btn-default btn-default pull-left" ><span class="glyphicon glyphicon-remove"></span> Cancel</button>
        </div>
		  <!--end modal footer-->
      </div>
		  <!--end modal content-->
    </div>
		  <!--end modal dialog-->
  </div>
<!--end modal-->



<!--modal -->
  <div class="modal fade" id="addCourseManager" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:blue;"><span class="glyphicon glyphicon-lock"></span> กำหนดชื่อประธานหลักสูตร</h4>
        </div>
        <div class="modal-body">
          <form role="form">
            <div class="form-group">
              <label for='searchUserText'><a id='searchToggle' href='#'><i class="fa fa-search" aria-hidden="true"></i>ค้นหาบุคลากร</a></label>
              <input type="text" class="form-control" id="searchUserText" placeholder="พิมพ์ชื่อ หรือนามสกุลที่ต้องการค้น" style='display:none'>
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
                <h3>หลักสูตรที่เปิดสอน</h3>
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

				<div class="row tile_count">
            <div class="col-md-2 col-sm-3 col-xs-4 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> ปริญญาโท</span>
              <div class="count"><?= $masters->num_rows() ?></div>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-4 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> ปริญญาเอก</span>
              <div class="count green"><?= $phds->num_rows() ?></div>
            </div>
           </div>


			<div class="row">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-align-left"></i> จัดการหลักสูตร</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

       <!-- start accordion -->
                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">

							 <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          <h4 class="panel-title">หลักสูตรปริญญาโท</h4>
                        </a>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
                          <div class="panel-body">
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>ชื่อหลักสูตร</th>
                                  <th>ประธานหลักสูตร</th>
                                </tr>
                              </thead>
                              <tbody>
										<?php $counter=0; ?>
										<?php foreach($masters->result() as $ms): 
											 if($ms->managerID !== NULL){
												$manager_name = $ms->firstName ." ".$ms->lastName; 	
												if($ms->forName !== NULL){
													$manager_name = $ms->forName.$manager_name;
												}
											 }
										?>
                                <tr>
                                  <th scope="row"><?= ++$counter ?></th>
                                  <td><a href='<?= site_url('main/course_management/').$ms->courseID ?>'><?= $ms->name ?></a></td>
                                  <td>
											 <div>
											 <?php if($ms->managerID == NULL): ?>
											 <a data-toggle='modal' data-course-id='<?= $ms->courseID ?>' data-action="addCourseManager" href='#addCourseManager'>กำหนดประธานหลักสูตร</a>
											 <?php else: ?>
														<?= $manager_name ?><a class="remove-manager" href="#confirmAction" data-action="removeCourseManager" data-toggle="modal"  data-course-id='<?= $ms->courseID ?>'><i class="fa fa-remove"></i></a>
											 <?php endif; ?>
											 </div>
											 </td>
                                </tr>
										 <?php endforeach; ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>

                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          <h4 class="panel-title">หลักสูตรปริญญาเอก</h4>
                        </a>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false" style="height: 0px;">
                          <div class="panel-body">
                 <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>ชื่อหลักสูตร</th>
                                  <th>ประธานหลักสูตร</th>
                                </tr>
                              </thead>
                              <tbody>
										<?php $counter=0; ?>
										<?php foreach($phds->result() as $phd): 
											 if($phd->managerID !== NULL){
												$manager_name = $phd->firstName ." ".$phd->lastName; 	
												if($phd->forName !== NULL){
													$manager_name = $phd->forName.$manager_name;
												}
											 }
										?>
                                <tr>
                                  <th scope="row"><?= ++$counter ?></th>
                                  <td><a href='<?= site_url('main/course_management/').$phd->courseID ?>'><?= $phd->name ?></a></td>
                                  <td>
											 <div>
											 <?php if($phd->managerID == NULL): ?>
											 <a data-toggle='modal' data-course-id='<?= $phd->courseID ?>' data-action="addCourseManager" href='#addCourseManager'>กำหนดประธานหลักสูตร</a>
											 <?php else: ?>
														<?= $manager_name ?><a class="remove-manager" href="#confirmAction" data-action="removeCourseManager" data-toggle="modal"  data-course-id='<?= $phd->courseID ?>'><i class="fa fa-remove"></i></a>
											 <?php endif; ?>
											 </div>
											 </td>
                                </tr>
										 <?php endforeach; ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>

                    <!-- end of accordion -->


                  </div>
                </div>
              </div>
              </div>
           
	        
          </div>
        </div>
<!-- /page content -->


