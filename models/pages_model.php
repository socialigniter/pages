<?php

class Pages_model extends CI_Model
{
	protected $pages_view;

    function __construct()
    {
        parent::__construct();
    }

	/* LOGIC Methods */
	function make_pages_dropdown($content_id)
	{
		$pages_query 			= $this->get_pages();
		$this->pages_view 		= array(0 => '----select----');
		$pages 					= $this->render_pages_children($pages_query, 0, $content_id);
				
		return $this->pages_view;
	}
	
	function render_pages_children($pages_query, $parent_id, $content_id)
	{		
		foreach ($pages_query as $child)
		{
			if ($parent_id == $child->parent_id AND $child->details != 'index' AND $child->details != 'module_page' AND $child->content_id != $content_id)
			{
				if ($parent_id != '0') $page_display = ' - '.$child->title;
				else $page_display = $child->title;

				$this->pages_view[$child->content_id] = $page_display;

				// Recursive Call
				$this->render_pages_children($pages_query, $child->content_id, $content_id);
			}
		}
			
		return $this->pages_view;
	}


	/* DB Methods */
 	function get_index_page()
 	{
		$this->db->select('*');
		$this->db->where('site_id', config_item('site_id'));
 		$this->db->where('module', 'pages');		
		$this->db->where('details', 'index');
		$this->db->limit(1);
		return $this->db->get('content')->row();
 	}

 	function get_page_title($title_url)
 	{
 		$this->db->select('*');
		$this->db->where('site_id', config_item('site_id'));
		$this->db->where('title_url', $title_url);
		$this->db->limit(1);
		return $this->db->get('content')->row();
 	}    

 	function get_page($content_id)
 	{
		$this->db->select('*');
		$this->db->where('content_id', $content_id);
		$this->db->limit(1);
		return $this->db->get('content')->row();
 	}  
    
    function get_pages()
    {
 		$this->db->select('*');
 		$this->db->from('content');
 		$this->db->where('site_id', config_item('site_id'));
 		$this->db->where('module', 'pages');
 		$this->db->order_by('order', 'asc'); 
 		$result = $this->db->get();	
 		return $result->result();
    }

    function get_menu()
    {    
 		$this->db->select('parent_id, type, order, title, title_url, details');
 		$this->db->from('content');
 		$this->db->where('site_id', config_item('site_id'));
 		$this->db->where('status', 'P');
 		$this->db->where('module', 'pages');
 		$this->db->where('details !=', 'index');
 		$this->db->order_by('order', 'asc'); 
 		$result = $this->db->get();	
 		return $result->result();
    }

}