<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_m extends CI_Model {

	public function get_pages($id = FALSE){
		if($id === FALSE){
			$this->db->order_by('pgs_id', 'DESC');
			$query = $this->db->get('pages');
			return $query->result_array();
		}
		$query = $this->db->get_where('pages', array('pgs_id' => $id));
		return $query->row_array();
	}

	public function get_pagesview($slug = FALSE){
		if($slug === FALSE){
			$this->db->order_by('pgs_id', 'ASC');
			$query = $this->db->get('pages');
			return $query->result_array();
		}
		$query = $this->db->get_where('pages', array('pgs_slug' => $slug));
		return $query->row_array();
	}

	public function add_pages($image){
		$slug 					= url_title($this->input->post('pgs_name'));
		$tags 					= implode(',', $this->input->post('pgs_tags'));
		$data = array(
			'pgs_name' 			=> $this->input->post('pgs_name'),
			'pgs_slug' 			=> strtolower($slug),
			'pgs_image' 		=> $image,
			'pgs_maps_link' 	=> $this->input->post('pgs_maps_link'),
			'pgs_text_content' 	=> $this->input->post('pgs_text_content'),
			'pgs_tags' 			=> $tags,
			'pgs_created_at' 	=> $this->input->post('pgs_created_at', array('type' => 'timestamp')),
			'pgs_created_by' 	=> $this->fungsi->user_login()->usr_id
		);
		return $this->db->insert('pages', $data);
	}

	public function update_pages($image){
		$slug 					= url_title($this->input->post('pgs_name'));
		$tags 					= implode(',', $this->input->post('pgs_tags'));
		$data = array(
			'pgs_name' 			=> $this->input->post('pgs_name'),
			'pgs_slug' 			=> strtolower($slug),
			'pgs_image' 		=> $image,
			'pgs_maps_link' 	=> $this->input->post('pgs_maps_link'),
			'pgs_text_content' 	=> $this->input->post('pgs_text_content'),
			'pgs_tags' 			=> $tags,
			'pgs_edited_at' 	=> $this->input->post('pgs_created_at', array('type' => 'timestamp')),
			'pgs_edited_by' 	=> $this->fungsi->user_login()->usr_id
		);
		$this->db->where('pgs_id', $this->input->post('pgs_id'));
		return $this->db->update('pages', $data);
	}

	public function ambil_id_gambar($id){
	$this->db->from('pages');
	$this->db->where('pgs_id', $id);
	$result = $this->db->get('');
	// periksa ada datanya atau tidak
		if ($result->num_rows() > 0) {
		  return $result->row();//ambil datanya berdasrka row id
		}
	}

	public function delete_pages($id){
		$this->db->where('pgs_id', $id);
		$this->db->delete('pages');
		return TRUE;
	}

}