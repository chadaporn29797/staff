<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ActivityModel extends CI_Model {

		  public function getActivity($activityID=null){
		  	  if($activityID == null ) return array( 'successful' => false );
			  $activity = array();
			  $this->db->where('activityID',$activityID);
			  $activity =  $this->db->get('research_activity')->row();
			  //getfiles
			  $links = array();
			  $this->db->where('activityID',$activityID);
			  $query = $this->db->get('research_activity_link');
			  foreach($query->result() as $link){
			  	 $links[] = $link;
			  }
			  //getimages
			  $images = array();
			  $this->db->where('activityID',$activityID);
			  $query = $this->db->get('v_research_activity_image');
			  foreach($query->result() as $image){
			  	 $images[] = $image;
			  }

			  return array( "info" => $activity , "links" => $links , "images" => $images ) ;
		  }

		  public function addActivity(){
		     $activityID = $this->input->post("activityID");
			  $this->db->set("title", $this->input->post("title"));
			  $this->db->set("text", $this->input->post("text"));
			  $this->db->set("creator", $this->session->userdata("userID"));
			  $this->db->set("ip", $this->input->ip_address());
			  if($activityID == -1){
		  		$this->db->insert("research_activity");
			  	$activityID = $this->db->insert_id();
			  }else{
			  		$this->db->where('activityID',$activityID);
		  			$this->db->update("research_activity");
			  }

			  return array( 'success' => true, 'activityID' => $activityID ); 
		  }

		 public function addActivityLink(){

		     $activityID = $this->input->post("activityID");
		     $groupID = $this->input->post("groupID");
		     $link = $this->input->post("link");
			  $this->db->set("title", $this->input->post("title"));
			  $this->db->set("text", $this->input->post("text"));
			  $this->db->set("creator", $this->session->userdata("userID"));
			  $this->db->set("ip", $this->input->ip_address());
			  $this->db->set("groupID", $groupID );
			  if($activityID == -1){
				  $this->db->insert("research_activity");
				  $activityID = $this->db->insert_id();
			  }else{
			  		$this->db->where('activityID',$activityID);
		  			$this->db->update("research_activity");
			  }

			  $data = array(
			  	  'activityID' => $activityID,
				  'linkTarget' => "$link"
			  );
			  $this->db->insert('research_activity_link',$data);
			  //addLink
			  return array( 'success' => true, 'activityID' => $activityID, 'linkID' => $this->db->insert_id() ); 
		  }

		  	function deleteLink(){
				  $linkID = $this->input->post("linkID");
				  $this->db->where("linkID", $linkID);
				  $this->db->delete("research_activity_link");
				  return array( 'success' => true) ;
			}


			function deleteActivity(){
				  $activityID = $this->input->post("activityID");
				  $groupID = $this->input->post("groupID");

				  $this->db->where("activityID", $activityID);
				  $query=$this->db->get("v_research_activity_image");

				  //remove phisicals files
				  foreach($query->result() as $image){
						 $file_name = $image->file_name ;
						 $fileID = $image->fileID ;

						 $path = "../files/groups/$groupID/activity/$file_name";
						 file_exists($path) && unlink($path) ; 

						 $this->db->where("fileID", $fileID);
						 $query=$this->db->delete("upload_file");
				  }
				  //remove upload_file
				  //delete activity from record
				  $this->db->where("activityID", $activityID);
				  $query=$this->db->delete("research_activity");
				  return array( 'success' => true );
			}




		function deleteImage(){
				  $imageID = $this->input->post("imageID");
				  $groupID= $this->input->post("groupID");
				  //echo "ImageID= $imageID, groupID=$groupID<br/>";

				  $this->db->where("imageID", $imageID);
				  $query=$this->db->get("v_research_activity_image");
				  $image = $query->row();
				  $file_name = $image->file_name ;
				  $fileID = $image->fileID ;

		  		  $path = "../files/groups/$groupID/activity/$file_name";
				  //echo "PATH=$path <br/>";
		  		  if (file_exists($path) && unlink($path)  ) {
					  $this->db->where("imageID", $imageID);
					  $this->db->delete("research_activity_image");

					  $this->db->where("fileID", $fileID);
					  $this->db->delete("upload_file");

					  return array( 'success' => true) ;
				  }else{
					  return array( 'success' => false, 'message' => 'Cannot remove file' ) ;
				  }

		}

		function uploadImage($upload){
				//create new empty activity	
				 $activityID = $this->input->post('activityID');
				 $userID = $this->session->userdata("userID");
				 $ip = $this->input->ip_address();
				 //$this->db->trans_start();
				 if($activityID == -1 ){
				 	 //echo "NULLL ACTIVITY wlll be inserted new one";
						$data = array(
						  'title' => $this->input->post('title'),
						  'text' => $this->input->post('text'),
						  'groupID' => $this->input->post('groupID'),
						  'creator' => $userID,
						  'ip' => $ip
						);
						$this->db->insert('research_activity',$data);
				  		$activityID = $this->db->insert_id();
				  }else{
				  		//uupdate
						$data = array(
						  'title' => $this->input->post('title'),
						  'text' => $this->input->post('text'),
						  'ip' => $ip
						);
						$this->db->where('activityID',$activityID);
						$this->db->update('research_activity',$data);
				  }

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

				  $this->db->set('fileID',$fileID);
				  $this->db->set('activityID',$activityID);
				  $this->db->insert('research_activity_image');

				  return array( "activityID" => $activityID , "imageID" => $this->db->insert_id() );
	   }



		  public function getGroupActivities($groupID){
		  	 $this->db->where("groupID",$groupID);
			 $query=$this->db->get("v_research_activity");
			 $data = array();	
			 $count = 0;
			 foreach($query->result() as $a){
				 array_push($data,$a);
			 }
			 return $data;
		  }
}
