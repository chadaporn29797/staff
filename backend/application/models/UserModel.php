<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

		  public function isGroupAdmin($userID=null,$groupID=null){
		  	   $this->db->where('groupID', $groupID );
		  	   $this->db->where('userID', $userID );
		  	   $this->db->where('admin', 1 );
			   $group = $this->db->get('research_user');
				return $group->num_rows() > 0 ;
		  }

		  public function deleteGroup($groupID=null){
		  	   $this->db->where('groupID', $groupID );
				$this->db->delete('research_activity');
		  	   $this->db->where('groupID', $groupID );
				$this->db->delete('research_group');
				return true;
		  }

		  public function getQuery($arr=""){
			$this->db->select('*');
			$this->db->from('user');
			if($arr != ""){
				for($i=0; $i< count($arr); $i++){
					$this->db->where($arr[$i]); 
				}
			}
			$query = $this->db->get();
			return $query->result();
        }

		  public function getResearchGroups(){

				$userID = $this->session->userdata('userID');
		  	   $this->db->where('userID', $userID );
				$this->db->order_by('admin','desc');
			   $groups = $this->db->get('v_user_group');
				//die( "userID=$userID Numrows=".$groups->num_rows() );
		  		return $groups;	
		  }

		  public function getResearchGroup($groupID=null){
		  		//research group information
				if($groupID == null)
					 $groupID =  $this->input->get("groupID") ;
		  	   $this->db->where('groupID', $groupID );
			   $group = $this->db->get('research_group');
		  		return $group;	
		  }

		  public function isExistGroup(){
		  	  $this->db->where('name', $this->input->get('name'));
			  $query = $this->db->get('research_group');
			  return $query->num_rows() > 0 ;
		  }

		  public function isExistMember(){
		  	  $this->db->where('userID', $this->input->get('userID'));
		  	  $this->db->where('groupID', $this->input->get('groupID'));
			  //print_r($_GET);
			  $query = $this->db->get('research_user');
			  return $query->num_rows() > 0 ;
		  }

		  function uploadImage($upload){
				//create new empty activity	
				 $groupID = $this->input->post('groupID');
				 $userID = $this->session->userdata("userID");
				 /*
				 $ip = $this->input->ip_address();
				  $data = array(
					  'file_name' => $upload["file_name"], 	
					  'file_size' => $upload["file_size"],
					  'owner' => $userID,
					  'ip_address' => $ip,
					  'orig_name' => $upload["orig_name"],
					  'file_type' => $upload["file_type"],
					  'is_image' => intVal( $upload['is_image']),
					  'image_width' => intVal( $upload['image_width']),
					  'image_height' => intVal( $upload['image_height']) 
				  );
				  $this->db->insert('upload_file',$data);
				  $fileID = $this->db->insert_id();
				  */

				  $this->db->set('imagePath',$upload["file_name"]);
				  $this->db->where('groupID',$groupID);
				  $this->db->update('research_group');

				  return array( "groupID" => $groupID , "imagePath" => $upload["file_name"] );
	   }



		  public function addGroupMembers(){
		  	  //insert members
			  $groupID = $this->input->post("groupID");
			  $members = $this->input->post("members");
			  $data = array();
			  $returnData = array();
			  if( sizeof($members) > 0){ 
			 	  foreach($members as $member){
							 array_push($data,array( 'groupID' => $groupID, 'userID' => $member['id'] ));
							 array_push($returnData,array('userID' => $member['id'], 'name' => $member['name'] ));
			  	  }
				  if( $this->db->insert_batch('research_user',$data)){
			 			$returnData['success'] = true ;
				  }else{
			 			$returnData['success'] = false ;
				  }
			  }
			  return  $returnData;

		  }
		  public function addNewGroup(){
		  		//create new group record
			  $this->db->trans_begin();
		  	  $this->db->set('name', $this->input->post('name'));
			  $this->db->insert('research_group');
				//insert admin user
			  $groupID = $this->db->insert_id();
			  $this->db->set('groupID',$groupID);
			  $this->db->set('userID',$this->input->post('userID'));
			  $this->db->set('admin',1);
			  $this->db->insert('research_user');

			  //insert members
			  $members = $this->input->post("members");
			  $data = array();
			  $returnData = array();
			  if( sizeof($members) > 0){ 
			 	  foreach($members as $member){
							 array_push($data,array( 'groupID' => $groupID, 'userID' => $member['id'] ));
							 array_push($returnData,array('userID' => $member['id'], 'name' => $member['name'] ));
			  	  }
				  $this->db->insert_batch('research_user',$data);
			  }
			  $this->db->trans_complete();
			  if($this->db->trans_status() === FALSE ){
			  	 $this->db->trans_rollback();
				 $returnData['success'] = false ;
			  }else{
			  	 $this->db->trans_commit();
				 $returnData['success'] = true ;
			  }
			 return $returnData;
		  }

		  public function deleteGroupMember($groupID=null,$userID=null){
		  	 if($groupID == null || $userID == null ) return ;
			 $this->db->where('groupID',$groupID);
			 $this->db->where('userID',$userID);
			 return $this->db->delete('research_user');
		  }

		  public function getGroupMembers($groupID = null){
		  	  if($groupID == null) 
		  	  	 $groupID =$this->input->get('groupID');
		  	  $this->db->where('groupID', $groupID);
			  $query = $this->db->get('v_user_group');
			  $data = array(
			 	'rows' => $query->num_rows(),
			  	'success' => true 
			  );
			  foreach($query->result() as $row ){
			  	array_push($data, array( 'userID'=> $row->userID, 'admin'=> $row->admin, 'name'=> $row->fullName ) );
			  }
		     return $data;
		  }


		  public function getUsers(){
		  	  $this->db->select("userID,fullName");
			  $result = $this->db->get("v_userinfo");
			  return $result;
		  }

