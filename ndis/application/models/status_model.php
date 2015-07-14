<?php

class Status_model extends CI_Model {
    
    public function __construct(){
        $this->dpi_db = $this->load->database("dpi", true);
    }

    public function get_cpu($host){
        if($host == "dpi"){
            $info = `curl 140.116.49.4/status.php?status=cpu`;
        }else if($host == "netflow"){
            $info = `curl -k https://127.0.0.1/ndis/status.php?status=cpu`;
        }
        $ret = array();
        if(preg_match("/all\s+(\d+\.\d+)\s+\d+\.\d+\s+(\d+\.\d+)/",$info,$match)){
            $ret["user"] = (float)$match[1];
            $ret["system"] = (float)$match[2];
        }
        return $ret;
    }

    public function get_memory($host){
        if($host == "dpi"){
            $info = `curl 140.116.49.4/status.php?status=memory`;
        }else if($host == "netflow"){
            $info = `curl -k https://127.0.0.1/ndis/status.php?status=memory`;
        }
        $ret = array();
        if(preg_match("/Mem:\s+(\d+)\s+(\d+)/",$info,$match)){
            $ret["total"] = (float)$match[1];
            $ret["used"] = (float)$match[2];
        }
        return $ret;
    }

    public function get_status(){
        $mod_layer7 = `curl 140.116.49.4/status.php?status=layer7`;
        $reporter = `curl 140.116.49.4/status.php?status=dpireporter`;
        
        $ret = array();
        if(preg_match("/xt_layer7\s+(\d+)/",$mod_layer7,$match)){
                   $ret["xt_layer7"]["pid"] = $match[1];
        }
        if(preg_match("/root\s*(\d+)\s+.*\s+\.\/dpireporter/",$reporter,$match)){
            $ret["dpireporter"]["pid"] = $match[1];
        }
        return $ret;
    }

}

?>
