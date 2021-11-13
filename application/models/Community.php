<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Community extends CI_Model
{
    public function getAllFriends($username)
    {
        $followingList = array();
        $this->db->select('friend');
        $friendsRes = $this->db->get_where('friends', array('username' => $username));
        foreach ($friendsRes->result() as $res) {
            array_push($followingList, $res->friend);
        }

        $followedList = array();
        $this->db->select('username');
        $friendsRes = $this->db->get_where('friends', array('friend' => $username));
        foreach ($friendsRes->result() as $res) {
            array_push($followedList, $res->username);
        }

        $friends = array_intersect($followingList, $followedList);
        $commonList = array_unique(array_merge($followingList, $followedList), SORT_REGULAR);

        $this->db->from('users');

        if ($commonList) {
            $this->db->where_in('username', $commonList);
            $res = $this->db->get();

            if ($res->num_rows() >= 1) {
                foreach ($res->result() as $item) {
                    if (in_array($item->username, $followingList)) {
                        $item->friendship = 'Following';
                    }
                    if (in_array($item->username, $followedList)) {
                        $item->friendship = 'Followed';
                    }
                    if (in_array($item->username, $friends)) {
                        $item->friendship = 'Friend';
                    }
                }
                return $res->result();
            } else {
                return False;
            }
        } else {
            return False;
        }
    }
}
