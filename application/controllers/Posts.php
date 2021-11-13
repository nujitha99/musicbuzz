<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Posts extends CI_Controller
{
    public function createPost()
    {
        $postcontent = $this->input->post('postcontent');

        $this->load->model('Post');
        $res = $this->Post->createNewPost($this->session->username, $postcontent);

        if ($res) {
            header('Location: /w1742286/index.php/Home');
        }
    }

}