<?php

class Fungsi
{
	
	protected $ci;

	function __construct(){
		$this->ci =& get_instance();
	}

	function user_login(){
		$this->ci->load->model('users_m');
		$users_id = $this->ci->session->userdata('userid');
		$users_data = $this->ci->users_m->get($users_id)->row();
		return $users_data;
	}
}