//-------------DetailTable ------------------------//
		  public function getDetail($tableName,$userID){
		 			 if( $userID == null)
		  			 	$this->db->where('userID',$userID);
					 else 
		  			  $this->db->where('userID',$userID);
			       $this->db->order_by('sortOrder','asc');
                $query = $this->db->get($tableName);
                $tableDetail= $query->result();
					 return $tableDetail;
		  }

		  public function toggleLanguage(){
		  	 	$this->db->set('language', $this->input->post('language'));
				$this->db->where('userID', $this->input->post('userID'));
				$this->db->update('user');
				return true;
		  }


		  public function addDetail(){

					 $sortOrder = 1;
					 $this->db->select('sortOrder');
		  			 $this->db->where('userID', $this->input->post('userID'));
					 $this->db->order_by('sortOrder','desc');
					 $this->db->limit(1);
					 $query = $this->db->get($this->input->post('tableName'));
					 if( $query->num_rows() > 0){
					 	$sortOrder = $query->row()->sortOrder ;
						$sortOrder = $sortOrder + 1;
					 }
					 $data = array(
					 	'detail' => $this->input->post('detail'),
					 	'userID' => $this->input->post('userID'),
						'sortOrder' => $sortOrder
					 );
                $this->db->insert($this->input->post('tableName'),$data);
		  }

		  public function sortDetail(){
		  	    if($this->input->post('direction') == "up"){

		  			 $this->db->where('sortOrder < ', $this->input->post('sortOrder'), FALSE);
		  			 $this->db->where('userID', $this->input->post('userID'));
					 $this->db->order_by('sortOrder','desc');
					 $this->db->limit(1);
					 $query = $this->db->get($this->input->post('tableName'));
					 if( $query->num_rows() > 0){
						$row= $query->row();
					 	$tableID = $row->id ;
						$sortOrder =  $row->sortOrder ;

						$this->db->set('sortOrder', $this->input->post('sortOrder'));
						$this->db->where('id',$tableID);
						$this->db->update($this->input->post('tableName'));

				 	 	$this->db->set('sortOrder', $sortOrder);
		  			 	$this->db->where('id', $this->input->post('id'));
						$this->db->update($this->input->post('tableName'));
					 }

				 }else{
		  			 $this->db->where('sortOrder > ', $this->input->post('sortOrder'),FALSE);
		  			 $this->db->where('userID', $this->input->post('userID'));
					 $this->db->order_by('sortOrder',"asc");
					 $this->db->limit(1);
					 $query = $this->db->get($this->input->post('tableName'));
					 if( $query->num_rows() > 0){

						$row= $query->row();
					 	$tableID = $row->id ;
						$sortOrder =  $row->sortOrder ;

						$this->db->set('sortOrder', $this->input->post('sortOrder'));
						$this->db->where('id',$tableID);
						$this->db->update($this->input->post('tableName'));

				 	 	$this->db->set('sortOrder', $sortOrder);
		  			 	$this->db->where('id', $this->input->post('id'));
						$this->db->update($this->input->post('tableName'));
					 }

		  	   }
		  }


		  public function updateDetail(){
		  			 $this->db->set('detail',$this->input->post('detail'));
		  			 $this->db->where('id',$this->input->post('id'));
					 $this->db->update($this->input->post('tableName'));
		  }

		  public function deleteDetail(){
		  			 $this->db->where('id',$this->input->post('id'));
					 $this->db->delete($this->input->post('tableName'));
		  }


