<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CourseManager extends CI_Model {
	
		public function saveWebContent(){
			$this->db->set('detail',$this->input->post('content'));
			$this->db->where('courseID',$this->input->post('courseID'));
			$this->db->update('courses');
		}

	  public function getOwnCourseID(){
	  		$userID = $this->session->userdata("userID");
	  		$this->db->where('userID',$userID);
			$result = $this->db->get('course_manager');
			if( $result->num_rows() > 0){
				$row = $result->row();
				return $row->courseID;
			}else{

	  			$this->db->where('userID',$userID);
				$result = $this->db->get('committee');
				if( $result->num_rows() > 0){
						$row = $result->row();
						return $row->courseID;
				}
				else{
					return null;
				}
			}
	  }

		public function isOwnCourse($courseID){
	  		$userID = $this->session->userdata("userID");
	  		$this->db->where('userID',$userID);
	  		$this->db->where('courseID',$courseID);
			$result = $this->db->get('course_manager');
			if( $result->num_rows() > 0){
				return TRUE;
			}else{
	  			$this->db->where('userID',$userID);
	  		   $this->db->where('courseID',$courseID);
				$result = $this->db->get('committee');
				return  $result->num_rows() > 0 ;
			}
	  }
	  
	  public function getCourseInfo($courseID){
			$this->load->model("CourseModel");	  	
			return $this->CourseModel->get_course($courseID);
	  }
	  
	  public function getCommittee($courseID){
	  	  $this->db->where('courseID',$courseID);
		  return $this->db->get('v_committee');
	  }

	  public function addCommittee(){
	  	 $this->setCourseCommittee($this->input->post('courseID'),$this->input->post('userID'));	
	  }

	  public function setCourseCommittee($courseID,$userID){
	  	 $data = array(
		 	'courseID' => $courseID,
			'userID' => $userID
		 );
		 $this->db->insert('committee',$data);
     }


	  public function addCourseManager(){
	  	 $this->setCourseManager($this->input->post('courseID'),$this->input->post('userID'));	
	  }

	  public function setCourseManager($courseID,$userID){
	  	 $data = array(
		 	'courseID' => $courseID,
			'userID' => $userID
		 );
		 $this->db->insert('course_manager',$data);
     }

  	  public function removeCommittee(){
	  	 $this->deleteCommittee($this->input->post('courseID'),$this->input->post('userID'));	
	  }

	  public function deleteCommittee($courseID,$userID){
		 $this->db->where('courseID',$courseID);
		 $this->db->where('userID',$userID);
		 $this->db->delete('committee');
     }

 
  	  public function removeCourseManager(){
	  	 $this->deleteCourseManager($this->input->post('courseID'));	
	  }

	  public function deleteCourseManager($courseID){
		 $this->db->where('courseID',$courseID);
		 $this->db->delete('course_manager');
     }

	  public function saveCourseInfo1(){
	 	 $data = array(
		 	'code' => $this->input->post('code'),
		 	'name' => $this->input->post('name'),
		 	'nameENG' => $this->input->post('nameENG'),
		 );
		 $this->db->where('courseID', $this->input->post('courseID'));
		 $this->db->update('courses',$data);
     }

	  public function saveCourseInfo2(){
	 	 $data = array(
		 	'degree_name' => $this->input->post('degree_name'),
		 	'degree_nameENG' => $this->input->post('degree_nameENG'),
		 	'degree_short_name' => $this->input->post('degree_short_name'),
		 	'degree_short_nameENG' => $this->input->post('degree_short_nameENG')
		 );
		 $this->db->where('courseID', $this->input->post('courseID'));
		 $this->db->update('courses',$data);
     }

}
