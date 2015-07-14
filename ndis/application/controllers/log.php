<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log extends CI_Controller {

    private $account;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        $this->load->library('session');
        $this->load->helper('url');
        $this->account = $this->session->userdata('account');
        date_default_timezone_set('UTC');

        if (empty($this->account)) {
            redirect('/login');
            exit;
        }
    }

	public function anomaly()
	{
        $this->load->model('netflow_model');
        $dates = $this->input->post();
        if($dates){
            $loglist = $this->netflow_model->get_anomaly_log($dates['from'], $dates['to']);
            $this->load->view('log/anomaly', array("loglist"=>$loglist));
        }else{
            $today = date("Y-m-d");
            $loglist = $this->netflow_model->get_anomaly_log($today, $today);
            $data['title'] = "NDIS 管理系統";
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar');
            $this->load->view('list/header', array("title"=>"Anomaly Flow Log"));
            $this->load->view('log/anomaly', array("loglist"=>$loglist));
            $this->load->view('list/footer');
            $this->load->view('template/footer');
        }
    }

    public function anomaly_detail()
    {
        $event = $this->input->post(NULL, TRUE);
        $this->load->model("netflow_model");
        $detail = $this->netflow_model->get_anomaly_detail($event);
        $this->load->view('log/anomaly_detail', array("detail"=>$detail));
    }

    public function traffic()
    {
        $this->load->model('netflow_model');
        $dates = $this->input->post();
        if($dates){
            $loglist = $this->netflow_model->get_traffic_log($dates['from'], $dates['to']);
            $this->load->view('log/traffic', array("loglist"=>$loglist));
        }else{
            $today = date("Y-m-d");
            $loglist = $this->netflow_model->get_traffic_log($today, $today);
            $data['title'] = "NDIS 管理系統";
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar');
            $this->load->view('list/header', array("title"=>"Traffic Info"));
            $this->load->view('log/traffic', array("loglist"=>$loglist));
            $this->load->view('list/footer');
            $this->load->view('template/footer');
        }
    }

    public function blacklist()
    {
        $this->load->model('netflow_model');
        $dates = $this->input->post();
        if($dates){
            $loglist = $this->netflow_model->get_blacklist_log($dates['from'], $dates['to']);
            $this->load->view('log/blacklist', array("loglist"=>$loglist));
        }else{
            $today = date("Y-m-d");
            $loglist = $this->netflow_model->get_blacklist_log($today, $today);
            $data['title'] = "NDIS 管理系統";
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar');
            $this->load->view('list/header', array("title"=>"Black List Log"));
            $this->load->view('log/blacklist', array("loglist"=>$loglist));
            $this->load->view('list/footer');
            $this->load->view('template/footer');
        }
    }

	public function attack()
	{
        $data['title'] = "NDIS 管理系統";
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/footer');
    }

    public function monIP()
    {
        $this->load->model('netflow_model');
        $dates = $this->input->post();
        if($dates){
            $loglist = $this->netflow_model->get_monIP_log($dates['from'], $dates['to']);
            $this->load->view('log/monIP', array("loglist"=>$loglist));
        }else{
            $today = date("Y-m-d");
            $loglist = $this->netflow_model->get_monIP_log($today, $today);
            $data['title'] = "NDIS 管理系統";
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar');
            $this->load->view('list/header', array("title"=>"Monitored IP Log"));
            $this->load->view('log/monIP', array("loglist"=>$loglist));
            $this->load->view('list/footer');
            $this->load->view('template/footer');
        }
    }

    public function monIP_detail()
    {
        $event = $this->input->post(NULL, TRUE);
        $this->load->model("netflow_model");
        $detail = $this->netflow_model->get_monIP_detail($event);
        $this->load->view('log/monIP_detail', array("detail"=>$detail));
    }
     
    public function download_log()
    {
        $id = $this->input->post("id", TRUE);
        $this->load->model("netflow_model");
        $detail = $this->netflow_model->get_event_from_id($id);
        $this->_nfdump($detail[0]);
    }

    private function _nfdump($detail)
    {
        #print_r($detail);
        $filter = "";
        $first = true;
        $neglect_list = array('X','F');
        if(!in_array($detail->src_ip, $neglect_list)){
            $filter .= "src ip ".$detail->src_ip;
            $first = false;
        }
        if(!in_array($detail->src_port, $neglect_list)){
            if($first != true){
                $filter .= " and ";
            }
            $filter .= "src port ".$detail->src_port;
            $firts = false;
        }
        if(!in_array($detail->dst_ip, $neglect_list)){
            if($first != true){
                $filter .= " and ";
            }
            $filter .= "dst ip ".$detail->dst_ip;
            $first = false;
        }
        if(!in_array($detail->dst_port, $neglect_list)){
            if($first != true){
                $filter .= " and ";
            }
            $filter .= "dst port ".$detail->dst_port;
            $first = false;
        }
        $date = strftime("%Y-%m-%d", strtotime($detail->stop_time));
        $time = strftime("%Y%m%d%H%M", strtotime($detail->stop_time));
        $command = "nfdump -R /nfs/netflow/$date/nfcapd.$time '$filter' -o extended6 > /var/www/html/ndis/log/".$detail->id;
        system($command);
    }
}

/* End of file event.php */
