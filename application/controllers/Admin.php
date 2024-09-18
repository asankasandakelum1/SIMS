<?php

class Admin extends CI_Controller
{
    public function index()
    {
        $this->load->view('Admin/dashboard.php');
    }

    public function user_roles()
    {
        $this->load->model('Model_user');
        $data['users'] = $this->Model_user->getAllUsers();
        $this->load->view('Admin/user_roles.php', $data);
    }

    public function Ship_AgentReg()
    {
      //  $this->load->model('Model_user');
      //  $data['users'] = $this->Model_user->getAllUsers();
        $this->load->view('Admin/Ship_AgentReg.php');
    }
    public function dashboard_Home()
    {
        $this->load->view('Admin/dashboard_Home.php');
    }

    public function activateUser($userId)
    {
        $this->load->model('Model_user');

        $response =  $this->Model_user->activateUser($userId);

        if ($response) {
            $this->session->set_flashdata('msg', 'Status Successfully Updated');
            redirect('Admin/user_roles');
        } else {
            $this->session->set_flashdata('msg', 'Something went Wrong');
            redirect('Admin/user_roles');
        }


    }

    public function deactivateUser($userId)
    {
        $this->load->model('Model_user');

        $response = $this->Model_user->deactivateUser($userId);

        if ($response) {
            $this->session->set_flashdata('msg', 'Status Successfully Updated');
            redirect('Admin/user_roles');
        } else {
            $this->session->set_flashdata('msg', 'Something went Wrong');
            redirect('Admin/user_roles');
        }
    }

    public function deleteUser($userId)
    {
        $this->load->model('Model_user');

        $response = $this->Model_user->deleteUser($userId);

        if ($response) {
            $this->session->set_flashdata('msg', 'User Details Deleted.');
            redirect('Admin/user_roles');
        } else {
            $this->session->set_flashdata('msg', 'Something went Wrong');
            redirect('Admin/user_roles');
        }
    }


}



