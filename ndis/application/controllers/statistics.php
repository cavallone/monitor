<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statistics extends CI_Controller {
    
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

    public function rank()
    {
        $data['title'] = "NDIS 管理系統";
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('statistics/rank');
        $this->load->view('template/footer');
    }

    public function service()
    {
        $service = $this->input->post("service", True);
        $date_time = $this->input->post("date", True);
        $protocol = $this->input->post("protocol", True);
        $order = $this->input->post("order", True);
        if($protocol == "v6" && $service == "ICMP")
            $myfile = "/nfs/daily_report/$date_time/$date_time"."_$service"."6_$order";
        else if($protocol == "v6")
            $myfile = "/nfs/daily_report/$date_time/$date_time"."_$service"."v6_$order";
        else
            $myfile = "/nfs/daily_report/$date_time/$date_time"."_$service"."_$order";
        if(file_exists($myfile)){
            echo "<table class=\"table\">\n";
            echo "<tr>\n";
            echo "<td align=center>Rank</td>\n";
            echo "<td align=center>IPaddr</td>\n";
            echo "<td align=center>Flows(%)</td>\n";
            echo "<td align=center>Packets(%)</td>\n";
            echo "<td align=center>ByteCount(%)</td>\n";
            echo "</tr>\n";
            $line = 0;
            $file = fopen($myfile, "r");
            while(!feof($file)){
                ++$line;
                $row = fgetcsv($file, 300, ",");
                if($line > 1 && $line < 22){
                    if(count($row) < 4)break;
                    echo "<tr>\n";
                    echo "<td align=center>".($line-1)."</td>";
                    echo "<td align=center>".$row[4]."</td>";
                    echo "<td align=center>".$row[6]."</td>";
                    echo "<td align=center>".$row[8]."</td>";
                    echo "<td align=center>".$row[10]."</td>";
                    echo "</tr>\n";
                }
                if($line > 22)break;
            }
            fclose($file);
            echo "</table>";
        }
    }

    public function port(){
        $data['title'] = "NDIS 管理系統";
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('statistics/port');
        $this->load->view('template/footer');
    }

    public function port_statistics($proto=6,$port="443"){
        $this->load->model('netflow_model');
        $result = $this->netflow_model->get_port_statistics(intval($proto), $port);
        echo json_encode($result);
    }
}

/* End of file chart.php */
/* Location: ./application/controllers/chart.php */
