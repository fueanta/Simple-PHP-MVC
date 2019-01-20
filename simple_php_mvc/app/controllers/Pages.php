<?php
  class Pages extends Controller {

    public function __construct() {
      // load the model here  
    }

    public function index() {
      $data_array = [
        // list of data to be sent
        'title' => 'My Website',
        'description' => 'This website is built on SIMPLE PHP MVC which is a handcrafted mvc framework based on PHP.'
      ];

      $this->view_path(__FUNCTION__, $data_array);
    }

    public function about() {
      
      $data_array = [
        // list of data to be sent
        'title' => 'About'
      ];

      $this->view_path(__FUNCTION__, $data_array);
    }

    // this function dynamically loads the view resource
    private function view_path($method_name, $data_array = null) {
      $this->view(__CLASS__ . '/' . $method_name, $data_array);
    }

  }