<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ads extends CI_Controller {

	function __construct(){
		parent::__construct();		
		check_not_login();
		check_bukan_level_staff();
	}

	public function index(){
		$data['ads'] 			= $this->ads_m->get_ads();
		$data['iconbar'] 		= $this->global_m->get_iconbar();
		$data['users'] 			= $this->global_m->get_users();
		$data['title_header'] 	= "Ads";
		$data['title_menu'] 	= "Add Ads";
		$data['controllers'] 	= "ads";
		$this->temp_backend->load('backend/theme/template', 'backend/ads/ads_list', $data);
	}

	public function add(){
		$data['iconbar'] 		= $this->global_m->get_iconbar();
		$data['title_header'] 	= "Add Ads";
		$data['title_menu'] 	= "Ads";
		$data['controllers'] 	= "ads";

		$this->form_validation->set_rules('ads_name', 'Ads Name', 'required|is_unique[ads.ads_name]');
		$this->form_validation->set_rules('ads_position', 'Ads Position', 'required');
		$this->form_validation->set_rules('ads_image', 'Ads Image', 'callback_validate_image');
		
		$this->form_validation->set_message('required', '%s Empty..!');
		$this->form_validation->set_message('is_unique', '%s Already Exist, Please Input Another Ads Name..');

		if($this->form_validation->run() === FALSE){
			$this->temp_backend->load('backend/theme/template', 'backend/ads/ads_form_add', $data);
		} else {
			$config['upload_path'] = './assets/img/ads';
			$config['allowed_types'] = 'png|jpg|jpeg|gif';

			date_default_timezone_set('Asia/Jakarta');
			$rename = date('d-m-Y His ').strtolower($this->input->post('ads_name'));
			$config['file_name'] = $rename;

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('ads_image')){
				$errors = array('error' => $this->upload->display_errors());
				$ads = 'noimageads.png';
			} else {
				$dataslidehomepage = $this->upload->data();
				$ads = $dataslidehomepage['file_name'];
			}

			$this->ads_m->add_ads($ads);
			redirect('ads/ads-list');
		}
	}

	public function edit($slug = NULL){
		$data['ads'] 			= $this->ads_m->get_adsview($slug);
		$data['iconbar'] 		= $this->global_m->get_iconbar();
		$data['title_header'] 	= "Edit Ads";
		$data['title_menu'] 	= "Ads";
		$data['controllers'] 	= "ads";

		if(empty($data['ads'])){
			show_404();
		}

		$this->form_validation->set_rules('ads_name', 'Ads Name', 'required|callback_ads_check');
		$this->form_validation->set_rules('ads_position', 'Ads Position', 'required');
		$this->form_validation->set_rules('ads_image', 'Ads', 'callback_validate_image_edit');

		$this->form_validation->set_message('required', '%s Empty, Please Input..');

		if($this->form_validation->run() === FALSE){
			$this->temp_backend->load('backend/theme/template', 'backend/ads/ads_form_edit', $data);
		} else {
			$id = $this->input->post('ads_id');
			$config['upload_path'] = './assets/img/ads';
			$config['allowed_types'] = 'png|jpg|jpeg|gif';			

			date_default_timezone_set('Asia/Jakarta');
			$rename = date('dmY His').strtolower($this->input->post('ads_name'));
			$config['file_name'] = $rename;

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('ads_image')){
				$errors = array('error' => $this->upload->display_errors());
				$ads = $this->input->post('photos');
			} else {
				$data = $this->ads_m->ambil_id_gambar($id);
				$path = './assets/img/ads/';
				$nama = $path.$data->ads_image;

				if(file_exists($nama) && unlink($nama)){
					$dataphotos = $this->upload->data();
					$ads = $dataphotos['file_name'];
				}
					$dataphotos = $this->upload->data();
					$ads = $dataphotos['file_name'];
			}
			$this->ads_m->update_ads($ads);
			redirect('ads/ads-list');
		}
	}

	public function validate_image() {
    $check = TRUE;
    if ((!isset($_FILES['ads_image'])) || $_FILES['ads_image']['size'] == 0) {
        $this->form_validation->set_message('validate_image', '{field} Empty ..!');
        $check = FALSE;
    }
    else if (isset($_FILES['ads_image']) && $_FILES['ads_image']['size'] != 0) {
        $allowedExts = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "gif", "GIF");
        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
        $extension = pathinfo($_FILES["ads_image"]["name"], PATHINFO_EXTENSION);
        $detectedType = exif_imagetype($_FILES['ads_image']['tmp_name']);
        $type = $_FILES['ads_image']['type'];
        if (!in_array($detectedType, $allowedTypes)) {
            $this->form_validation->set_message('validate_image', 'Invalid Image Content!');
            $check = FALSE;
        }
        if(filesize($_FILES['ads_image']['tmp_name']) > '50000') {
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
    if (isset($_FILES['ads_image']) && $_FILES['ads_image']['size'] != 0) {
        $allowedExts = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "gif", "GIF");
        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
        $extension = pathinfo($_FILES["ads_image"]["name"], PATHINFO_EXTENSION);
        $detectedType = exif_imagetype($_FILES['ads_image']['tmp_name']);
        $type = $_FILES['ads_image']['type'];
        if (!in_array($detectedType, $allowedTypes)) {
            $this->form_validation->set_message('validate_image_edit', 'Invalid Image Content!');
            $check = FALSE;
        }
        if(filesize($_FILES['ads_image']['tmp_name']) > '50000') {
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

	public function ads_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM ads WHERE ads_name = '$post[ads_name]' AND ads_id != '$post[ads_id]'");
		if($query->num_rows() > 0){
			$this->form_validation->set_message('ads_check', '{field} Already Exist, Please Input Another Ads Name');
			return FALSE;
		}
			return TRUE;
	}

	public function delete($id){
		$id = decrypt_url($id);
		$data = $this->ads_m->ambil_id_gambar($id);//ambil id gambar	  
		$path = './assets/img/ads/';// lokasi gambar berada
		unlink($path.$data->ads_image);// hapus data di folder dimana data tersimpan
		$this->ads_m->delete_ads($id);
		redirect('ads/ads-list');
	}

}
