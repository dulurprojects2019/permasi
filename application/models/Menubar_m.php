<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menubar_m extends CI_Model {

	public function get_menubar($id = FALSE){
		if($id === FALSE){
			$this->db->order_by('mnb_id', 'ASC');
			$query = $this->db->get('menubar');
			return $query->result_array();
		}
		$query = $this->db->get_where('menubar', array('mnb_id' => $id));
		return $query->row_array();
	}

	public function get_menubarview($slug = FALSE){
		if($slug === FALSE){
			$this->db->order_by('mnb_id', 'ASC');
			$query = $this->db->get('menubar');
			return $query->result_array();
		}
		$query = $this->db->get_where('menubar', array('mnb_slug' => $slug));
		return $query->row_array();
	}

	public function add_menubar($menubar){
		$slug = url_title($this->input->post('mnb_name'));
		$data = array(
			'mnb_name'			=> $this->input->post('mnb_name'),
			'mnb_slug	' 		=> strtolower($slug),
			'mnb_image	' 		=> $menubar,
			'mnb_created_at'	=> $this->input->post('mnb_created_at', array('type' => 'timestamp')),
			'mnb_created_by'	=> $this->fungsi->user_login()->usr_id
		);
		return $this->db->insert('menubar', $data);
	}

	public function update_menubar($menubar){
		$slug = url_title($this->input->post('mnb_name'));
		$data = array(
			'mnb_name'			=> $this->input->post('mnb_name'),
			'mnb_slug	' 		=> strtolower($slug),
			'mnb_image	' 		=> $menubar,
			'mnb_edited_at' 	=> $this->input->post('mnb_edited_at', array('type' => 'timestamp')),
			'mnb_edited_by' 	=> $this->fungsi->user_login()->usr_id
		);
		$this->db->where('mnb_id', $this->input->post('mnb_id'));
		return $this->db->update('menubar', $data);
	}

	public function ambil_id_gambar($id){
	$this->db->from('menubar');
	$this->db->where('mnb_id', $id);
	$result = $this->db->get('');
	// periksa ada datanya atau tidak
		if ($result->num_rows() > 0) {
		  return $result->row();//ambil datanya berdasrka row id
		}
	}

	public function delete_menubar($id){
		$this->db->where('mnb_id', $id);
		$this->db->delete('menubar');
		return TRUE;
	}

}