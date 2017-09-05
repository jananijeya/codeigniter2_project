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
}
