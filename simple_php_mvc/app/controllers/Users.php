<?php
  class Users extends Controller {

    public function __construct() {
      // defines minimum characters in a password
      $this->min_pass_length = 6;

      // loading user model from db
      $this->userModel = $this->model('User');
    }

    public function register() {
      // checking for register form post
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // process registration form

        // Sanitizing POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data_array = [
          // list of data to be processed
          'name' => trim($_POST['name']),
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'confirm_password' => trim($_POST['confirm_password']),
          
          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];

        // validate
        $this->validate_register_form($data_array);
      }
      else {
        // load form
        $data_array = [
          // list of data to be sent
          'name' => '',
          'email' => '',
          'password' => '',
          'confirm_password' => '',
          
          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];
  
        // show user empty register form
        $this->view_path(__FUNCTION__, $data_array);
      }
    }

    public function login() {
      // checking for login form post
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // process login form

        // Sanitizing POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data_array = [
          // list of data to be processed
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'email_err' => '',
          'password_err' => '',
        ];

        // validate
        $this->validate_login_form($data_array);
      }
      else {
        // load form
        $data_array = [
          // list of data to be sent
          'email' => '',
          'password' => '',
          
          'email_err' => '',
          'password_err' => '',
        ];
        
        // show user empty login form
        $this->view_path(__FUNCTION__, $data_array);
      }
    }

    // this function dynamically loads the view resource
    private function view_path($method_name, $data_array = null) {
      $this->view(__CLASS__ . '/' . $method_name, $data_array);
    }

    // this function validates register form data
    private function validate_register_form($data_array) {
      
      // Validate Name
      if(empty($data_array['name'])) {
        $data_array['name_err'] = 'Pleae enter your name';
      }

      // Validate Email
      if(empty($data_array['email'])) {
        $data_array['email_err'] = 'Pleae enter your email';
      } else {
        // checking if email does exist
        if ($this->userModel->check_user_existance_from_email($data_array['email'])) {
          $data_array['email_err'] = 'Email is already taken';
        }
      }

      // Validate Password
      if(empty($data_array['password'])) {
        $data_array['password_err'] = 'Pleae enter a password';
      } elseif(strlen($data_array['password']) < $this->min_pass_length){
        $data_array['password_err'] = 'Password must be at least ' . $this->min_pass_length . ' characters long';
      }

      // Validate Confirm Password
      if(empty($data_array['confirm_password'])) {
        $data_array['confirm_password_err'] = 'Pleae confirm your password';
      } else {
        if($data_array['password'] != $data_array['confirm_password']) {
          $data_array['confirm_password_err'] = 'Passwords do not match';
        }
      }

      // Making sure errors are empty
      if(empty($data_array['email_err']) && empty($data_array['name_err']) && empty($data_array['password_err']) && empty($data_array['confirm_password_err'])) {
        // Validated
        
        // Hashing password
        $data_array['password'] = password_hash($data_array['password'], PASSWORD_DEFAULT);

        // save / register user
        if ($this->userModel->register($data_array)) {
          flash('register_success', 'You are now registered and eligible to log in.');
          redirect('users/login');
        } else {
          die('Could not be registered!');
        }

      } else {
        // Load view with errors
        $this->view_path('register', $data_array);
      }

    }

    // this function validates login form data
    private function validate_login_form($data_array) {

      // Validate Email
      if(empty($data_array['email'])) {
        $data_array['email_err'] = 'Pleae enter your email';
      }

      // Validate Password
      if(empty($data_array['password'])) {
        $data_array['password_err'] = 'Please enter your password';
      }

      // Making sure errors are empty
      if(empty($data_array['email_err']) && empty($data_array['password_err'])) {
        // Validated
        die('Success');
      } else {
        // Load view with errors
        $this->view_path('login', $data_array);
      }

    }

  }