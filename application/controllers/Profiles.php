<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profiles extends CI_Controller
{
    public function index()
    {
        $this->load->model('User');
        $this->load->model('Utilities');

        if (isset($this->session->isLoggedIn) && $this->session->isLoggedIn == True) {
            $this->load->view(
                'searchprofiles',
                array(
                    'userdata' => $this->User->getUserDetails($this->session->username),
                    'genreList' => $this->Utilities->getAllGenres(),
                    'searchResult' => null
                )
            );
        } else {
            $this->load->view('home');
        }
    }

    public function search()
    {
        $genreId = $this->input->post('genre');

        $this->load->model('User');
        $this->load->model('Profile');
        $this->load->model('Utilities');

        $this->load->view(
            'searchprofiles',
            array(
                'userdata' => $this->User->getUserDetails($this->session->username),
                'genreList' => $this->Utilities->getAllGenres(),
                'searchResult' => $this->Profile->getUsersForGenre($genreId, $this->session->username)
            )
        );
    }

    public function follow()
    {
        $followUser = $this->input->post('followUser');

        $this->load->model('Profile');
        $res = $this->Profile->followUser($this->session->username, $followUser);

        if ($res) {
            header('Location: /w1742286/index.php/Profiles');
        }
    }

    public function viewProfile()
    {
        $username = $this->uri->segment(3);
        $isFollowing = false;
        if ($this->uri->segment(4) == 'true') {
            $isFollowing = true;
        }

        $this->load->model('User');
        $this->load->model('Post');

        $this->load->view(
            'home',
            array(
                'isHidden' => true,
                'isFollowing' => $isFollowing,
                'userdata' => $this->User->getUserDetails($username),
                'posts' => $this->Post->getPostsOfUser($username)
            )
        );
    }
}
