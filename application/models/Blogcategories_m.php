<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogcategories_m extends CI_Model {

	public function get_categories($id = FALSE){
		if($id === FALSE){
			$this->db->order_by('cat_id', 'DESC');
			$query = $this->db->get('blogs_category');
			return $query->result_array();
		}
		$query = $this->db->get_where('blogs_category', array('cat_id' => $id));
		return $query->row_array();
	}

	public function get_categoriesview($slug = FALSE){
		if($slug === FALSE){
			$this->db->order_by('cat_id', 'ASC');
			$query = $this->db->get('blogs_category');
			return $query->result_array();
		}
		$query = $this->db->get_where('blogs_category', array('cat_slug' => $slug));
		return $query->row_array();
	}

	public function add_categories($photo){
		$slug = url_title($this->input->post('cat_name'));
		$data = array(
			'cat_name' 			=> $this->input->post('cat_name'),
			'cat_slug' 			=> strtolower($slug),
			'cat_color' 		=> $this->input->post('cat_color'),
			'cat_description' 	=> $this->input->post('cat_description'),
			'cat_image' 		=> $photo,
			'cat_created_at' 	=> $this->input->post('cat_created_at', array('type' => 'timestamp')),
			'cat_created_by' 	=> $this->fungsi->user_login()->usr_id
		);
		return $this->db->insert('blogs_category', $data);
	}

	public function update_categories($photo){
		$slug = url_title($this->input->post('cat_name'));
		$data = array(
			'cat_name' 			=> $this->input->post('cat_name'),
			'cat_slug' 			=> strtolower($slug),
			'cat_color' 		=> $this->input->post('cat_color'),
			'cat_description' 	=> $this->input->post('cat_description'),
			'cat_image' 		=> $photo,
			'cat_edited_at' 	=> $this->input->post('cat_created_at', array('type' => 'timestamp')),
			'cat_edited_by' 	=> $this->fungsi->user_login()->usr_id
		);
		$this->db->where('cat_id', $this->input->post('cat_id'));
		return $this->db->update('blogs_category', $data);
	}

	public function ambil_id_gambar($id){
	$this->db->from('blogs_category');
	$this->db->where('cat_id', $id);
	$result = $this->db->get('');
	// periksa ada datanya atau tidak
		if ($result->num_rows() > 0) {
		  return $result->row();//ambil datanya berdasrka row id
		}
	}

	public function delete_categories($id){
		$this->db->where('cat_id', $id);
		$this->db->delete('blogs_category');
		return TRUE;
	}

}