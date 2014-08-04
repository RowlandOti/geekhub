<?php
class Profile extends MY_Controller {

	public function __construct()
	{
		{  
        parent::__construct();  
      
        $this->load->model('users');    
        $this->load->model('files'); 
        $this->load->model('news_model'); 
        $this->load->library('session');
        $this->load->library('user_agent');
        $this->load->helper('news_helper');
  
        $this->userid = $this->session->userdata('userid');  
        if (!isset($this->userid) or $this->userid=='') redirect('login');  
        } 
	}
	public function logout()  
    {  
        $this->session->set_userdata(array('userid'=>''));  
        redirect('login');  
    }
    public function index()  
    {  
        $data['files'] = $this->files->get($this->userid); 
        $data['news'] = $this->news_model->get_news_author($this->userid); 

        
        if ($this->agent->is_mobile('iphone'))
    {
        
        $this->load->view('uploader/profile', $data);
        
    }
        else if ($this->agent->is_mobile())
    {
        $this->load->view('templates/mobile/header_mobile');
        $this->load->view('uploader/mobile/profile', $data);
        $this->load->view('templates/mobile/footer_mobile');
    }
        else
    {
        
        $this->load->view('uploader/profile', $data);
        
    } 
    }
    public function mynews()  
    {
        $data['news'] = $this->news_model->get_news();
        $data['title'] = 'My News';
        $data['mobinews'] = getNewsHTML($data['news']);

        if ($this->agent->is_mobile('iphone'))
    {
        $this->load->view('templates/header', $data, array('tweets', $this->tweets));
        $this->load->view('news/index', $data, array('tweets', $this->tweets));
        $this->load->view('templates/footer', $data, array('tweets', $this->tweets));
    }
        else if ($this->agent->is_mobile())
    {
        $this->load->view('templates/mobile/header_mobile');
        $this->load->view('uploader/mobile/profile_news');
        $this->load->view('templates/mobile/footer_mobile');
    }
        else
    {
        $this->load->view('templates/header', $data, array('tweets', $this->tweets));
        $this->load->view('news/index', $data, array('tweets', $this->tweets));
        $this->load->view('templates/footer', $data, array('tweets', $this->tweets));
    }
    }
    public function createnews()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a news item';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');

    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/header', $data, array('tweets', $this->tweets));
        $this->load->view('news/create');
        $this->load->view('templates/footer', $data, array('tweets', $this->tweets));

    }
    else
    {
        $this->news_model->set_news();
        $this->load->view('templates/header', $data, array('tweets', $this->tweets));
        $this->load->view('news/success');
        $this->load->view('templates/footer', $data, array('tweets', $this->tweets));
    }
    }
    public function updatenews($id)
    {
        $data['title'] = 'Edit a news item';
        $data['success'] = 0;
 
        $this->load->helper('form');
        $this->load->library('form_validation');
 
        $this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('text','text','required');
 
        if($this->form_validation->run())
    {
            $data['success'] = $this->news_model->update_news($id);
    }
 
        $data['news_item'] = $this->news_model->get_news($id);
        if(empty($data['news_item']))
    {
            show_404();
    }
 
        $this->load->view('templates/header',$data);
        $this->load->view('news/update',$data);
        $this->load->view('templates/footer');
    }
    public function deleteNews($newsid) 
    {
        $this->news_model->delete_news($newsid);
        $this->session->set_flashdata('error_message', 'News Item : #'. $newsid . ' deleted');
        redirect('profile'); 
    }    
    public function add_new_category()
    {
        $this->load->helper('form');
        $this->load->library(array('form_validation'));
        // set validation rules
        $this->form_validation->set_rules('category_name', 'Name','required|max_length[200]|xss_clean');
        $this->form_validation->set_rules('category_slug', 'Slug', 'max_length[200]|xss_clean');
        if ($this->form_validation->run() == FALSE)
          {
            //if not valid
            $this->load->view('news/create');
          }
        else
          {
            //if valid
            $name = $this->input->post('category_name');
        if( $this->input->post('category_slug') != '' )
            $slug = $this->input->post('category_slug');
        else
            $slug = strtolower(preg_replace('/[^A-Za-z0-9_-]+/', '-', $name));
            $this->news_model->add_new_category($name,$slug);
            $this->session->set_flashdata('message', '1 new category added!');
            
          }
    }
    
    public function myfiles()  
    {
        $data['news'] = $this->news_model->get_news();
        $data['title'] = 'My Files';
        $data['mobinews'] = getNewsHTML($data['news']);

        if ($this->agent->is_mobile('iphone'))
    {
        $this->load->view('templates/header', $data, array('tweets', $this->tweets));
        $this->load->view('news/index', $data, array('tweets', $this->tweets));
        $this->load->view('templates/footer', $data, array('tweets', $this->tweets));
    }
        else if ($this->agent->is_mobile())
    {
        $this->load->view('templates/mobile/header_mobile');
        $this->load->view('uploader/mobile/profile_files');
        $this->load->view('templates/mobile/footer_mobile');
    }
        else
    {
        $this->load->view('templates/header', $data, array('tweets', $this->tweets));
        $this->load->view('news/index', $data, array('tweets', $this->tweets));
        $this->load->view('templates/footer', $data, array('tweets', $this->tweets));
    }
    }
    public function upload()  
    {  
        if(isset($_FILES['file'])){  
            $file   = read_file($_FILES['file']['tmp_name']);  
            $name   = basename($_FILES['file']['name']);
            $description = $_POST['description'];
              
            write_file('files/'.$name, $file);  
            
      
            $this->files->add($name, $description);  
            redirect('profile');          
        }  
      
        else $this->load->view('uploader/upload');  
    }
    public function deleteFile($id)  
    {  
        //This deletes the file from the database, before returning the name of the file.  
        $name = $this->files->delete($id);  
        unlink('files/'.$name);  
        redirect('profile');  
    } 
    public function mysales()  
    {
        $data['news'] = $this->news_model->get_news();
        $data['title'] = 'My Sales';
        $data['mobinews'] = getNewsHTML($data['news']);

        if ($this->agent->is_mobile('iphone'))
    {
        $this->load->view('templates/header', $data, array('tweets', $this->tweets));
        $this->load->view('news/index', $data, array('tweets', $this->tweets));
        $this->load->view('templates/footer', $data, array('tweets', $this->tweets));
    }
        else if ($this->agent->is_mobile())
    {
        $this->load->view('templates/mobile/header_mobile');
        $this->load->view('uploader/mobile/profile_sales');
        $this->load->view('templates/mobile/footer_mobile');
    }
        else
    {
        $this->load->view('templates/header', $data, array('tweets', $this->tweets));
        $this->load->view('news/index', $data, array('tweets', $this->tweets));
        $this->load->view('templates/footer', $data, array('tweets', $this->tweets));
    }
    }
    public function myevents()  
    {
        $data['news'] = $this->news_model->get_news();
        $data['title'] = 'My Events';
        $data['mobinews'] = getNewsHTML($data['news']);

        if ($this->agent->is_mobile('iphone'))
    {
        $this->load->view('templates/header', $data, array('tweets', $this->tweets));
        $this->load->view('news/index', $data, array('tweets', $this->tweets));
        $this->load->view('templates/footer', $data, array('tweets', $this->tweets));
    }
        else if ($this->agent->is_mobile())
    {
        $this->load->view('templates/mobile/header_mobile');
        $this->load->view('uploader/mobile/profile_events');
        $this->load->view('templates/mobile/footer_mobile');
    }
        else
    {
        $this->load->view('templates/header', $data, array('tweets', $this->tweets));
        $this->load->view('news/index', $data, array('tweets', $this->tweets));
        $this->load->view('templates/footer', $data, array('tweets', $this->tweets));
    }
    }
    public function settings()  
    {
        $data['news'] = $this->news_model->get_news();
        $data['title'] = 'My Settings';
        $data['mobinews'] = getNewsHTML($data['news']);

        if ($this->agent->is_mobile('iphone'))
    {
        $this->load->view('templates/header', $data, array('tweets', $this->tweets));
        $this->load->view('news/index', $data, array('tweets', $this->tweets));
        $this->load->view('templates/footer', $data, array('tweets', $this->tweets));
    }
        else if ($this->agent->is_mobile())
    {
        $this->load->view('templates/mobile/header_mobile');
        $this->load->view('uploader/mobile/profile_settings');
        $this->load->view('templates/mobile/footer_mobile');
    }
        else
    {
        $this->load->view('templates/header', $data, array('tweets', $this->tweets));
        $this->load->view('news/index', $data, array('tweets', $this->tweets));
        $this->load->view('templates/footer', $data, array('tweets', $this->tweets));
    }
    }
    
}