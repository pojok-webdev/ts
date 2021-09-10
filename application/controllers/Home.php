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
	function checkexists(){
		$id = $this->uri->segment(3);
		$this->load->library('ftp');

		$config['hostname'] = '192.168.0.234';
		$config['username'] = 'puji';
		$config['password'] = 'puj12021';
		$config['debug']    = TRUE;

		$this->ftp->connect($config);
		echo 'Aplikasi\n';
		$list = $this->ftp->list_files('/Aplikasi');
		print_r($list);
		echo '\n\nTask List\n';
		$list = $this->ftp->list_files('/Task List/NB/Puji Widi P');

		print_r($list);
		echo '<br >';
		echo '<br >';
		echo '<br >';
		echo '<br >';
		echo $list[0];
		$this->ftp->close();


	}
	function getfolders(){
		$this->load->library('ftp');

		$config['hostname'] = '192.168.0.234';
		$config['username'] = 'puji';
		$config['password'] = 'puj12021';
		$config['debug']    = TRUE;

		$this->ftp->connect($config);

		//$list = $this->ftp->list_files('/Task\ List/NB/Puji\ Widi\ Prayitno');
		//$list = $this->ftp->list_files('/Task List/NB/Puji Widi Prayitno');
		echo 'Aplikasi\n';
		$list = $this->ftp->list_files('/Aplikasi');
		print_r($list);
		echo '\n\nTask List\n';
		$list = $this->ftp->list_files('/Task List/NB/Puji Widi P');

		print_r($list);
		echo '<br >';
		echo '<br >';
		echo '<br >';
		echo '<br >';
		echo $list[0];
		$this->ftp->close();

	}
	function ftpcreatefolder(){
		$this->load->library('ftp');

		$config['hostname'] = '192.168.0.234';
		$config['username'] = 'puji';
		$config['password'] = 'puj12021';
		$config['debug']    = TRUE;

		$this->ftp->connect($config);
		if($this->ftp->mkdir('/Task List/NB/Puji Widi P/kholis',0755)){
			echo 'sukses membuat Folder';
		}else{
			echo 'tidak bisa membuat folder';
		};
		$this->ftp->close();
	}
	function createfolder(){
		$target_dir="../../media/profile/".date('my')."/";
		if(!file_exists($target_dir)){
			mkdir($target_dir,0777);
		}
	}
}