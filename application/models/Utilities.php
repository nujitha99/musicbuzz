<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Utilities extends CI_Model
{
    public function getAllGenres()
    {
        $genreData = array();
        $res = $this->db->get('genres');
        if ($res->num_rows() >= 1) {
            foreach($res->result() as $genre){
                $genreData[$genre->genreId] = $genre->genreName;
            }
            return $genreData;
        }
        return null;
    }
}