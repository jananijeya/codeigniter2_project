<?php
class News extends CI_Controller{ //A controller itself is like a super class, which is why $this is used
  public function __construct()
  {
    parent::__construct(); //Calls constructor of parent CI_Controller
    $this->load->model('news_model'); //Loads model to be used in all other methods in controller
  }

  /* RETRIEVE DATA FROM DB */

  publc function index()
  {
    $data['news'] = $this->news_model->get_news(); //Gets all news items from model and assigns them to a variable
    $data['title'] = 'News archive';

    $this->load>view('templates/header', $data);
    $this->load->view('news/index', $data);
    $this->load->view('templates/footer');
  }

  public function view($slug)
  {
    $data['news'] = $this->news_model->get_news($slug); //View specific news item based on slug
  }
}
