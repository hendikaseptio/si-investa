<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	public function index()
	{
		$this->load->model("m_kategori");
		$data['data'] = $this->m_kategori->get_data_kategori();
		$content = [
			'title' => "Data Profil",
			'contents' => $this->load->view('admin/kategori/index',$data, true)
		];
		$this->parser->parse('admin/template_admin', $content);
	}
	public function tambah()
	{
		$content = [
			'title' => "Tambah Profil",
			'contents' => $this->load->view('admin/kategori/tambah','', true)
		];
		$this->parser->parse('admin/template_admin', $content);
	}
	public function simpan()
	{
		$this->load->model("m_kategori");
		$this->load->helper(array('form', 'url', 'slug'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('judul', 'judul', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			// jika validasi error
			$this->session->set_flashdata("error","Masih ada inputan yang tidak valid");
			$content = [
				'title' => "Tambah Profil",
				'contents' => $this->load->view('admin/kategori/tambah','', true)
			];
			$this->parser->parse('admin/template_admin', $content);
		} else {
			$data = [
				"nama" => $this->input->post('nama'),
				"created_at" => date("Y-m-d H:i:s"),
			];
			$this->m_kategori->insert_kategori($data);
			$this->session->set_flashdata('sukses', "Data berhasil ditambah");
			return redirect('admin/kategori');
		}

	}
	public function edit($id)
	{
		$this->load->model("m_kategori");
		$data["data"] = $this->m_kategori->get_kategori($id);
		$content = [
			'title' => "Edit Profil",
			'contents' => $this->load->view('admin/kategori/edit',$data, true)
		];
		$this->parser->parse('admin/template_admin', $content);
	}
	public function update($id)
	{
		$this->load->model("m_kategori");
		$this->load->helper(array('form', 'url', 'slug'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			// jika validasi error
			$this->session->set_flashdata("error","Masih ada inputan yang tidak valid");
			$content = [
				'title' => "Tambah Profil",
				'contents' => $this->load->view('admin/kategori/edit','', true)
			];
			$this->parser->parse('admin/template_admin', $content);
		} else {
			$data = [
				"nama" => $this->input->post('nama'),
				"updated_at" => date("Y-m-d H:i:s"),
			];
			$this->m_kategori->update_kategori($data,$id);
			$this->session->set_flashdata('sukses', "Data berhasil diubah");
			return redirect('admin/kategori');
		}
	}
	public function hapus($id)
	{
		$this->load->model("m_kategori");
		$this->m_kategori->delete_kategori($id);
		$this->session->set_flashdata('sukses', "profil berhasil hapus");
		return redirect('admin/kategori');
	}
}