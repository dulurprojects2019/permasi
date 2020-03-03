<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_categories extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		check_not_login();
		check_bukan_level_staff();
	}

	public function index()
	{
		$data['categories'] 	= $this->blogcategories_m->get_categories();
		$data['users'] 			= $this->global_m->get_users();
		$data['iconbar'] 		= $this->global_m->get_iconbar();
		$data['title_header'] 	= "Category List";
		$data['title_menu'] 	= "Add Category";
		$data['controllers'] 	= "categories";
		
		$this->temp_backend->load('backend/theme/template', 'backend/blogs/categories/category_list', $data);
	}

	public function add(){
		$data['iconbar'] 		= $this->global_m->get_iconbar();
		$data['title_header'] 	= 'Add Category';
		$data['title_menu'] 	= "Categories List";
		$data['controllers'] 	= "categories";

		$this->form_validation->set_rules('cat_name', 'Category Name', 'required|is_unique[blogs_category.cat_name]');
		$this->form_validation->set_rules('cat_image', 'Image', 'callback_validate_image');

		$this->form_validation->set_message('required', '%s Empty, Please Input..');
		$this->form_validation->set_message('is_unique', '%s Already Exist, Please Input Another Category Name..');

		if($this->form_validation->run() === FALSE){
			$this->temp_backend->load('backend/theme/template', 'backend/blogs/categories/category_form_add', $data);
		} else {
			$config['upload_path'] = './assets/img/blogs/categories';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			date_default_timezone_set('Asia/Jakarta');
			$rename = date('d-m-Y His ').strtolower($this->input->post('cat_name'));
			$config['file_name'] = $rename;

			$this->load->helper('file');
			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('cat_image')){
				$errors = array('error' => $this->upload->display_errors());
				$image = 'noimagecategories.png';
			} else {
				$dataimages = $this->upload->data();
				$image = $dataimages['file_name'];
			}

			$this->blogcategories_m->add_categories($image);
			redirect('blogs/categories');
		}
	}

	public function edit($slug = NULL){
		$data['category'] 		= $this->blogcategories_m->get_categoriesview($slug);
		$data['iconbar'] 		= $this->global_m->get_iconbar();
		$data['title_header'] 	= 'Edit Category';
		$data['title_menu'] 	= "Categories List";
		$data['controllers'] 	= "categories";

		if(empty($data['category'])){
			show_404();
		}

		$this->form_validation->set_rules('cat_name', 'Category Name', 'required|callback_category_check');
		$this->form_validation->set_rules('cat_image', 'image', 'callback_validate_image');

		$this->form_validation->set_message('required', '%s Empty, Please Input..');

		if($this->form_validation->run() === FALSE){
			$this->temp_backend->load('backend/theme/template', 'backend/blogs/categories/category_form_edit', $data);
		} else {
			$id = $this->input->post('cat_id');
			$config['upload_path'] = './assets/img/blogs/categories';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			date_default_timezone_set('Asia/Jakarta');
			$rename = date('d-m-Y His ').strtolower($this->input->post('cat_name'));
			$config['file_name'] = $rename;

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('cat_image')){
				$errors = array('error' => $this->upload->display_errors());
				$image = $this->input->post('images');
			} else {
				$data = $this->blogcategories_m->ambil_id_gambar($id);
				$path = './assets/img/blogs/categories/';
				$nama = $path.$data->cat_image;

				if(file_exists($nama) && unlink($nama)){
					$dataimages = $this->upload->data();
					$image = $dataimages['file_name'];
				}
					$dataimages = $this->upload->data();
					$image = $dataimages['file_name'];
			}
			$this->blogcategories_m->update_categories($image);
			redirect('blogs/categories');
		}
	}

	public function validate_image() {
    $check = TRUE;
    if (isset($_FILES['cat_image']) && $_FILES['cat_image']['size'] != 0) {
        $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
        $extension = pathinfo($_FILES["cat_image"]["name"], PATHINFO_EXTENSION);
        $detectedType = exif_imagetype($_FILES['cat_image']['tmp_name']);
        $type = $_FILES['cat_image']['type'];
        if (!in_array($detectedType, $allowedTypes)) {
            $this->form_validation->set_message('validate_image', 'Invalid Image Content!');
            $check = FALSE;
        }
        if(filesize($_FILES['cat_image']['tmp_name']) > 3000000) {
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

	public function category_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM blogs_category WHERE cat_name = '$post[cat_name]' AND cat_id != '$post[cat_id]'");
		if($query->num_rows() > 0){
			$this->form_validation->set_message('category_check', '{field} Already Exist, Please Input Another Category Name');
			return FALSE;
		}
			return TRUE;
	}

	// public function delete($id){
	// 	$id 	= decrypt_url($id);
	// 	$data 	= $this->blogcategories_m->ambil_id_gambar($id);//ambil id gambar	  
	// 	$path 	= './assets/img/blogs/categories/';// lokasi gambar berada
	// 	unlink($path.$data->cat_image);// hapus data di folder dimana data tersimpan
	// 	$this->blogcategories_m->delete_categories($id);
	// 	redirect('blogs/categories');
	// }
}
