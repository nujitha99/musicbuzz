<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Model
{
    public function register($userName, $firstName, $lastName, $password, $imgurl, $genre)
    {
        $res = $this->isUserExist($userName);

        if ($res) {
            return false;
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $this->db->insert(
                'users',
                array(
                    'username' => $userName,
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'password' => $hashedPassword,
                    'imgurl' => $imgurl,
                    'genreId' => $genre
                )
            );

            return true;
        }
    }

    public function authenticateLogin($username, $password)
    {
        $res = $this->isUserExist($username);
        $authStatus = array();

        if ($res) { //validate user
            $res = $this->db->get_where('users', array('username' => $username));
            $retreivedUserData = $res->row();
            $hashedUserPassword = $retreivedUserData->password;
            if (password_verify($password, $hashedUserPassword)) { //validate password
                $userData = array(
                    'userName' => $retreivedUserData->username,
                    'firstName' => $retreivedUserData->firstName,
                );
                $authStatus = array('isError' => false, 'userData' => $userData);
            } else {
                $authStatus = array('isError' => true, 'errorMessage' => 'Invalid Password');
            }
        } else {
            $authStatus = array('isError' => true, 'errorMessage' => 'Invalid Username');
        }

        return $authStatus;
    }

    private function isUserExist($username)
    {
        $this->db->select('username');
        $res = $this->db->get_where('users', array('username' => $username));

        if ($res->num_rows() == 1) {
            return True;
        } else {
            return False;
        }
    }

    public function getUserDetails($username)
    {
        $res = $this->db->get_where('users', array('username' => $username));

        if ($res->num_rows() == 1) {
            return $res->result();
        } else {
            return False;
        }
    }
}
