

<!-- Your existing HTML content -->

<?php


class Article extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Article_model');
        $this->load->model('Volume_model');
    }
    public function index() {
        // Load model
        $this->load->model('Article_model');
    
        // Fetch data from model
        $data['articleData'] = $this->Article_model->get_articles();
    
        // Load view and pass data
        $this->load->view('articles_view', $data);
    }
    

    public function submitNow() {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('keywords', 'Keywords', 'required');
            $this->form_validation->set_rules('abstract', 'Abstract', 'required');
    
            if ($this->form_validation->run() == TRUE) {
                $user_filename = $this->uploadFile();
    
                $title = $this->input->post('title');
                $keywords = $this->input->post('keywords');
                $abstract = $this->input->post('abstract');
                $slug = url_title($title);
    
                $doi_prefix = 'DOI'; 
                $unique_identifier = uniqid(); 
                $doi = $doi_prefix . ':' . $unique_identifier;
    
                $volume_id = $this->input->post('volume_id');
    
                // Get the user ID of the author who submitted the article
                $user_id = $this->session->userdata('UserLoginSession')['userid'] ?? null;
    
                // Get the author ID (audid) based on the user ID
                $this->load->model('Author_model');
                $author_id = $this->Author_model->getAuthorIdByUserId($user_id);
    
                if (!$author_id) {
                    // Handle the case where author_id is not found
                    $this->session->set_flashdata('error', 'Author ID not found.');
                    redirect(base_url('article/submitForm'));
                }
    
                $data = array(
                    'title' => $title,
                    'slug' => $slug,
                    'keywords' => $keywords,
                    'abstract' => $abstract,
                    'filename' => $user_filename,
                    'doi' => $doi,
                    'volumeid' => $volume_id
                );
    
                $this->load->model('Article_model');
                $article_id = $this->Article_model->insertarticle($data); // Get the article ID
    
                if ($article_id) {
                    // Insert into article_author table
                    $this->Article_model->insertArticleAuthor($article_id, $author_id);
    
                    // Insert into article_submission table
                    $submission_data = array(
                        'auid' => $author_id,
                        'title' => $title,
                        'slug' => $slug, // Adding the slug here
                        'filename' => $user_filename,
                        'submission' => 1,
                        'date_submitted' => date('Y-m-d H:i:s'),
                        'payment' => 0,
                        'date_paid' => null,
                        'review' => 0,
                        'date_forwarded_review' => null,
                        'approved' => 0,
                        'date_approved' => null,
                        'published' => 0,
                        'date_published' => null
                    );
    
                    $this->Article_model->insertArticleSubmission($submission_data);
    
                    $this->session->set_flashdata('success', 'Article submitted successfully!');
                    redirect(base_url('home/home_lp'));
                } else {
                    $this->session->set_flashdata('error', 'Failed to submit article.');
                    redirect(base_url('article/submitForm'));
                }
            }
        }
    }
 
    public function submitNow2() {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('keywords', 'Keywords', 'required');
            $this->form_validation->set_rules('abstract', 'Abstract', 'required');
            $this->form_validation->set_rules('authors', 'Authors', 'required');
    
            if ($this->form_validation->run() == TRUE) {
                $user_filename = $this->uploadFile();
    
                $title = $this->input->post('title');
                $keywords = $this->input->post('keywords');
                $abstract = $this->input->post('abstract');
                $authors = $this->input->post('authors');
                
                $slug = url_title($title);
    
                $doi_prefix = 'DOI'; 
                $unique_identifier = uniqid(); 
                $doi = $doi_prefix . ':' . $unique_identifier;
    
                $volume_id = $this->input->post('volume_id');
    
                // Get the user ID of the author who submitted the article
                $user_id = $this->session->userdata('UserLoginSession')['userid'] ?? null;
    
                // Get the author ID (audid) based on the user ID
                // $this->load->model('Author_model');
                // $author_id = $this->input->post('aud_id');
    
                // if (!$author_id) {
                //     // Handle the case where author_id is not found
                //     $this->session->set_flashdata('error', 'Author ID not found.');
                //     redirect(base_url('article/submitForm'));
                // }
    
                $data = array(
                    'title' => $title,
                    'slug' => $slug,
                    'keywords' => $keywords,
                    'abstract' => $abstract,
                    'filename' => $user_filename,
                    'doi' => $doi,
                    'volumeid' => $volume_id,
                    'authors' => $authors

                );
    
                $this->load->model('Article_model');
                $article_id = $this->Article_model->insertarticle($data); // Get the article ID
                $user_id = $this->session->userdata('UserLoginSession')['userid'] ?? null;

$this->load->model('Author_model');
$author_id = $this->Author_model->getAuthorIdByUserId($user_id);

if (!$author_id) {
    // Handle the case where author_id is not found
    $this->session->set_flashdata('error', 'Author ID not found.');
    redirect(base_url('pages/db_allArticles'));
}

// Ensure $author_id is defined before using it
if ($article_id) {
    $this->Article_model->insertArticleAuthor($article_id, $author_id);
    
                if ($article_id) {
                    // Insert into article_author table
                    $this->Article_model->insertArticleAuthor($article_id, $author_id);
    
                    // Insert into article_submission table
                    $submission_data = array(
                        // 'auid' => $author_id,
                        'title' => $title,
                        'slug' => $slug, // Adding the slug here
                        'filename' => $user_filename,
                        'submission' => 1,
                        'date_submitted' => date('Y-m-d H:i:s'), 
                        'payment' => 0, 
                        'date_paid' => null,
                        'review' => 0,
                        'date_forwarded_review' => null,
                        'approved' => 0,
                        'date_approved' => null,
                        'published' => 0,
                        'date_published' => null,
                        'authors' => $authors
                        
                    );
    
                    // $this->Article_model->insertArticleSubmission($submission_data);
    
                    $this->session->set_flashdata('success', 'Article submitted successfully!');
                    redirect(base_url('pages/db_allArticles'));
                } else {
                    $this->session->set_flashdata('error', 'Failed to submit article.');
                    redirect(base_url('pages/db_allArticles'));
                }
            }
        }
    }
}
    



    private function uploadFile() {
        $ori_filename = $_FILES['file']['name'];
        $new_name = time() . "" . str_replace('-', '', $ori_filename);
        $config = [
            'upload_path' => './files/',
            'allowed_types' => 'pdf', 
            'file_name' => $new_name, 
        ];
    
        $this->load->library('upload', $config);
    
        if (!empty($_FILES['file']['name'])) {

            if (!$this->upload->do_upload('file')) { 

                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect(base_url('article/submitForm'));
            } else {

                $upload_data = $this->upload->data(); 
                return $upload_data['file_name']; 
            }
        } else {
        
            return ''; 
        }
    }
     


    public function search() { 
    $this->load->model('Article_model');
    $search = $this->input->get('search', true);
    $data['submittedArticles'] = $this->Article_model->get_articles($search);
    $data['search'] = $search;
    $this->load->view('db_authArticles', $data);
}


   
 
    
  
}