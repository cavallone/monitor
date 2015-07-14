<?php

class Noc_model extends CI_Model {
    
    public function __construct(){
        $this->noc_db = $this->load->database("noc", true);
    }

    public function get_IP_info($ip){
        list($IP_CLASSA, $IP_CLASSB, $IP_CLASSC, $IP_HOST) = explode(".", $ip);
        $user_info = array();
        # Get user info
        $this->noc_db->select("*");
        $this->noc_db->from("IP");
        $this->noc_db->where("ClassC",$IP_CLASSC);
        $this->noc_db->where("Host",$IP_HOST);
        $query = $this->noc_db->get();
        $result = $query->result_array();
        $result = $result[0];
        $user_info["UserName"] = $result["UserName"];
        $user_info["UserEmail"] = $result["UserEmail"];
        # Get labadmin now
        $this->noc_db->select("*");
        $this->noc_db->from("Users");
        $this->noc_db->where("Account",$result["Account"]);
        $query = $this->noc_db->get();
        $result = $query->result_array();
        $result = $result[0];
        $user_info["LabAdminEmail"] = $result["LabAdminEmail"];
        return $user_info;
    }

    public function checkIP($ip){
        list($IP_CLASSA, $IP_CLASSB, $IP_CLASSC, $IP_HOST) = explode(".", $ip);
        # Get user info
        $this->noc_db->select("*");
        $this->noc_db->from("IP");
        $this->noc_db->where("ClassC",$IP_CLASSC);
        $this->noc_db->where("Host",$IP_HOST);
        $query = $this->noc_db->get();
        $result = $query->result_array();
        return count($result);
    }
}

?>
