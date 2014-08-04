<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Product_model extends CI_Model {
 public function __construct()
{
   parent::__construct();
 }
    public function do_upload()
{
         $config = array(
        'allowed_types' => 'jpg|png|bmp', 
        'upload_path'=>'./uploads/', //make sure you have this folder
        'max_size'=>2000);
         $this->load->library('upload',$config);

    if ($this->upload->do_upload()) {
        echo "Upload success!";
    } else {
        echo "Upload failed!";
    }
 $image_data = $this->upload->data();
}  
 function get_images()
{
    $query = $this->db->get('product');
    return $query;
}

function save_gallery($in)
{
$save=$this->db->get("product");
if($save->num_rows())
{
$save=$this->db->insert('product',$in);
return $save;
}
}
public function getBook() {
        $query = $this->db->get( 'tb_book' );
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getMember() {
        $query = $this->db->get( 'tb_member' );
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    }
}