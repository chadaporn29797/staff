<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
      <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">งานวิจัย</h3>
      </div>
      <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
          <div class="breadcrumb-wrapper mr-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= site_url('main/dashboard') ?>">Home</a>
              </li>
              <li class="breadcrumb-item active">งานวิจัย
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
                <h4 class="card-title">งานวิจัย</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><button class="btn btn-success" data-toggle="modal" id="konha" data-target="#add-new-group">+ดึงข้อมูล</button></li>
                  </ul>
                </div>
              </div>


              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">

                    <div class="x_content ml-4 ">

                      <br><input type="hidden" id="namesh" name="namesh" value="<?php echo $users[0]->nameTH_em, " ", $users[0]->sirNameTH_em ?>">

                      <!-- <ul class="fa-ul" id="show">
                        รอดึงข้อมูล
                        <?php print_r($researchON) ?>
                      </ul> -->


                      <div align='center' id='myTable3'>
                        <br><br>
                        <font style='font-size:20px;' id='myTable'>รายชื่อโครงการวิจัยที่กำลังดำเนินการ</font>
                        <table class="table table-bordered ml-3 mr-3" style=' width:90%;' id='myTable2'>
                          <thead>
                            <tr>
                              <th scope="col">ลำดับ</th>
                              <th scope="col" align='center'>ชื่อโครงการวิจัย</th>
                              <th scope="col">ปีงบประมาณ</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no = 0;
                            foreach ($researchON as $row) {
                            ?>
                              <tr>
                                <th scope="row"><?php echo $no + 1; ?></th>
                                <td><?php echo $row->title; ?></a></td>
                                <td><a href=''><?php echo $row->budget_year; ?></a></td>
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
                      <div align='center' id='myTable3'>
                        <br>
                        <font style='font-size:20px;' id='myTable'>รายชื่อโครงการวิจัยที่เสร็จสิ้น</font>
                        <table class="table table-bordered ml-3 mr-3" style=' width:90%;' id='myTable2'>
                          <thead>
                            <tr>
                              <th scope="col">ลำดับ</th>
                              <th scope="col" align='center'>ชื่อโครงการวิจัย</th>
                              <th scope="col">ปีงบประมาณ</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no = 0;
                            foreach ($researchCOM as $row) {
                            ?>
                              <tr>
                                <th scope="row"><?php echo $no + 1; ?></th>
                                <td><?php echo $row->title; ?></a></td>
                                <td><a href=''><?php echo $row->budget_year; ?></a></td>
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
                      <div align='center' id='myTable3'>
                        <br>
                        <font style='font-size:20px;' id='myTable'>บทความวิจัยและประชุมวิชาการ</font>
                        <table class="table table-bordered ml-3 mr-3" style=' width:90%;' id='myTable2'>
                          <thead>
                            <tr>
                              <th scope="col">ลำดับ</th>
                              <th scope="col" align='center'>ชื่อบทความ</th>
                              <th scope="col">ปีงบประมาณ</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no = 0;
                            foreach ($researchCOM as $row) {
                            ?>
                              <tr>
                                <th scope="row"><?php echo $no + 1; ?></th>
                                <td><?php echo $row->title; ?></a></td>
                                <td><a href=''><?php echo $row->budget_year; ?></a></td>
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
          var url = "http://localhost/research/index.php/api/findProjectCom/" + $("#namesh").val();

          $.get(url, function(data) {
            console.log(data);
            // $("#show").html(" โครงการวิจัยที่เสร็จสิ้นแล้ว ");

            $.each(data, function(i, item) {
              console.log(data[i].firstName);
              // $("#show").append('<p class="m-1">' + (i + 1) + ". " + data[i].title + "  " + data[i].budget_year + '</p>');

              $.post('<?= site_url('main/add_research') ?>', {
                "id_project": data[i].id_project,
                "title": data[i].title,
                "budget_year": data[i].budget_year,
                "vstatus": '1',
                "user_id": <?php echo $userID ?>,
              }, function(data) {
                if (data.success == true) {
                  alert("เพิ่มสำเร็จ");
                  location.reload(true);
                }
              }, "json");

            });

          }, "json");


        });

        $("#konha").click(function(e) {
          e.preventDefault();
          var url2 = "http://localhost/research/index.php/api/findProjectOn/" + $("#namesh").val();

          $.get(url2, function(data) {
            console.log(data);
            // $("#show").append(" โครงการวิจัยที่กำลังดำเนินการ ");

            $.each(data, function(i, item) {
              console.log(data[i].firstName);
              // $("#show").append('<p class="m-1">' + (i + 1) + ". " + data[i].title + "  " + data[i].budget_year + '</p>');

              $.post('<?= site_url('main/add_research') ?>', {
                "id_project": data[i].id_project,
                "title": data[i].title,
                "budget_year": data[i].budget_year,
                "vstatus": '0',
                "user_id": <?php echo $userID ?>,
              }, function(data) {
                if (data.success == true) {
                  alert("เพิ่มสำเร็จ");
                  location.reload(true);
                }
              }, "json");

            });

            // location.reload();


          }, "json");


        });

        $("#konha").click(function(e) {
          e.preventDefault();
          var url2 = "http://localhost/research/index.php/api/findPublications/" + $("#namesh").val();

          $.get(url2, function(data) {
            console.log(data);
            // $("#show").append(" โครงการวิจัยที่กำลังดำเนินการ ");

            $.each(data, function(i, item) {
              console.log(data[i].firstName);
              // $("#show").append('<p class="m-1">' + (i + 1) + ". " + data[i].title + "  " + data[i].budget_year + '</p>');

              $.post('<?= site_url('main/add_research') ?>', {
                "id_project": data[i].id_project,
                "title": data[i].title,
                "budget_year": data[i].budget_year,
                "vstatus": '0',
                "user_id": <?php echo $userID ?>,
              }, function(data) {
                if (data.success == true) {
                  alert("เพิ่มสำเร็จ");
                  location.reload(true);
                }
              }, "json");

            });

            location.reload();


          }, "json");


        });
      </script>