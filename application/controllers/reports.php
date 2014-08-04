<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('report_model');
		$this->load->library('user_agent');
		
	}

	public function index()
	{

			$data['title'] = ucfirst($page); // Capitalize the first letter
			
            $data['total_count'] = $this->report_model->entry_count(); //
            
            $data['text_count'] = $this->report_model->method_count('text');
            $data['text_percent'] = number_format(($data['text_count']/$data['total_count'])*100);

            $data['mobile_count'] = $this->report_model->method_count('mobile');
            $data['mobile_percent'] = number_format(($data['mobile_count']/$data['total_count'])*100);

            $data['web_count'] = $this->report_model->method_count('web');
            $data['web_percent'] = number_format(($data['web_count']/$data['total_count'])*100);

			if ($this->agent->is_mobile('iphone'))
    {
        $this->load->view('templates/header', $data, array('tweets', $this->tweets));
		$this->load->view('pages/'.$page, $data, array('tweets', $this->tweets));
		$this->load->view('templates/footer', $data, array('tweets', $this->tweets));


    }
        else if ($this->agent->is_mobile())
    {
        $this->load->view('templates/mobile/header_mobile', $data);
		$this->load->view('pages/mobile/'.$page, $data);
		$this->load->view('templates/mobile/footer_mobile', $data);

    }
        else
    {
        $this->load->view('templates/header', $data, array('tweets', $this->tweets));
		$this->load->view('pages/'.$page, $data, array('tweets', $this->tweets));
		$this->load->view('templates/footer', $data, array('tweets', $this->tweets));

    }

    }



}