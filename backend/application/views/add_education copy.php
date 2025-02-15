<div class="modal fade" id="editEducationModal" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4>Edit Educational Background</h4>
      </div>
      <div class="modal-body">
        <textarea id="editEducationContent" name="editEducationContent"></textarea>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success btn-default pull-left">บันทึก</button>
        <button class="btn btn-primary btn-default pull-left" data-dismiss="modal">ยกเลิก</button>
      </div>
      <!--end modal footer-->
    </div>
    <!--end modal content-->
  </div>
  <!--end modal dialog-->
</div>
<!--end editEeducation modal-->


<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
      <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">ประวัติการศึกษา</h3>
      </div>
      <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
          <div class="breadcrumb-wrapper mr-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= site_url('main/dashboard') ?>">Home</a>
              </li>
              <li class="breadcrumb-item active">ประวัติการศึกษา
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
                <h4 class="card-title">ข้อมูลประวัติการศึกษา</h4>
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
                <div class="clearfix"></div>

                <?php if ($educationID == -1) : ?>
                  <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                      <div class="x_panel">

                        <div class="x_content mr-5">
                          <!--start content -->
                          <table class="table table-bordered ml-3 mr-3 ">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>รายละเอียด</th>
                                <th>#</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $counter = 0; ?>
                              <?php foreach ($educations as $e) : ?>

                                <tr>
                                  <th scope="row"><?= ++$counter ?></th>
                                  <td><?= $e->detail ?></td>
                                  <td>
                                  <a href='#editEducationModal' data-toggle='modal' data-id='<?= $award->id ?>'><i class="fa fa-edit"></i></a>
                                    <a href='#' class="delete-education2" data-id='<?= $e->id ?>'><i class="fa fa-remove"></i></a>
                                    <a href='#' class="sort-education" data-direction="up" data-sort-order="<?= $e->sortOrder ?>" data-id='<?= $e->id ?>'><i class="fa fa-angle-double-up"></i></a>
                                    <a href='#' class="sort-education" data-direction="down" data-sort-order="<?= $e->sortOrder ?>" data-id='<?= $e->id ?>'><i class="fa fa-angle-double-down"></i></a>

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

                <?php endif; ?>
                <!--- end content -->

              </div>



            </div>
          </div>
        </div>
      </section>
      
      <section id="line-awesome-icons">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">เพิ่มประวัติการศึกษา</h4>
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
                <div class="ml-3 mr-3">
                  <textarea id="addEducationContent" name="addEducationContent"></textarea>
                </div>
                <button id="addEducationContent_bt" class="btn btn-success btn-default pull-right m-2 mr-2">บันทึก</button>
                <br>

              </div>




            </div>
          </div>
        </div>
      </section>
      <!-- // Line Awesome section end -->