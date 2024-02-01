<?php
require_once 'get_ip.php';
class datalog extends dataUser {
        public $ip, $os, $device, $browser;

        public function __construct()
        {
            $this->ip = parent::get_ip();
            $this->os = parent::get_os();
            $this->device = parent::get_device();
            $this->browser = parent::get_browser();
            
        }
    }
?>