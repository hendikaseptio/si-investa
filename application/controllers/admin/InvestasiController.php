<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InvestasiController extends CI_Controller {
	public function index()
	{
		$content = [
			'title' => "Beranda",
			'contents' => $this->load->view('admin/investasi/index','', true)
		];
		$this->parser->parse('admin/template_admin', $content);
		// $this->load->view('app/home');
	}
}
