<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppController extends CI_Controller {
	public function index()
	{
		$content = [
			'title' => "Beranda",
			'contents' => $this->load->view('app/home','', true)
		];
		$this->parser->parse('app/template_app', $content);
		// $this->load->view('app/home');
	}
}
