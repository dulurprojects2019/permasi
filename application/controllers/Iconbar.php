<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iconbar extends CI_Controller {

	function __construct(){
		parent::__construct();		
		check_not_login();
		check_bukan_level_staff();
	}

	public function index(){
		$data['iconbar'] 		= $this->iconbar_m->get_iconbar();
		$data['users'] 			= $this->global_m->get_users();
		$data['title_header'] 	= "Iconbar";
		$data['title_menu'] 	= "Add Iconbar";
		$data['controllers'] 	= "iconbar";
		$this->temp_backend->load('backend/theme/template', 'backend/settings/iconbar/iconbar_list', $data);
	}

	public function add(){
		$data['iconbar'] = $this->global_m->get_iconbar();
		$data['title_header'] 	= "Add Iconbar";
		$data['title_menu'] 	= "Iconbar";
		$data['controllers'] 	= "iconbar";

		$this->form_validation->set_rules('icb_name', 'Icon Bar Name', 'required|is_unique[iconbar.icb_name]');
		$this->form_validation->set_rules('icb_image', 'Iconbar Image', 'callback_validate_image');
		
		$this->form_validation->set_message('required', '%s Empty, Please Input..');
		$this->form_validation->set_message('is_unique', '%s Already Exist, Please Input Another Icon Bar Name..');

		if($this->form_validation->run() === FALSE){
			$this->temp_backend->load('backend/theme/template', 'backend/settings/iconbar/iconbar_form_add', $data);
		} else {
			$config['upload_path'] = './assets/img/settings/iconbar';
			$config['allowed_types'] = 'png|jpg|jpeg|gif';

			date_default_timezone_set('Asia/Jakarta');
			$rename = date('d-m-Y His ').strtolower($this->input->post('icb_name'));
			$config['file_name'] = $rename;

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('icb_image')){
				$errors = array('error' => $this->upload->display_errors());
				$iconbar = 'bar.png';
			} else {
				$dataslidehomepage = $this->upload->data();
				$iconbar = $dataslidehomepage['file_name'];
			}

			$this->iconbar_m->add_iconbar($iconbar);
			redirect('settings/iconbar');
		}
	}

	public function edit($slug = NULL){
		$data['iconbars'] 		= $this->iconbar_m->get_iconbarview($slug);
		$data['iconbar'] 		= $this->global_m->get_iconbar();
		$data['title_header'] 	= "Edit Iconbar";
		$data['title_menu'] 	= "Iconbar";
		$data['controllers'] 	= "iconbar";

		if(empty($data['iconbars'])){
			show_404();
		}

		$this->form_validation->set_rules('icb_name', 'Icon Bar Name', 'required|callback_iconbar_check');
		$this->form_validation->set_rules('icb_image', 'Icon Bar', 'callback_validate_image_edit');

		$this->form_validation->set_message('required', '%s Empty, Please Input..');

		if($this->form_validation->run() === FALSE){
			$this->temp_backend->load('backend/theme/template', 'backend/settings/iconbar/iconbar_form_edit', $data);
		} else {
			$id = $this->input->post('icb_id');
			$config['upload_path'] = './assets/img/settings/iconbar';
			$config['allowed_types'] = 'png';			

			date_default_timezone_set('Asia/Jakarta');
			$rename = date('dmY His').strtolower($this->input->post('icb_name'));
			$config['file_name'] = $rename;

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('icb_image')){
				$errors = array('error' => $this->upload->display_errors());
				$iconbar = $this->input->post('photos');
			} else {
				$data = $this->iconbar_m->ambil_id_gambar($id);
				$path = './assets/img/settings/iconbar/';
				$nama = $path.$data->icb_image;

				if(file_exists($nama) && unlink($nama)){
					$dataphotos = $this->upload->data();
					$iconbar = $dataphotos['file_name'];
				}
					$dataphotos = $this->upload->data();
					$iconbar = $dataphotos['file_name'];
			}
			$this->iconbar_m->update_iconbar($iconbar);
			redirect('settings/iconbar');
		}
	}

	public function validate_image() {
    $check = TRUE;
    if ((!isset($_FILES['icb_image'])) || $_FILES['icb_image']['size'] == 0) {
        $this->form_validation->set_message('validate_image', '{field} Empty ..!');
        $check = FALSE;
    }
    else if (isset($_FILES['icb_image']) && $_FILES['icb_image']['size'] != 0) {
        $allowedExts = array("png", "PNG");
        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
        $extension = pathinfo($_FILES["icb_image"]["name"], PATHINFO_EXTENSION);
        $detectedType = exif_imagetype($_FILES['icb_image']['tmp_name']);
        $type = $_FILES['icb_image']['type'];
        if (!in_array($detectedType, $allowedTypes)) {
            $this->form_validation->set_message('validate_image', 'Invalid Image Content!');
            $check = FALSE;
        }
        if(filesize($_FILES['icb_image']['tmp_name']) > '50000') {
            $this->form_validation->set_message('validate_image', 'The Image file size shoud not exceed 50KB!');
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
    if (isset($_FILES['icb_image']) && $_FILES['icb_image']['size'] != 0) {
        $allowedExts = array("png", "PNG");
        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
        $extension = pathinfo($_FILES["icb_image"]["name"], PATHINFO_EXTENSION);
        $detectedType = exif_imagetype($_FILES['icb_image']['tmp_name']);
        $type = $_FILES['icb_image']['type'];
        if (!in_array($detectedType, $allowedTypes)) {
            $this->form_validation->set_message('validate_image_edit', 'Invalid Image Content!');
            $check = FALSE;
        }
        if(filesize($_FILES['icb_image']['tmp_name']) > '50000') {
            $this->form_validation->set_message('validate_image_edit', 'The Image file size shoud not exceed 50KB!');
            $check = FALSE;
        }
        if(!in_array($extension, $allowedExts)) {
            $this->form_validation->set_message('validate_image_edit', "Invalid file extension .{$extension}, Only .png format is allowed");
            $check = FALSE;
        }
    }
    return $check;
	}

	public function iconbar_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM iconbar WHERE icb_name = '$post[icb_name]' AND icb_id != '$post[icb_id]'");
		if($query->num_rows() > 0){
			$this->form_validation->set_message('iconbar_check', '{field} Already Exist, Please Input Another Icon Bar Name');
			return FALSE;
		}
			return TRUE;
	}

	public function delete($id){
		$id = decrypt_url($id);
		$data = $this->iconbar_m->ambil_id_gambar($id);//ambil id gambar	  
		$path = './assets/img/settings/iconbar/';// lokasi gambar berada
		unlink($path.$data->icb_image);// hapus data di folder dimana data tersimpan
		$this->iconbar_m->delete_iconbar($id);
		redirect('settings/iconbar');
	}

}
