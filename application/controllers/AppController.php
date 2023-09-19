<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppController extends CI_Controller {
	public function index()
	{
		$this->load->model("m_profil");
		$this->load->model("m_potensi");
		$data['data'] = $this->m_potensi->get_data_potensi();
		$data["menu"] = $this->m_profil->get_data_profil();
		$content = [
			'title' => "Beranda",
			'contents' => $this->load->view('app/home',$data, true)
		];
		$this->parser->parse('app/template_app', $content);
		// $this->load->view('app/home');
	}
	public function investasi($kategori)
	{
        $this->load->model("m_potensi");
		$this->load->model("m_profil");
        $this->load->library('pagination');

		$config['base_url'] = site_url('investasi/sektor');
		$config['total_rows'] = count($this->m_potensi->get_data_potensi());
		$config['per_page'] = 4;
		$config['page_query_string'] = TRUE;
		$config['full_tag_open'] = '<nav aria-label="Page navigation example" class="mt-4">
					<ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		
		$config['last_link'] = 'Terakhir';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link link-dark">';
		$config['cur_tag_close'] = '</a></li>';
		$config['attributes'] = array('class' => 'page-link');

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();

		if($kategori == 'sektor') {
			$limit = $config['per_page'];
			$offset = html_escape($this->input->get('per_page'));
			$data["sektor"] = $this->db->get("mst_sektor")->result();
			$data["menu"] = $this->m_profil->get_data_profil();
			$data['data'] = $this->m_potensi->get_data_potensi_limit($limit,$offset);
			$content = [
				'title' => "Investasi By Sektor",
				'contents' => $this->load->view('app/investasi_sektor',$data, true)
			];
			$this->parser->parse('app/template_app', $content);
		} else {
			$data['kecamatan'] = $this->db->get("mst_kecamatan")->result();
			$data['data'] = $this->m_potensi->get_data_potensi();
			$data["menu"] = $this->m_profil->get_data_profil();
			$content = [
				'title' => "Investasi By Lokasi",
				'contents' => $this->load->view('app/investasi_lokasi',$data, true)
			];
			$this->parser->parse('app/template_app', $content);
		}
	}
	public function detail($slug)
	{
        $this->load->model("m_potensi");
		$this->load->model("m_profil");

		$data["data"] = $this->m_potensi->get_potensi_by_slug($slug);
		$data["menu"] = $this->m_profil->get_data_profil();
		$content = [
			'title' => $slug,
			'contents' => $this->load->view('app/detail_potensi',$data, true)
		];
		$this->parser->parse('app/template_app', $content);
	}
	public function profil($slug)
	{
		$this->load->model("m_profil");

		$data["data"] = $this->m_profil->get_profil_by_slug($slug);
		$data["menu"] = $this->m_profil->get_data_profil();
		// var_dump($data);die;
		$content = [
			'title' => $slug,
			'contents' => $this->load->view('app/profil',$data, true)
		];
		$this->parser->parse('app/template_app', $content);
	}
	public function peta()
	{
		$this->load->model("m_potensi");
		$data['data'] = $this->m_potensi->get_data_potensi();
		$data['siap'] = $this->m_potensi->get_potensi_by_status("siap");
		$data['belum'] = $this->m_potensi->get_potensi_by_status("belum");
		$this->load->view('app/peta',$data);
	}
}
