<?php

class Comment extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    public function comment($id)
    {
        $where = array('article_id'=>$id);

        return $this->db->get_where('comments',$where);
    }

    public function add($id)
    {
        $this->db->insert('comments',$_POST);
    }
}
