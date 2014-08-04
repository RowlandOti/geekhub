<?php
class News_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		
	}
	public function get_news_author($userid)  
    {  
        $query = $this->db->get_where('news', array('author'=>$userid));  
        return $query->result();  
    }  
   
    public function delete_news_author($newsid)  
    {  
        $query = $this->db->get_where('news',array('id'=>$newsid));  
        $result = $query->result();  
        $query = $this->db->delete('news', array('id'=>$newsid));  
        return $result[0]->name;  
    } 
    //returns the number of records and is needed because one of the options in the $config array for the pagination library is $config["total_rows"]
    public function record_count() 
    {
        return $this->db->count_all("news");
    }
    public function fetch_news($limit, $start) 
    {
        $this->db->order_by('created_at', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get("news");

        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
	public function get_news($slug = FALSE)
    {
	    if ($slug === FALSE)
	{
        $this->db->order_by('created_at', 'desc');
		$query = $this->db->get('news');
		return $query->result_array();
	}

	    $query = $this->db->get_where('news', array('slug' => $slug));
	    return $query->row_array();
    }
    
    public function set_news()
    {
        //insert image
        $config['upload_path'] = 'files/news/images_origin';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size']         = '9000';
        $config['encrypt_name']     = true;

	    $this->load->helper('url');
        $this->load->library('upload', $config);
        $this->upload->do_upload('newsImage');

	    $slug = url_title($this->input->post('title'), 'dash', TRUE);
        $file_data = $this->upload->data();

	    $data = array(
	    	'author'=> $this->session->userdata('userid'),
        'ip'    => $this->session->userdata('ip'),
		    'title' => $this->input->post('title'),
		    'slug'  => $slug,
		    'text'  => $this->input->post('text'),
        'imgPath' => $_FILES['newsImage']['name'],
	    );

	    return $this->db->insert('news', $data);
   }
   public function get_posts($tags) 
   {
      $this->db->select('*');
      $this->db->from('news');
      $this->db->order_by('created_at', 'desc');
      $this->db->join('post_tags', 'news.id = post_tags.postid');
      $this->db->join('tags', 'post_tags.tagid = tags.tagid', 'right');
      $this->db->where_in('tags.tagcat', $tags);
      $query = $this->db->get();
      return $query->result();
   }
   public function get_category_post($slug)
   {
     $list_post = array();
     $this->db->where('slug',$slug);
     $query = $this->db->get('tags'); // get category id
     if( $query->num_rows() == 0 )
       show_404();
       foreach($query->result() as $category)
        {
         $this->db->where('tagid',$category->tagid);
         $query = $this->db->get('post_tags'); // get posts id which related to the category
         $posts = $query->result();
        }
     if( isset($posts) && $posts )
        {
      foreach($posts as $post)
        {
         $list_post = array_merge($list_post,$this->get_post($post->object_id)); // get posts and merge them into array
        }
       }    
      return $list_post; // return an array of post object
   }
   public function get_categories($slug = FALSE)
   {
      if ($slug === FALSE)
       {
         $query = $this->db->get('tags');
         return $query->result();
       }
         $query = $this->db->get_where('tags', array('tagslug' => $slug));
         return $query->row_array();
    }
   public function add_new_category($name,$slug)
   {
        $i = 0;
        $slug_taken = FALSE;
        while( $slug_taken == FALSE ) //to avoid duplicate tagslug
             {
               $category = $this->get_categories($slug);
               if( $category == FALSE )
                 {
                   $slug_taken = TRUE;
                   $data = array(
                    'tagscat' => $name,
                    'tagslug' => $slug
                );
                   $this->db->insert('tags',$data);
                 }
               $i = $i + 1;
               $slug = $slug.'-'.$i;
                 }
   }
   public function update_news($id=0)
   {
        $this->load->helper('url');
 
        $slug = url_title($this->input->post('title'),'dash',TRUE);
 
        $data = array(
           'title' =>  $this->input->post('title'),
           'slug'  =>  $slug,
           'text'  =>  $this->input->post('text')
    );

        $this->db->where('id',$id);
        return $this->db->update('news',$data);
   }
   
}