<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CourseModel extends CI_Model {

    
	 public function __construct()
    {
       parent::__construct();
    }



	  public function get_bachelors(){ return $this->get_courses(1); }
	  public function get_masters(){return $this->get_courses(2); }
	  public function get_phds(){return $this->get_courses(3); }
     public function get_courses($level)
     {
	  	 $this->db->where('level',$level);
		 $this->db->order_by('courseID','asc');
		 $query = $this->db->get('v_courses');
		 return $query;
     }

     public function get_course($courseID)
     {
	  	 $this->db->where('courseID',$courseID);
		 $query = $this->db->get('v_courses');
		 return $query;
     }

}
