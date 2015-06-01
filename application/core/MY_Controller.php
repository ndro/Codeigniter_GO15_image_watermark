<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
    }
	
	public function open()
	{
		$this->load->view('template/header');
	}
	
	public function close()
	{
		$this->load->view('template/footer');
	}
}
