<?php
class Pages extends Site_Controller
{
    function __construct()
    {
        parent::__construct();       
	}
	
	function index()
	{
		if (($this->uri->segment(2) == 'view'))
		{
			$page = $this->social_igniter->get_page_id($this->uri->segment(3));
			
			if ($page->details == 'index')	redirect();
			else							redirect(base_url().'pages/'.$page->title_url, 'refresh');
		}
		elseif ($this->uri->segment(1))
		{
			$page = $this->social_igniter->get_page($this->uri->segment(2));
		
			if (!$page)	redirect(404);

			$this->data['content_id']		= $page->content_id;
			$this->data['page_title'] 		= $page->title;
			$this->data['page_content']		= $page->content;
			$this->data['comments_allow']	= $page->comments_allow;
		}				
				
		// Comments
		if ((config_item('comments_enabled') == 'TRUE') && ($page->comments_allow != 'N'))
		{
			$this->data['comments_view'] = $this->social_tools->make_comments_section($page->content_id, 'page', $this->data['logged_user_id'], $this->data['logged_user_level_id']);
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
	
}
