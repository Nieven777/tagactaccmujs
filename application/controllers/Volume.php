<?php
class Volume extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Volume_model');
    }

    public function create() {
        $this->load->library('form_validation');
    
        // Form validation rules
        $this->form_validation->set_rules('vol_name', 'Volume Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            // Validation failed, load the create form again with validation errors
            $this->load->view('volume/db_Volumes');
        } else {
            // Validation successful, process form data
            $data = array(
                'vol_name' => $this->input->post('vol_name'),
                'description' => $this->input->post('description'),
                'published' => 0 // Set default value of 'published' to 0
            );
    
            // Call the model to insert data into the database
            $this->Volume_model->createVolume($data);
    
            // Redirect to the volume list page
            redirect('volume/db_Volumes');
        }
    }
    
 
    public function update($volumeid) {
        $this->form_validation->set_rules('vol_name', 'Volume Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
      
        if ($this->form_validation->run() === FALSE) {
            $data['volume'] = $this->Volume_model->getVolumeById($volumeid);
            // Load view with form for editing volume
            $this->load->view('pages/db_editVolume', $data);
        } else {
            $data = array(
                'vol_name' => $this->input->post('vol_name'),
                'description' => $this->input->post('description')
            );
            $this->Volume_model->updateVolume($volumeid, $data);
            redirect('volume/db_Volumes');
        }
    }



    public function toggle_published($volumeid) {
        // Get the current published status from the database
        $volume = $this->Volume_model->getVolumeById($volumeid);
    
        // Determine the new published status based on the current status
        $new_published = $volume->published == 1 ? 0 : 1;
    
        // Update the published status in the database
        $this->Volume_model->updatePublishedStatus($volumeid, $new_published);
    
        // Redirect back to the volume list
        redirect('volume/db_Volumes');
    }
    

    public function db_Volumes() {
        // Display list of volumes
        $data['volumes'] = $this->Volume_model->getAllVolumes();
        // Load view
        $this->load->view('templates/headerAdmin', $data);
        $this->load->view('pages/db_Volumes', $data);
        $this->load->view('templates/footerAdmin', $data);
    }

    public function db_createVolumes() {
        // Display list of volumes
        $data['volumes'] = $this->Volume_model->getAllVolumes();
        // Load view
        $this->load->view('templates/headerAdmin', $data);
        $this->load->view('pages/db_createVolumes', $data);
        $this->load->view('templates/footerAdmin', $data);
    }
    
    public function db_editVolume($volume_id) {
        // Get the volume data by its ID
        $data['volume'] = $this->Volume_model->getVolumeById($volume_id);
    
        // Load view
        $this->load->view('templates/headerAdmin', $data);
        $this->load->view('pages/db_editVolume', $data);
        $this->load->view('templates/footerAdmin', $data);
    }
    


    public function delete($volumeid) {
        // Delete the volume from the database
        $this->Volume_model->deleteVolume($volumeid);
        // Redirect back to the volume list
        redirect('volume/db_Volumes');
    }

    // public function toggle_archive($volume_id) {
    //     $this->load->model('Volume_model');
        
    //     $volume = $this->Volume_model->get_volume_by_id($volume_id);
    //     if ($volume) {
    //         $new_status = ($volume->archived == 1) ? 0 : 1;
    //         $this->Volume_model->update_volume($volume_id, ['archived' => $new_status]);
    //         redirect('volume/db_Volumes');  // Adjust the redirect as needed
    //     } else {
    //         show_404();
    //     }
    // }
    // In Volume.php controller

// In Volume.php controller

public function toggle_archive($volumeid) {
    $this->load->model('Volume_model');

    // Get the current volume data
    $volume = $this->Volume_model->get_volume_by_id($volumeid); 

    if ($volume) {
        // Determine the new archive and published statuses
        if ($volume->archived == 1) {
            // If currently archived, unarchive it and set published to 1
            $archived_status = 0;
            $published_status = 1;
        } else {
            // If not archived, archive it and set published to 0
            $archived_status = 1;
            $published_status = 0;
        }

        // Prepare data for updating
        $data = array(
            'archived' => $archived_status,
            'published' => $published_status
        );

        // Update the volume in the database
        $this->Volume_model->update_volume($volumeid, $data);
    }

    // Redirect to the list page
    redirect('volume/db_Volumes');
}







// public function archived() {
//     // Fetch archived volumes
//     $data['archived_volumes'] = $this->Volume_model->get_archived_volumes();

//     // Load the archived volumes view
//     $this->load->view('archives', $data);
// }



    
}
