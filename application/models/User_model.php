<?php

class User_model extends CI_Model {

    private $table = "admin";

    public function __construct() {
        parent::__construct();
    }

    /**
     * This method validates the login credentials
     * @return string
     */
    public function authenticate_user() {
        $username = $this->input->post("username");
        $pwd = $this->input->post("pwd");
        if (($result = $this->db->select(['id'])->where(['username' => $username, 'pwd' => $pwd])->get($this->table))) {
            if(($row = $result->row())) {
            return $row->id !== NULL ? "yes" : "no"; }else {return "no";}
        } else {
            return "no";
        }
    }

     public function logout() {
        $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        redirect("/");
    }

    function get_marks() {
          if (($query = $this->db->query("SELECT marks FROM questions"))) {
            return $query->result();
        } else {
            return NULL;
        }
    }


}