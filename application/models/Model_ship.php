<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ship extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insertShipdata()
    {


        $data = array(
            'ship_name' => $this->input->post('shipname', TRUE),
            'ship_flag' => $this->input->post('shipflag', TRUE),
            'imo_no' => $this->input->post('imono', TRUE),
            'agentcompanyname' => $this->input->post('companyname', TRUE),
        );

        return $this->db->insert('shipd', $data);
    }

    public function getShips($Agent)
    {
        $this->db->where('agentcompanyname', $Agent);
        $query = $this->db->get('shipd');
        return $query->result();
    }
}
