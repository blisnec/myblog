<?php

class User extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    public function create_user($username, $password, $email, $full_name, $created_date)
    {
        $data = array('username'        => $username,
                      'password'        => sha1($password),
                      'email'           => $email,
                      'full_name'       => $full_name,
                      'created_at'      => $created_date,
                     );
        $this->db->insert('users', $data);
    }
    
    public function check_username($username)
    {
        $this->db->select('username', FALSE);
        $this->db->where('LOWER(username)=', strtolower($username));
        $query = $this->db->get('users');

        if ($query->result()) {
            foreach ($query->result() as $row) {
            $res = $row->username;
            }
        } else {
            $res = null;
        }

        return $res;
    }

    public function check_email($email)
    {
        $this->db->select('email', FALSE);
        $this->db->where('LOWER(email)=', strtolower($email));
        $query = $this->db->get('users');

        if ($query->result()) {
            foreach ($query->result() as $row) {
            $res = $row->email;
            }
        } else {
            $res = null;
        }

        return $res;
    }
}
