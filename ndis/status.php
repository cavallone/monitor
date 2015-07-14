<?php
    if($_GET["status"] == "cpu"){
        echo `sar 1 1`;
    }else if($_GET["status"] == "memory"){
        echo `free`;
    }else if($_GET["status"] == "layer7"){
        echo `lsmod | grep xt_layer7`;
    }else if($_GET["status"] == "dpireporter"){
        echo `ps aux | grep dpireporter`;
    }
?>
