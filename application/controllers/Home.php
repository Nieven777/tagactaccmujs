<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
 
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model'); 
        $this->load->model('Article_model');
        $this->load->model('Volume_model');
        $this->load->model('Author_model'); 
    

      
    }
    public function index() {
        $data['articleData'] = $this->Article_model->get_all_articles();
        $data['volumes'] = $this->Volume_model->getVolumes(); 
        // Retrieve article data 
        $articleData = $this->Article_model->get_article();
        $data['authors'] = $this->Author_model->get_authors();
    
        // Loop through each article data to fetch author's name and add it to the article data
        if (!empty($articleData)) {
            foreach ($articleData as $article) {
                $authorData = $this->Article_model->getAuthorByArticleId($article->articleid);
                // Ensure that $authorData is not null before accessing its properties
                $article->authors = $authorData ? $authorData->authors : 'Unknown Author';
            }
        }
        
        $volumes = $this->Volume_model->getVolumes();

        $data['articleData'] = $articleData;
        $data['volumes'] = $volumes; // Pass volumes data to the view
        $this->load->view('home/home', $data);
    }
    
    public function get_authors() {
        $query = $this->db->get('authors'); // Assuming your table is named 'authors'
        return $query->result();
    }
    
    
    // public function archives() {
    //     $this->load->view('home/archives');
        
    // }
    
    public function about() {
        $this->load->view('home/about');
    }

    public function contact() {
        $this->load->view('home/contact');
    }
    public function articles() {
        // Retrieve article data
        $articleData = $this->Article_model->get_article();

        // Loop through each article data to fetch author's name and add it to the article data
        if (!empty($articleData)) {
            foreach ($articleData as $article) {
                $authorData = $this->Article_model->getAuthorByArticleId($article->articleid);
                // Ensure that $authorData is not null before accessing its properties
                $article->author_name = $authorData ? $authorData->author_name : 'Unknown Author';
            }
        }

        $data['articleData'] = $articleData;
        $this->load->view('home/articles', $data);
    }
    public function articles_admin() {
        // Retrieve article data
        $articleData = $this->Article_model->get_article();

        // Loop through each article data to fetch author's name and add it to the article data
        if (!empty($articleData)) {
            foreach ($articleData as $article) {
                $authorData = $this->Article_model->getAuthorByArticleId($article->articleid);
                // Ensure that $authorData is not null before accessing its properties
                $article->authors = $authorData ? $authorData->author_name : 'Unknown Author';
            }
        }

        $data['articleData'] = $articleData;

        // Fetch user data
        $userLoginSession = $this->session->userdata('UserLoginSession');
        if (!is_null($userLoginSession) && isset($userLoginSession['userid'])) {
            $user_id = $userLoginSession['userid'];
            $userData = $this->User_model->select_user_by_id($user_id);
            $data['userData'] = $userData;
        }

        $this->load->view('home/articles_admin', $data);
    }

    public function post($slug = NULL) {
        if ($slug) {
            $articleData = $this->Article_model->get_article_slug($slug);
        } else {
            $articleData = $this->Article_model->get_latest_article();
        }

        if ($articleData) {
            // Loop through each article data to fetch author's name and add it to the article data
            foreach ($articleData as $article) {
                $authorData = $this->Article_model->getAuthorByArticleId($article->articleid);
                // Ensure that $authorData is not null before accessing its properties
                $article->authors = $authorData ? $authorData->authors : 'Unknown Author';
            }
            $data['articleData'] = $articleData;
            $this->load->view('home/post', $data);
        } else {
            echo "No article found.";
        }
    }
    

    public function about_lp() {
        $user_id = $this->session->userdata('UserLoginSession')['userid'] ?? null;
        if ($user_id) {
            $userData = $this->User_model->select_user_by_id($user_id);
            $info['userData'] = $userData;
            $this->load->view('home/about_lp', $info);
        } else {
            // Handle the case where user is not logged in
        }
    }

    public function about_admin() {
        $user_id = $this->session->userdata('UserLoginSession')['userid'] ?? null;
        if ($user_id) {
            $userData = $this->User_model->select_user_by_id($user_id);
            $info['userData'] = $userData;
            $this->load->view('home/about_admin', $info);
        } else {
            // Handle the case where user is not logged in
        }
    }

    public function contact_lp() {
        $user_id = $this->session->userdata('UserLoginSession')['userid'] ?? null;
        if ($user_id) {
            $userData = $this->User_model->select_user_by_id($user_id);
            $info['userData'] = $userData;
            $this->load->view('home/contact_lp', $info);
        } else {
            // Handle the case where user is not logged in
        }
    }

    public function contact_admin() {
        $user_id = $this->session->userdata('UserLoginSession')['userid'] ?? null;
        if ($user_id) {
            $userData = $this->User_model->select_user_by_id($user_id);
            $info['userData'] = $userData;
            $this->load->view('home/contact_admin', $info);
        } else {
            // Handle the case where user is not logged in
        }
    }

    public function post_lp($slug = NULL) {
        $user_id = $this->session->userdata('UserLoginSession')['userid'] ?? null;
        if ($user_id) {
            $userData = $this->User_model->select_user_by_id($user_id);
            $articleData = $this->Article_model->get_article_slug($slug); 

            // Loop through each article data to fetch author's name and add it to the article data
            if (!empty($articleData)) {
                foreach ($articleData as $article) {
                    $authorData = $this->Article_model->getAuthorByArticleId($article->articleid);
                    // Ensure that $authorData is not null before accessing its properties
                    $article->author_name = $authorData ? $authorData->author_name : 'Unknown Author';
                }
            }

            $data['articleData'] = $articleData; 
            $data['userData'] = $userData; 
            $this->load->view('home/post_lp', $data); 
        } else {
            show_404();
        }
    }

