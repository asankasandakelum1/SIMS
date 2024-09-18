<?php

class Login extends CI_Controller
{


    public function index()
    {
        $this->load->view('Login');
    }
public function loginUser()
{
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() == FALSE)
    {
        $this->load->view('Login');
    }
    else
    {
        $this->load->model('Model_user');
        $result = $this->Model_user->loginUser();

        if($result != false) {
            if($result==2){
                $this->session->set_flashdata('errormsg','Your Account is Inactive');
                redirect('Home/Login');
            }else{
            $user_data = array(
                'firstname' => $result->fname,
                'lastname' => $result->lname,
                'user_id' => $result->uid,
                'email' => $result->uemail,
                'username' => $result->uname,
                'usercategory' => $result->ucategory,
                'agentname' => $result->agentname,
                'loggedin' => true

            );

            $this->session->set_userdata($user_data);
            print_r($_SESSION);
            $this->session->set_flashdata('welcome','Welcome Back');

            if($result->ucategory == 'Admin') {
                redirect('Admin/dashboard_Home');
            }elseif ($result->ucategory == 'Immigration Officer'){
                redirect('Officer/dashboard_Home');
            }elseif ($result->ucategory == 'Shipping Agent'){
                redirect('Agent/dashboard_Home');
            }elseif($result->ucategory == 'Ship Captain'){
                redirect('Shipcaptain/dashboard_Home');
            }
        }}
        else{
            $this->session->set_flashdata('errormsg','Wrong Username or Password');
            redirect('Home/Login');
        }
    }
}

public function logoutUser()
{
    $this->session->unset_userdata('fname');
    $this->session->unset_userdata('lname');
    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('usercategory');
    $this->session->unset_userdata('loggedin');
    redirect('Home/login');
}

}
