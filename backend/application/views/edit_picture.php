<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
      <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">แก้ไขรูปภาพ</h3>
      </div>
      <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
          <div class="breadcrumb-wrapper mr-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= site_url('main/dashboard') ?>">Home</a>
              </li>
              <li class="breadcrumb-item active">แก้ไขรูปภาพ
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
                <h4 class="card-title">รูปภาพโปรไฟล์</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                  </ul>
                </div>
              </div>


              <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">

					<div class="x_content ml-4 ">
						<!--start content -->
						<div class="row">
							<button id="edit-btn" class="btn btn-default">Edit</button>
							<button id="save-btn" class="btn btn-default" disabled>Save</button>
						</div>
						<br>

						<!--start crop avatar -->

						<div id="crop-avatar">
							<div id="crop-canvas"></div>

							<input id="file" type="file" />
							<!--
						 <div class="row">
									<div class="col-md-3 col-xs-10">
									</span><input id="ranger" type="range" min="0" max="2" value="1" step="0.1" />
									</div>
									<div class="col-md-1 col-xs-2"><span id="range-val"></div>
						 </div>
-->
						</div>
						<!--end crop avatar-->
						<br>


						<?php if (isset($error)) echo $error; ?>
						<?php

						if (isset($upload_data)) {
							echo $upload_data["file_name"];
						}
						?>
						<br>
						<!--- end content -->

					</div> <!-- end x-content -->
				</div>
				<!--end x-panel-->
			</div>
		</div>



            </div>
          </div>
        </div>
      </section>