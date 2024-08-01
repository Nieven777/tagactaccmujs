<?php
class Volume_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function createVolume($data) {
        return $this->db->insert('Volume', $data);
    }

    public function getVolumeById($volumeid) {
        return $this->db->get_where('Volume', array('volumeid' => $volumeid))->row();
    }

    public function updateVolume($volumeid, $data) {
        $this->db->where('volumeid', $volumeid);
        return $this->db->update('Volume', $data);
    }

    public function deleteVolume($volumeid) {
        // Delete the volume from the database
        $this->db->where('volumeid', $volumeid);
        $this->db->delete('Volume');
    }
    
    public function getAllVolumes() {
        return $this->db->get('Volume')->result();
    }

    public function getVolumes() {
        return $this->db->get('Volume')->result_array();
    }

    public function updatePublishedStatus($volumeid, $published) {
        // Determine the value for date_published based on the published status
        $date_published = $published == 1 ? date('Y-m-d H:i:s') : null;
    
        // Update the published status and date_published in the database
        $data = array(
            'published' => $published,
            'date_published' => $date_published
        );
    
        $this->db->where('volumeid', $volumeid);
        $this->db->update('Volume', $data);
    }
    

    // public function get_volume_by_id($volume_id) {
    //     return $this->db->get_where('volume', ['volumeid' => $volume_id])->row();
    // }
    
    // public function update_volume($volume_id, $data) {
    //     $this->db->where('volumeid', $volume_id);
    //     return $this->db->update('volume', $data);
    // }
    
    public function get_archived_volumes() {
        return $this->db->get_where('volume', ['archived' => 1])->result();
    }
    // public function get_archived_volumes() {
    //     $this->db->where('archived', 1);
    //     $query = $this->db->get('volume'); // Replace 'volumes' with your table name
    //     return $query->result();
    // }

    // In Volume_model.php

public function get_volume_by_id($volumeid) {
    $this->db->where('volumeid', $volumeid);
    $query = $this->db->get('volume'); // Adjust table name as needed
    return $query->row();
}

public function update_volume($volumeid, $data) {
    $this->db->where('volumeid', $volumeid);
    $this->db->update('volume', $data);
}


    
}
