<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product extends CI_Controller{
public function __construct()
{
    parent::__construct();
    $this->load->model('product_model');
     $this->load->helper(array('form', 'url'));
}
  public function product()
{
    $this->load->library('form_validation');
    $this->form_validation->set_rules('productname','Product Code','trim|required');
    $this->form_validation->set_rules('productcode','Product Code','trim|required');
    $this->form_validation->set_rules('productprice','Product Price','trim|required');
    $this->form_validation->set_rules('quantity','Quantity','trim|required');
    $this->form_validation->set_rules('uploadimage','Upload Image','trim|required');
    if($this->form_validation->run()==FALSE)
    {
        $this->index();
    }else
        {
            if ($this->input->post('upload'))
            {
                $in=array();

$in['productname']    = $this->input->post('productnamename');
$in['productcode'] = $this->input->post('productcode');
$in['productprice']=$this->input->post('productprice');
$in['quantity']=$this->input->post('quantity');
$in['uploadimage']=$_FILES['image']['name'];
            }
            if($this->product_model->do_upload()) {

echo $this->upload->display_errors();

}else
    {
        $this->product_model->save_gallery($in);
        header('location:product');
    }
            $data['images']=$this->product_model->get_images();
              $this->load->view('query_view',$data);
        }
}
public function readBook() {
        echo json_encode( $this->book_model->getBook() );
    }
    public function readMember() {
        echo json_encode( $this->book_model->getMember() );
    }
}