<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Levels_m extends CI_Model {

	public function get_levels($id = FALSE){
		if($id === FALSE){
			$this->db->order_by('lvl_id', 'ASC');
			$query = $this->db->get('users_level');
			return $query->result_array();
		}
		$query = $this->db->get_where('users_level', array('lvl_id' => $id));
		return $query->row_array();
	}

	public function get_levelsview($slug = FALSE){
		if($slug === FALSE){
			$this->db->order_by('lvl_id', 'ASC');
			$query = $this->db->get('users_level');
			return $query->result_array();
		}
		$query = $this->db->get_where('users_level', array('lvl_slug' => $slug));
		return $query->row_array();
	}

	public function add_levels(){
		$slug = url_title($this->input->post('lvl_name'));
		$data = array(
			'lvl_name' => $this->input->post('lvl_name'),
			'lvl_slug' => strtolower($slug),
			'lvl_description' => $this->input->post('lvl_description'),
			'lvl_created_at' => $this->input->post('lvl_created_at', array('type' => 'timestamp')),
			'lvl_created_by' => $this->fungsi->user_login()->usr_id
		);
		return $this->db->insert('users_level', $data);
	}

	public function update_levels(){
		$slug = url_title($this->input->post('lvl_name'));
		$data = array(
			'lvl_name' => $this->input->post('lvl_name'),
			'lvl_slug' => strtolower($slug),
			'lvl_description' => $this->input->post('lvl_description'),
			'lvl_edited_at' => $this->input->post('lvl_edited_at', array('type' => 'timestamp')),
			'lvl_edited_by' => $this->fungsi->user_login()->usr_id
		);
		$this->db->where('lvl_id', $this->input->post('lvl_id'));
		return $this->db->update('users_level', $data);
	}

	public function delete_levels($id){
		$this->db->where('lvl_id', $id);
		$this->db->delete('users_level');
		return TRUE;
	}

}