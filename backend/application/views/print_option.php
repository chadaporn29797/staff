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
                    <div class="form-group col-md-4">
                      <div class="form-check form-switch">
                        <input class="icheckbox_flat-green " type="checkbox"   id="chkSelectAll">
                        <label class="form-check-label" for="flexSwitchCheckDefault">ทั้งหมด</label>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="form-check form-switch">
                        <input class="icheckbox_flat-green" type="checkbox"  id="toggle" checked disabled>
                        <label class="form-check-label" for="flexSwitchCheckDefault">ข้อมูลพื้นฐาน</label>
                      </div>
                    </div>

                    <div class="form-group col-md-4">
                      <div class="form-check form-switch">
                        <input class="icheckbox_flat-green" type="checkbox"  id="toggle" checked disabled>
                        <label class="form-check-label" for="flexSwitchCheckDefault">ประวัติการศึกษา</label>
                      </div>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <div class="form-check form-switch">
                        <input class="icheckbox_flat-green dd" type="checkbox"  id="toggle">
                        <label class="form-check-label" for="flexSwitchCheckDefault">รางวัลและเกียรติยศ</label>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="form-check form-switch">
                        <input class="icheckbox_flat-green dd" type="checkbox"  id="toggle">
                        <label class="form-check-label" for="flexSwitchCheckDefault">ทุนการศึกษา</label>
                      </div>
                    </div>

                    <div class="form-group col-md-4">
                      <div class="form-check form-switch">
                        <input class="icheckbox_flat-green dd" type="checkbox"  id="toggle">
                        <label class="form-check-label" for="flexSwitchCheckDefault">ประสบการณ์การทำงาน</label>
                      </div>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <div class="form-check form-switch">
                        <input class="icheckbox_flat-green dd" type="checkbox"  id="toggle">
                        <label class="form-check-label" for="flexSwitchCheckDefault">ผลงานตีพิมพ์</label>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="form-check form-switch">
                        <input class="icheckbox_flat-green dd" type="checkbox"  id="toggle">
                        <label class="form-check-label" for="flexSwitchCheckDefault">ทักษะอื่นๆ</label>
                      </div>
                    </div>

                    <div class="form-group col-md-4">
                      <div class="form-check form-switch">
                        <input class="icheckbox_flat-green dd" type="checkbox"  id="toggle">
                        <label class="form-check-label" for="flexSwitchCheckDefault">การฝึกอบรม</label>
                      </div>
                    </div>
                  </div>

                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button type="submit" class="btn btn-success">ดูตัวอย่าง</button>
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

<script>
    $("#chkSelectAll").on('click', function(){
     this.checked ? $(".dd").prop("checked",true) : $(".dd").prop("checked",false);  
})
</script>