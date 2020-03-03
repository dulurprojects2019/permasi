<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menubar extends CI_Controller {

	function __construct(){
		parent::__construct();		
		check_not_login();
		check_bukan_level_staff();
	}

	public function index(){
		$data['menubar'] 		= $this->menubar_m->get_menubar();
		$data['iconbar'] 		= $this->iconbar_m->get_iconbar();
		$data['users'] 			= $this->global_m->get_users();
		$data['title_header'] 	= "Menubar";
		$data['title_menu'] 	= "Add Menubar";
		$data['controllers'] 	= "menubar";
		$this->temp_backend->load('backend/theme/template', 'backend/settings/menubar/menubar_list', $data);
	}

	public function add(){
		$data['iconbar'] = $this->global_m->get_iconbar();
		$data['title_header'] 	= "Add Menubar";
		$data['title_menu'] 	= "Menubar";
		$data['controllers'] 	= "menubar";

		$this->form_validation->set_rules('mnb_name', 'Menu Bar Name', 'required|is_unique[menubar.mnb_name]');
		$this->form_validation->set_rules('mnb_image', 'Menu Bar Image', 'callback_validate_image');
		
		$this->form_validation->set_message('required', '%s Empty, Please Input..');
		$this->form_validation->set_message('is_unique', '%s Already Exist, Please Input Another Menu Bar Name..');

		if($this->form_validation->run() === FALSE){
			$this->temp_backend->load('backend/theme/template', 'backend/settings/menubar/menubar_form_add', $data);
		} else {
			$config['upload_path'] = './assets/img/settings/menubar';
			$config['allowed_types'] = 'png|jpg|jpeg|gif';

			date_default_timezone_set('Asia/Jakarta');
			$rename = date('d-m-Y His ').strtolower($this->input->post('mnb_name'));
			$config['file_name'] = $rename;

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('mnb_image')){
				$errors = array('error' => $this->upload->display_errors());
				$menubar = 'nomenubar.png';
			} else {
				$dataslidehomepage = $this->upload->data();
				$menubar = $dataslidehomepage['file_name'];
			}

			$this->menubar_m->add_menubar($menubar);
			redirect('settings/menubar');
		}
	}

	public function edit($slug = NULL){
		$data['menubar'] 		= $this->menubar_m->get_menubarview($slug);
		$data['iconbar'] 		= $this->global_m->get_iconbar();
		$data['title_header'] 	= "Edit Iconbar";
		$data['title_menu'] 	= "Iconbar";
		$data['controllers'] 	= "menubar";

		if(empty($data['menubar'])){
			show_404();
		}

		$this->form_validation->set_rules('mnb_name', 'Menu Bar Name', 'required|callback_menubar_check');
		$this->form_validation->set_rules('mnb_image', 'Menu Bar Image', 'callback_validate_image_edit');

		$this->form_validation->set_message('required', '%s Empty, Please Input..');

		if($this->form_validation->run() === FALSE){
			$this->temp_backend->load('backend/theme/template', 'backend/settings/menubar/menubar_form_edit', $data);
		} else {
			$id = $this->input->post('mnb_id');
			$config['upload_path'] = './assets/img/settings/menubar';
			$config['allowed_types'] = 'png';			

			date_default_timezone_set('Asia/Jakarta');
			$rename = date('dmY His').strtolower($this->input->post('mnb_name'));
			$config['file_name'] = $rename;

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('mnb_image')){
				$errors = array('error' => $this->upload->display_errors());
				$menubar = $this->input->post('photos');
			} else {
				$data = $this->menubar_m->ambil_id_gambar($id);
				$path = './assets/img/settings/menubar/';
				$nama = $path.$data->mnb_image;

				if(file_exists($nama) && unlink($nama)){
					$dataphotos = $this->upload->data();
					$menubar = $dataphotos['file_name'];
				}
					$dataphotos = $this->upload->data();
					$menubar = $dataphotos['file_name'];
			}
			$this->menubar_m->update_menubar($menubar);
			redirect('settings/menubar');
		}
	}

	public function validate_image() {
    $check = TRUE;
    if ((!isset($_FILES['mnb_image'])) || $_FILES['mnb_image']['size'] == 0) {
        $this->form_validation->set_message('validate_image', '{field} Empty ..! Max Size Image 10KB!');
        $check = FALSE;
    }
    else if (isset($_FILES['mnb_image']) && $_FILES['mnb_image']['size'] != 0) {
        $allowedExts = array("png", "PNG");
        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
        $extension = pathinfo($_FILES["mnb_image"]["name"], PATHINFO_EXTENSION);
        $detectedType = exif_imagetype($_FILES['mnb_image']['tmp_name']);
        $type = $_FILES['mnb_image']['type'];
        if (!in_array($detectedType, $allowedTypes)) {
            $this->form_validation->set_message('validate_image', 'Invalid Image Content!');
            $check = FALSE;
        }
        if(filesize($_FILES['mnb_image']['tmp_name']) > '10000') {
            $this->form_validation->set_message('validate_image', 'The Image file size shoud not exceed 10KB!');
            $check = FALSE;
        }
        if(!in_array($extension, $allowedExts)) {
            $this->form_validation->set_message('validate_image', "Invalid file extension .{$extension}, Only .png format is allowed");
            $check = FALSE;
        }
    }
    return $check;
	}

	public function validate_image_edit() {
    $check = TRUE;
    if (isset($_FILES['mnb_image']) && $_FILES['mnb_image']['size'] != 0) {
        $allowedExts = array("png", "PNG");
        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
        $extension = pathinfo($_FILES["mnb_image"]["name"], PATHINFO_EXTENSION);
        $detectedType = exif_imagetype($_FILES['mnb_image']['tmp_name']);
        $type = $_FILES['mnb_image']['type'];
        if (!in_array($detectedType, $allowedTypes)) {
            $this->form_validation->set_message('validate_image_edit', 'Invalid Image Content!');
            $check = FALSE;
        }
        if(filesize($_FILES['mnb_image']['tmp_name']) > '10000') {
            $this->form_validation->set_message('validate_image_edit', 'The Image file size shoud not exceed 10KB!');
            $check = FALSE;
        }
        if(!in_array($extension, $allowedExts)) {
            $this->form_validation->set_message('validate_image_edit', "Invalid file extension .{$extension}, Only .png format is allowed");
            $check = FALSE;
        }
    }
    return $check;
	}

	public function menubar_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM menubar WHERE mnb_name = '$post[mnb_name]' AND mnb_id != '$post[mnb_id]'");
		if($query->num_rows() > 0){
			$this->form_validation->set_message('menubar_check', '{field} Already Exist, Please Input Another Menu Bar Name');
			return FALSE;
		}
			return TRUE;
	}

	public function delete($id){
		$id = decrypt_url($id);
		$data = $this->menubar_m->ambil_id_gambar($id);//ambil id gambar	  
		$path = './assets/img/settings/menubar/';// lokasi gambar berada
		unlink($path.$data->mnb_image);// hapus data di folder dimana data tersimpan
		$this->menubar_m->delete_menubar($id);
		redirect('settings/menubar');
	}

}
