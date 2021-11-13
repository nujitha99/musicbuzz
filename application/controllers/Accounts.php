<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Accounts extends CI_Controller
{

    public function register()
    {
        $data = array(
            'genreList' => $this->getGenres(),
            'errorMessage' => ''
        );
        $this->load->view('register', $data);
    }

    public function getGenres()
    {
        $this->load->model('Utilities');
        return $this->Utilities->getAllGenres();
    }

    public function login()
    {
        $this->load->view(
            'login',
            array('errorMessage' => '')
        );
    }

    public function registerNewUser()
    {
        $firstName = $this->input->post('firstName');
        $lastName = $this->input->post('lastName');
        $userName = $this->input->post('userName');
        $password = $this->input->post('password');
        $imgurl = $this->input->post('imgurl');
        $genre = $this->input->post('genre');

        $this->load->model('User');
        $res = $this->User->register(
            $userName,
            $firstName,
            $lastName,
            $password,
            $imgurl,
            $genre
        );

        if ($res) {
            $this->session->isLoggedIn = true;
            $this->session->username = $userName;
            header('Location: /w1742286/index.php/Home');
        } else {
            $this->load->view(
                'register',
                array('errorMessage' => 'Username exists')
            );
        }
    }

    public function authenticateLogin()
    {
        $this->load->model('User');

        $userName = $this->input->post('userName');
        $password = $this->input->post('password');

        $res = $this->User->authenticateLogin($userName, $password);

        if (!$res['isError']) {
            $this->session->isLoggedIn = true;
            $this->session->username = $res['userData']['userName'];
            header('Location: /w1742286/index.php/Home');
        } else {
            $this->load->view(
                'login',
                array('errorMessage' => $res['errorMessage'])
            );
        }
    }

    public function logout()
    {
        $this->session->isLoggedIn = False;
        $this->session->username = null;
        header('Location: /w1742286/index.php/Accounts/login');
    }
}
