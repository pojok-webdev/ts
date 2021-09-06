<?php
Class Home extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function index(){
        $data = array(
            'title'=>'FTP'
        );
        $this->load->view('pages/home',$data);
    }
}