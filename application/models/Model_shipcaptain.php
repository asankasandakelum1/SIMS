<?php
class Model_shipcaptain extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function searchVoyageRecords($imono, $arrivaldate) {
        $this->db->select('*');
        $this->db->from('voyaged');
        $this->db->join('shipd', 'shipd.ship_id = voyaged.ship_id');
        $this->db->where('shipd.imo_no', $imono);
        $this->db->where('voyaged.arr_date', $arrivaldate);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function assignCaptain($data) {
        $this->db->insert('shipcaptaind', $data);
    }


    public function checkApprovedShipId($userid)
    {
        $this->db->select('voyage_id');
        $this->db->from('shipcaptaind');
        $this->db->where('user_id', $userid);
        $this->db->where('status', 'APPROVED');
        $query = $this->db->get();
        $voyage= $query->row();

        return $voyage ;
    }


    public function getVoyageDetails($voyageid)
    {
        $this->db->select('*');
        $this->db->from('voyage');
        $this->db->where('voyage_id', $voyageid);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function requestShorePass($voyageid, $userid)
    {
        // Check if the voyageid already exists in shorepassd
        $this->db->where('voyage_id', $voyageid);
        $query = $this->db->get('shorepassd');

        if ($query->num_rows() > 0) {
            // Voyage ID already exists, return false
            return false;
        } else {
            // Voyage ID does not exist, insert new record
            $data = array(
                'voyage_id' => $voyageid,
                'status' => "PENDING",
                'remark' => "",
                'user_id' => $userid,
            );
            $this->db->insert('shorepassd', $data);
            return true;
        }
    }

    public function getApprovedShorepass($userid) {

        $this->db->select('shorepassd.*, voyaged.*,shipd.*');
        $this->db->from('shorepassd');
        $this->db->join('voyaged', 'shorepassd.voyage_id = voyaged.voyage_id');
        $this->db->join('shipd', 'voyaged.ship_id = shipd.ship_id');
        $this->db->where('shorepassd.user_id', $userid);

        $query = $this->db->get();
        return $query->result();
    }

    public function getShorepassData($shorepass_id)
    {
        $this->db->select('shorepassd.*, voyaged.*, crewd.*,shipd.*');
        $this->db->from('shorepassd');
        $this->db->join('voyaged', 'shorepassd.voyage_id = voyaged.voyage_id');
        $this->db->join('crewd', 'voyaged.voyage_id = crewd.voyageid');
        $this->db->join('shipd', 'voyaged.ship_id = shipd.ship_id');
        $this->db->where('shorepassd.shorepass_id', $shorepass_id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


}