<!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="page-title">
              <div class="title_left">
                <h3>แก้ไขข้อมูลทุนการศึกษา</h3>
              </div>
            </div>

            <div class="clearfix"></div>

<?php if($sid == -1): ?>
    <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
						<div class="x_title">
                    <h2>ทุนการศึกษาของท่าน</h2>
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
						<table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>ปีการศึกษา</th>
                          <th>ชื่อทุน</th>
                          <th>จำนวน</th>
                          <th>รายละเอียด</th>
                          <th>#</th>
                        </tr>
                      </thead>
                      <tbody>
							 <?php $counter= 0; ?>
							 <?php foreach($scholarship as $ss) : ?>
                        <tr>
                          <th scope="row"><?= ++$counter ?></th>
                          <td><?= $ss->scYear ?></td>
                          <td><?= $ss->scName ?></td>
                          <td><?= $ss->amount ?></td>
                          <td><?= $ss->detail ?></td>
                        <td>
								  <a href='<?= site_url('main/edit_scholarship/'.$ss->id) ?>'>
								  <i class="fa fa-wrench"></i> 
								  </a>
								  <a href='<?= site_url('main/remove_scholarship/'.$ss->id) ?>'>
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
<?php if($sid == -1): ?>
                    <h2>เพิ่มทุนการศึกษาใหม่</h2>
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
<?php if($sid == -1): ?>
                    <form method="POST"  action="<?= site_url('main/add_scholarship') ?>" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
<?php else: ?>
                    <form method="POST"  action="<?= site_url('main/update_scholarship') ?>" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
<?php endif; ?>
						  <input type="hidden" name="sid" value="<?=$sid?>">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="acadYear">ปีการศึกษา<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
								<select id="scYear" name="scYear" class="form-control">
                            <option <?= isset($sinfo) && $sinfo->scYear == 2559 ? "selected" : "" ?>>2559</option>
                            <option <?= isset($sinfo) && $sinfo->scYear == 2560 ? "selected" : "" ?>>2560</option>
                            <option <?= isset($sinfo) && $sinfo->scYear == 2561 ? "selected" : "" ?>>2561</option>
                            <option <?= isset($sinfo) && $sinfo->scYear == 2562 ? "selected" : "" ?>>2562</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="scName">ชื่อทุน <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="scName" name="scName" required="required" class="form-control col-md-7 col-xs-12" 
								  	value="<?= isset($sinfo) ? $sinfo->scName : ""  ?> ">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">จำนวนทุน <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="amount" name="amount" required="required" class="form-control col-md-7 col-xs-12" 
								  	value="<?= isset($sinfo) ? $sinfo->amount : ""  ?> ">
                        </div>
                      </div>
            							<div class="form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">รายละเอียดทุน<span class="required"></span> 
							  </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
<textarea id="detail" required="required" class="form-control" name="detail" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"><?= isset($sinfo) ? $sinfo->detail : ""  ?></textarea>
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


