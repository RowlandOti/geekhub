<?php
class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('users');
        $this->load->library('user_agent');
     
	}
    public function index() 
    {
        // Load our view to be displayed
        if ($this->agent->is_mobile('iphone'))
    {
        
        $this->load->view('uploader/login');
        
    }
        else if ($this->agent->is_mobile())
    {
        $this->load->view('templates/mobile/header_mobile');
        $this->load->view('uploader/mobile/login');
        $this->load->view('templates/mobile/footer_mobile');
    }
        else
    {
        
        $this->load->view('uploader/login');
        
    }
        
}
	public function register()  
    {  
    if(isset($_POST['firstname'])){  
          
        // User has tried registering, insert them into database.  
          
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];  
          
        $this->users->register($firstname, $lastname, $email, $phone, $password);  
          
        redirect('login');  
          
    }  
    else{  

        //User has not tried registering, bring up registration information.  
        if ($this->agent->is_mobile('iphone'))
    {
        
       $this->load->view('uploader/register');
        
    }
        else if ($this->agent->is_mobile())
    {
        $this->load->view('templates/mobile/header_mobile');
        $this->load->view('uploader/mobile/register');
        $this->load->view('templates/mobile/footer_mobile');
    }
        else
    {
        
        $this->load->view('uploader/register');
        
    }
    }  
} 
    public function go()  
    {  
      
        $email = $_POST['email'];  
        $password = $_POST['password'];  
      
        //Returns userid if successful, false if unsuccessful  
        $results = $this->users->login($email, $password);  
          
        if ($results==false) redirect('login');  
        else   
        {     
            $this->session->set_userdata(array('userid'=>$results));  
            redirect('profile/index');  
        }  
      
    }   
}