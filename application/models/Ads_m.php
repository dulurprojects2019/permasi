<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ads_m extends CI_Model {

	public function get_ads($id = FALSE){
		if($id === FALSE){
			$this->db->order_by('ads_id', 'DESC');
			$query = $this->db->get('ads');
			return $query->result_array();
		}
		$query = $this->db->get_where('ads', array('ads_id' => $id));
		return $query->row_array();
	}

	public function get_adsview($slug = FALSE){
		if($slug === FALSE){
			$this->db->order_by('ads_id', 'ASC');
			$query = $this->db->get('ads');
			return $query->result_array();
		}
		$query = $this->db->get_where('ads', array('ads_slug' => $slug));
		return $query->row_array();
	}

	public function add_ads($ads){
		$slug = url_title($this->input->post('ads_name'));
		$data = array(
			'ads_name'			=> $this->input->post('ads_name'),
			'ads_slug	' 		=> strtolower($slug),
			'ads_position'		=> $this->input->post('ads_position'),
			'ads_link'			=> $this->input->post('ads_link'),
			'ads_image	' 		=> $ads,
			'ads_created_at'	=> $this->input->post('ads_created_at', array('type' => 'timestamp')),
			'ads_created_by'	=> $this->fungsi->user_login()->usr_id
		);
		return $this->db->insert('ads', $data);
	}

	public function update_ads($ads){
		$slug = url_title($this->input->post('ads_name'));
		$data = array(
			'ads_name'			=> $this->input->post('ads_name'),
			'ads_slug	' 		=> strtolower($slug),
			'ads_position'		=> $this->input->post('ads_position'),
			'ads_link'			=> $this->input->post('ads_link'),
			'ads_image	' 		=> $ads,
			'ads_edited_at' 	=> $this->input->post('ads_edited_at', array('type' => 'timestamp')),
			'ads_edited_by' 	=> $this->fungsi->user_login()->usr_id
		);
		$this->db->where('ads_id', $this->input->post('ads_id'));
		return $this->db->update('ads', $data);
	}

	public function ambil_id_gambar($id){
	$this->db->from('ads');
	$this->db->where('ads_id', $id);
	$result = $this->db->get('');
	// periksa ada datanya atau tidak
		if ($result->num_rows() > 0) {
		  return $result->row();//ambil datanya berdasrka row id
		}
	}

	public function delete_ads($id){
		$this->db->where('ads_id', $id);
		$this->db->delete('ads');
		return TRUE;
	}

}