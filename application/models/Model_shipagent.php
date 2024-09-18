<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_shipagent extends CI_Model {


    public function getAgents()
    {
        $query = $this->db->get('shipagentd');
        return $query->result();
    }

    public function insertAgentCompanydata()
    {
        $data= array(
            'agentname' => $this->input->post('agentname',True),
            'agentaddress' => $this->input->post('agentaddress',True),
            'contactperson' => $this->input->post('contactperson',True),
            'contactno' => $this->input->post('contactno',True),

        );
        return $this->db->insert('shipagentd',$data);
    }


    public function deleteCompany($agentId)
    {
        $this->db->where('agentid', $agentId);
        return $this->db->delete('shipagentd');

    }

}