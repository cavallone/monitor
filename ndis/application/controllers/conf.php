<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Conf extends CI_Controller {
    
    private $account;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        $this->load->library('session');
        $this->load->helper('url');  #load redirect function
        $this->account = $this->session->userdata('account');
        date_default_timezone_set('UTC');

        if (empty($this->account)){
            redirect('login');
            exit;
        }
    }

    public function iplist($param="")
    {
        $this->load->model('netflow_model');
        if($param == "blacklist"){
            $list = $this->netflow_model->get_blacklist();
            $this->load->view('conf/blacklist', array("list"=>$list));
        }else if($param == "whitelist"){
            $list = $this->netflow_model->get_whitelist();
            $this->load->view('conf/whitelist', array("list"=>$list));
        }else if($param == "unusedIP"){
            $list = $this->netflow_model->get_unusedIP();
            $this->load->view('conf/unusedIP', array("list"=>$list));
        }else{
            $data['title'] = "NDIS 管理系統";
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar');
            $this->load->view('conf/iplist');
            $this->load->view('template/footer');
        }
    }

    public function netflow()
    {
        $data['title'] = "NDIS 管理系統";
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/footer');
    }

    public function dpi()
    {
        $data['title'] = "NDIS 管理系統";
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/footer');
    }
}

/* End of file conf.php */
/* Location: ./application/controllers/conf.php */
