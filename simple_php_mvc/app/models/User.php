<?php

  class User extends Model {

    // Register new User
    public function register($data_array) {
      $this->db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');

      // binding query values with parametes
      $this->db->bind(':name', $data_array['name']);
      $this->db->bind(':email', $data_array['email']);
      $this->db->bind(':password', $data_array['password']);

      // execute query
      if ($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }

    // User log in processing
    public function login($email, $password) {
      $this->db->query('SELECT * FROM users WHERE email = :email');
      $this->db->bind(':email', $email);

      // Fetching a single user by email 
      $row = $this->db->single();

      // Checking if user exists
      if ($this->db->rowCount() > 0) {
        // does exist

        // Since password is encrypted in database
        $hashed_password = $row->password;
        // Checking if password is matched
        if (password_verify($password, $hashed_password)) {
          // did match, so sending user row
          return $row;
        }

      }

      // does not exist
      return false;
    }

    // Get user by id
    public function get_user_by_id($id) {
      $this->db->query('SELECT * FROM users WHERE id = :id');
      $this->db->bind(':id', $id);

      // Fetching a single user by id 
      $row = $this->db->single();

      // returning user
      return $row;
    }

    // Check user existance from email
    public function check_user_existance_from_email($email) {

      $this->db->query('SELECT id FROM users WHERE email = :email');
      $this->db->bind(':email', $email);

      // Fetching a single user by email 
      $row = $this->db->single();

      // Checking if user exists
      if ($this->db->rowCount() > 0) {
        // does exist
        return true;
      }

      // does not exist
      return false;
    }

  }