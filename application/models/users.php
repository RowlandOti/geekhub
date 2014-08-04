<?php
class Users extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function register($firstname, $lastname, $email, $phone, $password)  
    {  
        $new_user = array (  
            'firstname'=>$firstname,
            'lastname'=>$lastname, 
            'email'   =>$email,  
            'phone'   =>$phone, 
            'password'=>$password  
        );  
      
        $this->db->insert('users', $new_user);  
      
        return true;  
    }
    public function login($email, $password)  
    {  
      
        $query = $this->db->get_where('users', array('email'=>$email, 'password'=>$password));  
          
        if ($query->num_rows()==0) return false;  
        else {  
            $result = $query->result();  
            $first_row = $result[0];  
            $userid = $first_row->id;  
              
            return $userid;  
        }  
          
    }    
}