//-------------End Eduction ------------------------//



//-------------Eduction ------------------------//
		  public function getUserEducations($userID=null){
		 			 if( $userID == null)
		  			 	$this->db->where('userID',$this->session->userdata('userID'));
					 else 
		  			  $this->db->where('userID',$userID);
			       $this->db->order_by('sortOrder','asc');
                $query = $this->db->get('education');
                $educations = $query->result();
					 return $educations;
		  }


		  public function addEducation(){

					 $sortOrder = 1;
					 $this->db->select('sortOrder');
		  			 $this->db->where('userID', $this->input->post('userID'));
					 $this->db->order_by('sortOrder','desc');
					 $this->db->limit(1);
					 $query = $this->db->get('education');
					 if( $query->num_rows() > 0){
					 	$sortOrder = $query->row()->sortOrder ;
						$sortOrder = $sortOrder + 1;
					 }
					 $data = array(
					 	'detail' => $this->input->post('detail'),
					 	'userID' => $this->input->post('userID'),
						'sortOrder' => $sortOrder
					 );
                $this->db->insert('education',$data);
		  }

		  public function sortEducation(){
		  	    if($this->input->post('direction') == "up"){

		  			 $this->db->where('sortOrder < ', $this->input->post('sortOrder'), FALSE);
		  			 $this->db->where('userID', $this->input->post('userID'));
					 $this->db->order_by('sortOrder','desc');
					 $this->db->limit(1);
					 $query = $this->db->get('education');
					 if( $query->num_rows() > 0){
						$row= $query->row();
					 	$educationID = $row->educationID ;
						$sortOrder =  $row->sortOrder ;

						$this->db->set('sortOrder', $this->input->post('sortOrder'));
						$this->db->where('educationID',$educationID);
						$this->db->update('education');

				 	 	$this->db->set('sortOrder', $sortOrder);
		  			 	$this->db->where('educationID', $this->input->post('educationID'));
						$this->db->update('education');
					 }

				 }else{
		  			 $this->db->where('sortOrder > ', $this->input->post('sortOrder'),FALSE);
		  			 $this->db->where('userID', $this->input->post('userID'));
					 $this->db->order_by('sortOrder',"asc");
					 $this->db->limit(1);
					 $query = $this->db->get('education');
					 if( $query->num_rows() > 0){

						$row= $query->row();
					 	$educationID = $row->educationID ;
						$sortOrder =  $row->sortOrder ;

						$this->db->set('sortOrder', $this->input->post('sortOrder'));
						$this->db->where('educationID',$educationID);
						$this->db->update('education');

				 	 	$this->db->set('sortOrder', $sortOrder);
		  			 	$this->db->where('educationID', $this->input->post('educationID'));
						$this->db->update('education');
					 }

		  	   }
		  }

		  public function updateEducation(){
		  			 $this->db->set('detail',$this->input->post('detail'));
		  			 $this->db->where('educationID',$this->input->post('educationID'));
					 $this->db->update('education');
		  }

		  public function deleteEducation(){
		  			 $this->db->where('educationID',$this->input->post('educationID'));
					 $this->db->delete('education');
		  }

		  public function removeUserEducation($id){
		  			 $this->db->where('educationID',$id);
                $this->db->delete('education');
		  }




