<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DepartmentModel extends CI_Model {


        public function __construct(){
                // Call the CI_Model constructor
				$this->load->database(); 
                parent::__construct();
        }

        public function getQuery($arr=""){
			$this->db->select('*');
			$this->db->from('department');
			if($arr != ""){
				for($i=0; $i< count($arr); $i++){
					$this->db->where($arr[$i]); 
				}
			}
			// $this->db->order_by("article_group", "asc");
			$query = $this->db->get();
			return $query->result();
        }

		
}
?>