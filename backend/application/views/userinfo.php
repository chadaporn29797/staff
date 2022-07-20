<!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="page-title">
              <div class="title_left">
                <h3>จัดการข้อมูลบุคลากร</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
                  <div class="x_title">
                    <h2>ข้อมูลของบุคลากร</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <a href='<?= site_url('main/edit_picture/'.$info->userID) ?>'><img class="img-responsive avatar-view" src="<?= base_url('avatars/'.$info->avatar) ?>" alt="Avatar" title="Change the avatar"></a>
                        </div>
                      </div>
                      <h3><?= ($info->forName == null ? "" : $info->forName). $info->nameTH_em." ".$info->sirNameTH_em ?></h3>

                      <ul class="list-unstyled user_data">
							   <li>
                          <i class="fa fa-briefcase user-profile-icon"></i>สังกัด <?= $info->departmentName ?>
                        </li>
                        <li><i class="fa fa-map-marker user-profile-icon"></i>ห้องพัก <?= $info->roomNumber ?>
                        </li>
								<li>
									<i class="fa fa-phone"></i> <?= $info->tel ?>
								</li>
                        <li>
                          <i class="fa fa-envelope"></i> <?= $info->email ?>
								</li>
                        								<li>
                          <i class="fa fa-comment-o user-profile-icon"></i><?= $info->description ?>
                        </li>

                      </ul>
                      <a class="btn btn-success" 
							      href="<?= site_url( "main/edit_profile"."/". ( ( $userID !== null ) ? $userID : "" ) )  ?>" >
							      <i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                      <br>

                      <!-- start skills -->
							 <!--
                      <h4>Skills</h4>
                      <ul class="list-unstyled user_data">
                        <li>
                          <p>Web Applications</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50" aria-valuenow="49" style="width: 50%;"></div>
                          </div>
                        </li>
                        <li>
                          <p>Website Design</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70" aria-valuenow="69" style="width: 70%;"></div>
                          </div>
                        </li>
                        <li>
                          <p>Automation &amp; Testing</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30" aria-valuenow="29" style="width: 30%;"></div>
                          </div>
                        </li>
                        <li>
                          <p>UI / UX</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50" aria-valuenow="49" style="width: 50%;"></div>
                          </div>
                        </li>
                      </ul>
							 -->
                      <!-- end of skills -->

                    </div>
<div class="col-md-6 col-sm-6 col-xs-12">
<h3>ทุนการศึกษา</h3>
						<table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>ปีการศึกษา</th>
                          <th>ชื่อทุน</th>
                          <th>จำนวน</th>
                          <th>รายละเอียด</th>
                        </tr>
                      </thead>
                      <tbody>
							 <?php $counter= 0; ?>
							 <?php foreach($scholarship as $ss) : ?>
                        <tr>
                          <th scope="row"><?= ++$counter ?></th>
                          <td><?= $ss->scYear ?></td>
                          <td><?= $ss->scName ?></td>
                          <td><?= $ss->amount ?></td>
                          <td><?= $ss->detail ?></td>

                        </tr>
							 <?php endforeach; ?>
                          </tbody>
                    </table>
                     <a class="btn btn-success" href="<?= site_url('main/edit_scholarship') ?>"><i class="fa fa-edit m-right-xs"></i>Edit ทุนการศึกษา</a>

                    <h3>ผลงานวิชาการ</h3>

						<table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <td>ปี พ.ศ.</td>
                          <th>ชื่อผลงาน</th>
                          <th>รายละเอียด</th>
                        </tr>
                      </thead>
                      <tbody>
							 <?php $counter= 0; ?>
							 <?php foreach($works as $w) : ?>
 
                        <tr>
                          <th scope="row"><?= ++$counter ?></th>
                          <td><?= $w->wYear ?></td>
                          <td><?= $w->wName ?></td>
                          <td><?= $w->detail ?></td>
                        </tr>
								<?php endforeach; ?>

                          </tbody>
                    </table>

                     <a class="btn btn-success" href="<?= site_url('main/edit_works') ?>"><i class="fa fa-edit m-right-xs"></i>Edit ผลงานวิชาการ</a>


						  </div>

                    </div>
                  </div>

                                    </div>

				  <!--end x-panel-->
              </div>
            </div> <!--end row-->

          </div>
        </div> <!--end right-col-->
<!-- /page content -->


