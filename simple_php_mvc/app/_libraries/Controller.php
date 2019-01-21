<?php
  /*
   * Base Controller
   * Loads the models and the views
   */

  class Controller {
    
    // loads model
    public function model($model) {
      // do require base model for db ref.
      require_once '../app/models/Model.php';
      
      // do require model file
      require_once '../app/models/' . $model . '.php';

      // instantiating model
      return new $model;
    }

    // loads view
    public function view($view, $data_array = []) {
      $resource_path = '../app/views/' . $view . '.php';
      // checking wheather the view does exist or not
      if (file_exists($resource_path)) {
        require_once $resource_path;
      }
      else {
        // if view does not exist
        die('View does not exist!');
      }
    }

  }