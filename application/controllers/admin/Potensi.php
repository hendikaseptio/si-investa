<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Potensi extends CI_Controller {
	public function index()
	{
		$data["data"] = $this->db->get("potensi")->result();
		$content = [
			'title' => "Data Potensi",
			'contents' => $this->load->view('admin/potensi/index',$data, true)
		];
		$this->parser->parse('admin/template_admin', $content);
	}
	public function tambah()
	{
		$data["sektor"] = $this->db->get("mst_sektor")->result();
		$data["kelurahan"] = $this->db->get("mst_kelurahan")->result();
		$data["kecamatan"] = $this->db->get("mst_kecamatan")->result();
		$content = [
			'title' => "Tambah Data Potensi",
			'contents' => $this->load->view('admin/potensi/tambah',$data, true)
		];
		$this->parser->parse('admin/template_admin', $content);
	}
	public function simpan()
	{
		$this->load->helper(array('form', 'url', 'slug'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('sektor', 'Sektor', 'trim|required');
		$this->form_validation->set_rules('lat', 'Latitude', 'trim|required');
		$this->form_validation->set_rules('long', 'Longtitude', 'trim|required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
		$this->form_validation->set_rules('kelurahan', 'Kelurahan', 'trim|required');
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required');
		$this->form_validation->set_rules('detail_proyek', 'Detail Proyek', 'trim|required');
		$this->form_validation->set_rules('kondisi_eksisting', 'kondisi Eksisting', 'trim|required');
		$this->form_validation->set_rules('peluang_investasi', 'Peluang Investasi', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			// jika validasi error
			$this->session->set_flashdata("error","Masih ada inputan yang tidak valid");
			$this->tambah();
		} else {
			$data = [
				"nama" => $this->input->post('nama'),
				"slug" => slug($this->input->post('nama')),
				"sektor" => $this->input->post('sektor'),
				"latitude" => $this->input->post('lat'),
				"longtitude" => $this->input->post('long'),
				"kecamatan" => $this->input->post('kecamatan'),
				"kelurahan" => $this->input->post('kelurahan'),
				"lokasi" => $this->input->post('lokasi'),
				"detail_proyek" => $this->input->post('detail_proyek'),
				"kondisi_eksisting" => $this->input->post('kondisi_eksisting'),
				"peluang_investasi" => $this->input->post('peluang_investasi'),
				"status" => $this->input->post('status'),
				"created_at" => date("Y-m-d H:i:s"),
				"user_id" => 1,
			];
			$list_foto = array();
			for ($i=1; $i <= 4 ; $i++) { 
				$foto[$i] = $_FILES['foto'.$i];

				if (!empty($foto[$i])) {
					if ($this->security->xss_clean($foto[$i], TRUE) === FALSE){
						$this->session->set_flashdata('error', "File mengandung script yang membahayakan sistem");
						$this->tambah();
					} else {
						$new_name = $data["slug"].$i;
						$config['upload_path']          = './assets/foto/';
						$config['allowed_types']        = 'gif|jpg|png|jpeg|webp|avi|mp4'; 
						$config['max_size']             = 10000;
						$config['encrypt_name'] 		= TRUE;
						$config['file_name'] = 			$new_name;
						$this->load->library('upload', $config);

						if (!$this->upload->do_upload('foto'.$i)){
							$error = array('error' => $this->upload->display_errors());
							$this->session->set_flashdata('error', $error['error']);
							$this->tambah();
						} else {
							array_push($list_foto, $this->upload->data('file_name'));
						}
					}
				}
			}
			$data['foto'] = implode(",",$list_foto);

			$video = $_FILES['video'];
			if (!empty($video)) {
				if ($this->security->xss_clean($video, TRUE) === FALSE){
					$this->session->set_flashdata('error', "File mengandung script yang membahayakan sistem");
					$this->tambah();
				} else {
					$new_name = $data["slug"];
					$config['upload_path']          = './assets/video/';
					$config['allowed_types']        = 'avi|mp4'; 
					$config['encrypt_name'] 		= TRUE;
					$config['max_size']             = 10000;
					$config['file_name'] 			= $new_name;
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('video')){
						$error = array('error' => $this->upload->display_errors());
						$this->tambah();
					} else {
						$data["video"] =  $this->upload->data('file_name');
					}
				}
			}
			// $data = $this->security->xss_clean($data);
			$this->db->insert("potensi",$data);
			$this->session->set_flashdata('sukses', "Data berhasil ditambah");
			return redirect('admin/potensi'); 
		}
	}
	public function edit($id)
	{
		$data["sektor"] = $this->db->get("mst_sektor")->result();
		$data["kelurahan"] = $this->db->get("mst_kelurahan")->result();
		$data["kecamatan"] = $this->db->get("mst_kecamatan")->result();
		$data["data"] = $this->db->get_where("potensi",["id" => $id])->row_array();
		$content = [
			'title' => "Edit Potensi",
			'contents' => $this->load->view('admin/potensi/edit',$data, true)
		];
		$this->parser->parse('admin/template_admin', $content);
	}
	public function update($id)
	{
		$this->load->helper(array('form', 'url', 'slug'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('sektor', 'Sektor', 'trim|required');
		$this->form_validation->set_rules('lat', 'Latitude', 'trim|required');
		$this->form_validation->set_rules('long', 'Longtitude', 'trim|required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
		$this->form_validation->set_rules('kelurahan', 'Kelurahan', 'trim|required');
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required');
		$this->form_validation->set_rules('detail_proyek', 'Detail Proyek', 'trim|required');
		$this->form_validation->set_rules('kondisi_eksisting', 'kondisi Eksisting', 'trim|required');
		$this->form_validation->set_rules('peluang_investasi', 'Peluang Investasi', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			// jika validasi error
			$this->session->set_flashdata("error","Masih ada inputan yang tidak valid");
			$data["sektor"] = $this->db->get("mst_sektor")->result();
			$data["kelurahan"] = $this->db->get("mst_kelurahan")->result();
			$data["kecamatan"] = $this->db->get("mst_kecamatan")->result();
			$data["data"] = $this->db->get_where("potensi",["id" => $id])->row_array();
			$content = [
				'title' => "Edit Potensi",
				'contents' => $this->load->view('admin/potensi/edit',$data, true)
			];
			$this->parser->parse('admin/template_admin', $content);
		} else {
			$input = [
				"nama" => $this->input->post('nama'),
				"slug" => slug($this->input->post('nama')),
				"sektor" => $this->input->post('sektor'),
				"latitude" => $this->input->post('lat'),
				"longtitude" => $this->input->post('long'),
				"kecamatan" => $this->input->post('kecamatan'),
				"kelurahan" => $this->input->post('kelurahan'),
				"lokasi" => $this->input->post('lokasi'),
				"detail_proyek" => $this->input->post('detail_proyek'),
				"kondisi_eksisting" => $this->input->post('kondisi_eksisting'),
				"peluang_investasi" => $this->input->post('peluang_investasi'),
				"status" => $this->input->post('status'),
				"created_at" => date("Y-m-d H:i:s"),
				"user_id" => 1,
			];
			$list_foto = array();
			for ($i=1; $i <= 4 ; $i++) { 
				$foto[$i] = $_FILES['foto'.$i];

				if (!empty($foto[$i])) {
					if ($this->security->xss_clean($foto[$i], TRUE) === FALSE){
						$this->session->set_flashdata('error', "File mengandung script yang membahayakan sistem");
						$data["sektor"] = $this->db->get("mst_sektor")->result();
						$data["kelurahan"] = $this->db->get("mst_kelurahan")->result();
						$data["kecamatan"] = $this->db->get("mst_kecamatan")->result();
						$data["data"] = $this->db->get_where("potensi",["id" => $id])->row_array();
						$content = [
							'title' => "Edit Potensi",
							'contents' => $this->load->view('admin/potensi/edit',$data, true)
						];
						$this->parser->parse('admin/template_admin', $content);
					} else {
						$new_name = $input["slug"].$i;
						$config['upload_path']          = './assets/foto/';
						$config['allowed_types']        = 'gif|jpg|png|jpeg|webp|avi|mp4'; 
						$config['max_size']             = 10000;
						$config['encrypt_name'] 		= TRUE;
						$config['file_name'] = 			$new_name;
						$this->load->library('upload', $config);

						if (!$this->upload->do_upload('foto'.$i)){
							$error = array('error' => $this->upload->display_errors());
							$this->session->set_flashdata('error', $error['error']);
							$data["sektor"] = $this->db->get("mst_sektor")->result();
							$data["kelurahan"] = $this->db->get("mst_kelurahan")->result();
							$data["kecamatan"] = $this->db->get("mst_kecamatan")->result();
							$data["data"] = $this->db->get_where("potensi",["id" => $id])->row_array();
							$content = [
								'title' => "Edit Potensi",
								'contents' => $this->load->view('admin/potensi/edit',$data, true)
							];
							$this->parser->parse('admin/template_admin', $content);
						} else {
							array_push($list_foto, $this->upload->data('file_name'));
						}
					}
				}
			}
			if(count($list_foto) > 0) {
				$input['foto'] = implode(",",$list_foto);
			}

			$video = $_FILES['video'];
			if (!empty($video)) {
				if ($this->security->xss_clean($video, TRUE) === FALSE){
					$this->session->set_flashdata('error', "File mengandung script yang membahayakan sistem");
					$data["sektor"] = $this->db->get("mst_sektor")->result();
					$data["kelurahan"] = $this->db->get("mst_kelurahan")->result();
					$data["kecamatan"] = $this->db->get("mst_kecamatan")->result();
					$data["data"] = $this->db->get_where("potensi",["id" => $id])->row_array();
					$content = [
						'title' => "Edit Potensi",
						'contents' => $this->load->view('admin/potensi/edit',$data, true)
					];
					$this->parser->parse('admin/template_admin', $content);
				} else {
					$new_name = $input["slug"];
					$config['upload_path']          = './assets/video/';
					$config['allowed_types']        = 'avi|mp4'; 
					$config['encrypt_name'] 		= TRUE;
					$config['max_size']             = 10000;
					$config['file_name'] 			= $new_name;
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('video')){
						$error = array('error' => $this->upload->display_errors());
						$this->tambah();
					} else {
						$input["video"] =  $this->upload->data('file_name');
					}
				}
			}
			// $data = $this->security->xss_clean($data);
			$this->db->update("potensi",$input,["id" => $id]);
			$this->session->set_flashdata('sukses', "Data berhasil simpan");
			return redirect('admin/potensi'); 
		}
	}
	public function hapus($id)
	{
		// code...
	}
	public function get_kel()
	{
		if ($this->input->post()) {
			$data = $this->db->get_where("mst_kelurahan", ["id_kecamatan" => $this->input->post('id')]); 
			echo "<option selected disabled default value=''>Pilih Kelurahan</option>";
			foreach ($data->result() as $row) {
				echo "<option value='" . $row->id . "'>$row->nama</option>";
			}
		}
	}
}