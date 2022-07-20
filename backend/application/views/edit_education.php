<!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="page-title">
              <div class="title_left">
                <h3>แก้ไขประวัติการศึกษา</h3>
              </div>
            </div>

            <div class="clearfix"></div>

<?php if($educationID == -1): ?>
    <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
							<!--start content -->
						<table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>รายละเอียด</th>
								  <th>#</th>
                        </tr>
                      </thead>
                      <tbody>
							 <?php $counter= 0; ?>
							 <?php foreach($educations as $e) : ?>
 
                        <tr>
                          <th scope="row"><?= ++$counter ?></th>
                          <td><?= $e->detail ?></td>
                          <td>
								  <a href='<?= site_url('main/edit_education/'.$e->educationID) ?>'>
								  <i class="fa fa-wrench"></i> 
								  </a>
								  <a href='<?= site_url('main/remove_education/'.$e->educationID) ?>'>
								  <i class="fa fa-remove"></i> 
								  </a>
								  
								  </td>
                        </tr>
								<?php endforeach; ?>

                          </tbody>
                    </table>
     						<!--- end content -->

                  </div> <!-- end x-content -->
                </div> <!--end x-panel-->
              </div>
            </div> <!--end row-->

<?php endif; ?>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
						<div class="x_title">
<?php if($educationID == -1): ?>
                    <h2>เพิ่มข้อมูลการศึกษา</h2>
<?php endif; ?>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li/>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
							<!--start content -->
                    <br>

<?php if($educationID == -1): ?>
                    <form method="POST"  action="<?= site_url('main/add_work') ?>" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
<?php else: ?>
                    <form method="POST"  action="<?= site_url('main/update_work') ?>" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
<?php endif; ?>
						  <input type="hidden" name="educationID" value="<?=$educationID?>">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="acadYear">ปีพ.ศ.<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="wYear" name="wYear" required="required" class="form-control col-md-7 col-xs-12" 
								  	value="<?= isset($winfo) ? $winfo->wYear : ""  ?>" >
                     </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="scName">ชื่อผลงาน <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="wName" name="wName" required="required" class="form-control col-md-7 col-xs-12"
								  
								  	value="<?= isset($winfo) ? $winfo->wName : ""  ?>"
								  >
                        </div>
                      </div>
         				<div class="form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">รายละเอียด<span class="required"></span> 
							  </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
<textarea id="detail" required="required" class="form-control" name="detail" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"><?= isset($winfo) ? $winfo->detail : ""  ?> </textarea>
								</div>
							</div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
						<!--- end content -->

                  </div> <!-- end x-content -->
                </div> <!--end x-panel-->
              </div>
            </div> <!--end row-->

          </div>
        </div> <!--end right-col-->
<!-- /page content -->


