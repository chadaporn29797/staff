<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>กลุ่มวิจัย</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

						<div class="x_title">
							<h2>กลุ่มของท่าน</h2>
						  <ul class="nav navbar-right panel_toolbox">
                      <li><button class="btn btn-success" data-toggle="modal" data-target="#add-new-group">+สร้างกลุ่ม</button></li>
                    </ul>
						  <div class="clearfix"></div>
						</div>

                  <div class="x_content">

						 <ul class="fa-ul">
						 <?php foreach($research_groups->result() as $group):  ?>
						 	<li>
								<i class="fa-li fa fa-users" aria-hidden="true"></i> 
									<a href='<?= site_url( "main/edit_group/".$group->groupID) ?>'><?= $group->name ?></a>&nbsp;&nbsp;
									<a class='delete-group' data-name='<?=$group->name?>' data-id='<?= $group->groupID ?>' href='#'><i class="fa fa-remove"></i></a>
								</li>
						 <?php endforeach; ?>
						 </ul>

                  </div><!--end x_content -->

                </div>
              </div>
            </div>
          </div>
        </div>
<!-- /page content -->

<!-- fancybox modal -->
<div style="display: none;" id="hidden-content">
	<h2>Hello</h2>
	<p>You are awesome.</p>
</div>
<!-- end fancybox modal -->



<!--Add New group modal -->
<div class="modal fade" id="add-new-group" role="dialog" style="overflow-y: initial !important">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4>สร้างกลุ่มวิจัย</h4>
        </div>
        <div class="modal-body" style="height: 350px; overflow-y: auto;">
		  
		  <form id="create-group" class="form-horizontal form-label-left">
		  	<div class="form-group" style="margin-top:25px">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="group-name">ชื่อกลุ่ม</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" id="group-name" required="required" class="form-control col-md-6 col-sm-8 col-xs-8">
				</div>
			</div>	
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="group-members">สมาชิกกลุ่ม</label>
				<div class="col-md-6 col-sm-6 col-xs-12" >
					<div class="input-group">
					<input type="text" id="group-members"  data-provide="typeahead" class="form-control">
                      <span class="input-group-btn"> <button id='add-member-btn' type="button" class="btn btn-success">เพิ่ม</button> </span>
                </div>
				</div>
			</div>	

			<div class="row">
				<div id="member-panel" class="col-md-9 col-md-offset-3 col-sm-9 col-sm-offset-3 col-xs-12"> </div>
			</div>

		  </form>

	     </div>
        <div class="modal-footer">
          <button id='add-group-btn' class="btn btn-success btn-default pull-left" >บันทึก</button>
          <button class="btn btn-primary btn-default pull-left" data-dismiss="modal">ยกเลิก</button>
        </div>
		  <!--end modal footer-->
      </div>
		  <!--end modal content-->
    </div>
		  <!--end modal dialog-->
  </div>
<!--end add new group modal-->


