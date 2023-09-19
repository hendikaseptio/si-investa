<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	public function index()
	{
		$this->load->model("m_profil");
		$data['data'] = $this->m_profil->get_data_profil();
		$content = [
			'title' => "Data Profil",
			'contents' => $this->load->view('admin/profil/index',$data, true)
		];
		$this->parser->parse('admin/template_admin', $content);
	}
	public function tambah()
	{
		$content = [
			'title' => "Tambah Profil",
			'contents' => $this->load->view('admin/profil/tambah','', true)
		];
		$this->parser->parse('admin/template_admin', $content);
	}
	public function simpan()
	{
		$this->load->model("m_profil");
		$this->load->helper(array('form', 'url', 'slug'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('judul', 'judul', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			// jika validasi error
			$this->session->set_flashdata("error","Masih ada inputan yang tidak valid");
			$content = [
				'title' => "Tambah Profil",
				'contents' => $this->load->view('admin/profil/tambah','', true)
			];
			$this->parser->parse('admin/template_admin', $content);
		} else {
			$data = [
				"judul" => $this->input->post('judul'),
				"slug" => slug($this->input->post('judul')),
				"deskripsi" => $this->input->post('deskripsi'),
				"status" => 'publish',
				"user_id" => 1,
				"created_at" => date("Y-m-d H:i:s"),
			];
			$this->m_profil->insert_profil($data);
			$this->session->set_flashdata('sukses', "Data berhasil ditambah");
			return redirect('admin/profil');
		}

	}
	public function edit($id)
	{
		$this->load->model("m_profil");
		$data["data"] = $this->m_profil->get_profil($id);
		$content = [
			'title' => "Edit Profil",
			'contents' => $this->load->view('admin/profil/edit',$data, true)
		];
		$this->parser->parse('admin/template_admin', $content);
	}
	public function update($id)
	{
		$this->load->model("m_profil");
		$this->load->helper(array('form', 'url', 'slug'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('judul', 'judul', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			// jika validasi error
			$this->session->set_flashdata("error","Masih ada inputan yang tidak valid");
			$content = [
				'title' => "Tambah Profil",
				'contents' => $this->load->view('admin/profil/edit','', true)
			];
			$this->parser->parse('admin/template_admin', $content);
		} else {
			$data = [
				"judul" => $this->input->post('judul'),
				"slug" => slug($this->input->post('judul')),
				"deskripsi" => $this->input->post('deskripsi'),
				"updated_at" => date("Y-m-d H:i:s"),
			];
			$this->m_profil->update_profil($data,$id);
			$this->session->set_flashdata('sukses', "Data berhasil diubah");
			return redirect('admin/profil');
		}
	}
	public function hapus($id)
	{
		$this->load->model("m_profil");
		$this->m_profil->delete_profil($id);
		$this->session->set_flashdata('sukses', "profil berhasil hapus");
		return redirect('admin/profil');
	}
	public function draft($id)
	{
		$this->load->model("m_profil");
		$this->m_profil->draft_profil($id);
		$this->session->set_flashdata('sukses', "profil berhasil didraft");
		return redirect('admin/profil');
	}
	public function publish($id)
	{
		$this->load->model("m_profil");
		$this->m_profil->publish_profil($id);
		$this->session->set_flashdata('sukses', "profil berhasil dipublish");
		return redirect('admin/profil');
	}
	public function upload()
	{
		// Allowed extentions.
		$allowedExts = array("gif", "jpeg", "jpg", "png");

	    // Get filename.
		$temp = explode(".", $_FILES["file"]["name"]);

	    // Get extension.
		$extension = end($temp);

	    // An image check is being done in the editor but it is best to
	    // check that again on the server side.
	    // Do not use $_FILES["file"]["type"] as it can be easily forged.
		$finfo = finfo_open(FILEINFO_MIME_TYPE);
		$mime = finfo_file($finfo, $_FILES["file"]["tmp_name"]);

		if ((($mime == "image/gif")
			|| ($mime == "image/jpeg")
			|| ($mime == "image/pjpeg")
			|| ($mime == "image/x-png")
			|| ($mime == "image/png"))
			&& in_array($extension, $allowedExts)) {
	        // Generate new random name.
			$name = sha1(microtime()) . "." . $extension;

	        // Save file in the uploads folder.
			move_uploaded_file($_FILES["file"]["tmp_name"], getcwd() . "/upload/" . $name);

	        // Generate response.
			$response = new StdClass;
			$response->link = site_url("upload/").$name;
			echo stripslashes(json_encode($response));
		}
	}
}