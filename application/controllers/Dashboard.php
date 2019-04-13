<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->model("question_model");
        $this->load->library('m_pdf');
    }

    public function index() {
        $this->load->view("dashboard");
    }
    
     public function add_questions() {
       $data = array();
       $query = $this->question_model->getBranch();
    if ($query)
    {
        $data['branch'] = $query;

    }
        $this->load->view("add_questions",$data);
    }
    public function create_question() {
        
        if (($question = $this->input->post("question")) !== NULL) {
            $response = $this->question_model->is_question_exists();
            if ($response === "yes" || $response === "fail") {

                $this->session->set_flashdata("response","Question is already exists..!");
                redirect("dashboard/add_questions/");
            } else {
                $response = $this->question_model->create_question();
                if ($response === "yes") {
                    $this->session->set_flashdata("response", "Successfully created..!");
                    redirect("dashboard/add_questions/");
                } else {
                    $this->session->set_flashdata("response", "Question is already exists..!");
                    redirect("dashboard/add_questions/");
                }
            }
        } else {
            redirect("dashboard/add_questions/");
        }
    }
    
   public function delete_que($id) {
        $response = $this->question_model->delete_question($id);
                if ($response === "yes") {
                    $this->session->set_flashdata("response", "Successfully deleted..!");
                    redirect("dashboard/view_questions/");
                } else {
                    $this->session->set_flashdata("response", "Please Try again..!");
                    redirect("dashboard/view_questions/");
        }
   }
    
     public function view_questions() {
        $data = ['details' => $this->question_model->get_questions()]; 
        $this->load->view("view_questions",$data);
    }
    
    public function generate_questions() {

           $data = array();
       $query = $this->question_model->getBranch_que();
    if ($query)
    {
        $data['branch'] = $query;

    }
        $this->load->view("generate_questions",$data);
    }
    
     public function edit_que($id) {

       $data = array();
       $query = $this->question_model->getBranch_que();
       $query1 = $this->question_model->get_que($id);
    if ($query)
    {
        $data['branch'] = $query;
        $data['edited'] = $query1;

    }
        $this->load->view("update_questions",$data);
         
    }
    
    public function view_generated_question_paper() {

         $this->load->view("question_paper");
    }

     public function getSubjects() {

        if (isset($_GET['branch'])) {

            $branch = $_GET['branch'];
            $subjects = $this->question_model->getSubjects($branch);
            $info = "<option value = '' disabled selected>Select Subject</option>";
            foreach ($subjects as $value) {
                $info .= "<option value = '" . $value . "'>" . $value . "</option>";
            }
            echo $info;
        }
    }

    public function getSubjects_question() {

        if (isset($_GET['branch'])) {

            $branch = $_GET['branch'];
            $semister = $_GET['semister'];
            $subjects = $this->question_model->getSubjects_que($branch,$semister);
            $info = "<option value = '' disabled selected>Select Subject</option>";
            foreach ($subjects as $value) {
                $info .= "<option value = '" . $value . "'>" . $value . "</option>";
            }
            echo $info;
        }
    }

    public function generate_questions_paper() {
        
        if (($branch = $this->input->post("branch")) !== NULL) {
           
                $data['response'] = $this->question_model->generater_question();
                $this->load->view("question_paper",$data);
              

        } else {
            redirect("dashboard/generate_questions/");
        }
    }
    
    public function save_download()
  { 
        
         if (($branch = $this->input->post("branch")) !== NULL) {
              $sem = $this->input->post("semister");
              $exam = $this->input->post("examination");

       
       
        if($exam == 'Semister') {
        $result = $this->question_model->get_marks_sem();
        $data['response'] = array_merge($result[0], $result[1]);
       
        $html= $this->load->view("download_que_sem", $data, true); 
        $pdfFilePath = "$branch-$sem".time()."-download.pdf";
        $pdf = $this->m_pdf->load();
        $pdf->WriteHTML($html,2);
        $pdf->Output($pdfFilePath, "D");

        }else {

        $result = $this->question_model->get_marks_mid();
        $data['response'] = array_merge($result[0], $result[1]);
       
        $html= $this->load->view("download_que_mid", $data, true); 
        $pdfFilePath = "$branch-$sem".time()."-download.pdf";
        $pdf = $this->m_pdf->load();
        $pdf->WriteHTML($html,2);
        $pdf->Output($pdfFilePath, "D");

        }
	
		  } else {
            redirect("dashboard/generate_questions/");
        }
		 	
  }
}
