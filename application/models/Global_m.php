<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Global_m extends CI_Model {

	public function get_levels($id = FALSE){
		if($id === FALSE){
			$this->db->order_by('lvl_id', 'ASC');
			$query = $this->db->get('users_levels');
			return $query->result_array();
		}
		$query = $this->db->get_where('users_levels', array('lvl_id' => $id));
		return $query->row_array();
	}

	public function get_users($id = FALSE){
		if($id === FALSE){
			$this->db->order_by('usr_id', 'DESC');
			$query = $this->db->get('users');
			return $query->result_array();
		}
		$query = $this->db->get_where('users', array('usr_id' => $id));
		return $query->row_array();
	}

	public function get_usersview($slug = FALSE){
		if($slug === FALSE){
			$this->db->order_by('usr_id', 'DESC');
			$query = $this->db->get('users');
			return $query->result_array();
		}
		$query = $this->db->get_where('users', array('usr_slug' => $slug));
		return $query->row_array();
	}

	public function get_iconbar($id = FALSE){
		if($id === FALSE){
			$this->db->order_by('icb_id', 'ASC');
			$query = $this->db->get('iconbar');
			return $query->result_array();
		}
		$query = $this->db->get_where('iconbar', array('icb_id' => $id));
		return $query->row_array();
	}

	public function get_menubar($id = FALSE){
		if($id === FALSE){
			$this->db->order_by('mnb_id', 'ASC');
			$query = $this->db->get('menubar');
			return $query->result_array();
		}
		$query = $this->db->get_where('menubar', array('mnb_id' => $id));
		return $query->row_array();
	}

	public function get_ads($id = FALSE){
		if($id === FALSE){
			$this->db->order_by('ads_id', 'DESC');
			$query = $this->db->get('ads');
			return $query->result_array();
		}
		$query = $this->db->get_where('ads', array('ads_id' => $id));
		return $query->row_array();
	}

	public function get_blogs_category($id = FALSE){
		if($id === FALSE){
			$query = $this->db->get('blogs_category');
			return $query->result_array();
		}
		$query = $this->db->get_where('blogs_category', array('cat_id' => $id));
		return $query->row_array();
	}

	public function get_blogs_category_page($slug = FALSE){
		if($slug === FALSE){
			$query = $this->db->get('blogs_category');
			return $query->result_array();
		}
		$query = $this->db->get_where('blogs_category', array('cat_slug' => $slug));
		return $query->row_array();
	}

	public function get_blogs($id = FALSE){
		if($id === FALSE){
			$this->db->order_by('rand()');
			$this->db->where('blg_status', '1');
			$query = $this->db->get('blogs');
			return $query->result_array();
		}
		$query = $this->db->get_where('blogs', array('blg_id' => $id));
		return $query->row_array();
	}

	public function get_blogs_latest($id = FALSE){
		if($id === FALSE){
			$this->db->order_by('blg_id', 'DESC');
			$this->db->where('blg_status', '1');
			$query = $this->db->get('blogs');
			return $query->result_array();
		}
		$query = $this->db->get_where('blogs', array('blg_id' => $id));
		return $query->row_array();
	}

	public function get_blogs_longest($id = FALSE){
		if($id === FALSE){
			$this->db->where('blg_status', '1');
			$query = $this->db->get('blogs');
			return $query->result_array();
		}
		$query = $this->db->get_where('blogs', array('blg_id' => $id));
		return $query->row_array();
	}

	public function get_blogs_page($slug = FALSE){
		if($slug === FALSE){
			$this->db->where('blg_status', '1');
			$query = $this->db->get('blogs');
			return $query->result_array();
		}
		$query = $this->db->get_where('blogs', array('blg_slug' => $slug));
		return $query->row_array();
	}

	// count categories
	public function count($blogscategory){
		$sql 	= "SELECT COUNT(blg_id) as count_id FROM blogs WHERE blg_cat_id LIKE '%$blogscategory%'";
		$result = $this->db->query($sql);
		return $result->row()->count_id;
	}

	public function get_pages($id = FALSE){
		if($id === FALSE){
			$this->db->order_by('pgs_id', 'DESC');
			$query = $this->db->get('pages');
			return $query->result_array();
		}
		$query = $this->db->get_where('pages', array('pgs_id' => $id));
		return $query->row_array();
	}

	public function get_pages_view($slug = FALSE){
		if($slug === FALSE){
			$this->db->order_by('pgs_id', 'ASC');
			$query = $this->db->get('pages');
			return $query->result_array();
		}
		$query = $this->db->get_where('pages', array('pgs_slug' => $slug));
		return $query->row_array();
	}
}