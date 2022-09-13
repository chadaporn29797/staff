<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
      <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">คำสั่ง</h3>
      </div>
      <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
          <div class="breadcrumb-wrapper mr-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= site_url('main/dashboard') ?>">Home</a>
              </li>
              <li class="breadcrumb-item active">คำสั่ง
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
                <h4 class="card-title">คำสั่ง(ดึงข้อมูลจากระบบคำสั่ง)</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">

                    <?php
                    $no = 0;
                    foreach ($document as $row) {
                      $no++;
                    }

                    if ($no == 0) {
                      echo '<li><button class="btn btn-success" data-toggle="modal" id="konha" data-target="#add-new-group">+ดึงข้อมูล</button></li>';
                    } else {
                      echo '<li class="mr-2" >อัพเดตข้อมูลล่าสุดเมื่อ '. $document[0]->update .'</li>';
                      echo '<li><button class="btn btn-info" data-toggle="modal" id="update" data-target="#add-new-group">+อัพเดตข้อมูล</button></li>';
                    }
                    ?>
                  </ul>
                </div>
              </div>


              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">

                    <div class="x_content ml-4 ">

                      <br><input type="hidden" id="namesh" name="namesh" value="<?php echo $users[0]->nameTH_em, " ", $users[0]->sirNameTH_em ?>">
                      <br><input type="hidden" id="iduser" name="iduser" value="<?php echo $users[0]->userID ?>">

                      <!-- <ul class="fa-ul" id="show">
                        รอดึงข้อมูล
                        <?php print_r($researchON) ?>
                      </ul> -->


                      <div align='center' id='myTable3'>
                        <br><br>
                        <font style='font-size:20px;' id='myTable'>รายการหนังสือคำสั่ง</font>
                        <table class="table table-bordered ml-3 mr-3" style=' width:90%;' id='myTable2'>
                          <thead>
                            <tr>
                              <th scope="col" style=' width:10%;'>ลำดับ</th>
                              <th scope="col" align='center' style=' width:10%;'>คำสั่งเลขที่</th>
                              <th scope="col" style=' width:10%;'>ประเภท</th>
                              <th scope="col">เรื่อง</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no = 0;
                            foreach ($document as $row) {
                            ?>
                              <tr>
                                <th scope="row"><?php echo $no + 1; ?></th>
                                <td><?php echo $row->no; ?></a></td>
                                <td><?php echo $row->document_type; ?></a></td>
                                <td><a href="http://localhost/document/index.php/Main/vShowDocument/<?php echo $row->document_id; ?>" target="_blank"><?php echo $row->document_name; ?></a></td>
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
        var url = "http://localhost/document/index.php/api/finddocPerson/" + $("#namesh").val();

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
          alert("ดึงข้อมูลเรียบร้อย");
          setTimeout(() => {
            document.location.reload();
          }, 1000);

        }, "json");


      });

      $("#update").click(function(e) {
        e.preventDefault();
        var url = "http://www.sci.ubu.ac.th/command/index.php/api/finddocPerson/" + $("#namesh").val();

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