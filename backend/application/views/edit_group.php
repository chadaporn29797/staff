<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-wrapper-before"></div>
		<div class="content-header row">
			<div class="content-header-left col-md-4 col-12 mb-2">
				<h3 class="content-header-title">กลุ่มวิจัย</h3>
			</div>
			<div class="content-header-right col-md-8 col-12">
				<div class="breadcrumbs-top float-md-right">
					<div class="breadcrumb-wrapper mr-1">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= site_url('main/dashboard') ?>">Home</a>
							</li>
							<li class="breadcrumb-item active">กลุ่มวิจัย
							</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<?php
		if (isset($research_group) && $research_group->num_rows() > 0) :
			$group = $research_group->row();

		?>

			<div class="content-body">
				<!-- Line Awesome section start -->
				<section id="line-awesome-icons">
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title"><a href='<?= site_url('main/groups') ?>'>กลุ่มทั้งหมด</a> - <?= $group->name ?></h4>
									<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
									<div class="heading-elements">
										<ul class="list-inline mb-0">
										</ul>
									</div>
								</div>


								<div class="x_content">



									<!-- <ul class="nav nav-tabs">
										<li class="active"><a href="#info-panel" data-toggle="tab">ข้อมูลเบื้องต้น</a></li>
										<li><a href="#detail-panel" data-toggle="tab">เนื้อหา</a></li>
										<li><a href="#activity-panel" data-toggle="tab">ข่าวและกิจกรรม</a></li>
										<li><a href="#research-panel" data-toggle="tab">งานวิจัย</a></li>
										<li><a href="#innovation-panel" data-toggle="tab">นวัตกรรม</a></li>
									</ul> -->

									<div class=" ml-3" role="group" aria-label="Basic example">
										<a href="#info-panel" data-toggle="tab"><button type="button" class="btn btn-secondary">ข้อมูลเบื้องต้น</button></a>
										<a href="#detail-panel" data-toggle="tab"><button type="button" class="btn btn-primary">เนื้อหา</button></a>
										<a href="#activity-panel" data-toggle="tab"><button type="button" class="btn btn-light">ข่าวและกิจกรรม</button></a>
										<a href="#research-panel" data-toggle="tab"><button type="button" class="btn btn-dark">งานวิจัย</button></a>
										<a href="#innovation-panel" data-toggle="tab"><button type="button" class="btn btn-info">นวัตกรรม</button></a>
									</div>

									<div class="tab-content clearfix ml-3 mt-3">

										<div id="innovation-panel" class="tab-pane mr-3">
											<h2>นวัตกรรม</h2>
											<br>
											<br>
										</div>

										<div id="research-panel" class="tab-pane mr-3">
											<h2>งานวิจัย</h2>
											<a href='#add-new-research' data-toggle='modal'><i class="fa fa-plus-circle" aria-hidden="true">&nbsp;เพิ่มงานวิจัย</i></a>
											<table id="research-table" class="table table-bordered responsive wrap" width="100%"></table>
										</div>

										<div id="activity-panel" class="tab-pane mr-3" style="">
											<h2>ข่าวและกิจกรรม</h2>
											<a href='#add-new-activity' data-toggle='modal'><i class="fa fa-plus-circle" aria-hidden="true">&nbsp;เพิ่มข่าว/กิจกรรม</i></a>
											<table id="activity-table" class="table table-bordered responsive wrap" width="100%"></table>
											<br>
										</div>

										<div id="info-panel" class="tab-pane   in active">
											<div class="row">
												<h4>
													<a href='#edit-groupName' data-toggle='modal'><i class="fa fa-pencil" aria-hidden="true"></i></a>
													ชื่อกลุ่ม : &nbsp;
												</h4>
												<div class="group-info">
													<span id="groupName"><?= $group->name ?></span>
												</div>
											</div>


											<div class="row">
												<h4>
													<a href='#add-new-members' data-toggle='modal'><i class="fa fa-users" aria-hidden="true"></i></a>
													สมาชิกกลุ่ม :
												</h4>
												<div class="group-info">
													<ul class="fa-ul">
														<?php foreach ($members as $member) {
															if (is_array($member)) {
																$html  = "<li><i class='fa fa-user fa-li'></i>" . $member["name"];
																if ($member["admin"] == 1)
																	$html .= "(creator)";
																else
																	$html .= "<a href='#' class='remove-user' data-id='" . $member["userID"] . "'><i class='fa fa-close'></i></a></li>";

																echo $html;
															}
														}
														?>
													</ul>
												</div>
											</div>

											<div class="row">
												<h4>
													<span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
													ภาพประจำกลุ่ม : &nbsp;
												</h4>
												<div class="group-info">
													<!-- <div id='group-image' style='border: 1px solid #ccc'> -->
													<div id='group-image'>
														<!-- <img src='<?= base_url("../files/groups/$groupID") . "/" . $group->imagePath ?>'> -->
														<img style=" border: 1px solid #ccc; display: inline-block;width: 150px;height: 150px;border-radius: 50%;background-repeat: no-repeat;background-position: center center;background-size: cover;" class="img-responsive avatar-view" src='<?= base_url("../files/groups/$groupID") . "/" . $group->imagePath ?>' alt="Avatar" title="Change the avatar">

													</div>
													<br>
													<span class="input-group-btn mt-2">
														<button id='submit-upload' class='btn btn-default' type="button" onClick="$('#upload-image').click()">Upload</button>
														<input id="upload-image" type="file" style='display:none' />
														</button>
													</span>
													<br>
													<br>

												</div>
											</div>


										</div><!-- end info-panel -->

										<div id="detail-panel" class="tab-pane">
											<div class="row">
												<h4>
													<a href='#edit-shortDescription' data-toggle='modal'><i class="fa fa-pencil" aria-hidden="true"></i></a>
													คำอธิบายกลุ่ม :
												</h4>
											</div>
											<div class="group-info">
												<span id='shortDescription'><?= $group->shortDescription ?></span>
											</div>
											<br>
											<br>

											<div class="row">
												<h4>
													<a href='#edit-detail' data-toggle='modal'><i class="fa fa-pencil" aria-hidden="true"></i></a>
													เนื้อหา :
												</h4>
											</div>
											<div class="group-info"><span id='detail'><?= $group->detail ?></span>

											</div>
											<br>
											<br>
											<br>
										</div>
									</div> <!-- end tab-content -->

								</div>



							</div>
						</div>
					</div>
				</section>



				<!--Edit group-name modal -->
				<div class="modal fade" id="edit-groupName" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<h4>กำหนดชื่อกลุ่ม</h4>
							</div>
							<div class="modal-body">

								<div class="form-group">
									<label for="e-groupName">ชื่อกลุ่ม</label>
									<input type="text" id="e-groupName" required="required" class="form-control" value='<?= $group->name ?>'>
								</div>

							</div>
							<div class="modal-footer">
								<button id='edit-groupName-btn' class="btn btn-success btn-default pull-left">บันทึก</button>
								<button class="btn btn-primary btn-default pull-left" data-dismiss="modal">ยกเลิก</button>
							</div>
							<!--end modal footer-->
						</div>
						<!--end modal content-->
					</div>
					<!--end modal dialog-->
				</div>
				<!--end edit-groupName modal-->

				<!--Edit shortDescription modal -->
				<div class="modal fade" id="edit-shortDescription" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<h4>กำหนดคำอธิบายกลุ่ม</h4>
							</div>
							<div class="modal-body">

								<div class="form-group">
									<label for="e-shortDescription">คำอธิบายกลุ่ม</label>
									<textarea id="e-shortDescription" required="required" class="form-control"><?= $group->shortDescription ?></textarea>
								</div>

							</div>
							<div class="modal-footer">
								<button id='edit-shortDescription-btn' class="btn btn-success btn-default pull-left">บันทึก</button>
								<button class="btn btn-primary btn-default pull-left" data-dismiss="modal">ยกเลิก</button>
							</div>
							<!--end modal footer-->
						</div>
						<!--end modal content-->
					</div>
					<!--end modal dialog-->
				</div>
				<!--end edit-groupDescripion modal-->



				<!--Edit detail modal -->
				<div class="modal fade" id="edit-detail" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<h4>กำหนดเนื้อหา</h4>
							</div>
							<div class="modal-body">

								<div class="form-group">
									<label for="e-detail">เนือ้หา</label>
									<textarea id="e-detail" required="required" class="form-control"> <?= $group->detail ?></textarea>
								</div>

							</div>
							<div class="modal-footer">
								<button id='edit-detail-btn' class="btn btn-success btn-default pull-left">บันทึก</button>
								<button class="btn btn-primary btn-default pull-left" data-dismiss="modal">ยกเลิก</button>
							</div>
							<!--end modal footer-->
						</div>
						<!--end modal content-->
					</div>
					<!--end modal dialog-->
				</div>
				<!--end edit-detail modal-->



				<!--Add New Member modal -->
				<div class="modal fade" id="add-new-members" role="dialog" style="overflow-y: initial !important">
					<div class="modal-dialog modal-lg">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<h4>เพิ่มสมาชิกกลุ่มวิจัย</h4>
							</div>
							<div class="modal-body" style="height: 350px; overflow-y: auto;">

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="group-members">สมาชิกกลุ่ม</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<div class="input-group">
											<input type="text" id="group-members" data-provide="typeahead" class="form-control">
											<span class="input-group-btn"> <button id='add-member-btn' type="button" class="btn btn-success">เพิ่ม</button> </span>
										</div>
									</div>
								</div>

								<div class="row">
									<div id="member-panel" class="col-md-9 col-md-offset-3 col-sm-9 col-sm-offset-3 col-xs-12"> </div>
								</div>

							</div>
							<div class="modal-footer">
								<button id='save-member-btn' class="btn btn-success btn-default pull-left">บันทึก</button>
								<button class="btn btn-primary btn-default pull-left" data-dismiss="modal">ยกเลิก</button>
							</div>
							<!--end modal footer-->
						</div>
						<!--end modal content-->
					</div>
					<!--end modal dialog-->
				</div>
				<!--end add new group modal-->


				<!--Add New Activity modal -->
				<div class="modal fade" id="add-new-activity" role="dialog" style="overflow-y: initial !important">
					<div class="modal-dialog modal-lg">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<h4>เพิ่มข่าว/กิจกรรม</h4>
							</div>

							<div class="modal-body" style="">

								<div class="form-group">
									<label class="control-label" for="activity-title">ชื่อเรื่อง</label>
									<input type="text" id="activity-title" class="form-control">
								</div>

								<div class="form-group">
									<label class="control-label" for="activity-text">เนื้อหา</label>
									<textarea id="activity-text" class="form-control" rows="3"></textarea>
								</div>

								<div class="form-group">
									<label class="control-label" for="activity-image">รูปภาพประกอบ</label>
									<div id="activity-images" style='border: 1px solid #ccc'>
										<ul></ul>
									</div>

									<div class="input-group">
										<input id="activity-image" type="text" class="form-control" placeholder="รูปภาพ..." onClick="$('#upload-image').click()">
										<span class="input-group-btn">
											<button id='activity-image-btn' class="btn btn-default" type="button">เพิ่มรูป</button>
											<input id="upload-image" type="file" style="display: none;">
										</span>
									</div><!-- /input-group -->




								</div>

								<div class="form-group">
									<label class="control-label" for="activity-link">ลิงค์ที่เกี่ยวข้อง</label>
									<div id="activity-links" style='border: 1px solid #ccc'>
										<ul></ul>
									</div>
									<div class="input-group">
										<input id="activity-link" type="text" class="form-control" placeholder="www.yourlink.com">
										<span class="input-group-btn">
											<button id='activity-link-btn' class="btn btn-default" type="button">เพิ่มลิงค์</button>
										</span>
									</div><!-- /input-group -->

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

				<!--Add New Research modal -->
				<div class="modal fade" id="add-new-research" role="dialog" style="overflow-y: initial !important">
					<div class="modal-dialog modal-lg">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<h4>เพิ่ม/แก้ไขงานวิจัยกลุ่ม</h4>
							</div>

							<div class="modal-body" style="">

								<div class="form-group">
									<label class="control-label" for="research-title">ชื่องานวิจัย</label>
									<input type="text" id="research-title" class="form-control">
								</div>

								<div class="form-group">
									<label class="control-label" for="research-summary">สรุปย่องานวิจัย</label>
									<textarea id="research-summary" class="form-control" rows="3"></textarea>
								</div>


								<div class="form-group">
									<label class="control-label2" for="research-members">ผู้วิจัย</label>
									<div class="input-group">
										<input type="text" id="research-members" data-provide="typeahead" class="form-control">
										<span class="input-group-btn"> <button id='add-research-member-btn' type="button" class="btn btn-success">เพิ่ม</button> </span>
									</div>
								</div>

								<div class="row">
									<div id="rmember-panel">
										<ul></ul>
									</div>
								</div>




								<div class="form-group">
									<label class="control-label" for="research-documents">แนบไฟล์งานวิจัย</label>
									<div id="research-documents" style='border: 1px solid #ccc'>
										<ul></ul>
									</div>

									<div class="input-group">
										<input id="research-file" type="text" class="form-control" placeholder="เลือกไฟล์..." onClick="$('#upload-research').click()">
										<span class="input-group-btn">
											<button id='research-file-btn' class="btn btn-default" type="button">เพิ่มไฟล์</button>
											<input id="upload-research" type="file" style="display: none;">
										</span>
									</div><!-- /input-group -->

								</div>


							</div>
							<!--end modal -body -->
							<div class="modal-footer">
								<button id='save-research-btn' data-action="insert" data-id="-1" class="btn btn-success btn-default pull-left">บันทึก</button>
								<button class="btn btn-primary btn-default pull-left" data-dismiss="modal">ยกเลิก</button>
							</div>
							<!--end modal footer-->
						</div>
						<!--end modal content-->
					</div>
					<!--end modal dialog-->
				</div>
				<!--end add new group modal-->


			<?php endif; ?>
