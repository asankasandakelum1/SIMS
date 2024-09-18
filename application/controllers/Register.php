<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Register extends CI_Controller
{


    public function index()
    {
        $this->load->model('Model_shipagent');
        $data['agents'] = $this->Model_shipagent->getAgents();
        $this->load->view('Register', $data);
    }


    public function RegisterUser()
    {



        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[userd.uemail]');
        $this->form_validation->set_rules('nic', 'NIC No', 'required|is_unique[userd.nic]');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('user_category', 'UserCategory', 'required');
        $this->form_validation->set_rules('agentname', 'agent_name');




        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('Register');
        }
        else
        {
            $this->load->model('Model_user');
            $username = $this->input->post('username');
                if ($this->Model_user->isUsernameExists($username)) {
                $this->session->set_flashdata('msg', 'Username already exists');
                redirect('Home/Register');
                }

            $this->load->model('Model_user');
            $nic = $this->input->post('nic');
            if ($this->Model_user->isNICExists($nic)) {
                $this->session->set_flashdata('msg', 'NIC no already exists');
                redirect('Home/Register');
            }

            $response = $this->Model_user->insertUserdata();
            if ($response) {
                $this->session->set_flashdata('msg', 'Registered Successfully. Please Login');
                redirect('Home/Register');
            } else {
                $this->session->set_flashdata('msg', 'Something went Wrong');
                redirect('Home/Register');
            }

        }

    }
}