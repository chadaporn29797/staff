<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
      <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">เลือกข้อมูล CV</h3>
      </div>
      <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
          <div class="breadcrumb-wrapper mr-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= site_url('main/dashboard') ?>">Home</a>
              </li>
              <li class="breadcrumb-item active">เลือกข้อมูล CV
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
                <h4 class="card-title">เลือกข้อมูล CV ที่ต้องการพิมพ์</h4>
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
                <form method="POST" action="<?= site_url('main/save_profile') ?>" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                  <input type="hidden" name="userID" value="<?= $userID ?>" />
                  <div class="form-row">
                    <div class="form-group col-md-2">
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
                      </div>
                    </div>
                    <div class="form-group col-md-5">
                      <label class="control-label " for="firstName">ชื่อภาษาไทย<span class="required">*</span>
                      </label>
                      <div class="  ">
                        <input type="text" id="firstName" name="firstName" required="required" class="form-control " value="<?= $info->nameTH_em ?>">
                      </div>
                    </div>

                    <div class="form-group col-md-5">
                      <label class="control-label " for="last-name">นามสกุล <span class="required">*</span>
                      </label>
                      <div class=" mr-1 ">
                        <input type="text" id="lastName" name="lastName" required="required" class="form-control " value="<?= $info->sirNameTH_em ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-2">
                      <label class="control-label ml-1  " for="forNameENG">คำนำหน้า(ENG)
                      </label>
                      <div class=" ml-1 ">
                        <input type="text" id="forNameENG" name="forNameENG" required="required" class="form-control " value="<?= $info->forNameENG ?>">
                      </div>
                    </div>
                    <div class="form-group col-md-5">
                      <label class="control-label " for="firstNameENG">ชื่อ(ENG)
                      </label>
                      <div class="  ">
                        <input type="text" id="firstNameENG" name="firstNameENG" class="form-control " value="<?= $info->nameENG ?>">
                      </div>
                    </div>

                    <div class="form-group col-md-5">
                      <label class="control-label " for="last-name">นามสกุล(ENG)
                      </label>
                      <div class=" mr-1 ">
                        <input type="text" id="lastNameENG" name="lastNameENG" class="form-control " value="<?= $info->sirNameENG ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-5">
                      <label class="control-label ml-1">หมายเลขห้องพัก/อาคาร</label>
                      <div class="ml-1">
                        <input id="roomNumber" name="roomNumber" value="<?= $info->roomNumber ?>" class=" form-control " required="required" type="text">
                      </div>
                    </div>

                    <div class="form-group col-md-5">
                      <label class="control-label ">โทรศัพท์ภายใน </label>
                      <div class="">
                        <input id="tel" name="tel" value="<?= $info->tel ?>" class=" form-control " required="required" type="text">
                      </div>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-5">
                      <label class="control-label ml-1">โทรศัพท์มือถือ</label>
                      <div class="ml-1">
                        <input id="mobile" name="mobile" value="<?= $info->mobile ?>" class=" form-control " required="required" type="text">
                      </div>
                    </div>

                    <div class="form-group col-md-5">
                      <label class="control-label " for="first-name">email<span class="required"> </span></label>
                      <div class="">
                        <input id="email" name="email" value="<?= $info->email ?>" class=" form-control " required="required" type="text">
                      </div>
                    </div>
                  </div>


                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button type="submit" class="btn btn-success">บันทึก</button>
                      <a href='<?= site_url("main/dashboard") ?>' class="btn btn-primary" type="button">ยกเลิก</a>
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