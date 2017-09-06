<?php
class News_model extends CI_Model {
  public function __construct()
  {
    $this->load->database(); //Loads database library
  }

  /* DEFINE METHODS TO GRAB NEWS ITEMS */

  public function get_news($slug = FALSE)
  {
      if ($slug === FALSE)
      {
        $query = $this->db->get('news'); //Makes database class available through $this->db object
        return $query->result_array(); //Get all nes records if slug not specified
      }
      $query = $this->db->get_where('news', array('slug' => $slug));
      return $query->row_array(); //Get news item by its slug
  }

/* METHOD THAT WRITES DATA TO DB */

public function set_news()
{
  $this->load->helper('url'); //Provides url_title f(x)
  $slug = url_title($this->input->post('title'), 'dash', TRUE); //strips string by replacing spaces with dashes and converts to lowercase; leaves you w/ perfect slug for URIs

  $data = array( //Each element corresponds with a column in the news table
    'title' => $this->input->post('title'), //post() from input library (loaded by default) sanitizes data
    'slug' => $slug,
    'text' => $this->input->post('text')
  );

  return $this->db->insert('news', $data); //Insert $data into DB
}





}
