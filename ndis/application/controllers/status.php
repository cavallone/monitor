<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status extends CI_Controller {
    
    private $account;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        $this->load->model('status_model');
        $this->load->library('session');
        $this->load->helper('url');  #load redirect function
        $this->account = $this->session->userdata('account');

        if(empty($this->account)){
            redirect('/login');
            exit;
        }
    }

	public function index()
	{
        $data['title'] = "NDIS 管理系統";
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('status');
        $this->load->view('template/footer');
    }

    public function cpu($host="netflow")
    {
        $ret = $this->status_model->get_cpu($host);
        echo json_encode($ret);
    }

    public function memory($host="netflow")
    {
        $ret = $this->status_model->get_memory($host);
        echo json_encode($ret);
    }
    public function program()
    {
        $ret = $this->status_model->get_status();
        echo json_encode($ret);
    }

}

/* End of file status.php */
/* Location: ./application/controllers/status.php */
