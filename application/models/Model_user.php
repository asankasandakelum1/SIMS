<?php
class Model_user extends CI_Model
{

    function insertUserdata(){

        $data= array(
            'fname' => $this->input->post('fname',True),
            'lname' => $this->input->post('lname',True),
            'uemail' => $this->input->post('email',True),
            'nic' => $this->input->post('nic',True),
            'uname' => $this->input->post('username',True),
            'upassword' => sha1($this->input->post('password')),
            'ucategory' => $this->input->post('user_category'),
            'agentname' => $this->input->post('agent_name'),
            'officerid' => $this->input->post('officerid'),
            'ustatus' => 0,


        );
        return $this->db->insert('userd',$data);
    }

        function loginUser(){
        $uname = $this->input->post('username');
        $upassword = sha1($this->input->post('password'));


        $this->db->where('uname',$uname);
        $this->db->where('upassword',$upassword);

        $respond = $this->db->get('userd');
        $Inactiveuser = 0;

        if($respond->num_rows()==1){
            $user = $respond->row(0);
            if($user->ustatus==1) {
                return $respond->row(0);
            }else{

                return 2;
            }

        } else{
            return false;
        }

    }

    public function getAllUsers() {
        $query = $this->db->get('userd');
        return $query->result();
    }


    public function activateUser($userId)
    {
        $this->db->set('ustatus', 1);
        $this->db->where('uid', $userId);
        return $this->db->update('userd');



    }

    public function deactivateUser($userId)
    {
        $this->db->set('ustatus', 0);
        $this->db->where('uid', $userId);
        return $this->db->update('userd');

    }

    public function isUsernameExists($username)
    {
        $this->db->where('uname', $username);
        $query = $this->db->get('userd');
        return $query->num_rows() > 0;
    }

    public function isNICExists($nic)
{
    $this->db->where('nic', $nic);
    $query = $this->db->get('userd');
    return $query->num_rows() > 0;
}

    public function deleteUser($userId)
    {
        $this->db->where('uid', $userId);
        return $this->db->delete('userd');

    }

}
