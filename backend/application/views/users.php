<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
      <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">จัดการผู้ใช้งาน</h3>
      </div>
      <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
          <div class="breadcrumb-wrapper mr-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= site_url('main/dashboard') ?>">Home</a>
              </li>
              <li class="breadcrumb-item active">จัดการผู้ใช้งาน
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
                <h4 class="card-title">ข้อมูลผู้ใช้งานทั้งหมด</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <!-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li> -->
                    <!-- <a href="#addUser" data-toggle="modal"><i class="fa fa-plus-circle" aria-hidden="true"></i></a> -->
                    </ul>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="ค้นหาชื่อผู้ใช้">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button">ค้นหา</button>
                        <a href="<?= site_url('main/add_user') ?>"><button class="btn btn-success" type="button">เพิ่มผู้ใช้</button></a>
                      </span>
                    </div>

                  
                </div>
              </div>


              <div class="ml-6">
                <!--start content -->
                <br>

                <div class="clearfix"></div>

                <div class="row">
                  <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">

                      <div class="x_content mr-5">
                        <!--start content -->
                        <table class="table table-bordered ml-3 mr-3 ">
                          <thead>
                            <tr>
                              <th style=' width:5%;'>#</th>
                              <th>ชื่อผู้ใช้</th>
                              <th style=' width:15%;'>หน้าที่</th>
                              <th style=' width:15%;'>#</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $counter = 0; ?>
                            <?php foreach ($users as $e) : ?>

                              <tr>
                                <th scope="row"><?= ++$counter ?></th>
                                <td><?= $e->username ?></td>
                                <td>เจ้าหน้าที่</td>
                                <td>
                                  <a href='<?= site_url('main/edit_education/' . $e->educationID) ?>'>
                                    <i class="fa fa-wrench"></i>
                                  </a>
                                  <a href='#' class="delete-user" data-id='<?= $e->userID ?>'><i class="fa fa-remove"></i></a>
                                  <!-- <td><button type="button" class="delete-user2" onclick='del_user("<?= $e->userID ?>");'><i class="fa fa-trash"></i></button></td> -->
                                  <!-- <a href='#' class="sort-education" data-direction="up" data-sort-order="<?= $e->sortOrder ?>" data-id='<?= $e->id ?>'><i class="fa fa-angle-double-up"></i></a>
                                    <a href='#' class="sort-education" data-direction="down" data-sort-order="<?= $e->sortOrder ?>" data-id='<?= $e->id ?>'><i class="fa fa-angle-double-down"></i></a> -->

                                </td>
                              </tr>
                            <?php endforeach; ?>

                          </tbody>
                        </table>
                        <!--- end content -->

                      </div> <!-- end x-content -->
                    </div>
                    <!--end x-panel-->
                  </div>
                </div>
                <!--end row-->

                <!--- end content -->

              </div>



            </div>
          </div>
        </div>
      </section>

      <!--Add New Activity modal -->
      <div class="modal fade" id="addUser" role="dialog" style="overflow-y: initial !important">
        <div class="modal-dialog modal-lg">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4>เพิ่มผู้ใช้งาน</h4>
            </div>

            <div class="modal-body" style="">

              <div class="form-group">
                <label class="control-label" for="activity-title">ชื่อผู้ใช้</label>
                <input type="text" id="activity-title" class="form-control">
              </div>

              <div class="form-group">
                <label class="control-label" for="activity-text">หน้าที่</label>
                <textarea id="activity-text" class="form-control" rows="3"></textarea>
              </div>


            </div>
            <!--end modal -body -->
            <div class="modal-footer">
              <button id='save-activity-btn' data-action="insert" data-id="-1" class="btn btn-success btn-default pull-left">บันทึก</button>
              <button class="btn btn-primary btn-default pull-left" data-dismiss="modal">ยกเลิก</button>
            </div>
            <!--end modal footer-->
          </div>
          <!--end modal content-->
        </div>
        <!--end modal dialog-->
      </div>
      <!--end add new Activity modal-->