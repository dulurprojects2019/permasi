<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index(){
		$data['blogslatest'] 	= $this->global_m->get_blogs_latest();
		// $data['blogsvideoreview'] 	= $this->global_m->get_blogs_latest();
		$data['blogslongest'] 	= $this->global_m->get_blogs_longest();
		// $data['blogsfeatured'] 	= $this->global_m->get_blogs_featured();
		$data['categories'] 	= $this->global_m->get_blogs_category();
		$data['blogs'] 			= $this->global_m->get_blogs_latest();
		$data['pages'] 			= $this->global_m->get_pages();
		$data['ads'] 			= $this->global_m->get_ads();
		$data['menubar'] 		= $this->global_m->get_menubar();
		$data['iconbar'] 		= $this->global_m->get_iconbar();
		$data['title_header'] 	= "Blogs";
		$data['controllers'] 	= "home";
		
		$this->temp_frontend->load('frontend/theme/template', 'frontend/home/home', $data);
	}

	public function pages_category($slug = NULL){
		$data['category'] 		= $this->global_m->get_blogs_category_page($slug);
		$data['blogslatest'] 	= $this->global_m->get_blogs_latest();
		$data['blogs'] 			= $this->global_m->get_blogs_latest();
		$data['pages'] 			= $this->global_m->get_pages();
		$data['categories'] 	= $this->global_m->get_blogs_category();
		$data['ads'] 			= $this->global_m->get_ads();
		$data['menubar'] 		= $this->global_m->get_menubar();
		$data['iconbar'] 		= $this->global_m->get_iconbar();
		$data['title_header'] 	= "Category";
		$data['controllers'] 	= "home";

		if(empty($data['category'])){
			show_404();
		}

		$this->temp_frontend->load('frontend/theme/template', 'frontend/pages/categories/categories_page', $data);
	}

	public function pages_blog($category = NULL, $blogs){
		$data['blogslatest'] 	= $this->global_m->get_blogs_latest();
		$data['categories'] 	= $this->global_m->get_blogs_category();
		$data['blogsrelated'] 	= $this->global_m->get_blogs();
		$data['pages'] 			= $this->global_m->get_pages();
		$data['users'] 			= $this->global_m->get_users();
		$data['ads'] 			= $this->global_m->get_ads();
		$data['menubar'] 		= $this->global_m->get_menubar();
		$data['iconbar'] 		= $this->global_m->get_iconbar();
		$data['title_header'] 	= "Category";
		$data['controllers'] 	= "home";

		if($category !== '' && $blogs == '')
		{
			$data['category'] = $this->global_m->get_blogs_category_page($category);
			if(empty($data['category'])){
			show_404();
			}
			else
			{
			$this->temp_frontend->load('frontend/theme/template', 'frontend/pages/categories/categories_page', $data);
			}
		}
		else
		{
			$data['blogs'] = $this->global_m->get_blogs_page($blogs);
			if(empty($data['blogs'])){
			show_404();
			}
			else
			{
			$this->temp_frontend->load('frontend/theme/template', 'frontend/pages/blogs/blogs_single', $data);
			}
		}
	}

	public function pages($slug = NULL){
		$data['pagesview'] 		= $this->global_m->get_pages_view($slug);
		$data['blogslatest'] 	= $this->global_m->get_blogs_latest();
		$data['blogs'] 			= $this->global_m->get_blogs_latest();
		$data['pages'] 			= $this->global_m->get_pages();
		$data['categories'] 	= $this->global_m->get_blogs_category();
		$data['ads'] 			= $this->global_m->get_ads();
		$data['menubar'] 		= $this->global_m->get_menubar();
		$data['iconbar'] 		= $this->global_m->get_iconbar();
		$data['title_header'] 	= "Category";
		$data['controllers'] 	= "home";

		if(empty($data['pagesview'])){
			show_404();
		}

		$this->temp_frontend->load('frontend/theme/template', 'frontend/pages/pages/pages_view', $data);
	}
}