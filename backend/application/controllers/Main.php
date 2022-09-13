<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form'));
	}

	public function index()
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {
			redirect(site_url('main/dashboard'));
		}
	}


	public function login_success()
	{
		$data = array();
		$this->load->view('header', $data);
		$this->load->view('dashboard_main');
		$this->load->view('footer');
	}

	public function frame_researchGroup($groupID = null)
	{
		$userID = $this->session->userdata("userID");
		$this->load->model("UserModel");
		$data["userID"] = $userID;
		$data["info"] = $this->UserModel->getUserInfo($userID);
		$data["group"] = $this->UserModel->getResearchGroup($groupID)->row();
		$data["members"] = $this->UserModel->getGroupMembers($groupID);
		$data["isAdmin"] = $this->UserModel->isGroupAdmin($userID, $groupID);
		$data["groupID"] = $groupID;
		//echo "groupID=$groupID<br/>";
		//print_r($data["research_group"]);
		//print_r($data["members"]);
		//die();
		$this->load->view('research_group', $data);
		$this->load->view('research_group_js', $data);
	}

	public function dashboard($userID = null)
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {

			$this->load->model("CourseManager");
			$data["courseID"] = $this->CourseManager->getOwnCourseID();

			$this->load->model("UserModel");


			if ($userID == null)
				$userID =  $this->session->userdata("userID");

			$data["info"] = $this->UserModel->getUserInfo();
			//$data["educations"]= $this->UserModel->getUserEducations($userID);
			$data["educations"] = $this->UserModel->getDetail("education", $userID);
			$data["awards"] = $this->UserModel->getDetail("award", $userID);
			$data["scholarships"] = $this->UserModel->getDetail("scholarship", $userID);
			$data["work_exps"] = $this->UserModel->getDetail("work_exp", $userID);
			$data["publications"] = $this->UserModel->getDetail("publication", $userID);
			$data["skills"] = $this->UserModel->getDetail("skill", $userID);
			$data["trainings"] = $this->UserModel->getDetail("training", $userID);

			$data["userID"] = $userID;

			$this->load->view('header', $data);
			$this->load->view('dashboard', $data);
			$this->load->view('footer');
			$this->load->view('dashboard_js', $data);
		}
	}

	public function add_education($userID = null, $id = -1)
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {

			$this->load->model("CourseManager");
			$data["courseID"] = $this->CourseManager->getOwnCourseID();

			$this->load->model("UserModel");


			if ($userID == null)
				$userID =  $this->session->userdata("userID");

			$data["info"] = $this->UserModel->getUserInfo();
			//$data["educations"]= $this->UserModel->getUserEducations($userID);
			$data["educations"] = $this->UserModel->getDetail("education", $userID);

			$data["userID"] = $userID;
			$data["educationID"] = $id;
			if ($id != -1)
				$data["educationIfo"] = $this->UserModel->getEducationInfo($id);
			$this->load->view('header', $data);
			$this->load->view('add_education', $data);
			$this->load->view('footer');
			$this->load->view('dashboard_js', $data);
		}
	}

	public function edit_education($id)
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {

			$this->load->model("CourseManager");
			$data["courseID"] = $this->CourseManager->getOwnCourseID();

			$this->load->model("UserModel");


			// if($userID == null )
			$userID =  $this->session->userdata("userID");

			$data["info"] = $this->UserModel->getUserInfo();
			//$data["educations"]= $this->UserModel->getUserEducations($userID);
			$data["educations"] = $this->UserModel->getDetail("education", $userID);
			$data['eduID'] = $this->UserModel->getEdu(array("id=" . $id));
			$data['education'] = $this->UserModel->getQuery(array("userID =" . $userID));

			$data["userID"] = $userID;
			$data["educationID"] = $id;
			// if( $id != -1)
			//   $data["educationIfo"] = $this->UserModel->getEducationInfo($id);
			$this->load->view('header', $data);
			$this->load->view('edit_education', $data);
			$this->load->view('footer');
			$this->load->view('dashboard_js', $data);
		}
	}



	public function add_overview($userID = null, $id = -1)
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {

			$this->load->model("CourseManager");
			$data["courseID"] = $this->CourseManager->getOwnCourseID();

			$this->load->model("UserModel");


			if ($userID == null)
				$userID =  $this->session->userdata("userID");

			$data["info"] = $this->UserModel->getUserInfo();
			//$data["educations"]= $this->UserModel->getUserEducations($userID);
			$data["overviews"] = $this->UserModel->getDetail("overview", $userID);

			$data["userID"] = $userID;
			$data["educationID"] = $id;
			if ($id != -1)
				$data["educationIfo"] = $this->UserModel->getEducationInfo($id);
			$this->load->view('header', $data);
			$this->load->view('add_overview', $data);
			$this->load->view('footer');
			$this->load->view('dashboard_js', $data);
		}
	}

	public function add_award($userID = null, $id = -1)
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {

			$this->load->model("CourseManager");
			$data["courseID"] = $this->CourseManager->getOwnCourseID();

			$this->load->model("UserModel");


			if ($userID == null)
				$userID =  $this->session->userdata("userID");

			$data["info"] = $this->UserModel->getUserInfo();
			$data["awards"] = $this->UserModel->getDetail("award", $userID);

			$data["userID"] = $userID;
			$data["educationID"] = $id;
			if ($id != -1)
				$data["educationIfo"] = $this->UserModel->getEducationInfo($id);
			$this->load->view('header', $data);
			$this->load->view('add_award', $data);
			$this->load->view('footer');
			$this->load->view('dashboard_js', $data);
		}
	}

	public function add_scholarship($userID = null, $id = -1)
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {

			$this->load->model("CourseManager");
			$data["courseID"] = $this->CourseManager->getOwnCourseID();

			$this->load->model("UserModel");


			if ($userID == null)
				$userID =  $this->session->userdata("userID");

			$data["info"] = $this->UserModel->getUserInfo();
			$data["scholarships"] = $this->UserModel->getDetail("scholarship", $userID);

			$data["userID"] = $userID;
			$data["educationID"] = $id;
			if ($id != -1)
				$data["educationIfo"] = $this->UserModel->getEducationInfo($id);
			$this->load->view('header', $data);
			$this->load->view('add_scholarship', $data);
			$this->load->view('footer');
			$this->load->view('dashboard_js', $data);
		}
	}

	public function add_work_exps($userID = null, $id = -1)
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {

			$this->load->model("CourseManager");
			$data["courseID"] = $this->CourseManager->getOwnCourseID();

			$this->load->model("UserModel");


			if ($userID == null)
				$userID =  $this->session->userdata("userID");

			$data["info"] = $this->UserModel->getUserInfo();
			$data["work_exps"] = $this->UserModel->getDetail("work_exp", $userID);

			$data["userID"] = $userID;
			$data["educationID"] = $id;
			if ($id != -1)
				$data["educationIfo"] = $this->UserModel->getEducationInfo($id);
			$this->load->view('header', $data);
			$this->load->view('add_work_exps', $data);
			$this->load->view('footer');
			$this->load->view('dashboard_js', $data);
		}
	}

	public function add_publication($userID = null, $id = -1)
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {

			$this->load->model("CourseManager");
			$data["courseID"] = $this->CourseManager->getOwnCourseID();

			$this->load->model("UserModel");


			if ($userID == null)
				$userID =  $this->session->userdata("userID");

			$data["info"] = $this->UserModel->getUserInfo();
			$data["publications"] = $this->UserModel->getDetail("publication", $userID);

			$data["userID"] = $userID;
			$data["educationID"] = $id;
			if ($id != -1)
				$data["educationIfo"] = $this->UserModel->getEducationInfo($id);
			$this->load->view('header', $data);
			$this->load->view('add_publication', $data);
			$this->load->view('footer');
			$this->load->view('dashboard_js', $data);
		}
	}

	public function add_skill($userID = null, $id = -1)
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {

			$this->load->model("CourseManager");
			$data["courseID"] = $this->CourseManager->getOwnCourseID();

			$this->load->model("UserModel");


			if ($userID == null)
				$userID =  $this->session->userdata("userID");

			$data["info"] = $this->UserModel->getUserInfo();
			$data["skills"] = $this->UserModel->getDetail("skill", $userID);

			$data["userID"] = $userID;
			$data["educationID"] = $id;
			if ($id != -1)
				$data["educationIfo"] = $this->UserModel->getEducationInfo($id);
			$this->load->view('header', $data);
			$this->load->view('add_skill', $data);
			$this->load->view('footer');
			$this->load->view('dashboard_js', $data);
		}
	}

	public function add_training($userID = null, $id = -1)
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {

			$this->load->model("CourseManager");
			$data["courseID"] = $this->CourseManager->getOwnCourseID();

			$this->load->model("UserModel");


			if ($userID == null)
				$userID =  $this->session->userdata("userID");

			$data["info"] = $this->UserModel->getUserInfo();
			$data["trainings"] = $this->UserModel->getDetail("training", $userID);

			$data["userID"] = $userID;
			$data["educationID"] = $id;
			if ($id != -1)
				$data["educationIfo"] = $this->UserModel->getEducationInfo($id);
			$this->load->view('header', $data);
			$this->load->view('add_training', $data);
			$this->load->view('footer');
			$this->load->view('dashboard_js', $data);
		}
	}

	public function add_user($userID = null, $id = -1)
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {

			$this->load->model("UserModel");
			$this->load->model("DepartmentModel");


			if ($userID == null)
				$userID =  $this->session->userdata("userID");

			$data["info"] = $this->UserModel->getUserInfo();
			$data["deps"] = $this->DepartmentModel->getQuery();

			$data["userID"] = $userID;
			$data["educationID"] = $id;
			if ($id != -1)
				$data["educationIfo"] = $this->UserModel->getEducationInfo($id);
			$this->load->view('header', $data);
			$this->load->view('add_user', $data);
			$this->load->view('footer');
			$this->load->view('dashboard_js', $data);
		}
	}

	public function add_research()
	{
		$this->load->model("ResearchModel");

		$vdata = array(
			"id_project" => $this->input->post("id_project"),
			"title" => $this->input->post("title"),
			"budget_year" => $this->input->post("budget_year"),
			"vstatus" => $this->input->post("vstatus"),
			"user_id" => $this->input->post("user_id"),
		);

		$this->ResearchModel->insert($vdata);
		redirect(base_url("index.php/main/research"), 'refresh');
	}

	public function add_article()
	{
		$this->load->model("PublicationModel");

		$vdata = array(
			"id_article" => $this->input->post("id_article"),
			"abstract" => $this->input->post("abstract"),
			"article_level" => $this->input->post("article_level"),
			"journal_date" => $this->input->post("journal_date"),
			"journal_db" => $this->input->post("journal_db"),
			"journal_name" => $this->input->post("journal_name"),
			"research_owner" => $this->input->post("research_owner"),
			"journal_year" => $this->input->post("journal_year"),
			"title" => $this->input->post("title"),
			"title_eng" => $this->input->post("title_eng"),
			"vstatus" => $this->input->post("vstatus"),
			"vstatus2" => $this->input->post("vstatus2"),
			"user_id" => $this->input->post("user_id"),
		);

		$this->PublicationModel->insert($vdata);
		redirect(base_url("index.php/main/research"), 'refresh');
	}

	public function del_research_article()
	{
		$this->load->model("PublicationModel");
		$this->load->model("ResearchModel");

		$vdata = array("user_id=" . $this->input->post("user_id"));
		$this->PublicationModel->delete($vdata);
		$this->ResearchModel->delete($vdata);
	}

	public function add_document()
	{
		$this->load->model("DocumentModel");

		$vdata = array(
			"document_id" => $this->input->post("document_id"),
			"document_name" => $this->input->post("document_name"),
			"document_type" => $this->input->post("document_type"),
			"involved_name" => $this->input->post("involved_name"),
			"no" => $this->input->post("no"),
			"budget_year" => $this->input->post("budget_year"),
			"user_id" => $this->input->post("user_id"),
		);

		$this->DocumentModel->insert($vdata);
	}

	public function del_document()
	{
		$this->load->model("DocumentModel");

		$vdata = array("user_id=" . $this->input->post("user_id"));
		$this->DocumentModel->delete($vdata);
	}

	public function add_user2()
	{
		$this->load->model("UserModel");

		$vdata = array(
			"nameTH_em" => $this->input->post("nameTH_em"),
			"sirNameTH_em" => $this->input->post("sirNameTH_em"),
			"username" => $this->input->post("username"),
			"departmentID_em" => $this->input->post("departmentID_em"),
			"role" => $this->input->post("role"),
			"email" => $this->input->post("email"),
			"ubu_mail" => $this->input->post("ubu_mail"),
		);

		$this->UserModel->insert($vdata);
		redirect(base_url("index.php/main/users"), 'refresh');
	}

	public function edit_user($userID = null)
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {

			$this->load->model("UserModel");
			$this->load->model("DepartmentModel");


			if ($userID == null)
				$userID =  $this->session->userdata("userID");

			$data["info"] = $this->UserModel->getUserInfo();
			$data["deps"] = $this->DepartmentModel->getQuery();
			$data['users'] = $this->UserModel->getQuery(array("userID=" . $userID));

			$data["userID"] = $userID;

			$this->load->view('header', $data);
			$this->load->view('edit_user', $data);
			$this->load->view('footer');
			$this->load->view('dashboard_js', $data);
		}
	}

	public function edit_user2($vid)
	{
		$this->load->model("UserModel");
		$vdata = array(
			"nameTH_em" => $this->input->post("nameTH_em"),
			"sirNameTH_em" => $this->input->post("sirNameTH_em"),
			"departmentID_em" => $this->input->post("departmentID_em"),
			"role" => $this->input->post("role"),
			"email" => $this->input->post("email"),
			"ubu_mail" => $this->input->post("ubu_mail"),
			"forName" => $this->input->post("forName"),
			"forNameENG" => $this->input->post("forNameENG"),
			"nameENG" => $this->input->post("nameENG"),
			"sirNameENG" => $this->input->post("sirNameENG"),

		);

		$where = array(
			"userID =" . $vid
		);
		$this->UserModel->update($vdata, $where);
		redirect(base_url("index.php/main/edit_user/" . $vid), 'refresh');
	}

	public function edit_userAll($userID = null)
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {

			$this->load->model("UserModel");
			$this->load->model("DepartmentModel");


			if ($userID == null)
				$userID =  $this->session->userdata("userID");

			$data["info"] = $this->UserModel->getUserInfo();
			$data["deps"] = $this->DepartmentModel->getQuery();
			$data['users'] = $this->UserModel->getQuery(array("userID=" . $userID));

			$data["userID"] = $userID;

			$this->load->view('header', $data);
			$this->load->view('edit_userAll', $data);
			$this->load->view('footer');
			$this->load->view('dashboard_js', $data);
		}
	}

	public function edit_userAll2($vid)
	{
		$this->load->model("UserModel");
		$vdata = array(
			"nameTH_em" => $this->input->post("nameTH_em"),
			"sirNameTH_em" => $this->input->post("sirNameTH_em"),
			"departmentID_em" => $this->input->post("departmentID_em"),
			"role" => $this->input->post("role"),
			"email" => $this->input->post("email"),
			"ubu_mail" => $this->input->post("ubu_mail"),
			"forName" => $this->input->post("forName"),
			"forNameENG" => $this->input->post("forNameENG"),
			"nameENG" => $this->input->post("nameENG"),
			"sirNameENG" => $this->input->post("sirNameENG"),
			"roomNumber" => $this->input->post("roomNumber"),
			"tel" => $this->input->post("tel"),
			"mobile" => $this->input->post("mobile"),
		);

		$where = array(
			"userID =" . $vid
		);
		$this->UserModel->update($vdata, $where);
		redirect(base_url("index.php/main/edit_userAll/" . $vid), 'refresh');
	}


	public function update_userAll()
	{
		$this->load->model("UserModel");
		$this->load->model("UpdateModel");
		$vdata = array(
			"nameENG" => $this->input->post("nameEng"),
			"nameTH_em" => $this->input->post("nameTH"),
			"positionNameTH_em" => $this->input->post("positionNameTH"),
			"forNameENG" => $this->input->post("prefixNameEng"),
			"forName" => $this->input->post("prefixNameTH"),
			"sirNameENG" => $this->input->post("sirNameEng"),
			"sirNameTH_em" => $this->input->post("sirNameTH"),
			"username" => $this->input->post("username"),
		);

		$where = array(
			"username = '" . $this->input->post("username") . "'",
		);
		$this->UserModel->update($vdata, $where);
		// $this->UpdateModel->insert();
	}

	public function update_date()
	{
		$this->load->model("UpdateModel");
		$vdata = array(
			"data" => $this->input->post("data"),
		);
		$this->UpdateModel->insert($vdata);
	}

	public function update_userID()
	{
		$this->load->model("UserModel");
		$vdata = array(
			"nameENG" => $this->input->post("nameEng"),
			"nameTH_em" => $this->input->post("nameTH"),
			"positionNameTH_em" => $this->input->post("positionNameTH"),
			"forNameENG" => $this->input->post("prefixNameEng"),
			"forName" => $this->input->post("prefixNameTH"),
			"sirNameENG" => $this->input->post("sirNameEng"),
			"sirNameTH_em" => $this->input->post("sirNameTH"),
		);
		$username = $this->input->post("username");
		$where = array(
			"username = '" . $username . "'",
		);
		$this->UserModel->update($vdata, $where);
	}


	public function userinfo($userID)
	{
		$this->load->model("UserModel");
		$data["userID"] = $userID;
		$data["info"] = $this->UserModel->getUserInfo($userID);
		$data["scholarship"] = $this->UserModel->getUserScholarship($userID);
		$data["works"] = $this->UserModel->getUserWorks($userID);
		$this->load->view('header', $data);
		$this->load->view('userinfo', $data);
		$this->load->view('footer');
	}

	public function ajax_toggleLanguage()
	{
		header('Content-Type: application/json; charset=utf-8');
		$this->load->model("UserModel");
		$courseID = $this->UserModel->toggleLanguage();
		echo json_encode(array("success" => true));
	}

	public function ajax_getSubfolder()
	{
		header('Content-Type: application/json; charset=utf-8');
		$this->load->model("CourseManager");
		$courseID = $this->CourseManager->getOwnCourseID();
		echo json_encode(array("subfolder" => $courseID));
	}

	public function ajax_saveWebContent()
	{
		$this->load->model("CourseManager");
		$this->CourseManager->saveWebContent();
		echo json_encode(array("success" => true));
	}

	public function ajax_addCommittee()
	{
		header('Content-Type: application/json; charset=utf-8');
		$this->load->model("CourseManager");
		$query = $this->CourseManager->addCommittee();
		echo json_encode(array("success" => true));
	}


	public function ajax_addCourseManager()
	{
		header('Content-Type: application/json; charset=utf-8');
		$this->load->model("CourseManager");
		$query = $this->CourseManager->addCourseManager();
		echo json_encode(array("success" => true));
	}


	public function ajax_addDetail()
	{
		header('Content-Type: application/json; charset=utf-8');
		$this->load->model("UserModel");
		$query = $this->UserModel->addDetail();
		echo json_encode(array("success" => true));
	}

	public function ajax_deleteDetail()
	{
		header('Content-Type: application/json; charset=utf-8');
		$this->load->model("UserModel");
		$query = $this->UserModel->deleteDetail();
		echo json_encode(array("success" => true));
	}

	public function ajax_deleteUser()
	{
		header('Content-Type: application/json; charset=utf-8');
		$this->load->model("UserModel");
		$query = $this->UserModel->deleteUser();
		echo json_encode(array("success" => true));
	}

	public function del_user($param1 = "")
	{
		$this->load->model("UserModel");
		$vdata = array("userID=" . $param1);
		$this->UserModel->delete($vdata);
		echo json_encode(array("success" => true));
	}

	public function ajax_removeCommittee()
	{
		header('Content-Type: application/json; charset=utf-8');
		$this->load->model("CourseManager");
		$this->CourseManager->removeCommittee();
		echo json_encode(array("success" => true));
	}


	public function ajax_removeCourseManager()
	{
		header('Content-Type: application/json; charset=utf-8');
		$this->load->model("CourseManager");
		$query = $this->CourseManager->removeCourseManager();
		echo json_encode(array("success" => true));
	}

	public function ajaxSearchUser()
	{
		header('Content-Type: application/json; charset=utf-8');
		$this->load->model("UserModel");
		$key = trim($this->input->get('key'));
		$val = trim($this->input->get('val'));
		$query = $this->UserModel->searchUserBy($key, $val);
		$data = array();

		foreach ($query->result() as $row) {
			$userinfo = array(
				"userID" => $row->userID,
				"forName" => $row->forName,
				"firstName" => $row->nameTH_em,
				"lastName" => $row->sirNameTH_em
			);
			array_push($data, $userinfo);
		}
		echo json_encode($data);
	}

	public function ajaxsetDescription()
	{
		header('Content-Type: application/json; charset=utf-8');
		$this->load->model("UserModel");
		$query = $this->UserModel->setDescription();
		echo json_encode(array("success" => true));
	}

	public function ajax_saveCourseInfo1()
	{
		header('Content-Type: application/json; charset=utf-8');
		$this->load->model("CourseManager");
		$query = $this->CourseManager->saveCourseInfo1();
		echo json_encode(array("success" => true));
	}

	public function ajax_saveCourseInfo2()
	{
		header('Content-Type: application/json; charset=utf-8');
		$this->load->model("CourseManager");
		$query = $this->CourseManager->saveCourseInfo2();
		echo json_encode(array("success" => true));
	}

	public function ajax_sortDetail()
	{
		header('Content-Type: application/json; charset=utf-8');
		$this->load->model("UserModel");
		$query = $this->UserModel->sortDetail();
		echo json_encode(array("success" => true));
	}

	public function ajax_updateDetail()
	{
		header('Content-Type: application/json; charset=utf-8');
		$this->load->model("UserModel");
		$query = $this->UserModel->updateDetail();
		echo json_encode(array("success" => true));
	}

	public function ajax_updateOverview()
	{
		header('Content-Type: application/json; charset=utf-8');
		$this->load->model("UserModel");
		$query = $this->UserModel->setDescription();
		echo json_encode(array("success" => true));
	}
	public function edit_overview($userID = null)
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {
			$this->load->model("UserModel");
			$data["userID"] = $userID;
			$data["info"] = $this->UserModel->getUserInfo($userID);
			$this->load->view('header', $data);
			$this->load->view('edit_overview', $data);
			$this->load->view('footer');
			echo "<h1>UserID=$userID</h1>";
			$this->load->view('edit_overview_js', $data);
		}
	}



	// public function add_education($userID=null){
	// 	if( null === $this->session->userdata("userID")){
	// 		$this->load->helper('form');
	// 		$this->load->view('login.php');
	// 	}
	// 	else{
	// 	 $this->load->model("UserModel");
	// 	 $data["userID"] = $userID ;
	// 	 $data["info"]= $this->UserModel->getUserInfo($userID);
	// 	 $this->load->view('header',$data);
	// 	 $this->load->view('add_education',$data);
	// 	 $this->load->view('footer');
	// 	}
	// }

	public function manage_users()
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {
			$this->load->model("UserModel");
			$data["physics"] = $this->UserModel->getUserByDepartment('physics');
			$data["chemistry"] = $this->UserModel->getUserByDepartment('chemistry');
			$data["biology"] = $this->UserModel->getUserByDepartment('biology');
			$data["mathematics"] = $this->UserModel->getUserByDepartment('mathematics');
			$this->load->view('header', $data);
			$this->load->view('manage_users', $data);
			$this->load->view('footer');
			//$this->load->view('manage_courses_js');
		}
	}

	public function manage_courses()
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {

			$this->load->model("CourseModel");

			$data["courseID"] = null;

			$data["bachelors"] = $this->CourseModel->get_bachelors();
			$data["masters"] = $this->CourseModel->get_masters();
			$data["phds"] = $this->CourseModel->get_phds();
			$userID = $this->session->userdata("userID");
			$this->load->model("UserModel");
			$data["userID"] = $userID;
			$data["info"] = $this->UserModel->getUserInfo($userID);

			$this->load->view('header', $data);
			$this->load->view('manage_courses', $data);
			$this->load->view('footer');
			$this->load->view('manage_courses_js');
		}
	}

	public function course_management($courseID = null)
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {

			$this->load->model("CourseManager");

			if ($courseID == null)
				$courseID = $this->CourseManager->getOwnCourseID();

			if ($courseID != null) {
				$data["course"] = $this->CourseManager->getCourseInfo($courseID);
				$data["committee"] = $this->CourseManager->getCommittee($courseID);
			}

			$data["courseID"] = $courseID;
			$userID = $this->session->userdata("userID");
			$this->load->model("UserModel");
			$data["userID"] = $userID;
			$data["info"] = $this->UserModel->getUserInfo($userID);

			$this->load->view('header', $data);
			$this->load->view('course_manager', $data);
			$this->load->view('footer');
			$this->load->view('course_manager_js');
			$this->load->view('manage_pictures_js');
		}
	}

	public function groups()
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {

			$userID = $this->session->userdata("userID");
			$this->load->model("UserModel");
			$this->load->model("ResearchGroup");
			$data["userID"] = $userID;
			$data["info"] = $this->UserModel->getUserInfo($userID);
			$data["research_groups"] = $this->ResearchGroup->getResearchGroups();
			$this->load->view('header', $data);
			$this->load->view('groups', $data);
			$this->load->view('footer');
			$this->load->view('groups_js', $data);
		}
	}

	public function edit_profile($userID = null)
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {

			$userID = $this->session->userdata("userID");
			$this->load->model("UserModel");
			$data["userID"] = $userID;
			$data["info"] = $this->UserModel->getUserInfo($userID);
			$this->load->view('header', $data);
			$this->load->view('edit_profile', $data);
			$this->load->view('footer');
		}
	}

	public function print_option($userID = null)
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {

			$userID = $this->session->userdata("userID");
			$this->load->model("UserModel");
			$data["userID"] = $userID;
			$data["info"] = $this->UserModel->getUserInfo($userID);
			$this->load->view('header', $data);
			$this->load->view('print_option', $data);
			$this->load->view('footer2');
		}
	}

	public function cv($userID = null, $way1 = null, $way2 = null, $way3 = null, $way4 = null, $way5 = null, $way6 = null, $way7 = null)
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {

			$userID = $this->session->userdata("userID");
			$this->load->model("UserModel");
			$this->load->model("EducationModel");
			$this->load->model("DetailModel");
			$this->load->model("DepartmentModel");

			$data["way1"] = $way1;
			$data["way2"] = $way2;
			$data["way3"] = $way3;
			$data["way4"] = $way4;
			$data["way5"] = $way5;
			$data["way6"] = $way6;
			$data["way7"] = $way7;

			$data["deps"] = $this->DepartmentModel->getQuery();
			$data['users'] = $this->UserModel->getQuery(array("userID=" . $userID));
			$data['education'] = $this->EducationModel->getQuery(array("userID=" . $userID));
			$data['award'] = $this->DetailModel->getQueryAwards(array("userID=" . $userID));
			$data['scholarship'] = $this->DetailModel->getQueryScholarships(array("userID=" . $userID));
			$data['working'] = $this->DetailModel->getQueryWorking(array("userID=" . $userID));
			$data['publication'] = $this->DetailModel->getQueryPublications(array("userID=" . $userID));
			$data['skill'] = $this->DetailModel->getQuerySkills(array("userID=" . $userID));
			$data['training'] = $this->DetailModel->getQueryTrainings(array("userID=" . $userID));
			$data["userID"] = $userID;
			$data["info"] = $this->UserModel->getUserInfo($userID);
			//  $this->load->view('header',$data);
			$this->load->view('cv', $data);
			//  $this->load->view('footer2');
		}
	}

	public function pdf($userID = null, $way1 = null, $way2 = null, $way3 = null, $way4 = null, $way5 = null, $way6 = null, $way7 = null)
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {

			$userID = $this->session->userdata("userID");
			$this->load->model("UserModel");
			$this->load->model("EducationModel");
			$this->load->model("DetailModel");
			$this->load->model("DepartmentModel");

			$data["way1"] = $way1;
			$data["way2"] = $way2;
			$data["way3"] = $way3;
			$data["way4"] = $way4;
			$data["way5"] = $way5;
			$data["way6"] = $way6;
			$data["way7"] = $way7;

			$data["deps"] = $this->DepartmentModel->getQuery();
			$data['users'] = $this->UserModel->getQuery(array("userID=" . $userID));
			$data['education'] = $this->EducationModel->getQuery(array("userID=" . $userID));
			$data['award'] = $this->DetailModel->getQueryAwards(array("userID=" . $userID));
			$data['scholarship'] = $this->DetailModel->getQueryScholarships(array("userID=" . $userID));
			$data['working'] = $this->DetailModel->getQueryWorking(array("userID=" . $userID));
			$data['publication'] = $this->DetailModel->getQueryPublications(array("userID=" . $userID));
			$data['skill'] = $this->DetailModel->getQuerySkills(array("userID=" . $userID));
			$data['training'] = $this->DetailModel->getQueryTrainings(array("userID=" . $userID));
			$data["userID"] = $userID;
			$data["info"] = $this->UserModel->getUserInfo($userID);
			//  $this->load->view('header',$data);
			$this->load->view('cv2', $data);
			//  $this->load->view('footer2');
		}
	}

	public function research()
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {

			$userID = $this->session->userdata("userID");
			$this->load->model("UserModel");
			$this->load->model("ResearchModel");
			$this->load->model("PublicationModel");

			$data["userID"] = $userID;
			$data["info"] = $this->UserModel->getUserInfo($userID);
			$data["users"] = $this->UserModel->getQuery(array("userID =" . $userID));
			$data["researchON"] = $this->ResearchModel->getQuery(array("user_id =" . $userID . " AND vstatus='0'"));
			$data["researchCOM"] = $this->ResearchModel->getQuery(array("user_id =" . $userID . " AND vstatus='1'"));
			$data["research"] = $this->ResearchModel->getQuery(array("user_id =" . $userID));
			$data["article"] = $this->PublicationModel->getQuery(array("user_id =" . $userID));
			$this->load->view('header', $data);
			$this->load->view('research', $data);
			$this->load->view('footer');
			$this->load->view('groups_js', $data);
		}
	}

	public function document()
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {

			$userID = $this->session->userdata("userID");
			$this->load->model("UserModel");
			$this->load->model("DocumentModel");


			$data["userID"] = $userID;
			$data["info"] = $this->UserModel->getUserInfo($userID);
			$data["users"] = $this->UserModel->getQuery(array("userID =" . $userID));
			$data["document"] = $this->DocumentModel->getQuery(array("user_id =" . $userID));
			$this->load->view('header', $data);
			$this->load->view('document', $data);
			$this->load->view('footer');
			$this->load->view('groups_js', $data);
		}
	}

	public function workload()
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {

			$userID = $this->session->userdata("userID");
			$this->load->model("UserModel");
			$data["userID"] = $userID;
			$data["info"] = $this->UserModel->getUserInfo($userID);
			$data["users"] = $this->UserModel->getQuery();
			$this->load->view('header', $data);
			$this->load->view('workload', $data);
			$this->load->view('footer');
			$this->load->view('groups_js', $data);
		}
	}

	public function users()
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {

			$userID = $this->session->userdata("userID");
			$this->load->model("UserModel");
			$this->load->model("UpdateModel");
			$data["userID"] = $userID;
			$data["info"] = $this->UserModel->getUserInfo($userID);
			$data["users"] = $this->UserModel->getQuery();
			$data["update"] = $this->UpdateModel->getQuery();
			$this->load->view('header', $data);
			$this->load->view('users', $data);
			$this->load->view('footer');
			$this->load->view('groups_js', $data);
			$this->load->view('dashboard_js', $data);
		}
	}

	public function users_search($key)
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {

			$keyy = urldecode($key);
			$userID = $this->session->userdata("userID");
			$this->load->model("UserModel");
			$data["userID"] = $userID;
			$data["info"] = $this->UserModel->getUserInfo($userID);
			$data["users"] = $this->UserModel->getQuery();
			$data["users2"] = $this->UserModel->getQuery(array("nameTH_em like '%" . $keyy . "%' OR sirNameTH_em like '%" . $keyy . "%'"));
			$data["key"] = $keyy;
			$this->load->view('header', $data);
			$this->load->view('users_search', $data);
			$this->load->view('footer');
			$this->load->view('groups_js', $data);
			$this->load->view('dashboard_js', $data);
		}
	}

	public function edit_group($groupID = null)
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {
			$userID = $this->session->userdata("userID");
			$this->load->model("UserModel");
			$this->load->model("ResearchGroup");
			$data["groupID"] = $groupID;
			$data["userID"] = $userID;
			$data["info"] = $this->UserModel->getUserInfo($userID);
			$data["research_group"] = $this->ResearchGroup->getGroup($groupID);
			$data["members"] = $this->UserModel->getGroupMembers($groupID);
			$data["isAdmin"] = $this->UserModel->isGroupAdmin($userID, $groupID);
			$this->load->view('header', $data);
			$this->load->view('edit_group', $data);
			$this->load->view('footer');
			$this->load->view('edit_group_js', $data);
		}
	}

	public function setting()
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {

			$userID = $this->session->userdata("userID");
			$this->load->model("UserModel");
			$data["userID"] = $userID;
			$data["info"] = $this->UserModel->getUserInfo($userID);
			$this->load->view('header', $data);
			$this->load->view('setting', $data);
			$this->load->view('footer');
		}
	}

	public function ajax_isExistGroup()
	{
		header('Content-Type: application/json; charset=utf-8');
		$this->load->model("UserModel");
		$data = array(
			'exist' => $this->UserModel->isExistGroup()
		);
		echo json_encode($data);
	}
	public function ajax_deleteGroup()
	{
		header('Content-Type: application/json; charset=utf-8');
		$this->load->model("UserModel");
		$success = $this->UserModel->deleteGroup($this->input->post("groupID"));
		echo json_encode(array('success' => $success));
	}

	public function ajax_addNewGroup()
	{
		header('Content-Type: application/json; charset=utf-8');
		$this->load->model("UserModel");
		$data = $this->UserModel->addNewGroup();
		echo json_encode($data);
	}

	public function ajax_getGroupMembers()
	{
		header('Content-Type: application/json; charset=utf-8');
		$this->load->model("UserModel");
		$data = $this->UserModel->getGroupMembers();
		echo json_encode($data);
	}

	public function ajax_getUsers()
	{
		header('Content-Type: application/json; charset=utf-8');
		$this->load->model("UserModel");
		$users = array();
		$query = $this->UserModel->getUsers();
		foreach ($query->result() as $row) {
			if ($row->fullName !== NULL) {
				$user = array("id" => $row->userID, "name" => $row->fullName);
				array_push($users, $user);
			}
		}
		echo json_encode($users);
	}

	public function ajax_getImageList()
	{
		header('Content-Type: application/json; charset=utf-8');
		$userID = $this->session->userdata("userID");
		$this->load->model("UserModel");
		$data["userID"] = $userID;
		$info = $this->UserModel->getUserInfo($userID);

		$imageList = array();
		array_push($imageList, array("title" => "My avatar",	"value" => base_url('avatars/' . $info->avatar)));
		echo json_encode($imageList);
	}

	public function manage_website($courseID = null)
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {

			$this->load->model("CourseManager");

			if ($courseID == null)
				$courseID = $this->CourseManager->getOwnCourseID();

			if ($courseID != null) {
				$data["course"] = $this->CourseManager->getCourseInfo($courseID);
				$data["committee"] = $this->CourseManager->getCommittee($courseID);

				$_SESSION["RF"]["subfolder"] = "courses/" . $courseID;
			}

			$data["courseID"] = $courseID;

			$this->load->model("UserModel");
			$userID = $this->session->userdata("userID");
			$data["userID"] = $userID;

			$data["info"] = $this->UserModel->getUserInfo($userID);

			$this->load->view('header', $data);
			$this->load->view('manage_website', $data);
			$this->load->view('footer');
			$this->load->view('manage_website_js');
			$this->load->view('manage_pictures_js');
		}
	}



	public function save_profile()
	{
		$this->load->model("UserModel");
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->UserModel->setUserInfo();
		}
		if (null != $this->input->post("userID")) {
			// redirect(site_url('main/userinfo/'.$this->input->post("userID") ));
			redirect(site_url('main/dashboard'));
		} else {
			redirect(site_url('main/dashboard'));
		}
	}


	public function ajax_cropPicture()
	{

		$imgUrl = $_POST['imgUrl'];
		// original sizes
		$imgInitW = $_POST['imgInitW'];
		$imgInitH = $_POST['imgInitH'];
		// resized sizes
		$imgW = $_POST['imgW'];
		$imgH = $_POST['imgH'];
		// offsets
		$imgY1 = $_POST['imgY1'];
		$imgX1 = $_POST['imgX1'];
		// crop box
		$cropW = $_POST['cropW'];
		$cropH = $_POST['cropH'];
		// rotation angle
		$angle = $_POST['rotation'];
		$jpeg_quality = 100;
		$outputfile = "croppedImg_" . rand();
		$output_filename = "avatars/" . $outputfile;
		// uncomment line below to save the cropped image in the same location as the original image.
		//$output_filename = dirname($imgUrl). "/croppedImg_".rand();
		$what = getimagesize($imgUrl);
		switch (strtolower($what['mime'])) {
			case 'image/png':
				$img_r = imagecreatefrompng($imgUrl);
				$source_image = imagecreatefrompng($imgUrl);
				$type = '.png';
				break;
			case 'image/jpeg':
				$img_r = imagecreatefromjpeg($imgUrl);
				$source_image = imagecreatefromjpeg($imgUrl);
				error_log("jpg");
				$type = '.jpeg';
				break;
			case 'image/gif':
				$img_r = imagecreatefromgif($imgUrl);
				$source_image = imagecreatefromgif($imgUrl);
				$type = '.gif';
				break;
			default:
				die('image type not supported');
		}
		//Check write Access to Directory
		if (!is_writable(dirname($output_filename))) {
			$response = array(
				"status" => 'error',
				"output_filename" => "$output_filename",
				"message" => 'Can`t write cropped File'
			);
		} else {
			// resize the original image to size of editor
			$resizedImage = imagecreatetruecolor($imgW, $imgH);
			imagecopyresampled($resizedImage, $source_image, 0, 0, 0, 0, $imgW, $imgH, $imgInitW, $imgInitH);
			// rotate the rezized image
			$rotated_image = imagerotate($resizedImage, -$angle, 0);
			// find new width & height of rotated image
			$rotated_width = imagesx($rotated_image);
			$rotated_height = imagesy($rotated_image);
			// diff between rotated & original sizes
			$dx = $rotated_width - $imgW;
			$dy = $rotated_height - $imgH;
			// crop rotated image to fit into original rezized rectangle
			$cropped_rotated_image = imagecreatetruecolor($imgW, $imgH);
			imagecolortransparent($cropped_rotated_image, imagecolorallocate($cropped_rotated_image, 0, 0, 0));
			imagecopyresampled($cropped_rotated_image, $rotated_image, 0, 0, $dx / 2, $dy / 2, $imgW, $imgH, $imgW, $imgH);
			// crop image into selected area
			$final_image = imagecreatetruecolor($cropW, $cropH);
			imagecolortransparent($final_image, imagecolorallocate($final_image, 0, 0, 0));
			imagecopyresampled($final_image, $cropped_rotated_image, 0, 0, $imgX1, $imgY1, $cropW, $cropH, $cropW, $cropH);
			// finally output png image
			//imagepng($final_image, $output_filename.$type, $png_quality);
			imagejpeg($final_image, $output_filename . $type, $jpeg_quality);
			$this->load->model("UserModel");
			$this->UserModel->setUserAvatar($_POST["userID"], $outputfile . $type);


			$response = array(
				"status" => 'success',
				"url" => base_url("avatars/" . $outputfile . $type)
			);
		}
		print json_encode($response);
	}

	public function ajax_upload_avatar()
	{
		var_dump($_POST);
		$image = $_POST["image"];
		$name = $_POST["userID"];
		$base_to_php = explode(',', $image);
		$data = base64_decode($base_to_php[1]);
		file_put_contents("../avatars/$name.png", $data);
	}

	public function ajax_uploadPicture()
	{

		$config['upload_path'] = './avatars/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']     = '100000000';
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('img')) {
			$response = array(
				"status" => 'error',
				"message" => 'something went wrong, most likely file is to large for upload. check upload_max_filesize, post_max_size and memory_limit in you php.ini',
			);
			print json_encode($response);
		} else {
			$userID = $this->input->post("userID");
			$upload_data = $this->upload->data();
			$data = array('upload_data' => $this->upload->data());
			$this->load->model("UserModel");
			$this->UserModel->setUserAvatar($userID, $upload_data["file_name"]);

			$data["info"] = $this->UserModel->getUserInfo($userID);

			$response = array(
				"status" => 'success',
				"url" => base_url('avatars' . "/" . $upload_data["file_name"]),
				"width" => $upload_data["image_width"],
				//"width" => 120,
				"height" => $upload_data["image_height"]
				//"height" => 200 
			);

			print json_encode($response);
		}
	}

	public function uploadPicture()
	{
		$config['upload_path'] = './avatars/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']     = '10000000';
		$this->load->library('upload', $config);
		// Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
		//$this->upload->initialize($config);
		if (!$this->upload->do_upload('userfile')) {
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		} else {
			$userID = $this->input->post("userID");
			$upload_data = $this->upload->data();
			$data = array('upload_data' => $this->upload->data());
			$this->load->model("UserModel");
			$this->UserModel->setUserAvatar($userID, $upload_data["file_name"]);
			$data["info"] = $this->UserModel->getUserInfo($userID);
			print_r($data);
			die();

			if (null === $userID)
				redirect(site_url('main/edit_picture'));
			else
				redirect(site_url("main/edit_picture/$userID"));
		}
	}

	public function edit_picture($userID = null)
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {

			if ($userID == null) {
				$userID =  $this->session->userdata("userID");
			}

			$this->load->model("CourseManager");
			$data["courseID"] = $this->CourseManager->getOwnCourseID();


			$this->load->model("UserModel");
			$data["userID"] = $userID;
			$data["info"] = $this->UserModel->getUserInfo($userID);

			$this->load->view('header', $data);
			$this->load->view('edit_picture', $data);
			$this->load->view('footer', $data);
			$this->load->view('edit_picture_js', $data);
		}
	}

	public function edit_scholarship($id = -1)
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {

			$this->load->model("UserModel");
			$data["info"] = $this->UserModel->getUserInfo();
			$data["scholarship"] = $this->UserModel->getUserScholarship();
			$data["sid"] = $id;
			if ($id != -1)
				$data["sinfo"] = $this->UserModel->getScholarshipInfo($id);
			$this->load->view('header', $data);
			$this->load->view('edit_scholarship', $data);
			$this->load->view('footer');
		}
	}

	// public function add_scholarship(){
	// 	$this->load->view('header');
	//    $this->load->model("UserModel");
	// 	$this->UserModel->addUserScholarship();
	//    redirect(site_url('main/edit_scholarship'));

	// }

	public function update_scholarship()
	{
		$this->load->view('header');
		$this->load->model("UserModel");
		$this->UserModel->updateScholarshipInfo();
		redirect(site_url('main/edit_scholarship'));
	}
	public function remove_scholarship($id)
	{
		$this->load->model("UserModel");
		$this->UserModel->removeUserScholarship($id);
		redirect(site_url('main/edit_scholarship'));
	}





	// public function add_education(){
	// 	$this->load->view('header');
	//    $this->load->model("UserModel");
	// 	$this->UserModel->addUserEducation();
	//    redirect(site_url('main/edit_education'));
	// }

	public function update_education()
	{
		$this->load->view('header');
		$this->load->model("UserModel");
		$this->UserModel->updateEducationInfo();
		redirect(site_url('main/edit_education'));
	}

	public function remove_education($id)
	{
		$this->load->model("UserModel");
		$this->UserModel->removeUserEducation($id);
		redirect(site_url('main/edit_education'));
	}

	public function edit_works($id = -1)
	{
		if (null === $this->session->userdata("userID")) {
			$this->load->helper('form');
			$this->load->view('login.php');
		} else {

			$this->load->model("UserModel");
			$data["info"] = $this->UserModel->getUserInfo();
			$data["works"] = $this->UserModel->getUserWorks();
			$data["wid"] = $id;
			if ($id != -1)
				$data["winfo"] = $this->UserModel->getWorkInfo($id);

			$this->load->view('header', $data);
			$this->load->view('edit_works', $data);
			$this->load->view('footer');
		}
	}

	public function add_work()
	{
		$this->load->view('header');
		$this->load->model("UserModel");
		$this->UserModel->addUserWork();
		redirect(site_url('main/edit_works'));
	}

	public function update_work()
	{
		$this->load->view('header');
		$this->load->model("UserModel");
		$this->UserModel->updateWorkInfo();
		redirect(site_url('main/edit_works'));
	}

	public function remove_work($id)
	{
		$this->load->model("UserModel");
		$this->UserModel->removeUserWork($id);
		redirect(site_url('main/edit_works'));
	}

	public function login_fail()
	{
		echo "Login fail";
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url('main'));
	}



	public function login()
	{

		if ($this->input->post()) {
			$data["username"] = $this->input->post("staff_uname");
			$data["password"] = $this->input->post("staff_pass");
			$this->load->config("ldapconfig");
			$data["ldapconfig"] = $this->config->item("ldapubu");
			$this->load->library('ldap', $data);
			$login = $this->ldap->authen();
			//$login= true;
			$this->load->model("UserModel");
			if ($login && $this->UserModel->getUserSession()) {
				redirect(site_url('main/dashboard'));
			} else {
				redirect(site_url('main'));
			}
		} else {
			redirect(site_url('main'));
		}
	}
}
