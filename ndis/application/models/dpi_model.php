<?php

class Dpi_model extends CI_Model {
    
    public function __construct(){
        $this->dpi_db = $this->load->database("dpi", true);
    }

    public function get_service(){
        $query = $this->dpi_db->get('services');
        $ret = $query->result_array();

        $list = null;
        foreach($ret as $v){
            $list[] = $v['name'];
        }
        return $list;

    }

    public function get_hour_byte($cfg){
        $this->dpi_db->limit($cfg['limit']);
        $this->dpi_db->order_by("date", "desc");
        $query = $this->dpi_db->get($cfg['table']);
        return $query->result_array();
    }

}

?>
