<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("user_model");
    }

    /**
     * Type : view
     * Nature : Index Page for Basepath
     */
    public function index() {
        $this->load->view("login");
    }

  
    /**
     * Type : Business Logic
     * This method validates admin credentials...!
     */
    public function authenticate_admin() {
        if (($user = $this->input->post("username"))) {
            $response = $this->user_model->authenticate_user();
            if ($response === "yes") {
                $data = [
                    'username' => $user,
                    'logged_in' => TRUE,
                    'role' => 'Admin'
                ];
                $this->session->set_userdata($data);
                redirect("dashboard");
            } else {
                $this->session->set_flashdata("response", "Login Failed.. Please try again..!");
                redirect("/");
            }
        } else {
            redirect("/");
        }
    }

    /**
     * This method clears out the session and logs out user to login screen.
     */
    public function logout() {
        $this->user_model->logout();
    }
    
}