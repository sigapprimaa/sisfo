<?php


/**
 * 
 */
class LogError extends CI_Controller
{
	public function index()
	{
		$this->load->view('errors/error');
	}
}