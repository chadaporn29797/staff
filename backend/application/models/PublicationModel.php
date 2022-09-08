<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PublicationModel extends CI_Model {


        public function __construct(){
                // Call the CI_Model constructor
				$this->load->database(); 
                parent::__construct();
        }

        public function getQuery($arr=""){
			$this->db->select('*');
			$this->db->from('publication_into');
			if($arr != ""){
				for($i=0; $i< count($arr); $i++){
					$this->db->where($arr[$i]); 
				}
			}
			// $this->db->order_by("article_group", "asc");
			$query = $this->db->get();
			return $query->result();
        }

		public function insert($arr=""){
            if($arr!="") $this->db->insert('publication_into', $arr);
        }

        public function update($arr="", $where=""){
			if($arr != "" AND $where != ""){
				for($i=0; $i< count($where); $i++){
					$this->db->where($where[$i]); 
				}
				$this->db->update('publication_into', $arr); 
			}
        }

		public function delete($where=""){
			if($where != ""){
				for($i=0; $i< count($where); $i++){
					$this->db->where($where[$i]); 
				}
				$this->db->delete('publication_into'); 
			}
		}

		
}
?>