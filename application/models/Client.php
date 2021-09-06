<?php
Class Client extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getclients(){
        $sql = 'select a.id,a.name,alias,active from clients a ';
       // $sql.= 'where active="1" ';
        $sql.= 'limit 0,10';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'cnt'=>$que->num_rows(),
            'res'=>$que->result(),
            'sql'=>$sql
        );
    }
}