<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('article');
        $this->load->model('comment');
    }

    public function index()
    {
        $username = (string) $this->uri->segment(3);
        $data = $this->article->articles();

        $this->load->view('main/home', array('data' => $data, 'username' => $username));
    }

    public function article()
    {
        $id = (int) $this->uri->segment(3);
        $username = (string) $this->uri->segment(4);
        $data['article'] = $this->article->article($id);
        $data['comments'] = $this->comment->comment($id);
        $data['username'] = $username;

        $this->load->view('main/article',$data);
    }

    public function create()
    {
        $username = (string) $this->uri->segment(3);
        $this->load->view('main/create', array('username' => $username));
    }

    public function add()
    {
        $insert_id=  $this->article->insert();

        redirect('/main/article/'.$insert_id);
    }

    public function edit()
    {
        $id = (int) $this->uri->segment(3);
        $res = $this->article->article($id);

        $this->load->view('main/edit',array('article'=>$res));
    }

    public function save()
    {
        $id = (int) $this->uri->segment(3);
        $this->article->save($id);

        redirect('/main/article/'.$id);
    }

    public function delete()
    {
        $id = (int) $this->uri->segment(3);
        $this->article->delete($id);

        redirect();
    }

    public function add_comment()
    {
        $this->comment->add();

        redirect('/main/article/'.$_POST['article_id'].'/'.$_POST['comment_user_name']);
    }
}
