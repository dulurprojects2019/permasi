<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['ads/ads-list'] 						= 'ads/index';
$route['ads/ads/add'] 						= 'ads/add';
$route['ads/ads/edit/(:any)']				= 'ads/edit/$1';
$route['ads/ads/delete/(:any)']				= 'ads/delete/$1';

$route['pages/pages-list'] 					= 'pages/index';
$route['pages/pages/add'] 					= 'pages/add';
$route['pages/pages/edit/(:any)']			= 'pages/edit/$1';
$route['pages/pages/delete/(:any)']			= 'pages/delete/$1';

//pages menus
$route['pages/(:any)'] 						= 'home/pages/$1';
$route['category/(:any)'] 					= 'home/pages_blog/$1';
$route['category/(:any)/(:any)'] 			= 'home/pages_blog/$1/$2';

$route['category/(:any)']					= 'home/pages_category/$1';

$route['blogs/blogs-list']					= 'blogs/index';
$route['blogs/blogs/add']					= 'blogs/add';
$route['blogs/blogs/edit/(:any)']			= 'blogs/edit/$1';
$route['blogs/blogs/edit/status/(:any)']	= 'blogs/status/$1';
$route['blogs/blogs/delete/(:any)']			= 'blogs/delete/$1';

$route['blogs/categories']					= 'blog_categories/index';
$route['blogs/categories/add']				= 'blog_categories/add';
$route['blogs/categories/edit/(:any)']		= 'blog_categories/edit/$1';
$route['blogs/categories/delete/(:any)']	= 'blog_categories/delete/$1';

$route['settings/menubar']					= 'menubar/index';
$route['settings/menubar/add']				= 'menubar/add';
$route['settings/menubar/edit/(:any)']		= 'menubar/edit/$1';
$route['settings/menubar/delete/(:any)']	= 'menubar/delete/$1';

$route['settings/iconbar']					= 'iconbar/index';
$route['settings/iconbar/add']				= 'iconbar/add';
$route['settings/iconbar/edit/(:any)']		= 'iconbar/edit/$1';
$route['settings/iconbar/delete/(:any)']	= 'iconbar/delete/$1';

$route['login']								= 'auth_login/login';
$route['process']							= 'auth_login/process';
$route['logout']							= 'auth_login/logout';

$route['accounts/levels/levels-list'] 		= 'acc_levels/index';
$route['accounts/levels/add'] 				= 'acc_levels/add';
$route['accounts/levels/edit/(:any)']		= 'acc_levels/edit/$1';
$route['accounts/levels/delete/(:any)']		= 'acc_levels/delete/$1';

$route['accounts/users/users-list'] 		= 'acc_users/index';
$route['accounts/users/add'] 				= 'acc_users/add';
$route['accounts/users/edit/(:any)']		= 'acc_users/edit/$1';
$route['accounts/users/delete/(:any)']		= 'acc_users/delete/$1';

$route['default_controller'] 				= 'home';
$route['404_override'] 						= '';
$route['translate_uri_dashes'] 				= FALSE;
