<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $this->load->model('User');
        $this->load->model('Post');

        if (isset($this->session->isLoggedIn) && $this->session->isLoggedIn == True) {
            $this->load->view(
                'home', array(
                    'isHidden' => false,
                    'userdata' => $this->User->getUserDetails($this->session->username),
                    'posts' => $this->Post->getPostsOfUserAndFollowers($this->session->username))
            );
        } else {
            $this->load->view(
                'login',
                array('errorMessage' => '')
            );
        }
    }
}
