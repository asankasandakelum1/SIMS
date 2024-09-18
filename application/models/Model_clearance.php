<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_clearance extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function requestClearance()
    {

        $data = array(
            'voyage_id' => $this->input->post('voyage_select', TRUE),
            'status' => "PENDING" ,
            'remarks' => "",
        );
        return $this->db->insert('arrivalclearanced', $data);
    }

    public function getClearancesForVoyage($voyageId) {
        $this->db->select('*');
        $this->db->from('voyaged');
        $this->db->join('arrivalclearanced', 'voyaged.voyage_id = arrivalclearanced.voyage_id');
        $this->db->where('voyaged.voyage_id', $voyageId);
        $query = $this->db->get();

        return $query->result();
    }



    public function getApprovedClearances($Agent) {

        $this->db->select('shipd.*, voyaged.*, arrivalclearanced.*');
        $this->db->from('shipd');
        $this->db->join('voyaged', 'shipd.ship_id = voyaged.ship_id');
        $this->db->join('arrivalclearanced', 'voyaged.voyage_id = arrivalclearanced.voyage_id');
        $this->db->where('shipd.agentcompanyname', $Agent);

        $query = $this->db->get();
        return $query->result();
    }


    public function getClearanceData($clearance_id)
    {
        $this->db->select('arrivalclearanced.*, voyaged.*, shipd.*');
        $this->db->from('arrivalclearanced');
        $this->db->join('voyaged', 'voyaged.voyage_id = arrivalclearanced.voyage_id');
        $this->db->join('shipd', 'shipd.ship_id = voyaged.ship_id');
        $this->db->where('arrivalclearanced.clearance_id', $clearance_id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }



}
