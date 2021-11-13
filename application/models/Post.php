<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Model
{
    public function createNewPost($username, $postContent)
    {
        return $this->db->insert(
            'posts',
            array(
                'postDate' => date('Y-m-d H:i:s'),
                'postAuthor' => $username,
                'postContent' => $postContent
            )
        );
    }

    public function getPostsOfUser($username)
    {
        $this->db->join('users', 'users.username = posts.postAuthor');
        $this->db->order_by('postDate', 'DESC');
        $res = $this->db->get_where('posts', array('postAuthor' => $username));
        if ($res->num_rows() >= 1) {
            return $res->result();
        }
    }

    public function getPostsOfUserAndFollowers($username)
    {
        $friendArr = array($username);
        $this->db->select('friend');
        $friendsRes = $this->db->get_where('friends', array('username' => $username));
        foreach ($friendsRes->result() as $res) {
            array_push($friendArr, $res->friend);
        }

        $this->db->from('posts');
        $this->db->join('users', 'users.username = posts.postAuthor');
        $this->db->order_by('postDate', 'DESC');
        $this->db->where_in('posts.postAuthor', $friendArr);
        $res2 = $this->db->get();
        if ($res2->num_rows() >= 1) {
            return $res2->result();
        }
    }
}
