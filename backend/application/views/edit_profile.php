<!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="page-title">
              <div class="title_left">
                <h3>แก้ไขข้อมูลพื้นฐาน</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
							<!--start content -->
                    <br>
                    <form method="POST"  action="<?= site_url('main/save_profile') ?>" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
							 <input type="hidden" name="userID" value="<?=$userID?>"/>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="forName">คำนำหน้าภาษาไทย
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="forName" name="forName" required="required" class="form-control col-md-7 col-xs-12" value="<?= $info->forName?>">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstName">ชื่อภาษาไทย<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="firstName" name="firstName" required="required" class="form-control col-md-7 col-xs-12" value="<?= $info->nameTH_em ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">นามสกุล <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="lastName" name="lastName" required="required" class="form-control col-md-7 col-xs-12" value="<?= $info->sirNameTH_em ?>">
                        </div>
                      </div>
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="forNameENG">คำนำหน้า(ENG)
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="forNameENG" name="forNameENG" class="form-control col-md-7 col-xs-12" value="<?= $info->forNameENG?>">
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstNameENG">ชื่อ(ENG)
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="firstNameENG" name="firstNameENG" class="form-control col-md-7 col-xs-12" value="<?= $info->nameENG ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">นามสกุล(ENG) 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="lastNameENG" name="lastNameENG" class="form-control col-md-7 col-xs-12" value="<?= $info->sirNameENG ?>">
                        </div>
                      </div>
 

                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">หมายเลขห้องพัก/อาคาร</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="roomNumber" name="roomNumber" value="<?= $info->roomNumber?>" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                        </div>
                      </div>
 
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">โทรศัพท์ภายใน </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tel" name="tel" value="<?= $info->tel?>" class=" form-control col-md-7 col-xs-12" required="required" type="text">
                        </div>
                      </div>
   									<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">โทรศัพท์มือถือ</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="mobile" name="mobile" value="<?= $info->mobile?>" class=" form-control col-md-7 col-xs-12" required="required" type="text">
                        </div>
                      </div>

 								<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">email<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="email" name="email" value="<?= $info->email?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">บันทึก</button>
                          <a href='<?= $userID == null ? site_url("main/dashboard") : site_url("main/userinfo/$userID") ?>' class="btn btn-primary" type="button">ยกเลิก</a>
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


