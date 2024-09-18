<?php

class Model_voyage extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }



    public function addVoyage($data) {
        return $this->db->insert('voyaged', $data);
    }

    public function insertVoyagedata()
    {
        $data = array(

            'ship_id' => $this->input->post('shipid', TRUE),
            'arr_date' => $this->input->post('arrivaldate', TRUE),
            'arr_time' => $this->input->post('arrivaltime', TRUE),
            'dep_date' => $this->input->post('departuredate', TRUE),
            'lastport' => $this->input->post('lastport', TRUE),
            'nextport' => $this->input->post('nextport', TRUE),
            'crewcount' => $this->input->post('crewcount', TRUE),
            'signon_count' => $this->input->post('signoncount', TRUE),
            'signoff_count' => $this->input->post('signoffcount', TRUE),
            'paxcount' => $this->input->post('paxcount', TRUE),
            'paxon_count' => $this->input->post('paxoncount', TRUE),
            'paxoff_count' => $this->input->post('paxoffcount', TRUE),
            'stow_count' => $this->input->post('stowcount', TRUE),

        );

        return $this->db->insert('voyaged', $data);
    }

    public function getVoyages($Agent)
    {
        $this->db->select('shipd.*, voyaged.*');
        $this->db->from('shipd');
        $this->db->join('voyaged', 'shipd.ship_id = voyaged.ship_id');
        $this->db->where('shipd.agentcompanyname', $Agent);

        $query = $this->db->get();
        return $query->result();
    }

    // Add more model methods as needed
}