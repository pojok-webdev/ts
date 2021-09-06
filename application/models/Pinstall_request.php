<?php
Class Pinstall_request extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getmaterials($install_site_id){
        $sql = "select a.* from install_materials a ";
        $sql.= "left outer join install_sites b on b.id=a.install_site_id ";
        $sql.= "where b.id = " . $install_site_id . " ";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),
            'count'=>$que->num_rows(),
            'sql'=>$sql
        );
    }
    function getbas($install_site_id){
        $sql = "select * from install_bas a ";
        $sql.= "left outer join install_sites b on b.id=a.install_site_id ";
        $sql.= "where b.id = " . $install_site_id . " ";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),
            'count'=>$que->num_rows(),
            'sql'=>$sql
        );
    }
}