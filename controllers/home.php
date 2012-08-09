<?php
class Home extends Dashboard_Controller
{
    function __construct()
    {
        parent::__construct();

		$this->load->config('pages');
		$this->load->model('pages_model');

		$this->data['page_title'] = 'Pages';
		$this->data['pages_path'] = config_item('pages_path');
	}
	
	function index()
	{		
		redirect('home', 'refresh');
	}

	function editor()
	{			
		if (($this->uri->segment(3) == 'manage') && ($this->uri->segment(4)))
		{
			// Need is valid & access and such
			$page = $this->social_igniter->get_content($this->uri->segment(4));
			if (!$page) redirect(base_url().'home/error');			
							
			// Non Form Fields
			$this_page_id					= $page->content_id;
			$this->data['sub_title']		= $page->title;
			$this->data['form_url']			= base_url().'api/content/modify/id/'.$this->uri->segment(4);
			
			// Form Fields
			$this->data['title'] 			= $page->title;
			$this->data['title_url'] 		= $page->title_url;
			
			if ($page->details == 'site')
			{
				$this->data['slug_pre']		= base_url().'pages/';
			}
			else
			{
				$this->data['slug_pre']		= base_url().'';
			}
			
			$this->data['wysiwyg_value']	= $page->content;
			$this->data['category_id']		= $page->category_id;			
			$this->data['parent_id']		= $page->parent_id;
			$this->data['details'] 			= $page->details;
			$this->data['access']			= $page->access;
			$this->data['comments_allow']	= $page->comments_allow;
			$this->data['geo_lat']			= $page->geo_lat;
			$this->data['geo_long']			= $page->geo_long;			
			$this->data['status']			= display_content_status($page->status, $page->approval);
		}
		else
		{		
			// Non Form Fields
			$this_page_id					= 0;
			$this->data['sub_title']		= 'Create';
			$this->data['form_url']			= base_url().'api/content/create';
			
			// Form Fields
			$this->data['title'] 			= '';
			$this->data['title_url']		= '';
			$this->data['slug_pre']			= base_url().'pages';
			$this->data['layouts']			= '';
			$this->data['wysiwyg_value']	= $this->input->post('content');
			$this->data['category_id']		= '';
			$this->data['parent_id']		= '';
			$this->data['details'] 			= 'site';			
			$this->data['access']			= 'E';
			$this->data['comments_allow']	= '';
			$this->data['geo_lat']			= '';
			$this->data['geo_long']			= '';			
			$this->data['status']			= display_content_status('U');
		}
	
		// WYSIWYG for 'pages'
		if ($this->data['details'] == 'site')
		{
			$this->data['wysiwyg_js']		= TRUE;	
			$this->data['wysiwyg_name']		= 'content';
			$this->data['wysiwyg_id']		= 'wysiwyg_content';
			$this->data['wysiwyg_class']	= 'wysiwyg_norm_full';
			$this->data['wysiwyg_width']	= 640;
			$this->data['wysiwyg_height']	= 300;
			$this->data['wysiwyg_resize']	= TRUE;
			$this->data['wysiwyg_media']	= FALSE;			
			$this->data['wysiwyg']	 		= $this->load->view($this->config->item('dashboard_theme').'/partials/wysiwyg', $this->data, true);
		}
		
		// Not currently working
		// Don't know where to store layout value
		$this->data['layouts']				= $this->social_igniter->scan_layouts(config_item('site_theme'));
		$this->data['layout_selected']		= 'sidebar';

		$this->data['form_module']			= 'pages';
		$this->data['form_type']			= 'page';
		$this->data['categories'] 			= $this->social_tools->make_categories_dropdown(array('categories.module' => 'pages'), $this->session->userdata('user_id'), $this->session->userdata('user_level_id'), '+ Add Pages Category');			
		$this->data['parent_pages'] 		= $this->pages_model->make_pages_dropdown($this_page_id);
	 	$this->data['content_publisher'] 	= $this->social_igniter->make_content_publisher($this->data, 'form');

 		$this->render('dashboard_wide');
	}
	
	
}