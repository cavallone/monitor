<?php

class Netflow_model extends CI_Model {
    
    public function __construct(){
        $this->netflow_db = $this->load->database("netflow", true);
    }

    public function get_statistics($cfg){
        $this->netflow_db->limit($cfg['limit']);
        $this->netflow_db->order_by("date", "desc");
        $query = $this->netflow_db->get($cfg['table']);
        return $query->result_array();
    }

    public function get_port_statistics($protocol, $port){
        $this->netflow_db->select("month,flows");
        $this->netflow_db->from("port_statistics");
        $this->netflow_db->where("protocol",$protocol);
        $this->netflow_db->where("port",$port);
        $query = $this->netflow_db->get();
        $data = array();
        $month_data = array();

        foreach ($query->result_array() as $result){
            $month_data[$result["month"]] = intval($result["flows"]);
        }

        //date_default_timezone_set("Asia/Taipei");
        $currentDate = new DateTime('2013-03-01');
        $endDate     = new DateTime(date("Y-m-01"));

        while($currentDate < $endDate) {
            $currentDateS = $currentDate -> format('Y-m-d');
            if(array_key_exists($currentDateS, $month_data)){
                $data[] = array(strtotime($currentDateS)*1000, 
                                $month_data[$currentDateS]); 
            }else{
                $data[] = array(strtotime($currentDateS)*1000, 0); 
            }
            $currentDate -> modify('+1 month');
        }
        return $data;
    }

    public function get_traffic_log($from_date, $to_date)
    {
        $this->netflow_db->select("*");
        $this->netflow_db->from("traffic");
        $this->netflow_db->where("DATE(stop_time)>=",$from_date);
        $this->netflow_db->where("DATE(stop_time)<=",$to_date);
        $this->netflow_db->order_by("stop_time", "desc");
        $query = $this->netflow_db->get();
        return $query->result();
    }

    public function get_monIP_log($from_date, $to_date)
    {
        $this->netflow_db->select("source, dstport, count(target) as count, MAX(date) as update_time");
        $this->netflow_db->from("monIP_log");
        $this->netflow_db->where("DATE(date)>=",$from_date);
        $this->netflow_db->where("DATE(date)<=",$to_date);
        $this->netflow_db->group_by("source, dstport");
        $this->netflow_db->having("count(target)>",3);
        $this->netflow_db->order_by("MAX(date)", "desc");
        $query = $this->netflow_db->get();
        return $query->result();
    }

    public function get_monIP_detail($detail)
    {
        $this->netflow_db->select("id, srcport, target, date");
        $this->netflow_db->from("monIP_log");
        $this->netflow_db->where("source",$detail['source']);
        $this->netflow_db->where("dstport",$detail['port']);
        $this->netflow_db->where("DATE(date)>=",$detail['from']);
        $this->netflow_db->where("DATE(date)<=",$detail['to']);
        $this->netflow_db->order_by("date", "desc");
        $query = $this->netflow_db->get();
        return $query->result();
    }

    public function get_anomaly_log($from_date, $to_date)
    {
        $this->netflow_db->select("MAX(stop_time) as update_time, event_type, src_ip, src_port, dst_ip, dst_port, count(id) as count");
        $this->netflow_db->from("anomaly_log");
        $this->netflow_db->where("DATE(stop_time)>=",$from_date);
        $this->netflow_db->where("DATE(stop_time)<=",$to_date);
        $this->netflow_db->group_by("event_type, src_ip, src_port, dst_ip, dst_port");
        $this->netflow_db->order_by("MAX(stop_time)", "desc");
        $query = $this->netflow_db->get();
        return $query->result();
    }

    public function get_anomaly_detail($detail)
    {
        $this->netflow_db->select("id, start_time, stop_time, attack_count");
        $this->netflow_db->from("anomaly_log");
        $this->netflow_db->where("event_type",$detail['event_type']);
        $this->netflow_db->where("src_ip",$detail['srcip']);
        $this->netflow_db->where("src_port",$detail['srcport']);
        $this->netflow_db->where("dst_ip",$detail['dstip']);
        $this->netflow_db->where("dst_port",$detail['dstport']);
        $this->netflow_db->where("DATE(stop_time)>=",$detail['from']);
        $this->netflow_db->where("DATE(stop_time)<=",$detail['to']);
        $this->netflow_db->limit(50);
        $this->netflow_db->order_by("stop_time", "desc");
        $query = $this->netflow_db->get();
        return $query->result();
    }

