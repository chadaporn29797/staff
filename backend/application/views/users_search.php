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
                  <form>

                  <div class="input-group">
                    <input type="text" class="form-control" id="uuu"  placeholder="ค้นหาชื่อผู้ใช้">
                    <span class="input-group-btn">
                      <button id="sb" class="btn btn-default" onclick="goto(uuu.val)" type="button">ค้นหา</button>
                      <a href="<?= site_url('main/add_user') ?>"><button class="btn btn-success" type="button">เพิ่มผู้ใช้</button></a>
                    </span>
                  </div>
                  </form>
                  <h4 class="card-title  pull-right ">ผลการค้นหา "<?php echo $key; ?>"</h4>
                 

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
                        <table class="table table-bordered ml-3 mr-3 " id="data">
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
                            <?php foreach ($users2 as $e) : ?>

                              <tr>
                                <th scope="row"><?= ++$counter ?></th>
                                <td><?= $e->username ?></td>
                                <?php if ($e->role == 1) { ?>
                                  <td>แอดมิน</td>
                                <?php } else if ($e->role == 2) { ?>
                                  <td>เจ้าหน้าที่</td>
                                <?php } ?>

                                <td>
                                  <a href='<?= site_url('main/edit_user/' . $e->userID) ?>'>
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

      <script>
        $(document).ready(function() {
          $('#data').after('<div class="pull-right m-1 " id="nav"></div>');
          var rowsShown = 10;
          var rowsTotal = $('#data tbody tr').length;
          var numPages = rowsTotal / rowsShown;
          for (i = 0; i < numPages; i++) {
            var pageNum = i + 1;
            $('#nav').append('<a href="#' + i + '" rel="' + i + '">' + pageNum + '</a> ');
          }
          $('#data tbody tr').hide();
          $('#data tbody tr').slice(0, rowsShown).show();
          $('#data thead tr').show();
          $('#nav a:first').addClass('active');
          $('#nav a').bind('click', function() {

            $('#nav a').removeClass('active');
            $(this).addClass('active');
            var currPage = $(this).attr('rel');
            var startItem = currPage * rowsShown;
            var endItem = startItem + rowsShown;
            $('#data tbody tr').css('opacity', '0.0').hide().slice(startItem, endItem).
            css('display', 'table-row').animate({
              opacity: 1
            }, 300);
          });
        });


        $("#sb").click(function(e) {
          e.preventDefault();
          // alert($("#uuu").val());
          window.location = "<?php echo base_url(); ?>index.php/main/users_search/" + $("#uuu").val();

        });
      </script>

      <style>

      </style>