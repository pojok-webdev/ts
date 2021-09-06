<?php
	class User extends CI_Controller
	{
		public function __construct()
		{
	        parent::__construct();

	        if($this->session->has_userdata('user'))
	        {
	            redirect(base_url()."/login");
	        }
	    }
	}