    public function get_anomaly_event($from_date, $to_date)
    {
        $this->netflow_db->select("MAX(stop_time) as update_time, src_ip, count(distinct event_type) as event_count, count(id) as log_count");
        $this->netflow_db->from("anomaly_log");
        $this->netflow_db->where("DATE(stop_time)>=",$from_date);
        $this->netflow_db->where("DATE(stop_time)<=",$to_date);
        $this->netflow_db->group_by("src_ip");
        $this->netflow_db->order_by("MAX(stop_time)", "desc");
        $query = $this->netflow_db->get();
        return $query->result();
    }

    public function get_anomaly_event_detail($detail)
    {
        $this->netflow_db->select("*");
        $this->netflow_db->from("anomaly_log");
        $this->netflow_db->where("src_ip",$detail['ip']);
        $this->netflow_db->where("DATE(stop_time)>=",$detail['from']);
        $this->netflow_db->where("DATE(stop_time)<=",$detail['to']);
        $this->netflow_db->order_by("stop_time", "desc");
        $query = $this->netflow_db->get();
        return $query->result();
    }

    public function get_anomaly_event_timeline($from_date, $to_date, $ip)
    {
        $events_list = array();
        $logs_list = array();
        $this->netflow_db->select("event_type");
        $this->netflow_db->from("anomaly_log");
        $this->netflow_db->where("src_ip",$ip);
        $this->netflow_db->where("DATE(stop_time)>=",$from_date);
        $this->netflow_db->where("DATE(stop_time)<=",$to_date);
        $this->netflow_db->group_by("event_type");
        $query = $this->netflow_db->get();

        $event_num = 0;
        foreach ($query->result() as $event){
            $events_list[] = $event->event_type;
            $this->netflow_db->select("*");
            $this->netflow_db->from("anomaly_log");
            $this->netflow_db->where("src_ip",$ip);
            $this->netflow_db->where("event_type",$event->event_type);
            $this->netflow_db->where("DATE(stop_time)>=",$from_date);
            $this->netflow_db->where("DATE(stop_time)<=",$to_date);
            $query = $this->netflow_db->get();
            foreach ($query->result() as $log){
                $unit = array();
                $unit["x"] = $event_num;
                $unit["low"] = strtotime($log->start_time)*1000;
                $unit["high"] = strtotime($log->stop_time)*1000;
                $logs_list[] = $unit;
            }
            $event_num++;
        }
        return array($events_list, $logs_list);
    }

    public function get_blacklist_log($from_date, $to_date)
    {
        $this->netflow_db->select("*");
        $this->netflow_db->from("blacklist_log");
        $this->netflow_db->where("DATE(date)>=",$from_date);
        $this->netflow_db->where("DATE(date)<=",$to_date);
        $this->netflow_db->order_by("date", "desc");
        $query = $this->netflow_db->get();
        return $query->result();
    }

    public function get_blacklist()
    {
        $this->netflow_db->select("*");
        $this->netflow_db->from("blacklist");
        $query = $this->netflow_db->get();
        return $query->result();
    }

    public function get_whitelist()
    {
        $this->netflow_db->select("*");
        $this->netflow_db->from("whitelist");
        $query = $this->netflow_db->get();
        return $query->result();
    }

    public function get_unusedIP()
    {
        $this->netflow_db->select("*");
        $this->netflow_db->from("unusedIP");
        $query = $this->netflow_db->get();
        return $query->result();
    }

    public function get_event_from_id($id)
    {
        $this->netflow_db->select("*");
        $this->netflow_db->from("anomaly_log");
        $this->netflow_db->where("id", $id);
        $query = $this->netflow_db->get();
        return $query->result();
    }
}

?>
