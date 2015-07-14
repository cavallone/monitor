<?php

class Auth extends CI_Model {
    
    public function __construct(){
        $this->load->database();
    }

    public function create_account($data){
        $data["password"] = $this->hashfunc($data["password"]);
        $this->db->insert("users", $data);
    }

    public function is_account_pass($account, $password){
        $password = $this->hashfunc($password);
        $sql = "SELECT * FROM `users` WHERE `account`=? and `password`=?";
        $query = $this->db->query($sql, array($account, $password));
        if($query->num_rows != 1)
            return FALSE;
        else
            return TRUE;
    }

    protected function hashfunc($plaintext){
        $salt = md5($plaintext);
        $hash1 = hash('sha512', $plaintext);
        $hash2 = md5($salt.$hash1);
        return $hash2;
    }
}

?>
