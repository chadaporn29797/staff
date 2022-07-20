<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResearchGroup extends CI_Model {

	public function deleteResearchMember(){
		$this->db->where('userID',$this->input->post('userID'));	
		$this->db->where('researchID',$this->input->post('researchID'));	
		$this->db->delete('research_member');
		return array( 'success' => true );
	}

	public function deleteResearchDocument(){
				  $documentID = $this->input->post("documentID");
				  $groupID = $this->input->post("groupID");

				  $this->db->where("documentID", $documentID);
				  $query=$this->db->get("v_research_documents");

				  //remove phisicals files
				  foreach($query->result() as $document){
						 $file_name = $document->file_name ;
						 $fileID = $document->fileID ;

						 $path = "../files/groups/$groupID/research/$file_name";
						 file_exists($path) && unlink($path) ; 

						 $this->db->where("fileID", $fileID);
						 $query=$this->db->delete("upload_file");
				  }

				  //delete research from record
				  $this->db->where("documentID", $documentID);
				  $this->db->delete("research_document");
				  return array( 'success' => true );
			}



	public function deleteGroupResearch(){
				  $researchID = $this->input->post("researchID");
				  $groupID = $this->input->post("groupID");

				  $this->db->where("researchID", $researchID);
				  $query=$this->db->get("v_research_documents");

				  //remove phisicals files
				  foreach($query->result() as $image){
						 $file_name = $image->file_name ;
						 $fileID = $image->fileID ;

						 $path = "../files/groups/$groupID/research/$file_name";
						 file_exists($path) && unlink($path) ; 

						 $this->db->where("fileID", $fileID);
						 $query=$this->db->delete("upload_file");
				  }

				  //delete research from record
				  $this->db->where("researchID", $researchID);
				  $query=$this->db->delete("research");
				  return array( 'success' => true );
			}


	public function addResearchMember(){

			 $researchID = $this->input->post('researchID');
			 $groupID = $this->input->post('groupID');
			 $userID = $this->session->userdata("userID");
			 $memberID = $this->input->post('userID');
			 $ip = $this->input->ip_address();
			 $title = $this->input->post('title');
			 $summary = $this->input->post('summary');

	 		//create or update research information 
			if($researchID == -1 ){
						$data = array(
						  'title' => $title,
						  'summary' => $summary,
						  'creator' => $userID,
						  'ip' => $ip
						);
						$this->db->insert('research',$data);
				  		$researchID = $this->db->insert_id();

				  		//join research's group to the research
				  		$this->db->set('groupID',$groupID);
				  		$this->db->set('researchID',$researchID);
						$this->db->insert('research_group_research');

			}else{
				  		//update
						$data = array(
						  'title' => $title,
						  'summary' => $summary,
						  'ip' => $ip
						);
						$this->db->where('researchID',$researchID);
						$this->db->update('research',$data);
			}

			//check if it not exist
			$this->db->where('researchID',$researchID);
			$this->db->where('userID',$memberID);
			$query = $this->db->get('research_member');
			if($query->num_rows() > 0){
			  return array( 'success' => false, 'researchID' => $researchID ); 
			}else{
			 	//insert new
				 $this->db->set('researchID',$researchID);
				 $this->db->set('userID',$memberID);
				 $query = $this->db->insert('research_member');
			  	 return array( 'success' => true , 'researchID' => $researchID ); 
			 }
	}


	
	public function addResearch(){

			 $researchID = $this->input->post('researchID');
			 $groupID = $this->input->post('groupID');
			 $userID = $this->session->userdata("userID");
			 $ip = $this->input->ip_address();
			 $title = $this->input->post('title');
			 $summary = $this->input->post('summary');

	 		//create or update research information 
			if($researchID == -1 ){
						$data = array(
						  'title' => $title,
						  'summary' => $summary,
						  'creator' => $userID,
						  'ip' => $ip
						);
						$this->db->insert('research',$data);
				  		$researchID = $this->db->insert_id();

				  		//join research's group to the research
				  		$this->db->set('groupID',$groupID);
				  		$this->db->set('researchID',$researchID);
						$this->db->insert('research_group_research');

				  }else{
				  		//uupdate
						$data = array(
						  'title' => $title,
						  'summary' => $summary,
						  'ip' => $ip
						);
						$this->db->where('researchID',$researchID);
						$this->db->update('research',$data);
			 }
		   
			  return array( 'success' => true, 'researchID' => $researchID ); 
	}



	function uploadResearchDocument($upload){
				//create new empty research	
				 $researchID = $this->input->post('researchID');
				 $groupID = $this->input->post('groupID');
				 $userID = $this->session->userdata("userID");
				 $ip = $this->input->ip_address();
				 //print_r($_POST);

				 //create or update research information 
				 if($researchID == -1 ){
						$data = array(
						  'title' => $this->input->post('title'),
						  'summary' => $this->input->post('summary'),
						  'creator' => $userID,
						  'ip' => $ip
						);
						$this->db->insert('research',$data);
				  		$researchID = $this->db->insert_id();

				  		//join research's group to the research
				  		$this->db->set('groupID',$groupID);
				  		$this->db->set('researchID',$researchID);
						$this->db->insert('research_group_research');

				  }else{
				  		//uupdate
						$data = array(
						  'title' => $this->input->post('title'),
						  'summary' => $this->input->post('summary'),
						  'ip' => $ip
						);
						$this->db->where('researchID',$researchID);
						$this->db->update('research',$data);
				  }
				  


				  //create upload files information 
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


				  //create documents that relative to research data & upload file
				  $this->db->set('fileID',$fileID);
				  $this->db->set('researchID',$researchID);
				  $this->db->insert('research_document');
				  $documentID = $this->db->insert_id();


				  return array( "researchID" => $researchID , "documentID" => $documentID );
	}

	public function getResearch($researchID = null){
		  	  if($researchID == null ) return array( 'successful' => false );
			  $this->db->where('researchID',$researchID);
			  $research =  $this->db->get('research')->row();
			  //get documents
			  $documents = array();
			  $this->db->where('researchID',$researchID);
			  $query = $this->db->get('v_research_documents');
			  foreach($query->result() as $doc){
			  	 $documents[] = $doc;
			  }

			  //getmembers
			  $members = array();
			  $this->db->where('researchID',$researchID);
			  $query = $this->db->get('v_research_member');
			  foreach($query->result() as $member){
			  	 $members[] = $member;
			  }

			  return array( "info" => $research , "documents" => $documents  , "members" => $members ) ;

	}

	public function getResearches($groupID=null){
			  $this->db->where('groupID',$groupID);
			  $query =  $this->db->get('v_research_group_research');
			  $researches = array();
			  foreach($query->result() as $research){
			  	array_push( $researches, $research);
			  }
			  return $researches;
			  /*
			  //documents
			  $documents = array();
			  $this->db->where('researchID',$researchID);
			  $query = $this->db->get('v_research_document');
			  foreach($query->result() as $document){
			  	 $documents[] = $document;
			  }

			  //members
			  $members = array();
			  $this->db->where('researchID',$activityID);
			  $query = $this->db->get('v_research_member');
			  foreach($query->result() as $member){
			  	 $members[] = $member;
			  }

			  return array( "info" => $research , "documents" => $documents , "members" => $members ) ;
			  */
		 	return array( "info" => $research ) ;
	}

	public function getGroup($groupID=null){
		$this->db->where("groupID",$groupID);
		$result = $this->db->get("research_group");
		return $result;
	}

   public function updateGroupName(){
		  		$this->db->where('groupID',$this->input->post('groupID'));
		  		$this->db->set('name',$this->input->post('name'));
				return array( 'success' => $this->db->update('research_group') );
   }

   public function updateGroupDetail(){
		  		$this->db->where('groupID',$this->input->post('groupID'));
		  		$this->db->set('detail',$this->input->post('detail'));
				return array( 'success' => $this->db->update('research_group') );
   }


  public function updateGroupDescription(){
		  		$this->db->where('groupID',$this->input->post('groupID'));
		  		$this->db->set('shortDescription',$this->input->post('shortDescription'));
				return array( 'success' => $this->db->update('research_group') );
  }


	public function isGroupAdmin($userID=null,$groupID=null){
		  	   $this->db->where('groupID', $groupID );
		  	   $this->db->where('userID', $userID );
		  	   $this->db->where('admin', 1 );
			   $group = $this->db->get('research_user');
				return $group->num_rows() > 0 ;
   }

	public function deleteGroup($groupID=null){
		  	   $this->db->where('groupID', $groupID );
				$this->db->delete('research_group');
				return true;
	}

	public function getResearchGroups(){
			$userID = $this->session->userdata('userID');
		  	$this->db->where('userID', $userID );
			$this->db->order_by('admin','desc');
			$groups = $this->db->get('v_user_group');
		  	return $groups;	
	 }

		  public function isExistGroup(){
		  	  $this->db->where('name', $this->input->get('name'));
			  $query = $this->db->get('research_group');
			  return $query->num_rows() > 0 ;
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


}
