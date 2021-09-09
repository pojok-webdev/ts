<?php
function gettopologivsdfiles($id){
	$directory = '/home/klien/www/padicustomer/padiapp-data/installs/vsd/'.$id;
	$filecount = 0;
	$files = glob($directory . "*.vsd");
	$arr = array();
	if ($files){
	  foreach($files as $fl){
		array_push($arr,substr($fl,55,strlen($fl) - 55));
	  }
	}      
	return($arr);
}
function sendfile($params){
	$ci = & get_instance();
	$ci->load->library('ftp');

	$config['hostname'] = '192.168.0.234';
	$config['username'] = 'puji';
	$config['password'] = 'puj12021';
	$config['debug']    = TRUE;

	$ci->ftp->connect($config);
	if($ci->ftp->upload($params['localfile'], '/Public/History Pelanggan/'.$params['output'].'.pdf', 'ascii', 0775)){
		echo 'sukses membuat File';
	}else{
		echo 'tidak bisa membuat File';
	};
	$ci->ftp->close();
	
}