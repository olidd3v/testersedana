<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model {
	function __construct(){
        parent::__construct();
	}
	
	public function get_all($limit_offset = array()){
		if(!empty($limit_offset)){
			$query = $this->db->get("setting",$limit_offset['limit'],$limit_offset['offset']);
		}else{
			$query = $this->db->get("setting");
		}
		return $query->result();
	}
	public function count_total(){
		$query = $this->db->get("setting");
		return $query->num_rows();
	}
	public function get_all_array($filter = ''){
		if(!empty($filter)) {
			$query = $this->db->get_where("setting",$filter);
		}else{
			$query = $this->db->get_where("setting");
		}
		return $query->result_array();
	}
	public function get_last_id(){
		$this->db->order_by('id', 'DESC');

		$query = $this->db->get("setting",1,0);
		return $query->result();
	}
	public function insert($data){
		$this->db->insert('setting', $data);
	}
	public function update($id,$data){
		$this->db->where('id', $id);
		$this->db->update('setting', $data);
	}
	public function get_by_id($id){
		$response = false;
		$query = $this->db->get_where('setting',array('id' => $id));
		if($query && $query->num_rows()){
			$response = $query->result_array();
		}
		return $response;
	}
	public function delete($id){
		$this->db->delete('setting', array('id' => $id));
	}
	public function get_filter($filter = '',$limit_offset = array()){
		if(!empty($filter)){
			$query = $this->db->get_where("setting",$filter,$limit_offset['limit'],$limit_offset['offset']);
		}else{
			$query = $this->db->get("setting",$limit_offset['limit'],$limit_offset['offset']);
		}
		return $query->result();
	}
	public function count_total_filter($filter = array()){
		if(!empty($filter)){
			$query = $this->db->get_where("setting",$filter);
		}else{
			$query = $this->db->get("setting");
		}
		return $query->num_rows();
	}
}