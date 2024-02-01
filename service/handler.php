<?php 
require_once 'meth.php';

    class handler extends select_pre {

        function table($table) {
            $res = $this->get_req($table);
            return $res;
        } 

    }
?>