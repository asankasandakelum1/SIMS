<?php
class Model_crew extends CI_Model{


    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insertCrewdata($data) {
        // Insert data into "crewd" table
        $this->db->insert('crewd', $data);

        // Check if insertion was successful
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }




}

