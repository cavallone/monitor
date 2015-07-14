<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
    
    private $account;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        $this->load->library('session');
        $this->load->helper('url');  #load redirect function
        $this->account = $this->session->userdata('account');
    }

	public function index()
	{
        if(empty($this->account)){
            redirect('/login');
            exit;
        }
        $data['title'] = "NDIS 管理系統";
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('main/home');
        $this->load->view('template/footer');
    }

    public function login()
    {
        if($this->input->post("username") && $this->input->post("password")){
            $account = $this->input->post("username", TRUE);
            $password = $this->input->post("password", TRUE);
            if($this->auth->is_account_pass($account, $password)){
                $this->session->set_userdata('account', $account);
                redirect('/');
                exit;
            }else{
                echo "wrong account / password!";
            }
        }else{
            $data['title'] = "NDIS 管理系統";
            $this->load->view('template/header', $data);
            $this->load->view('main/signin');
            $this->load->view('template/footer');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('account');
        $this->session->sess_destroy();
        redirect('/');
    }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
