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


    <div class="content-body">
      <!-- Line Awesome section start -->
      <section id="line-awesome-icons">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">กลุ่มของท่าน</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <!-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li> -->
                    <li><button class="btn btn-success" data-toggle="modal" data-target="#add-new-group">+สร้างกลุ่ม</button></li>

                    <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                  </ul>
                </div>
              </div>


              <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">

					<div class="x_content ml-4 ">
						
						<br>

						<ul class="fa-ul">
              <?php foreach ($research_groups->result() as $group) :  ?>
                <li>
                  <i class="fa-li fa fa-users" aria-hidden="true"></i>
                  <a href='<?= site_url("main/edit_group/" . $group->groupID) ?>'><?= $group->name ?></a>&nbsp;&nbsp;
                  <a class='delete-group' data-name='<?= $group->name ?>' data-id='<?= $group->groupID ?>' href='#'><i class="fa fa-remove"></i></a>
                </li>
              <?php endforeach; ?>
            </ul>
						<br>

					</div> <!-- end x-content -->
				</div>
				<!--end x-panel-->
			</div>
		</div>



            </div>
          </div>
        </div>
      </section>


      
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

        </form>

      </div>
      <div class="modal-footer">
        <button id='add-group-btn' class="btn btn-success btn-default pull-left">บันทึก</button>
        <button class="btn btn-primary btn-default pull-left" data-dismiss="modal">ยกเลิก</button>
      </div>
      <!--end modal footer-->
    </div>
    <!--end modal content-->
  </div>
  <!--end modal dialog-->
</div>
<!--end add new group modal-->

