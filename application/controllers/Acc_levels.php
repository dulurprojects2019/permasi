<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acc_levels extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		check_not_login();
		check_bukan_level_staff();
	}

	public function index()
	{
		$data['levels'] 		= $this->levels_m->get_levels();
		$data['iconbar'] 		= $this->global_m->get_iconbar();
		$data['title_header'] 	= "Levels List";
		$data['title_menu'] 	= "Add Level";
		$data['controllers'] 	= "levels";
		$this->temp_backend->load('backend/theme/template', 'backend/accounts/levels/levels_list', $data);
	}

	public function add(){
		$data['iconbar'] 		= $this->global_m->get_iconbar();
		$data['title_header'] 	= "Add Levels";
		$data['title_menu'] 	= "List Levels";
		$data['controllers'] 	= "levels";

		$this->form_validation->set_rules('lvl_name', 'Level Name', 'required|is_unique[users_level.lvl_name]');

		$this->form_validation->set_message('required', '%s Empty, Please Input..');
		$this->form_validation->set_message('is_unique', '%s Already Exist, Please Input Another Level Name..');

		if($this->form_validation->run() === FALSE){
			$this->temp_backend->load('backend/theme/template', 'backend/accounts/levels/levels_form_add', $data);
			$this->session->set_flashdata('error', "Data Gagal Disimpan");
		} else {
			$this->levels_m->add_levels();
			$this->session->set_flashdata('sukses', "Data Berhasil disimpan");
			redirect('accounts/levels/levels-list');
		}		
	}

	public function edit($slug = NULL){
		$data['levels'] 		= $this->levels_m->get_levelsview($slug);
		$data['iconbar'] 		= $this->global_m->get_iconbar();
		$data['title_header'] 	= "Edit Levels";
		$data['title_menu'] 	= "List Levels";
		$data['controllers'] 	= "levels";

		if(empty($data['levels'])){
			show_404();
		}

		$this->form_validation->set_rules('lvl_name', 'Level Name', 'required|callback_levels_check');

		$this->form_validation->set_message('required', '%s Empty, Please Input..');

		if($this->form_validation->run() === FALSE){
			$this->temp_backend->load('backend/theme/template', 'backend/accounts/levels/levels_form_edit', $data);
		} else {
			$this->levels_m->update_levels();
			redirect('accounts/levels/levels-list');
		}
	}

	public function levels_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM users_level WHERE lvl_name = '$post[lvl_name]' AND lvl_id != '$post[lvl_id]'");
		if($query->num_rows() > 0){
			$this->form_validation->set_message('levels_check', '{field} Already Exist, Please Input Another Level Name');
			return FALSE;
		}
			return TRUE;
	}

	public function delete($id){
		$id = decrypt_url($id);
		$this->levels_m->delete_levels($id);
		redirect('accounts/levels/levels-list');
	}
}
