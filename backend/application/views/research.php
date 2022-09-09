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
                <h4 class="card-title">งานวิจัย(ดึงข้อมูลจากระบบงานวิจัย)</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">

                    <?php
                    $no = 0;
                    $re = 0;
                    $ar = 0;
                    foreach ($research as $row) {
                      $no++;
                      $re++;
                    }
                    foreach ($article as $row) {
                      $no++;
                      $ar++;
                    }
                    // echo $re;
                    if ($re > 0) {
                      echo '<li class="mr-2" >อัพเดตข้อมูลล่าสุดเมื่อ '. $research[0]->update .'</li>';
                    }elseif ($ar > 0) {
                      echo '<li class="mr-2" >อัพเดตข้อมูลล่าสุดเมื่อ '. $article[0]->update .'</li>';
                    }

                    if ($no == 0) {
                      echo '<li><button class="btn btn-success" data-toggle="modal" id="konha" data-target="#add-new-group">+ดึงข้อมูล</button></li>';
                    } else {
                      
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
                        <font style='font-size:20px;' id='myTable'>รายชื่อโครงการวิจัยที่กำลังดำเนินการ</font>
                        <table class="table table-bordered ml-3 mr-3" style=' width:90%;' id='myTable2'>
                          <thead>
                            <tr>
                              <th scope="col" style=' width:10%;'>ลำดับ</th>
                              <th scope="col" align='center'>ชื่อโครงการวิจัย</th>
                              <th scope="col" style=' width:10%;'>ปีงบประมาณ</th>
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
                                <td><?php echo $row->budget_year; ?></a></td>
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
                              <th scope="col" style=' width:10%;'>ลำดับ</th>
                              <th scope="col" align='center'>ชื่อโครงการวิจัย</th>
                              <th scope="col" style=' width:10%;'>ปีงบประมาณ</th>
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
                                <td><?php echo $row->budget_year; ?></a></td>
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
                              <th scope="col" style=' width:10%;'>ลำดับ</th>
                              <th scope="col" align='center'>ชื่อบทความ</th>
                              <th scope="col">กลุ่ม/รูปแบบการนำเสนอ</th>
                              <th scope="col">ระดับ</th>
                              <th scope="col" style=' width:13%;'>วันที่ตีพิมพ์</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no = 0;
                            foreach ($article as $row) {
                            ?>
                              <tr>
                                <th scope="row"><?php echo $no + 1; ?></th>
                                <td><?php echo $row->title; ?></a></td>
                                <td><?php echo $row->journal_db; ?></a></td>
                                <td><?php echo $row->article_level; ?></a></td>
                                <td><?php
                                    $time = strtotime($row->journal_date);
                                    $newformat = date('Y-m-d', $time);
                                    echo $newformat;
                                    ?>
                      </div></a></td>
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
        var url = "http://localhost/research/index.php/api/findProjectCom/" + $("#namesh").val();
        var url2 = "http://localhost/research/index.php/api/findProjectOn/" + $("#namesh").val();
        var url3 = "http://localhost/research/index.php/api/findPublications/" + $("#namesh").val();



        $.get(url, function(data) {
          console.log(data);
          $.each(data, function(i, item) {
            $.post('<?= site_url('main/add_research') ?>', {
              "id_project": data[i].id_project,
              "title": data[i].title,
              "budget_year": data[i].budget_year,
              "vstatus": '1',
              "user_id": <?php echo $userID ?>,
            }, function(data) {
              if (data.success == true) {
                // alert("เพิ่มสำเร็จ");
                // location.reload(true);
              }
            }, "json");

          });

        }, "json");

        $.get(url2, function(data) {
          $.each(data, function(i, item) {
            $.post('<?= site_url('main/add_research') ?>', {
              "id_project": data[i].id_project,
              "title": data[i].title,
              "budget_year": data[i].budget_year,
              "vstatus": '0',
              "user_id": <?php echo $userID ?>,
            }, function(data) {
              if (data.success == true) {}
            }, "json");

          });


        }, "json");

        $.get(url3, function(data) {
          $.each(data, function(i, item) {
            $.post('<?= site_url('main/add_article') ?>', {
              "id_article": data[i].id_article,
              "abstract": data[i].abstract,
              "article_level": data[i].article_level,
              "journal_date": data[i].journal_date,
              "journal_db": data[i].journal_db,
              "journal_name": data[i].journal_name,
              "research_owner": data[i].research_owner,
              "journal_year": data[i].journal_year,
              "title": data[i].title,
              "title_eng": data[i].title_eng,
              "vstatus": data[i].vstatus,
              "vstatus2": data[i].vstatus2,
              "user_id": <?php echo $userID ?>,
            }, function(data) {
              if (data.success == true) {}
            }, "json");

          });

          // location.reload();
          alert("ดึงข้อมูลเรียบร้อย");

          setTimeout(() => {
            document.location.reload();
          }, 1000);


        }, "json");


      });

      $("#update").click(function(e) {
        e.preventDefault();
        var url = "http://localhost/research/index.php/api/findProjectCom/" + $("#namesh").val();
        var url2 = "http://localhost/research/index.php/api/findProjectOn/" + $("#namesh").val();
        var url3 = "http://localhost/research/index.php/api/findPublications/" + $("#namesh").val();

        $.post('<?= site_url('main/del_research_article') ?>', {
          "user_id": <?php echo $userID ?>,
        }, function(data) {
          if (data.success == true) {
          }
        }, "json");

        $.get(url, function(data) {
          $.each(data, function(i, item) {
            $.post('<?= site_url('main/add_research') ?>', {
              "id_project": data[i].id_project,
              "title": data[i].title,
              "budget_year": data[i].budget_year,
              "vstatus": '1',
              "user_id": <?php echo $userID ?>,
            }, function(data) {
              if (data.success == true) {}
            }, "json");

          });

        }, "json");

        $.get(url2, function(data) {
          console.log(data);
          $.each(data, function(i, item) {
            $.post('<?= site_url('main/add_research') ?>', {
              "id_project": data[i].id_project,
              "title": data[i].title,
              "budget_year": data[i].budget_year,
              "vstatus": '0',
              "user_id": <?php echo $userID ?>,
            }, function(data) {
              if (data.success == true) {}
            }, "json");

          });


        }, "json");

        $.get(url3, function(data) {
          $.each(data, function(i, item) {
            $.post('<?= site_url('main/add_article') ?>', {
              "id_article": data[i].id_article,
              "abstract": data[i].abstract,
              "article_level": data[i].article_level,
              "journal_date": data[i].journal_date,
              "journal_db": data[i].journal_db,
              "journal_name": data[i].journal_name,
              "research_owner": data[i].research_owner,
              "journal_year": data[i].journal_year,
              "title": data[i].title,
              "title_eng": data[i].title_eng,
              "vstatus": data[i].vstatus,
              "vstatus2": data[i].vstatus2,
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