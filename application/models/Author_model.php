<?php
class Author_model extends CI_Model {

    public function getAuthorProfile($user_id) {
        $query = $this->db->get_where('authors', array ('audid' => $user_id));
        return $query->row();
    }

    public function insertAuthor($data) {
        $this->db->insert('authors', $data);
    }
    public function get_authors() {
        $query = $this->db->get('authors'); // Assuming your table is named 'authors'
        return $query->result();
    }

    public function updateAuthor($data) {
        $this->db->where('uid', $data['uid']);
        $this->db->update('authors', $data);
    }

    public function authorExists($uid) {
        $this->db->where('uid', $uid);
        $query = $this->db->get('authors'); 
        return $query->num_rows() > 0;
    }
    public function getAuthorIdByUserId($user_id) {
        $this->db->select('audid');
        $this->db->from('authors');
        $this->db->where('uid', $user_id);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row()->audid;
        } else {
            return false;
        } 
    }
    public function get_all_authors() {
        $query = $this->db->get('authors');
        return $query->result_array();
    }

    // Add new author
    public function add_author($data) {
        $this->db->insert('authors', $data);
    }

    // Get author by ID
    public function get_author($audid) {        
        $query = $this->db->get_where('authors', array('audid' => $audid));
        return $query->row();
    }
    public function get_author_by_id($audid) {
        $this->db->where('audid', $audid);
        $query = $this->db->get('authors');
        return $query->row();
    }

    // Update author
    public function update_author($audid, $data) {
        $this->db->where('audid', $audid);
        $this->db->update('authors', $data);
    }

    // Delete author
    public function delete_author($audid) {
        $this->db->where('audid', $audid);
        $this->db->delete('authors');
    }

    public function getAuthorByUserId($user_id) {
        // Assuming you have a table named 'authors' with a column named 'uid'
        $query = $this->db->get_where('authors', array('uid' => $user_id));
        return $query->row(); // Returns the author data if found, otherwise null
    }
   
}

