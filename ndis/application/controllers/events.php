<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends CI_Controller {
    
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
        $this->load->model('netflow_model');
        $dates = $this->input->post();
        if($dates){
            $event_list = $this->netflow_model->get_anomaly_event($dates['from'], $dates['to']);
            $this->load->view('events/events', array("event_list"=>$event_list));
        }else{
            $today = date("Y-m-d");
            $event_list = $this->netflow_model->get_anomaly_event($today, $today);
            $data['title'] = "NDIS 管理系統";
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar');
            $this->load->view('list/header', array("title"=>"Events List"));
            $this->load->view('events/events', array("event_list"=>$event_list));
            $this->load->view('list/footer');
            $this->load->view('template/footer');
        }
    }

    public function detail()
    {
        $event = $this->input->post(NULL, TRUE);
        $this->load->model("netflow_model");
        $detail = $this->netflow_model->get_anomaly_event_detail($event);
        $this->load->view('events/detail', array("detail"=>$detail));
    }

    public function timeline($from_date,$to_date,$ip)
    {
        $this->load->model("netflow_model");
        $detail = $this->netflow_model->get_anomaly_event_timeline($from_date,$to_date,$ip);
        echo json_encode($detail);
    }

    public function warnIP(){
        $this->load->model("noc_model");
        $data = $this->input->post();
        if($this->noc_model->checkIP($data["ip"])){
            $result = $this->noc_model->get_IP_info($data["ip"]);
            // mail to user
	        require("PHPMailer/PHPMailerAutoload.php"); //匯入PHPMailer類別   
            $ip = $data["ip"];
            $event_content = $data["content"];
            $user_name = $result["UserName"];
            $user_mail = $result["UserEmail"];
            $labadmin_mail = $result["LabAdminEmail"];
	        //$ip = "140.116.221.31";
            //$user_name = "郭鎮頴";
            //$user_mail = "evshary@gmail.com";
            //$labadmin_mail = "evshary@gmail.com";

		    $content = "使用者 ".$user_name." 教授/助理/研究人員您好:<br><br>";
		    $content .= "授權給您使用的IP：".$ip."發現異常的網路行為<br><br>";
		    $content .= $event_content;
		    $content .= "<br><br><br>";
		    $content .= "--<br>";
		    $content .= "If you are not concerned, please forward this mail to the next responsible desk available.<br>";
		    $content .= "If you just close(d) this(these) incident(s) please give us a feedback：）<br><br>";
		    $content .= "Yours faithfully,<br><br>";
		    $content .= "Network Operation Center, Department of Electrical Engineering, NCKU. (http://noc.ee.ncku.edu.tw)<br><br>";
		    $content .= "==========================================================<br>";
		    $content .= "此信件為系統發信自動通知，如有問題請回信至 admin@ee.ncku.edu.tw，謝謝<br>";

		    $mail= new PHPMailer(); //建立新物件    
		    $mail->IsSMTP(); //設定使用SMTP方式寄信    
		    $mail->SMTPAuth = true; //設定SMTP需要驗證    
		    $mail->Host = "eembox.ee.ncku.edu.tw"; //設定SMTP主機    
		    $mail->Port = 25; //設定SMTP埠位，預設為25埠。    
		    $mail->CharSet = "utf-8"; //設定郵件編碼    
		    
		    $mail->Username = $this->config->item('mail_account'); //設定驗證帳號    
		    $mail->Password = $this->config->item('mail_pass'); //設定驗證密碼    
		    
		    $mail->From = "admin@ee.ncku.edu.tw"; //設定寄件者信箱    
		    $mail->FromName = "電機系網管小組"; //設定寄件者姓名    
		    
		    $mail->Subject = "[網路異常行為警告] 請檢查".$ip; //設定郵件標題    
		    //$mail->Subject = "這是測試信".$ip; //設定郵件標題    
		    $mail->Body = $content;
		    $mail->IsHTML(true); //設定郵件內容為HTML    
		    $mail->AddAddress($user_mail); //設定收件者郵件及名稱    
		    $mail->AddCC($labadmin_mail);
		    $mail->AddBCC("ncku_ee_nm_group@googlegroups.com");

		    if(!$mail->Send()){    
		    	echo "Mailer Error: " . $mail->ErrorInfo;    
		    }else{    
		    	echo "Message sent!";    
		    }
        }else{
            // add to ACL
            print $data["ip"];
        }
    }
}

/* End of file chart.php */
/* Location: ./application/controllers/chart.php */