public function post_admin($slug = NULL) {
    // Check if the user is logged in
    $user_id = $this->session->userdata('UserLoginSession')['userid'] ?? null;
    if ($user_id) {
        // Retrieve user data
        $userData = $this->User_model->select_user_by_id($user_id);
        
        // Retrieve article data by slug
        $articleData = $this->Article_model->get_article_slug($slug);

        // Loop through each article data to fetch author's name and add it to the article data
        if (!empty($articleData)) {
            foreach ($articleData as $article) {
                $authorData = $this->Article_model->getAuthorByArticleId($article->articleid);
                // Ensure that $authorData is not null before accessing its properties
                $article->author_name = $authorData ? $authorData->author_name : 'Unknown Author';
            }
        }

        // Prepare data to be passed to the view
        $data['articleData'] = $articleData;
        $data['userData'] = $userData;

        // Load the view with the data
        $this->load->view('home/post_admin', $data);
    } else {
        // If user is not logged in, show 404 page
        show_404();
    }
}



    public function home_lp() {
        $userLoginSession = $this->session->userdata('UserLoginSession');
        
        if (!is_null($userLoginSession) && isset($userLoginSession['userid'])) {
            $user_id = $userLoginSession['userid'];
            $userData = $this->User_model->select_user_by_id($user_id);
    
            // Retrieve article data
            $articleData = $this->Article_model->get_article();
    
            // Loop through each article data to fetch author's name and add it to the article data
            if (!empty($articleData)) {
                foreach ($articleData as $article) {
                    $authorData = $this->Article_model->getAuthorByArticleId($article->articleid);
                    // Ensure that $authorData is not null before accessing its properties
                    $article->author_name = $authorData ? $authorData->author_name : 'Unknown Author';
                }
            }
    
            $data['articleData'] = $articleData;
            $data['userData'] = $userData;
            $this->load->view('home/home_lp', $data);
        } else {
            log_message('error', 'UserLoginSession is not set or does not contain userid.');
            // Redirect to a login page or show an appropriate message
            redirect('login'); // Adjust this to the appropriate login URL
            // Or alternatively, show a custom error message
            // echo "Please log in to access this page.";
        }
    }

    
    public function home_admin() {
        $userLoginSession = $this->session->userdata('UserLoginSession');
        
        if (!is_null($userLoginSession) && isset($userLoginSession['userid'])) {
            $user_id = $userLoginSession['userid'];
            $userData = $this->User_model->select_user_by_id($user_id);
    
            // Retrieve article data
            $articleData = $this->Article_model->get_article();
    
            // Loop through each article data to fetch author's name and add it to the article data
            if (!empty($articleData)) {
                foreach ($articleData as $article) {
                    $authorData = $this->Article_model->getAuthorByArticleId($article->articleid);
                    // Ensure that $authorData is not null before accessing its properties
                    $article->author_name = $authorData ? $authorData->author_name : 'Unknown Author';
                }
            }
    
            $data['articleData'] = $articleData;
            $data['userData'] = $userData;
            $this->load->view('home/home_admin', $data);
        } else {
            log_message('error', 'UserLoginSession is not set or does not contain userid.');
            // Redirect to a login page or show an appropriate message
            redirect('login'); // Adjust this to the appropriate login URL
            // Or alternatively, show a custom error message
            // echo "Please log in to access this page.";
        }
    }
    public function viewVolume($volumeid) {
        $this->load->model('Article_model'); 
        $this->load->model('Volume_model');
        
        $data['volume'] = $this->Volume_model->get_volume($volumeid);
        if (empty($data['volume'])) {
            show_404();
        }
    
        $data['articles'] = $this->Article_model->get_articles_by_volume($volumeid);
    
        // Loop through each article data to fetch author's name and add it to the article data
        if (!empty($data['articles'])) {
            foreach ($data['articles'] as &$article) {
                $authorData = $this->Article_model->getAuthorByArticleId($article['articleid']);
                $article['author_name'] = $authorData ? $authorData->author_name : 'Unknown Author';
            }
        }
    
        $data['title'] = $data['volume']['vol_name'];
    
        $this->load->view('home/volume', $data);
    }

    public function archives() {
        $data['archived_volumes'] = $this->Volume_model->get_archived_volumes();
        $this->load->view('home/archives', $data); // Make sure this matches the view file name
    }
    


   
    
}
