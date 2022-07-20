<!-- Modal -->
<div id="SuccessModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body text-center">
        <h1>บันทึกข้อมูลสำเร็จ</h1>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="page-title">
              <div class="title_left">
                <h3>ภาพรวมงานวิจัย</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
						<div class="x_title">
                    <h2>ใส่คำอธิบาย ขนาดไม่เกิน 250 ตัวอักษร</h2>
                    <div class="clearfix"></div>
                  </div>
                 <div class="x_content">
						<!--start content -->
						<textarea id="description">
						 <?= $info->description ?>
						</textarea>
						<div class="text-center" style='padding: 15px;'>
							  <a id='cancel-overview' href='<?=site_url('main/dashboard')?>' class='btn btn-primary'>Cancel</a>
							  <a id='submit-overview' href='#SuccessModal' data-toggle='modal' class='btn btn-success'>Submit</a>
						 </div>
  						<!--- end content -->


                  </div> <!-- end x-content -->
                </div> <!--end x-panel-->
              </div>
            </div> <!--end row-->
          </div>
        </div> <!--end right-col-->
<!-- /page content -->


