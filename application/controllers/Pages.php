<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		check_not_login();
		check_bukan_level_staff();
	}

	public function index()
	{
		$data['pages'] 			= $this->pages_m->get_pages();
		$data['users'] 			= $this->global_m->get_users();
		$data['iconbar'] 		= $this->global_m->get_iconbar();
		$data['title_header'] 	= "Pages List";
		$data['title_menu'] 	= "Add Page";
		$data['controllers'] 	= "pages";
		
		$this->temp_backend->load('backend/theme/template', 'backend/pages/pages/pages_list', $data);
	}

	public function add(){
		$data['iconbar'] 		= $this->global_m->get_iconbar();
		$data['title_header'] 	= 'Add Page';
		$data['title_menu'] 	= "Pages List";
		$data['controllers'] 	= "pages";

		$this->form_validation->set_rules('pgs_name', 'Page Name', 'required|is_unique[pages.pgs_name]');
		$this->form_validation->set_rules('pgs_tags[]', 'Tags', 'required');
		$this->form_validation->set_rules('pgs_image', 'Image', 'callback_validate_image');

		$this->form_validation->set_message('required', '%s Empty, Please Input..');
		$this->form_validation->set_message('is_unique', '%s Already Exist, Please Input Another Blog Name..');

		if($this->form_validation->run() === FALSE){
			$this->temp_backend->load('backend/theme/template', 'backend/pages/pages/pages_form_add', $data);
		} else {
			$config['upload_path'] = './assets/img/pages';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			date_default_timezone_set('Asia/Jakarta');
			$rename = date('d-m-Y His ').strtolower($this->input->post('pgs_name'));
			$config['file_name'] = $rename;

			$this->load->helper('file');
			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('pgs_image')){
				$errors = array('error' => $this->upload->display_errors());
				$image = 'noimagepages.png';
			} else {
				$dataimages = $this->upload->data();
				$image = $dataimages['file_name'];
			}

			$this->pages_m->add_pages($image);
			redirect('pages/pages-list');
		}
	}

	public function edit($slug = NULL){
		$data['pages'] 			= $this->pages_m->get_pagesview($slug);
		$data['iconbar'] 		= $this->global_m->get_iconbar();
		$data['title_header'] 	= 'Edit Page';
		$data['title_menu'] 	= "pages List";
		$data['controllers'] 	= "pages";

		if(empty($data['pages'])){
			show_404();
		}

		$this->form_validation->set_rules('pgs_name', 'Page Name', 'required|callback_pages_name_check');
		$this->form_validation->set_rules('pgs_tags[]', 'Tags', 'required');
		$this->form_validation->set_rules('pgs_image', 'Image', 'callback_validate_image');

		$this->form_validation->set_message('required', '%s Empty, Please Input..');

		if($this->form_validation->run() === FALSE){
			$this->temp_backend->load('backend/theme/template', 'backend/pages/pages/pages_form_edit', $data);
		} else {
			$id = $this->input->post('pgs_id');
			$config['upload_path'] = './assets/img/pages';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			date_default_timezone_set('Asia/Jakarta');
			$rename = date('d-m-Y His ').strtolower($this->input->post('pgs_name'));
			$config['file_name'] = $rename;

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('pgs_image')){
				$errors = array('error' => $this->upload->display_errors());
				$image = $this->input->post('images');
			} else {
				$data = $this->pages_m->ambil_id_gambar($id);
				$path = './assets/img/pages/';
				$nama = $path.$data->pgs_image;

				if(file_exists($nama) && unlink($nama)){
					$dataimages = $this->upload->data();
					$image = $dataimages['file_name'];
				}
					$dataimages = $this->upload->data();
					$image = $dataimages['file_name'];
			}
			$this->pages_m->update_pages($image);
			redirect('pages/pages-list');
		}
	}

	public function validate_image() {
    $check = TRUE;
    if (isset($_FILES['pgs_image']) && $_FILES['pgs_image']['size'] != 0) {
        $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
        $extension = pathinfo($_FILES["pgs_image"]["name"], PATHINFO_EXTENSION);
        $detectedType = exif_imagetype($_FILES['pgs_image']['tmp_name']);
        $type = $_FILES['pgs_image']['type'];
        if (!in_array($detectedType, $allowedTypes)) {
            $this->form_validation->set_message('validate_image', 'Invalid Image Content!');
            $check = FALSE;
        }
        if(filesize($_FILES['pgs_image']['tmp_name']) > 3000000) {
            $this->form_validation->set_message('validate_image', 'The Image file size shoud not exceed 3MB!');
            $check = FALSE;
        }
        if(!in_array($extension, $allowedExts)) {
            $this->form_validation->set_message('validate_image', "Invalid file extension {$extension}, Only .gif | .jpeg | .jpg | .png format is allowed");
            $check = FALSE;
        }
    }
    return $check;
	}

	public function pages_name_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM pages WHERE pgs_name = '$post[pgs_name]' AND pgs_id != '$post[pgs_id]'");
		if($query->num_rows() > 0){
			$this->form_validation->set_message('pages_check', '{field} Already Exist, Please Input Another Page Name');
			return FALSE;
		}
			return TRUE;
	}

	public function delete($id){
		check_bukan_level_staff();
		$id 	= decrypt_url($id);
		$data 	= $this->pages_m->ambil_id_gambar($id);//ambil id gambar	  
		$path 	= './assets/img/pages/';// lokasi gambar berada
		unlink($path.$data->pgs_image);// hapus data di folder dimana data tersimpan
		$this->pages_m->delete_pages($id);
		redirect('pages/pages-list');
	}
}
