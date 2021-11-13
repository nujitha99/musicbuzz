<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Communities extends CI_Controller
{
    public function index()
    {
        $this->load->model('User');
        $this->load->model('Community');

        if (isset($this->session->isLoggedIn) && $this->session->isLoggedIn == True) {
            $this->load->view(
                'people',
                array(
                    'userdata' => $this->User->getUserDetails($this->session->username),
                    'friendslist' => $this->Community->getAllFriends($this->session->username)
                )
            );
        } else {
            $this->load->view('home');
        }
    }
}