<?php

class Article extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    public function articles()
    {
        $query = $this->db->get('articles');
        return $query;
    }

    public function article($id)
    {
        $where = array('article_id'=>$id);

        return $this->db->get_where('articles',$where)->row();
    }

    public function insert()
    {
        $this->db->insert('articles',$_POST);

        return $this->db->insert_id();
    }

    public function save($id)
    {
        $this->db->where(array('article_id'=>$id))->update('articles',$_POST);
    }

    public function delete($id)
    {
        $this->db->where(array('article_id'=>$id))->delete('articles');
    }
}