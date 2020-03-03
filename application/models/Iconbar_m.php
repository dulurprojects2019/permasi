<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iconbar_m extends CI_Model {

	public function get_iconbar($id = FALSE){
		if($id === FALSE){
			$this->db->order_by('icb_id', 'ASC');
			$query = $this->db->get('iconbar');
			return $query->result_array();
		}
		$query = $this->db->get_where('iconbar', array('icb_id' => $id));
		return $query->row_array();
	}

	public function get_iconbarview($slug = FALSE){
		if($slug === FALSE){
			$this->db->order_by('icb_id', 'ASC');
			$query = $this->db->get('iconbar');
			return $query->result_array();
		}
		$query = $this->db->get_where('iconbar', array('icb_slug' => $slug));
		return $query->row_array();
	}

	public function add_iconbar($iconbar){
		$slug = url_title($this->input->post('icb_name'));
		$data = array(
			'icb_name'			=> $this->input->post('icb_name'),
			'icb_slug	' 		=> strtolower($slug),
			'icb_image	' 		=> $iconbar,
			'icb_created_at'	=> $this->input->post('icb_created_at', array('type' => 'timestamp')),
			'icb_created_by'	=> $this->fungsi->user_login()->usr_id
		);
		return $this->db->insert('iconbar', $data);
	}

	public function update_iconbar($iconbar){
		$slug = url_title($this->input->post('icb_name'));
		$data = array(
			'icb_name'			=> $this->input->post('icb_name'),
			'icb_slug	' 		=> strtolower($slug),
			'icb_image	' 		=> $iconbar,
			'icb_edited_at' 	=> $this->input->post('icb_edited_at', array('type' => 'timestamp')),
			'icb_edited_by' 	=> $this->fungsi->user_login()->usr_id
		);
		$this->db->where('icb_id', $this->input->post('icb_id'));
		return $this->db->update('iconbar', $data);
	}

	public function ambil_id_gambar($id){
	$this->db->from('iconbar');
	$this->db->where('icb_id', $id);
	$result = $this->db->get('');
	// periksa ada datanya atau tidak
		if ($result->num_rows() > 0) {
		  return $result->row();//ambil datanya berdasrka row id
		}
	}

	public function delete_iconbar($id){
		$this->db->where('icb_id', $id);
		$this->db->delete('iconbar');
		return TRUE;
	}

}