//-------------End Eduction ------------------------//


		  public function addUserEducation(){
					 $data = array(
					 	'detail' => $this->input->post('detail'),
					 	'userid' => $this->session->userdata('userID')
					 );
                $this->db->insert('education',$data);
		  }


		  public function addUserScholarship(){
					 $data = array(
					 	'scYear' => $this->input->post('scYear'),
					 	'scName' => $this->input->post('scName'),
					 	'amount' => $this->input->post('amount'),
					 	'detail' => $this->input->post('detail'),
					 	'userid' => $this->session->userdata('userID')
					 );
                $this->db->insert('scholarship',$data);
		  }

	
		  public function addUserWork(){
					 $data = array(
					 	'wYear' => $this->input->post('wYear'),
					 	'wName' => $this->input->post('wName'),
					 	'detail' => $this->input->post('detail'),
					 	'userid' => $this->session->userdata('userID')
					 );
                $this->db->insert('works',$data);
		  }


		  public function searchUserBy($key,$value){
		  			 $this->db->like("$key",trim($value));
					 $query =  $this->db->get('v_userinfo');
					 return $query;

		  }

		  public function getUserByDepartment($departmentName){
		  		if( $departmentName === "chemistry" ){
					$this->db->where("departmentID_em",689);
				}else if($departmentName === "physics"){
					$this->db->where("departmentID_em",688);
				}else if($departmentName === "biology"){
					$this->db->where("departmentID_em",690);
				}else if($departmentName === "mathematics"){
					$this->db->where("departmentID_em",691);
				}
				$this->db->where('typeID_em',1);
				$this->db->order_by('nameTH_em','asc');
			   $query =  $this->db->get('v_userinfo');
				return $query;
		  }

        public function getUserSession()
        {
		  			 $this->db->where('username',$this -> input -> post("staff_uname"));
                $query = $this->db->get('user');
					 if( $query->num_rows() < 1) return false ;

                $info = $query->row();
					 $userID= $info->userID;

					 $this->session->set_userdata("username", $this -> input -> post("staff_uname"));
					 $this->session->set_userdata("userlevel",$info->userlevel);
					 $this->session->set_userdata("userID",$info->userID);
					 $this->session->set_userdata("forName",$info->nameTH_em);
					 $this->session->set_userdata("firstName",$info->nameTH_em);
					 $this->session->set_userdata("lastName",$info->sirNameTH_em);
					 $this->session->set_userdata("name",$info->forName.$info->nameTH_em." ".$info->sirNameTH_em);
					 $this->session->set_userdata("avatar",$info->avatar);

           //This should be move in the future , Nattapong 24/06/2017
			  //For Responsive FileManager,Tinymce plugins create a files directory if not exists
					 $directory = md5($info->username);
					 $_SESSION['RF']["subfolder"] = $directory;
					 if(!is_dir("../files/$directory"))
					 	 mkdir("../files/$directory");
					 
		  			 $this->db->where('userID',$userID);
                $query = $this->db->get('course_manager');
					 if($query->num_rows() > 0){
                	$m = $query->row();
					 	$this->session->set_userdata("managerID",$m->courseID);
					 }
					 return true;
     }

	  public function getUserAvatar($userID=null){
			 		 if( $userID == null)
		  			 	$this->db->where('userID',$this->session->userdata('userID'));
					 else 
		  			  $this->db->where('userID',$userID);
                $query = $this->db->get('user');
                $avatar = $query->row()->avatar;
					 return $avatar;
		  }


		  public function getUserScholarship($userID=null){

		 			 if( $userID == null)
		  			 	$this->db->where('userid',$this->session->userdata('userID'));
					 else 
		  			  $this->db->where('userID',$userID);
                $query = $this->db->get('scholarship');
                $scholarship = $query->result();
					 return $scholarship;
		  }

		  public function getScholarshipInfo($id){
		  			 $this->db->where('id',$id);
                $query = $this->db->get('scholarship');
                $scholarship = $query->row();
					 return $scholarship;
		  }
		  
		  public function updateScholarshipInfo(){
		  			 $this->db->where('id',$this->input->post('sid'));
		 			 $data = array(
					 	'scYear' => $this->input->post('scYear'),
					 	'scName' => $this->input->post('scName'),
					 	'amount' => $this->input->post('amount'),
					 	'detail' => $this->input->post('detail'),
					 	'userid' => $this->session->userdata('userID')
					 );
                $this->db->update('scholarship',$data);

		  }


		  public function removeUserScholarship($id){
		  			 $this->db->where('id',$id);
                $this->db->delete('scholarship');
		  }

		  public function getWorkInfo($id){
		  			 $this->db->where('id',$id);
                $query = $this->db->get('works');
                $workinfo = $query->row();
					 return $workinfo;
		  }
		  
		  public function updateWorkInfo(){
		  			 $this->db->where('id',$this->input->post('wid'));
		 			 $data = array(
					 	'wYear' => $this->input->post('wYear'),
					 	'wName' => $this->input->post('wName'),
					 	'detail' => $this->input->post('detail'),
					 	'userid' => $this->session->userdata('userID')
					 );
                $this->db->update('works',$data);

		  }


		  public function removeUserWork($id){
		  			 $this->db->where('id',$id);
                $this->db->delete('works');
		  }

		  public function getUserWorks($userID=null){
		 			 if( $userID == null)
		  			 	$this->db->where('userID',$this->session->userdata('userID'));
					 else 
		  			  $this->db->where('userID',$userID);
                $query = $this->db->get('works');
                $works = $query->result();
					 return $works;
		  }


		 public function getUserInfo($userID=null){
		 			 if( $userID == null)
		  			  $this->db->where('username',$this->session->userdata('username'));
					 else 
		  			  $this->db->where('userID',$userID);
                $query = $this->db->get('v_userinfo');
                $info = $query->row();
					 return $info;
		  }

		  public function setUserAvatar($userID=null,$pic_name){
					$this->db->set('avatar',$pic_name);
		 			 if( $userID == null)
		  			  $this->db->where('username',$this->session->userdata('username'));
					 else 
		  			  $this->db->where('userID',$userID);
               $this->db->update('user');

		 			if( $userID == null)
						$this->session->set_userdata("avatar",$pic_name);
		  }


		  public function setDescription(){
		  			$this->db->set("description",$this->input->post("description"));
				   if( null == $this->input->post("userID") || " " == $this->input->post("userID") ){
		  			  $this->db->where('username',$this->session->userdata('username'));
					}
					else{ 
		  			  $this->db->where('userID', $this->input->post("userID") );
					}
               $this->db->update('user');
					 
		  }

		  public function setUserInfo(){
		  			 $data= array(
					 	'forName' => $this->input->post('forName'),
					 	'nameTH_em' => $this->input->post('firstName'),
					 	'sirNameTH_em' => $this->input->post('lastName'),
					 	'forNameENG' => $this->input->post('forNameENG'),
					 	'nameENG' => $this->input->post('firstNameENG'),
					 	'sirNameENG' => $this->input->post('lastNameENG'),
					 	'roomNumber' => $this->input->post('roomNumber'),
					 	'tel' => $this->input->post('tel'),
					 	'mobile' => $this->input->post('mobile'),
					 	'email' => $this->input->post('email'),
					 );
		 			if( null == $this->input->post("userID") || " " == $this->input->post("userID") ){
						//echo "<br/>here1";
		  			  $this->db->where('username',$this->session->userdata('username'));
					}
					else{ 
		  			  $this->db->where('userID', $this->input->post("userID") );
						//echo "<br/>here2 userID=".$this->input->post("userID");
					}
                $this->db->update('user',$data);
					 //die();
		  }


}
