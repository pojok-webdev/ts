<?php
class Installs extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('client');
	}
	function index(){
//		echo 'test';
//		$this->getfolders();
		$clients = $this->client->getclients();
		$data = array(
			'title'=>'Installs',
			'clients'=>$clients['res']
		);
		$this->load->view('installs/index',$data);
	}
	function createreport(){
		$installsiteid = $this->uri->segment(3);
		$query = "select b.id siteid,c.id cid,c.name,concat(day(a.install_date),'-',month(a.install_date),'-',year(a.install_date)) ins_date,b.address,";
		$query.= "case a.status when '0' then 'belum selesai' when '1' then 'selesai' else 'belum selesai' end installstatus,a.resume,d.srv,e.xcutor,f.pic,g.tipe iwtipe,";
		$query.= "g.macboard iwmacboard,g.ip_ap iwip_ap,g.essid iwessid,g.ip_ethernet iwip_ethernet,g.freqwency iwfreqwency,g.polarization iwpolarization,";
		$query.= "g.signal iwsignal,g.quality iwquality,g.throughput_udp iwthroughput_udp,g.throughput_tcp iwthroughput_tcp,g.user iwuser,g.password iwpassword ";
		$query.= "from install_sites a ";
		$query.= "left outer join client_sites b on b.id=a.client_site_id ";
		$query.= "left outer join clients c on c.id=b.client_id ";
		$query.= "left outer join (select client_site_id,group_concat(name) srv from clientservices group by client_site_id) d on d.client_site_id=b.id ";
		$query.= "left outer join (select install_site_id,group_concat(name)xcutor from install_installers group by install_site_id) e on e.install_site_id=a.id ";
		$query.= "left outer join (select client_id,group_concat(name)pic from pics group by client_id) f on f.client_id=c.id ";
		$query.= "left outer join install_wireless_radios g on a.id=g.install_site_id ";
		$query.= "left outer join install_resumes h on h.install_site_id=a.id ";
		$query.= " where a.id=".$installsiteid;
		$res = $this->db->query($query);
		$obj = $res->result()[0];

		$query = "select a.* from install_resumes a left outer join install_sites b on b.id=a.install_site_id where  b.id=".$installsiteid;
		$res = $this->db->query($query);
		$sr = $res->result();

		$qii = "select a.id,a.img,a.title,a.description from install_images a where a.install_site_id=".$installsiteid. " ";
		$qii.= "order by roworder asc ";
		$res = $this->db->query($qii);
		$ii = $res->result();
		$material = $this->pinstall_request->getmaterials($installsiteid);
		$bas = $this->pinstall_request->getbas($installsiteid);
		$topologivsdfiles = gettopologivsdfiles($installsiteid);
		$data = array(
			'topologivsdfiles'=>$topologivsdfiles,
			'obj'=>$obj,
			'install_images'=>$ii,
			'sr'=>$sr,
			'materials'=>$material['res'],
			'bas'=>$bas['res']
		);
		$this->load->view("reports/installreport",$data);

	}
	function checkexists(){
		$this->load->library('ftp');

		$config['hostname'] = '192.168.0.234';
		$config['username'] = 'puji';
		$config['password'] = 'puj12021';
		$config['debug']    = TRUE;

		$this->ftp->connect($config);
		$list = $this->ftp->list_files('/Public/History Pelanggan/instalasi/');
		$start = 36;
		foreach($list as $fl){
			$filename = substr($fl,$start,strlen($fl)-$start);
			$tmparr = explode("-",$filename);
			$sql = 'insert into existingreportfiles (client_id,client_site_id,name) ';
			$sql.= 'values ';
			$sql.= '('.$tmparr['0'].','.$tmparr['1'].','.$tmparr['2'].')';
			echo $sql.'<br />';
		}
		$this->ftp->close();
	}
}