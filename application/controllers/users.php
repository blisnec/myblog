<?php

class Users extends CI_Controller
{

    public $form_validation;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $passwordx = sha1($password);
        $query = $this->db->query("SELECT * FROM users WHERE username='$username' AND password='$passwordx'");
        if ($query->num_rows() == 1) {
            $userID = $query->row()->id;
            $username = $query->row()->username;
            $this->session->set_userdata('useID',$userID);
            redirect(base_url().'index.php/main/index/' . $username);
        } else {
            $error ='To enter the correct username and password';
            $this->load->view('users/form/loginForm', array('error' => $error));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();

        redirect(base_url().'index.php/main/index/');
    }

    public function signup()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('users/form/signUpForm');
        } else  {
            $full_name = $this->input->post('fname');
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $activation_code = sha1(mt_rand(10000,99999).time().$email);
            $created_date=  date("Y-m-d H:i:s", time());
            $this->user->create_user($username, $password, $email,$full_name, $activation_code, $created_date);
            $userid = $this->db->insert_id();
            $this->session->set_userdata('userID', $userid);

            redirect(base_url().'index.php/main/index/' . $username);
        }
    }

    public function username_check($username)
    {
        $res = $this->user->check_username($username);
        if ($username == $res) {
            $this->form_validation->set_message('username_check', 'The %s field can not be the word "' . $username . '"');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function email_check($email)
    {
        $res = $this->user->check_email($email);
        if ($email == $res) {
            $this->form_validation->set_message('email_check', 'The %s field can not be the word "' . $email . '"');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}