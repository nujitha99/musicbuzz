<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Model
{
    public function getUsersForGenre($genreId, $username)
    {
        $friendArr = array();
        $this->db->select('friend');
        $friendsRes = $this->db->get_where('friends', array('username' => $username));
        foreach ($friendsRes->result() as $res) {
            array_push($friendArr, $res->friend);
        }
        $this->db->join('genres', 'users.genreId = genres.genreId');
        $res = $this->db->get_where('users', array('users.genreId' => (int)$genreId));

        $resultData = $res->result();
        foreach ($resultData as $rec) {
            if (in_array($rec->username, $friendArr)) {
                $rec->isFollowing = true;
            } else {
                $rec->isFollowing = false;
            }

            if ($resultData == $username) {
                unset($res->result()[$rec]);
            }
        }

        if ($res->num_rows() >= 1) {
            return $res->result();
        } else {
            return False;
        }
    }

    public function followUser($username, $followUser)
    {
        return $this->db->insert(
            'friends',
            array(
                'username' => $username,
                'friend' => $followUser
            )
        );
    }
}