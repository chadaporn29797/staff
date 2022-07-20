<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Command extends CI_Controller {

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
 public function __construct() {
         parent::__construct();
                $this->load->helper(array('form'));
 }


 /* ----------------------- group research function ----------------------------*/

	public function ajax_getGroupResearches($groupID=null){
		header('Content-Type: application/json; charset=utf-8');	
		$this->load->model("ResearchGroup");
		$data = $this->ResearchGroup->getResearches($groupID);
	   echo json_encode(array( "data" => $data)) ;
	}
	public function ajax_getGroupResearch($researchID=null){
		header('Content-Type: application/json; charset=utf-8');	
		$this->load->model("ResearchGroup");
		$data = $this->ResearchGroup->getResearch($researchID);
	   echo json_encode( $data) ;
	}

	public function ajax_deleteResearchMember(){
		header('Content-Type: application/json; charset=utf-8');	
		$this->load->model("ResearchGroup");
		$result = $this->ResearchGroup->deleteResearchMember();
	   echo json_encode($result) ;
	}

	public function ajax_deleteResearchDocument(){
		header('Content-Type: application/json; charset=utf-8');	
		$this->load->model("ResearchGroup");
		$result = $this->ResearchGroup->deleteResearchDocument();
	   echo json_encode($result) ;
	}



	public function ajax_deleteGroupResearch(){
		header('Content-Type: application/json; charset=utf-8');	
		$this->load->model("ResearchGroup");
		$result = $this->ResearchGroup->deleteGroupResearch();
	   echo json_encode($result) ;
	}

	public function ajax_addResearch(){
		header('Content-Type: application/json; charset=utf-8');	
		$this->load->model("ResearchGroup");
		$result = $this->ResearchGroup->addResearch();
	   echo json_encode($result) ;
	}

	public function ajax_addResearchMember(){
		header('Content-Type: application/json; charset=utf-8');	
		$this->load->model("ResearchGroup");
		$result = $this->ResearchGroup->addResearchMember();
	   echo json_encode($result) ;
	}

	public function upload_research_document(){
		 //upload file
		  $path = '../files/groups/'. $this->input->post('groupID').'/research';
		  if (!file_exists($path)) {
				mkdir($path, 0777, true);
		  }
        $config['upload_path'] = $path;

        $config['allowed_types'] = '*';
        $config['max_filename'] = '255';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = '1024'; //1 MB

		  $data = array();
        if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                 $data["message"] = 'Error during file upload' . $_FILES['file']['error'];
					  $data["success"] = false;
            } else {
                if (file_exists('uploads/' . $_FILES['file']['name'])) {
                    $data["message"] = 'File already exists : uploads/' . $_FILES['file']['name'];
					  	  $data["success"] = false;
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        $data["message"] = $this->upload->display_errors();
					  	  		$data["success"] = false;
                    } else {
                        $data["message"] =  'File successfully uploaded : uploads/' . $_FILES['file']['name'];
								$data["upload_data"] = $this->upload->data();
								$data["files"] = $_FILES;
								$data["posts"] = $_POST;
					  	  		$data["success"] = true;

								$this->load->model("ResearchGroup");
								$uploadInfo = $this->ResearchGroup->uploadResearchDocument($this->upload->data());
								$data["researchID"] = $uploadInfo["researchID"] ;
								$data["documentID"] = $uploadInfo["documentID"] ;

                    }
                }
            }
        } else {
            $data["message"] = 'Please choose a file';
				$data["success"] = false;
       }
		echo json_encode( $data );

	}




 /* ------------------------ activities function -----------------------------------*/

	public function ajax_getGroupActivities($groupID=null){
		header('Content-Type: application/json; charset=utf-8');	
		$this->load->model("ActivityModel");
		$data = $this->ActivityModel->getGroupActivities($groupID);
	   echo json_encode(array( "data" => $data)) ;
	}

	public function ajax_getActivity($activityID=null){
		header('Content-Type: application/json; charset=utf-8');	
		$this->load->model("ActivityModel");
		$data = $this->ActivityModel->getActivity($activityID);
	   echo json_encode( $data) ;
	}

	public function delete_activity_image(){
		header('Content-Type: application/json; charset=utf-8');	
		$this->load->model("ActivityModel");
		$result = $this->ActivityModel->deleteImage();
	   echo json_encode($result) ;
	}

	public function upload_group_image(){
		 //upload file
		  $path = '../files/groups/'. $this->input->post('groupID');
		  if (!file_exists($path)) {
				mkdir($path, 0777, true);
		  }
        $config['upload_path'] = $path;

        $config['allowed_types'] = '*';
        $config['max_filename'] = '255';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = '10240'; //10 MB

		  $data = array();
        if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                 $data["message"] = 'Error during file upload' . $_FILES['file']['error'];
					  $data["success"] = false;
            } else {
                if (file_exists( $path."/". $_FILES['file']['name'])) {
                    $data["message"] = 'File already exists : '.$path.'/'. $_FILES['file']['name'];
					  	  $data["success"] = false;
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        $data["message"] = $this->upload->display_errors();
					  	  		$data["success"] = false;
                    } else {
                        $data["message"] =  'File successfully uploaded :' . $path .'/'. $_FILES['file']['name'];
								$data["upload_data"] = $this->upload->data();
								$data["files"] = $_FILES;
								$data["posts"] = $_POST;
					  	  		$data["success"] = true;
								$this->load->model("UserModel");
								$uploadImage = $this->UserModel->uploadImage($this->upload->data());
								$data["imagePath"] = $uploadImage["imagePath"] ;
                    }
                }
            }
        } else {
            $data["message"] = 'Please choose a file';
				$data["success"] = false;
       }
		echo json_encode( $data );

	}




	public function upload_activity_image(){
		 //upload file
		  $path = '../files/groups/'. $this->input->post('groupID').'/activity';
		  if (!file_exists($path)) {
				mkdir($path, 0777, true);
		  }
        $config['upload_path'] = $path;

        $config['allowed_types'] = '*';
        $config['max_filename'] = '255';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = '1024'; //1 MB

		  $data = array();
        if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                 $data["message"] = 'Error during file upload' . $_FILES['file']['error'];
					  $data["success"] = false;
            } else {
                if (file_exists('uploads/' . $_FILES['file']['name'])) {
                    $data["message"] = 'File already exists : uploads/' . $_FILES['file']['name'];
					  	  $data["success"] = false;
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        $data["message"] = $this->upload->display_errors();
					  	  		$data["success"] = false;
                    } else {
                        $data["message"] =  'File successfully uploaded : uploads/' . $_FILES['file']['name'];
								$data["upload_data"] = $this->upload->data();
								$data["files"] = $_FILES;
								$data["posts"] = $_POST;
					  	  		$data["success"] = true;

								$this->load->model("ActivityModel");
								$uploadImage = $this->ActivityModel->uploadImage($this->upload->data());
								$data["activityID"] = $uploadImage["activityID"] ;
								$data["imageID"] = $uploadImage["imageID"] ;

                    }
                }
            }
        } else {
            $data["message"] = 'Please choose a file';
				$data["success"] = false;
       }
		echo json_encode( $data );

	}

	public function ajax_addActivityLink(){
		header('Content-Type: application/json; charset=utf-8');	
		$this->load->model("ActivityModel");
		$result = $this->ActivityModel->addActivityLink();
	   echo json_encode($result) ;
	}

	public function ajax_deleteActivityLink(){
		header('Content-Type: application/json; charset=utf-8');	
		$this->load->model("ActivityModel");
		$result = $this->ActivityModel->deleteLink();
	   echo json_encode($result) ;
	}
	

	public function ajax_addActivity(){
		header('Content-Type: application/json; charset=utf-8');	
		$this->load->model("ActivityModel");
		$result = $this->ActivityModel->addActivity();
	   echo json_encode($result) ;
	}

	public function ajax_deleteActivity(){
		header('Content-Type: application/json; charset=utf-8');	
		$this->load->model("ActivityModel");
		$result = $this->ActivityModel->deleteActivity();
	   echo json_encode($result) ;
	}

 /* ----------------------- end activities function ------------------------------*/

	public function ajax_toggleLanguage(){
		header('Content-Type: application/json; charset=utf-8');	
		$this->load->model("UserModel");
		$courseID = $this->UserModel->toggleLanguage();
		echo json_encode( array( "success"=> true ));
	}

	public function ajax_getSubfolder(){
		header('Content-Type: application/json; charset=utf-8');	
		$this->load->model("CourseManager");
		$courseID = $this->CourseManager->getOwnCourseID();
		echo json_encode( array( "subfolder"=> $courseID));
	}

	public function ajax_saveWebContent(){
		$this->load->model("CourseManager");
		$this->CourseManager->saveWebContent();
		echo json_encode( array( "success"=> true) );
	}

	public function ajax_addCommittee(){
		header('Content-Type: application/json; charset=utf-8');	
		$this->load->model("CourseManager");
		$query= $this->CourseManager->addCommittee();
		echo json_encode( array( "success"=> true) );
	}

	
	public function ajax_addCourseManager(){
		header('Content-Type: application/json; charset=utf-8');	
		$this->load->model("CourseManager");
		$query= $this->CourseManager->addCourseManager();
		echo json_encode( array( "success"=> true) );
	}


   public function ajax_addDetail(){
		header('Content-Type: application/json; charset=utf-8');	
		$this->load->model("UserModel");
		$query= $this->UserModel->addDetail();
		echo json_encode( array( "success"=> true) );
	}

	public function ajax_deleteDetail(){
		header('Content-Type: application/json; charset=utf-8');	
		$this->load->model("UserModel");
		$query= $this->UserModel->deleteDetail();
		echo json_encode( array( "success"=> true) );

	}

	public function ajax_removeCommittee(){
		header('Content-Type: application/json; charset=utf-8');	
		$this->load->model("CourseManager");
		$this->CourseManager->removeCommittee();
		echo json_encode( array( "success"=> true) );
	}


	public function ajax_removeCourseManager(){
		header('Content-Type: application/json; charset=utf-8');	
		$this->load->model("CourseManager");
		$query= $this->CourseManager->removeCourseManager();
		echo json_encode( array( "success"=> true) );
	}

	public function ajaxSearchUser(){
		header('Content-Type: application/json; charset=utf-8');	
		$this->load->model("UserModel");
		$key = trim($this->input->get('key'));
		$val =trim( $this->input->get('val'));
		$query= $this->UserModel->searchUserBy($key,$val);
		$data = array();

		foreach($query->result() as $row){
			$userinfo = array(
				"userID" => $row->userID,
				"forName" => $row->forName,
				"firstName" => $row->nameTH_em,
				"lastName" => $row->sirNameTH_em
			);
			array_push($data,$userinfo);
		}
		echo json_encode($data);

	}

	public function ajaxsetDescription(){
		header('Content-Type: application/json; charset=utf-8');	
		$this->load->model("UserModel");
		$query= $this->UserModel->setDescription();
		echo json_encode( array( "success"=> true) );
	}

	public function ajax_saveCourseInfo1(){
		header('Content-Type: application/json; charset=utf-8');	
		$this->load->model("CourseManager");
		$query= $this->CourseManager->saveCourseInfo1();
		echo json_encode( array( "success"=> true) );
	}

	public function ajax_saveCourseInfo2(){
		header('Content-Type: application/json; charset=utf-8');	
		$this->load->model("CourseManager");
		$query= $this->CourseManager->saveCourseInfo2();
		echo json_encode( array( "success"=> true) );
	}

	public function ajax_sortDetail(){
		header('Content-Type: application/json; charset=utf-8');	
		$this->load->model("UserModel");
		$query= $this->UserModel->sortDetail();
		echo json_encode( array( "success"=> true) );

	}

	public function ajax_updateGroupName(){
		header('Content-Type: application/json; charset=utf-8');	
	   $this->load->model("ResearchGroup");
		echo json_encode($this->ResearchGroup->updateGroupName());
	}

	public function ajax_updateGroupDescription(){
		header('Content-Type: application/json; charset=utf-8');	
		$this->load->model("ResearchGroup");
		echo json_encode($this->ResearchGroup->updateGroupDescription()); 

	}

	public function ajax_updateGroupDetail(){
		header('Content-Type: application/json; charset=utf-8');	
		$this->load->model("ResearchGroup");
		$query= $this->ResearchGroup->updateGroupDetail();
		echo json_encode( array( "success"=> true) );

	}


	public function ajax_updateDetail(){
		header('Content-Type: application/json; charset=utf-8');	
		$this->load->model("UserModel");
		$query= $this->UserModel->updateDetail();
		echo json_encode( array( "success"=> true) );

	}

	public function ajax_updateOverview(){
		header('Content-Type: application/json; charset=utf-8');	
		$this->load->model("UserModel");
		$query= $this->UserModel->setDescription();
		echo json_encode( array( "success"=> true) );

	}

	public function ajax_deleteGroupMember(){
		header('Content-Type: application/json; charset=utf-8');	
	   $this->load->model("UserModel");
		$success = $this->UserModel->deleteGroupMember($this->input->post("groupID"),$this->input->post("userID"));
		echo json_encode( array( 'success' => $success ) );
	}

	public function ajax_isExistGroup(){
		header('Content-Type: application/json; charset=utf-8');	
	   $this->load->model("UserModel");
		$data = array(
			'exist' => $this->UserModel->isExistGroup()
		);
		echo json_encode( $data );
	}

	public function ajax_isExistMember(){
		header('Content-Type: application/json; charset=utf-8');	
	   $this->load->model("UserModel");
		$data = array(
			'exist' => $this->UserModel->isExistMember()
		);
		echo json_encode( $data );
	}



	public function ajax_deleteGroup(){
		header('Content-Type: application/json; charset=utf-8');	
	   $this->load->model("UserModel");
		$success = $this->UserModel->deleteGroup($this->input->post("groupID"));
		echo json_encode( array( 'success' => $success ) );
	}

	public function ajax_addNewGroup(){
		header('Content-Type: application/json; charset=utf-8');	
	   $this->load->model("UserModel");
		$data = $this->UserModel->addNewGroup();
		echo json_encode( $data );
	}

	public function ajax_addGroupMembers(){
		header('Content-Type: application/json; charset=utf-8');	
	   $this->load->model("UserModel");
		$data = $this->UserModel->addGroupMembers();
		echo json_encode( $data );
	}

	public function ajax_getGroupMembers(){
		header('Content-Type: application/json; charset=utf-8');	
	   $this->load->model("UserModel");
		$data = $this->UserModel->getGroupMembers();
		echo json_encode( $data );
	}

	public function ajax_getUsers(){
		header('Content-Type: application/json; charset=utf-8');	
	   $this->load->model("UserModel");
		$users = array();
		$query = $this->UserModel->getUsers();
		foreach($query->result() as $row){
			if( $row->fullName !== NULL ){
				 $user = array( "id" => $row->userID, "name" => $row->fullName); 
				 array_push($users,$user);
			}
		}
		echo json_encode( $users );
	}

	public function ajax_getImageList(){
		header('Content-Type: application/json; charset=utf-8');	
		$userID = $this->session->userdata("userID");
	   $this->load->model("UserModel");
		$data["userID"] = $userID ;
		$info= $this->UserModel->getUserInfo($userID);

		$imageList = array();
	   array_push( $imageList, array( "title" => "My avatar",	"value" => base_url('avatars/'.$info->avatar)));
		echo json_encode( $imageList );
	
	}


	public function ajax_cropPicture(){
		  
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
		  $outputfile = "croppedImg_".rand();
		  $output_filename = "avatars/".$outputfile;
		  // uncomment line below to save the cropped image in the same location as the original image.
		  //$output_filename = dirname($imgUrl). "/croppedImg_".rand();
		  $what = getimagesize($imgUrl);
		  switch(strtolower($what['mime']))
		  {
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
				default: die('image type not supported');
		  }
		  //Check write Access to Directory
		  if(!is_writable(dirname($output_filename))){
			  $response = Array(
					"status" => 'error',
					"output_filename" => "$output_filename",
					"message" => 'Can`t write cropped File'
				);	
		  }else{
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
			  imagejpeg($final_image, $output_filename.$type, $jpeg_quality);
			  $this->load->model("UserModel");
				$this->UserModel->setUserAvatar($_POST["userID"], $outputfile.$type);


			  $response = Array(
					"status" => 'success',
					"url" => base_url("avatars/".$outputfile.$type)
				);
		  }
				  print json_encode($response);
	}

	public function ajax_upload_avatar(){
		var_dump($_POST);
		$image = $_POST["image"];
		$name = $_POST["userID"];
		$base_to_php = explode(',',$image);
		$data = base64_decode( $base_to_php[1] );
		file_put_contents("../avatars/$name.png",$data);

	}

	public function ajax_uploadPicture(){
		
		$config['upload_path'] = './avatars/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']     = '100000000';
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('img'))
      {
					$response = array(
					  "status" => 'error',
					  "message" => 'something went wrong, most likely file is to large for upload. check upload_max_filesize, post_max_size and memory_limit in you php.ini',
				   );
					print json_encode($response);
      }
		else
		{
					 $userID = $this->input->post("userID") ;
					 $upload_data = $this->upload->data();
					 $data = array('upload_data' => $this->upload->data());
					 $this->load->model("UserModel");
					 $this->UserModel->setUserAvatar($userID, $upload_data["file_name"]);

					 $data["info"]= $this->UserModel->getUserInfo($userID);

					 $response = array(
						"status" => 'success',
						"url" => base_url('avatars'."/".$upload_data["file_name"] ),
						"width" => $upload_data["image_width"],
						//"width" => 120,
						"height" => $upload_data["image_height"] 
						//"height" => 200 
		  			 );
					
			      print json_encode($response);
      }
	}

}

