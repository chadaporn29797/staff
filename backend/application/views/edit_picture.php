<!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="page-title">
              <div class="title_left">
                <h3>แก้ไขรูปภาพโปรไฟล์</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
							<!--start content -->
						 <div class="row">
						 	<button id="edit-btn" class="btn btn-default">Edit</button>
						 	<button id="save-btn" class="btn btn-default" disabled>Save</button>
						 </div>

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


							<?php if(isset($error)) echo $error; ?>
							<?php 

								if(isset($upload_data)){
									echo $upload_data["file_name"] ;
								}
							?>
                  <br>
						<!--- end content -->

                  </div> <!-- end x-content -->
                </div> <!--end x-panel-->
              </div>
            </div> <!--end row-->

          </div>
        </div> <!--end right-col-->
<!-- /page content -->


