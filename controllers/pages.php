<?php
class Pages extends Site_Controller
{
    function __construct()
    {
        parent::__construct(); 
        
        $this->load->model('pages_model');      
	}
	
	function index()
	{
		if (($this->uri->segment(2) == 'view'))
		{
			$page = $this->pages_model->get_page($this->uri->segment(3));
			
			if ($page->details == 'index')	redirect();
			else							redirect(base_url().'pages/'.$page->title_url, 'refresh');
		}
		elseif ($this->uri->segment(1))
		{
			$page = $this->pages_model->get_page_title($this->uri->segment(2));
		
			if (!$page)	redirect(404);

			$this->data['content_id']		= $page->content_id;
			$this->data['page_title'] 		= $page->title;
			$this->data['page_content']		= $page->content;
			$this->data['comments_allow']	= $page->comments_allow;
		}

		$this->render();	
	}

	function view()
	{
		$page 			= $this->social_igniter->get_content($this->uri->segment(3));
		$page_link		= base_url().'pages/'.$page->title_url;
		$page_comment	= NULL;

		if ($this->uri->segment(4))
		{
			$page_comment = '#comment-'.$this->uri->segment(4);
		}
		
		redirect($page_link.$page_comment);
	}
	
    /* Widgets */
	function widgets_dropdown_menu($widget_data)
	{
		$widget_data['pages'] = $this->pages_model->get_menu();

		$this->load->view('widgets/dropdown_menu', $widget_data);			
	}	

	function widgets_verticle_menu($widget_data)
	{
		$widget_data['pages'] = $this->pages_model->get_pages();

		$this->load->view('widgets/verticle_menu', $widget_data);
	}

}
