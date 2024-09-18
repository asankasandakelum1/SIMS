<?php

class Officer extends CI_Controller
{
    public function index()
    {

    }

    public function dashboard_Home()
    {
        $this->load->view('Officer/dashboard_Home');
    }

    public function assigncaptain()
    {
        $this->load->model('Model_Officer');
        $data['shipassigns'] = $this->Model_Officer->getAllShipAssigns();

        $this->load->view('Officer/assigncaptain', $data);

    }

    public function ActivateAssign($shipcap_id)
    {
        $this->load->model('Model_Officer');
        $response = $this->Model_Officer->activate($shipcap_id);

        if ($response) {
            $this->session->set_flashdata('msg', 'Ship Captain Successfully Assigned');
            redirect('Officer/assigncaptain');
        } else {
            $this->session->set_flashdata('msg', 'Something went Wrong');
            redirect('Officer/assigncaptain');
        }
    }

    public function dectivateAssign($shipcap_id)
    {
        $this->load->model('Model_Officer');
        $response = $this->Model_Officer->deactivate($shipcap_id);

        if ($response) {
            $this->session->set_flashdata('msg', 'Ship Captain Assignment Successfully Removed ');
            redirect('Officer/assigncaptain');
        } else {
            $this->session->set_flashdata('msg', 'Something went Wrong');
            redirect('Officer/assigncaptain');
        }
    }

    public function deleteAssign($shipcap_id)
    {
        $this->load->model('Model_Officer');
        $response = $this->Model_Officer->delete($shipcap_id);

        if ($response) {
            $this->session->set_flashdata('msg', 'Ship Captain Successfully Deleted');
            redirect('Officer/assigncaptain');
        } else {
            $this->session->set_flashdata('msg', 'Something went Wrong');
            redirect('Officer/assigncaptain');
        }
    }

//=====================================================
   public function issueArrivalClearance()
   {
       $this->load->model('Model_Officer');
       $data['Clearances'] = $this->Model_Officer->getAllClearances();

       $this->load->view('Officer/issueArrivalClearance',$data);
   }

   public function grantClearance($clearance_id)
   {
       $this->load->model('Model_Officer');
       $response = $this->Model_Officer->grantClearance($clearance_id);

       if ($response) {
           $this->session->set_flashdata('msg', 'Arrival Clearance Granted');
           redirect('Officer/issueArrivalClearance');
       } else {
           $this->session->set_flashdata('msg', 'Something went Wrong');
           redirect('Officer/issueArrivalClearance');
       }
   }

   public function deleteClearanceRequest($clearance_id)
   {
       $this->load->model('Model_Officer');
       $response = $this->Model_Officer->deleteClearanceRequest($clearance_id);

       if ($response) {
           $this->session->set_flashdata('msg', 'Request Successfully Deleted');
           redirect('Officer/issueArrivalClearance');
       } else {
           $this->session->set_flashdata('msg', 'Something went Wrong');
           redirect('Officer/issueArrivalClearance');
       }
   }



    //==============================

    public function crewview($clearance_id)
    {
        $this->load->model('Model_Officer');
        $data['crew_members'] = $this->Model_Officer->viewCrew($clearance_id);
        $data['watchlist'] = $this->Model_Officer->securityCheck($clearance_id);

        $this->load->view('Officer/crewview', $data);
    }


  //  ================================

   public function issueShorePass()
   {
       $this->load->model('Model_Officer');
       $data['Shorepasses'] = $this->Model_Officer->getAllshorepassrequest();

       $this->load->view('Officer/issueShorePass',$data);
   }
    public function notIssueShore($shorepass_id)
    {
        $this->load->model('Model_Officer');
        $response = $this->Model_Officer->notIssueShore($shorepass_id);

        if ($response) {
            $this->session->set_flashdata('msg', 'Shore Pass Cancelled');
            redirect('Officer/issueShorePass');
        } else {
            $this->session->set_flashdata('msg', 'Something went Wrong');
            redirect('Officer/issueShorePass');
        }
    }

    public function IssueShore($shorepass_id)
    {
        $this->load->model('Model_Officer');
        $response = $this->Model_Officer->IssueShore($shorepass_id);

        if ($response) {
            $this->session->set_flashdata('msg', 'Shore Pass Issued');
            redirect('Officer/issueShorePass');
        } else {
            $this->session->set_flashdata('msg', 'Something went Wrong');
            redirect('Officer/issueShorePass');
        }
    }
    //=================================================
    public function searchCrew()
    {
        $this->load->model('Model_Officer');
        $data['shcrewmembers'] = $this->Model_Officer->searchCrew();

        $this->load->view('Officer/searchCrew',$data);
    }


}