<?php
Class Client extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getclients(){
        $sql = 'select a.id,b.id siteid,d.name,c.alias,b.address,c.active,date_format(a.create_date,"%d-%b-%Y")installsdate from install_requests a ';
        $sql.= 'left outer join install_sites d on d.install_request_id=a.id ';
        $sql.= 'left outer join client_sites c on b.client_site_id = c.id ';
        $sql.= 'left outer join clients d on c.client_id=c.id ';
        $sql.= 'order by a.create_date desc ';




		$sql = "select a.id,c.name,c.alias,b.address,b.installsiteid,b.client_site_id,c.id,date_format(a.create_date,'%d-%b-%Y')installsdate from install_requests a ";
		$sql.= " left outer join ";
		$sql.= " 	( ";
		$sql.= " 		select distinct install_request_id, a.id installsiteid,b.id client_site_id,b.client_id,b.address ";
		$sql.= " 		from install_sites a left outer join client_sites b on b.id=a.client_site_id ";
		$sql.= " 		where b.id is not null ";
		$sql.= " 	) b ";
		$sql.= " 	on b.install_request_id=a.id ";
		$sql.= " left outer join clients c on b.client_id=c.id ";
		$sql.= " where b.client_site_id is not null ";
		$sql.= " and c.id is not null ";
		$sql.= " order by a.create_date desc ";

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