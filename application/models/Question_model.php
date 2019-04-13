<?php

class Question_model extends CI_Model {

    private $que = "questions";
    private $map = "map_data";

    public function __construct() {
        parent::__construct();
    }

    /*
     * Create Questions
     * @return string
     */

    public function create_question() {
        $question = $this->input->post("question");
        $marks = $this->input->post("marks");
        $modules = $this->input->post("modules");
        $semister = $this->input->post("semister");
        $subject = $this->input->post("subject");
        $branch = $this->input->post("branch");
        $status = $this->input->post("status");
        $date = date('Y-m-d H:i:s');

        $data = [

            'question' => $question,
            'marks' => $marks,
            'modules' => $modules,
            'semister' => $semister,
            'subject' => $subject,
            'branch' => $branch,
            'status' => $status,
            'create_date' => $date
        ];
        $info = $this->security->xss_clean($data);
        $this->db->insert($this->que, $info);
        return $this->db->insert_id() > 0 ? "yes" : "no";
    }
    
   public function delete_question($id) {
               
       if(($query = $this->db->query('delete from questions where id = '.$id))) {
				return $this->db->affected_rows() > 0 ? "yes" : "no";
			} else {
				return FALSE;
			}
   }
    
     /**
     * This method validates the login credentials
     * @return string
     */
    public function is_question_exists() {
        $question = $this->input->post("question");
        if (($result = $this->db->query("select question from " . $this->que . " where question = '" . $question . "'"))) {
            return $result->num_rows() > 0 ? "yes" : "no";
        } else {
            return "fail";
        }
    }
    public function get_questions() {
        if (($result = $this->db->query("select * from $this->que"))) {
            return $result->result();
        } else {
            return NULL;
        }
    }

    function getBranch(){
   $query = $this->db->query("SELECT DISTINCT (branch) FROM $this->map");

    if ($query->num_rows() > 0){
        foreach($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
  }

  public function getBranch_que(){
   $query = $this->db->query("SELECT DISTINCT (branch) FROM $this->que");

    if ($query->num_rows() > 0){
        foreach($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
  }
    
public function get_que($id) {
      if (($result = $this->db->query("select * from $this->que where id = $id"))) {
            return $result->result();
        } else {
            return NULL;
        }
}

   public function getSubjects($branch) {
        $this->db->select('subject');
        $this->db->from('map_data');
        $this->db->where(array('branch' => $branch));
        $query = $this->db->get();

        $subject = array();
        foreach ($query->result_array() as $row) {
            $subject[] = $row['subject'];
        }
        return $subject;
    }

     public function getSubjects_que($branch,$semister) {

        $query = $this->db->query("SELECT DISTINCT(subject) FROM " . $this->que . " where branch = '". $branch ."' and semister = '" . $semister . "'");
        $subject = array();
        foreach ($query->result_array() as $row) {
            $subject[] = $row['subject'];
        }
        return $subject;
    }

  
    public function get_marks_mid() {
        $semister = $this->input->post("semister");
        $subject = $this->input->post("subject");
        $branch = $this->input->post("branch");
        $status = $this->input->post("status");
       
        $limit = 22;
        $product_count = 0;
        $sellers = [];
        $seller_id = [];

        while($product_count <= $limit) {


        $sql = "SELECT id,question,modules,marks FROM " . $this->que . " where branch = '". $branch ."' and semister = '" . $semister . "' and subject = '" . $subject . "' ORDER BY RAND() limit 4";
        if($result = $this->db->query($sql)->result()) {
            $product_count  = 0;
            $sellers = [];
            foreach($result as $value) {
                $sellers[] = $value;
                $seller_id[] = $value->id;
                $product_count = $product_count + $value->marks;
            }
        }

        if($product_count <= $limit)  {
            break;
        }
    }
    

    $total = 30;
    $sum = $total-$product_count;
    $new_product_count = 0;
    $new_sellers = [];

    while (!($new_product_count == $sum)) {

    $sql = "SELECT id,question,modules,marks FROM " . $this->que . " where branch = '". $branch ."' and semister = '" . $semister . "' and subject = '" . $subject . "' and id not in ? order by rand() limit 2 ";
        if($result = $this->db->query($sql, [$seller_id])->result()) {
            $new_product_count  = 0;
            $new_sellers = [];
            foreach($result as $value) {
                $new_sellers[] = $value;
                $new_product_count = $new_product_count + $value->marks;
            }
    
        }
    }

    $array[] = $sellers;
    $array[] = $new_sellers;
    return $array;


}

    public function get_marks_sem() {
        $semister = $this->input->post("semister");
        $subject = $this->input->post("subject");
        $branch = $this->input->post("branch");
        $status = $this->input->post("status");
       
        $limit = 62;
        $product_count = 0;
        $sellers = [];
        $seller_id = [];

        while($product_count <= $limit) {


        $sql = "SELECT id,question,modules,marks FROM " . $this->que . " where branch = '". $branch ."' and semister = '" . $semister . "' and subject = '" . $subject . "' ORDER BY RAND() limit 6";
        if($result = $this->db->query($sql)->result()) {
            $product_count  = 0;
            $sellers = [];
            foreach($result as $value) {
                $sellers[] = $value;
                $seller_id[] = $value->id;
                $product_count = $product_count + $value->marks;
            }
        }

        if($product_count <= $limit)  {
            break;
        }
    }
    

    $total = 70;
    $sum = $total-$product_count;
    $new_product_count = 0;
    $new_sellers = [];

    while (!($new_product_count == $sum)) {

    $sql = "SELECT id,question,modules,marks FROM " . $this->que . " where branch = '". $branch ."' and semister = '" . $semister . "' and subject = '" . $subject . "' and id not in ? order by rand() limit 6";
        if($result = $this->db->query($sql, [$seller_id])->result()) {
            $new_product_count  = 0;
            $new_sellers = [];
            foreach($result as $value) {
                $new_sellers[] = $value;
                $new_product_count = $new_product_count + $value->marks;
            }
    
        }
    }

    $array[] = $sellers;
    $array[] = $new_sellers;
    return $array;

}
    
}
    ?>