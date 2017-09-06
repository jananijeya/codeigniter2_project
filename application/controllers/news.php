<?php
class News extends CI_Controller{ //A controller itself is like a super class, which is why $this is used
  public function __construct()
  {
    parent::__construct(); //Calls constructor of parent CI_Controller
    $this->load->model('news_model'); //Loads model to be used in all other methods in controller
  }

  /* RETRIEVE DATA FROM DB */

  public function index()
  {
    $data['news'] = $this->news_model->get_news(); //Gets all news items from model and assigns them to $news variable
    $data['title'] = 'News archive';

    $this->load->view('templates/header', $data);
    $this->load->view('news/index', $data);
    $this->load->view('templates/footer');
  }

  public function view($slug)
  {
    $data['news_item'] = $this->news_model->get_news($slug); //View specific news item based on slug

    if (empty($data['news_item']))
    {
      show_404();
    }
    $data['title'] = $data['news_item']['title'];

    $this->load->view('templates/header', $data);
    $this->load->view('news/view', $data);
    $this->load->view('templates/footer');

  }

  /* CHECK FORM SUBMISSION AND VALIDATION RULES */
  public function create()
  {
    $this->load->helper('form'); //load form helper and validation library
    $this->load->library('form_validation'); //Checks whether validation rules passed

    $data['title'] = 'Create a news item';

    $this->form_validation->set_rules('title', 'Title', 'required'); //(name of input field, name used in error msgs, rule)
    $this->form_validation->set_rules('text', 'text', 'required');

    if ($this->form_validation->run() === FALSE) //If form validation unsuccessful, return form
    {
      $this->load->view('templates/header', $data);
      $this->load->view('news/create');
      $this->load->view('templates/footer', $data);
    }
    else
    {
      $this->news_model->set_news(); //Form successful, model is called and set_news() inserts into DB
      $this->load->view('news/success'); //success msg view displayed
    }
  }



}
