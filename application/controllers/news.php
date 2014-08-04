<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends MY_Controller {

	

	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
		$this->load->library("pagination");
		$this->load->library('user_agent');
		$this->load->helper('news_helper');
		$this->load->helper('text');
	}

	public function paginator() 
	{
        $config = array();
        $config["base_url"] = base_url() . "news/paginator";
        $config["total_rows"] = $this->news_model->record_count();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->news_model->fetch_news($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

        $this->load->view("example1", $data);
    }
	public function index()
	{
		$data['news'] = $this->news_model->get_news();
		$data['newslist'] = $this->news_model->fetch_news(4,0);
		$data['title'] = 'News archive';
		$data['mobinews'] = getNewsHTML($data['news']);
		$data['webonews'] = getNewsHTMLWeB($data['news']);
		$data['stuctureisland'] = getNewsHTMLStructureIsland($data['newslist']);

		if ($this->agent->is_mobile('iphone'))
    {
        $this->load->view('templates/header', $data, array('tweets', $this->tweets));
		$this->load->view('news/index', $data, array('tweets', $this->tweets));
		$this->load->view('templates/footer', $data, array('tweets', $this->tweets));
    }
        else if ($this->agent->is_mobile())
    {
        $this->load->view('templates/mobile/header_mobile', $data);
		$this->load->view('news/mobile/index', $data);
		$this->load->view('templates/mobile/footer_mobile', $data);
    }
        else
    {
        $this->load->view('templates/header', $data, array('tweets', $this->tweets));
		$this->load->view('news/index', $data, array('tweets', $this->tweets));
		$this->load->view('templates/footer', $data, array('tweets', $this->tweets));
    }
	}
	
	public function view($slug)
    {
	    $data['news_item'] = $this->news_model->get_news($slug);
	    $data['newspopular'] = $this->news_model->fetch_news(8,0);
	    $data['mobinewsitem'] = getOneNewsHTML($data['news_item']);
	    $data['webonewsitem'] = getOneNewsHTMLWeB($data['news_item']);
	    $data['newsad'] = getAdManager();
	    $data['newssubscribe'] = getCompanySubscribe();
	    $data['newsvideo'] = getNewsVideos();
	    $data['newsrecirculation'] = getNewsRecirculation();
	    $data['newscomments'] = getComments();
	    $data['newsrightcolumn'] = getRightColumn($data['newspopular']);
	    $data['newsjob'] = getJob();

	if (empty($data['news_item']))
	{
		show_404();
	}
	    $data['title'] = $data['news_item']['title'];

	    if ($this->agent->is_mobile('iphone'))
    {
        $this->load->view('templates/header', $data, array('tweets', $this->tweets));
		$this->load->view('news/view', $data, array('tweets', $this->tweets));
		$this->load->view('templates/footer', $data, array('tweets', $this->tweets));
    }
        else if ($this->agent->is_mobile())
    {
        $this->load->view('templates/mobile/header_mobile', $data);
		$this->load->view('news/mobile/view', $data);
		$this->load->view('templates/mobile/footer_mobile', $data);

    }
        else
    {
        $this->load->view('templates/header', $data, array('tweets', $this->tweets));
		$this->load->view('news/view', $data, array('tweets', $this->tweets));
		$this->load->view('templates/footer', $data, array('tweets', $this->tweets));
    }
    }
    
 	
}