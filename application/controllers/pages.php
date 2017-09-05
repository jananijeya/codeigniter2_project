<?php

class Pages extends CI_Controller {

	public function view($page = 'home') //View method accepts one argument named $page
	{
    if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php')) //Check if page exists
    	{
    		// Whoops, we don't have a page for that!
    		show_404();
    	}

      //Title is assigned to title element in $data array
    	$data['title'] = ucfirst($page); //Capitalize first letter of page name; note $title echoed in header

      //Order of the views to be displayed is important
    	$this->load->view('templates/header', $data);
    	$this->load->view('pages/'.$page, $data); //Each value in the $data array is assigned to a variable with the name of its key
    	$this->load->view('templates/footer', $data);

	}
}
