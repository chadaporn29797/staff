<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
      <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">ภาระงาน</h3>
      </div>
      <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
          <div class="breadcrumb-wrapper mr-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= site_url('main/dashboard') ?>">Home</a>
              </li>
              <li class="breadcrumb-item active">ภาระงาน
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
                <h4 class="card-title">ภาระงาน(ดึงข้อมูลจากระบบภาระงาน)</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="">
                  <ul class="list-inline ">
                    <li class="mr-2">เลือกปีและรอบ</li>
                    <div class='row '>
                      <div class='col-lg-4'>
                        <input class='form-control' type="number" id="year" name="year" min="2000" max="<?php echo date('Y');
                                                                                                          +5 ?>" value="<?php echo date('Y'); ?>">
                      </div>
                      <!-- <div class='col-lg-2'> ถึง </div> -->
                      <div class='col-lg-4'>
                        <select class="form-control" id="round" name="round">
                          <option>1</option>
                          <option>2</option>
                        </select>
                      </div>
                      <div class='col-lg-4'>
                      <li><button class="btn btn-success" data-toggle="modal" id="konha" title="ดึงข้อมูลจากระบบภาระงาน" data-target="#add-new-group">+ดึงข้อมูล</button></li>
                      <li><button class="btn btn-warning" data-toggle="modal" id="lob" title="ลบข้อมูลที่ดึงทั้งหมด" data-target="#add-new-group">-รีเซ็ทข้อมูล</button></li>
                      </div>
                    </div>
                    <br>

                    <?php
                          $no = 0;
                          foreach ($workload as $row) {
                            $no++;
                          }

                          if ($no == 0) {
                            echo '';
                          } else {
                            echo '<li class="mr-2" >ดึงข้อมูลล่าสุดเมื่อ ' . $workloads[0]->update . '</li>';
                          }
                          ?>
                  </ul>
                </div>
              </div>



              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">

                    <div class="x_content ml-4 ">

                      <input type="hidden" id="namesh" name="namesh" value="<?php echo $users[0]->nameTH_em, " ", $users[0]->sirNameTH_em ?>">
                      <input type="hidden" id="username" name="username" value="<?php echo $users[0]->username ?>">
                      <input type="hidden" id="iduser" name="iduser" value="<?php echo $users[0]->userID ?>">

                      <div align='center' id='myTable3'>

                        <font style='font-size:20px;' id='myTable'>รายการภาระงาน</font>
                        <table class="table table-bordered ml-3 mr-3" style=' width:90%;' id='myTable2'>
                          <thead>
                            <tr>
                              <th scope="col" style=' width:5%;'>ลำดับ</th>
                              <th scope="col" align='center' >รายการ</th>
                              <th scope="col" >ประเภท</th>
                              <th scope="col" style=' width:15%;'>รอบ/ปีการศึกษา</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                                  $no = 0;
                                  foreach ($workload as $row) {
                                  ?>
                              <tr>
                                <th scope="row"><?php echo $no + 1; ?></th>
                                <td><?php echo $row->info; ?></td>
                                <td><?php echo $row->label; ?></td>
                                <td><?php echo $row->round; ?>/<?php echo $row->year; ?></td>
                              </tr>
                            <?php
                                    $no++;
                                    // }
                                  }

                                  if ($no == 0) {
                                    echo "<tr><td align='center' colspan='6'><b>[==== ไม่พบข้อมูล ====]</b></td></tr>";
                                  }
                            ?>
                          </tbody>
                        </table>
                      </div>
                      <br>

                      <br>
                      <br>
                    </div>

                  </div> <!-- end x-content -->
                </div>
                <!--end x-panel-->
              </div>
            </div>



          </div>
        </div>
    </div>
    </section>



    <script>
      $("#konha").click(function(e) {
        e.preventDefault();
        var url = "http://dataservice.sci.ubu.ac.th/1.2/index.php/Assessment/getData/scsurasu/2022/2";
        // var url = "http://dataservice.sci.ubu.ac.th/1.2/index.php/Assessment/getData/"+ $("#username").val() + "/" + $("#year").val() + "/" + $("#round").val();

        $.get(url, function(data) {
          console.log(data);
          console.log(data);

          $.each(data, function(i, item) {
            $.post('<?= site_url('main/add_workload') ?>', {
              "info": data[i].info,
              "label": data[i].label,
              "year": $("#year").val(),
              "round": $("#round").val(),
              "user_id": <?php echo $userID ?>,
            }, function(data) {
              if (data.success == true) {}
            }, "json");

          });

          alert("ดึงข้อมูลเรียบร้อย");

          setTimeout(() => {
            document.location.reload();
          }, 1000);

        }, "json");


      });

      $("#lob").click(function(e) {
        e.preventDefault();
        $.post('<?= site_url('main/del_workload') ?>', {
          "user_id": <?php echo $userID ?>,
        }, function(data) {
          if (data.success == true) {}
        }, "json");

        alert("รีเซ็ทข้อมูลเรียบร้อย");

          setTimeout(() => {
            document.location.reload();
          }, 500);

      });

      $("#update").click(function(e) {
        e.preventDefault();
        var url = "http://www.sci.ubu.ac.th/command/index.php/api/finddocPersonYear2/" + $("#namesh").val() + "/" + $("#vbegin").val() + "/" + $("#vend").val();

        $.post('<?= site_url('main/del_document') ?>', {
          "user_id": <?php echo $userID ?>,
        }, function(data) {
          if (data.success == true) {}
        }, "json");

        $.get(url, function(data) {
          console.log(data);
          $.each(data, function(i, item) {
            $.post('<?= site_url('main/add_document') ?>', {
              "document_id": data[i].document_id,
              "document_name": data[i].document_name,
              "document_type": data[i].document_type,
              "involved_name": data[i].involved_name,
              "no": data[i].no,
              "budget_year": data[i].budget_year,
              "user_id": <?php echo $userID ?>,
            }, function(data) {
              if (data.success == true) {}
            }, "json");

          });
          alert("อัพเดตข้อมูลเรียบร้อย");

          setTimeout(() => {
            document.location.reload();
          }, 1000);

        }, "json");

      });
    </script>