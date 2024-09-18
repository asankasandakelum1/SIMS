<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Officer extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getAllShipAssigns()
    {
        $this->db->select('shipcaptaind.*,voyaged.*,shipd.*');
        $this->db->from('shipcaptaind');
        $this->db->join('voyaged', 'shipcaptaind.voyage_id = voyaged.voyage_id');
        $this->db->join('shipd', 'voyaged.ship_id = shipd.ship_id');

        $query = $this->db->get();
        return $query->result();
    }

    public function activate($shipcap_id)
    {
        $this->db->set('status','APPROVED');
        $this->db->where('shipcap_id', $shipcap_id);
        return $this->db->update('shipcaptaind');
    }

    public function deactivate($shipcap_id)
    {
        $this->db->set('status','PENDING');
        $this->db->where('shipcap_id', $shipcap_id);
        return $this->db->update('shipcaptaind');
    }

    public function delete($shipcap_id)
    {
        $this->db->where('shipcap_id', $shipcap_id);
        return $this->db->delete('shipcaptaind');

    }

    public function getAllClearances()
    {
        $this->db->select('arrivalclearanced.*,voyaged.*,shipd.*');
        $this->db->from('arrivalclearanced');
        $this->db->join('voyaged', 'arrivalclearanced.voyage_id = voyaged.voyage_id');
        $this->db->join('shipd', 'voyaged.ship_id = shipd.ship_id');

        $query = $this->db->get();
        return $query->result();
    }

    public function viewCrew($clearance_id)
    {
        $this->db->select('arrivalclearanced.*,voyaged.*,crewd.*');
        $this->db->from('crewd');
        $this->db->join('voyaged', 'crewd.voyageid = voyaged.voyage_id');
        $this->db->join('arrivalclearanced', 'voyaged.voyage_id = arrivalclearanced.voyage_id');
        $this->db->where('arrivalclearanced.clearance_id', $clearance_id);

        $query = $this->db->get();
        return $query->result();
    }

    public function securityCheck($clearance_id)
    {
        $this->db->select('arrivalclearanced.*, voyaged.*, crewd.*, watchlistd.*');
        $this->db->from('crewd');
        $this->db->join('voyaged', 'crewd.voyageid = voyaged.voyage_id');
        $this->db->join('arrivalclearanced', 'voyaged.voyage_id = arrivalclearanced.voyage_id');
        $this->db->join('watchlistd', 'crewd.pptno = watchlistd.ppt_no', 'left');
        $this->db->where('arrivalclearanced.clearance_id', $clearance_id);
        $this->db->where('watchlistd.ppt_no IS NOT NULL');

        $query = $this->db->get();
        return $query->result();
    }

    public function grantClearance($clearance_id)
    {
        $this->db->set('status','APPROVED');
        $this->db->where('clearance_id', $clearance_id);
        return $this->db->update('arrivalclearanced');
    }

    public function deleteClearanceRequest($clearance_id)
    {
        $this->db->where('clearance_id', $clearance_id);
        return $this->db->delete('arrivalclearanced');
    }


    public function getAllshorepassrequest()
    {
        $this->db->select('shorepassd.*,voyaged.*,shipd.*');
        $this->db->from('shorepassd');
        $this->db->join('voyaged', 'shorepassd.voyage_id = voyaged.voyage_id');
        $this->db->join('shipd', 'voyaged.ship_id = shipd.ship_id');

        $query = $this->db->get();
        return $query->result();
    }

    public function notIssueShore($shorepass_id)
    {
        $this->db->set('status','PENDING');
        $this->db->where('shorepass_id', $shorepass_id);
        return $this->db->update('shorepassd');
    }

    public function IssueShore($shorepass_id)
    {
        $this->db->set('status','APPROVED');
        $this->db->where('shorepass_id', $shorepass_id);
        return $this->db->update('shorepassd');
    }


    public function searchCrew()
    {
        $this->db->select('shipd.*,voyaged.*,crewd.*');
        $this->db->from('crewd');
        $this->db->join('voyaged', 'crewd.voyageid = voyaged.voyage_id');
        $this->db->join('shipd', 'voyaged.ship_id = shipd.ship_id');

        $query = $this->db->get();
        return $query->result();
    }

}
