<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
      <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">เพิ่มผู้ใช้งาน</h3>
      </div>
      <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
          <div class="breadcrumb-wrapper mr-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= site_url('main/dashboard') ?>">Home</a>
              </li>
              <li class="breadcrumb-item active">เพิ่มผู้ใช้งาน
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content-body">
      <!-- Line Awesome section start -->
      <section id="line-awesome-icons">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">ข้อมูลเบื้องต้น</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                  </ul>
                </div>
              </div>


              <div class="ml-6">
                <!--start content -->
                <br>
                <form method="POST" action="<?= site_url('main/add_user2') ?>" enctype='multipart/form-data' class="form-horizontal form-label-left" >
                  <input type="hidden" name="userID" value="<?= $userID ?>" />
                  <div class="form-row">

                    <div class="form-group col-md-5">
                      <label class="control-label ml-1" for="nameTH_em">ชื่อภาษาไทย<span class="required">*</span>
                      </label>
                      <div class=" ml-1 ">
                        <input type="text" id="nameTH_em" name="nameTH_em" required class="form-control ">
                      </div>
                    </div>

                    <div class="form-group col-md-5">
                      <label class="control-label " for="sirNameTH_em">นามสกุล <span class="required">*</span>
                      </label>
                      <div class="  ">
                        <input type="text" id="sirNameTH_em" name="sirNameTH_em" required class="form-control ">
                      </div>
                    </div>
                  </div>



                  <div class="form-row">
                    <div class="form-group col-md-5">
                      <label class="control-label ml-1">Username</label>
                      <div class="ml-1">
                        <input id="username" name="username" class=" form-control " required="required" type="text">
                      </div>
                    </div>

                    <div class="form-group col-md-5">
                      <label class="control-label ">หน่วยงาน</label>
                      <div class="">
                        <fieldset class="form-group">
                          <select class="form-control" id="departmentID_em" name="departmentID_em">
                            <?php foreach ($deps as $dep) : ?>
                              <option value="<?= $dep->id ?>"><?= $dep->nameTH ?></option>
                            <?php endforeach; ?>
                          </select>
                        </fieldset>
                      </div>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label class="control-label ml-1">หน้าที่</label>
                      <div class="ml-1">
                      <fieldset class="form-group">
                          <select class="form-control" id="role" name="role">
                            <option value="2">เจ้าหน้าที่</option>
                            <option value="1">แอดมิน</option>
                          </select>
                      </fieldset>
                      </div>
                    </div>

                    <div class="form-group col-md-4">
                      <label class="control-label " for="first-name">email<span class="required"> </span></label>
                      <div class="">
                        <input id="email" name="email" class=" form-control " required="required" type="text">
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <label class="control-label " for="first-name">UBU-email<span class="required"> </span></label>
                      <div class="mr-1">
                        <input id="ubu_mail" name="ubu_mail" class=" form-control " placeholder="ไม่ต้องใส่ @" required="required" type="text">
                      </div>
                    </div>
                  </div>


                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button type="submit" class="btn btn-success">บันทึก</button>
                      <button onclick="history.back()" type="button" class="btn btn-primary">ยกเลิก</button>
                    </div>
                  </div>

                </form>
                <!--- end content -->

              </div>

            </div>
          </div>
        </div>
      </section>
      <!-- // Line Awesome section end -->