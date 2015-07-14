<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chart extends CI_Controller {
    
    private $account;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        $this->load->library('session');
        $this->load->helper('url');  #load redirect function
        $this->account = $this->session->userdata('account');
        date_default_timezone_set('UTC');

        if(empty($this->account)){
            redirect('login');
            exit;
        }
    }

	public function index()
	{
        $data['title'] = "NDIS 管理系統";
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('chart');
        $this->load->view('template/footer');
    }
    
    public function service($ver=null)
    {
        $show_service = array("http", "TLSv1.0", "TLSv1.1", "TLSv1.2", "NULL");
        $byte_count = array();
        $return = array();
        $this->load->model('dpi_model');
        $services = $this->dpi_model->get_service();
        if($ver==6){
            $data = $this->dpi_model->get_hour_byte(array('table'=>'byte_count_hour_v6','limit'=>(count($services)*24)));
        }else{
            $data = $this->dpi_model->get_hour_byte(array('table'=>'byte_count_hour','limit'=>(count($services)*24)));
        }
        if($services){
            foreach($services as $service){
                $byte_count[$service] = array();
            }
        }
        $dates = array();
        foreach($data as $d){
            $byte_count[$d['service']][$d['date']] = $d['byte_cnt'];
            if(count($dates) > 24)continue; //We only need the past 24 hour
            if(!in_array($d['date'], $dates)){
                array_unshift($dates, $d['date']);
            }
        }
        $divisor = 1048576;
        foreach($byte_count as $service => $d){
            $item = array();
            foreach($dates as $date){
                if(array_key_exists($date,$byte_count[$service])){
                    $normalized_val = $byte_count[$service][$date]/$divisor;
                    $item[] = array(strtotime($date)*1000, (int)$normalized_val);
                }else{
                    $item[] = array(strtotime($date)*1000, 0);
                }
            }
            if(in_array($service, $show_service)){
                $return[] = array('name'=>$service, 'data'=>$item);
            }else{
                $return[] = array('name'=>$service, 'data'=>$item, "visible"=>false);
            }
        }
        #count all
        $all_item = array();
        foreach($dates as $date){
            $sum = 0;
            foreach($byte_count as $service => $d){
                if(array_key_exists($date,$byte_count[$service])){
                    $normalized_val = $byte_count[$service][$date]/$divisor;
                    $sum += (int)$normalized_val;
                }
            }
            $all_item[] = array(strtotime($date)*1000, $sum);
        }
        $return[] = array('name'=>'all', 'data'=>$all_item);
        echo json_encode($return);
    }

    public function netflow($direction="src",$interval=1)
    {
        $this->load->model('netflow_model');
        $statistics = $this->netflow_model->get_statistics(
                                          array('table'=>'plots','limit'=>48*$interval));
        $netflow_chart = array();
        $dates = array();
        foreach($statistics as $row){
            if($row['identity'] == $direction){
                $netflow_chart[$row['date']] = array('bytes'=>$row['bytes'],
                                                   'flows'=>$row['flows'],
                                                   'packets'=>$row['packets']);
            }
            if(!in_array($row['date'],$dates)){
                array_unshift($dates, $row['date']);
            }
        }
        $byte_items = array();
        $flow_items = array();
        $packet_item = array();
        #$divisor = 1048576;
        $divisor = 1024*10;  #For better display
        foreach($dates as $date){
            $format_date = strtotime($date)*1000;
            $byte_items[] = array($format_date,
                               (int)($netflow_chart[$date]['bytes']/$divisor));
            $flow_items[] = array($format_date,
                                  (int)$netflow_chart[$date]['flows']);
            $packet_items[] = array($format_date,
                                  (int)($netflow_chart[$date]['packets']/10));
        }
        $return = array();
        $return[] = array('name'=>'byte', 'data'=>$byte_items);
        $return[] = array('name'=>'flow', 'data'=>$flow_items);
        $return[] = array('name'=>'packet', 'data'=>$packet_items);
        echo json_encode($return);
    }
}

/* End of file chart.php */
/* Location: ./application/controllers/chart.php */
