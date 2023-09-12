<?php  
class M_potensi extends CI_Model {
	public function get_data_potensi(){
		$this->db->select('potensi.*, mst_sektor.nama as sektor, mst_kecamatan.nama as kecamatan, mst_kelurahan.nama as kelurahan')
		->from('potensi')
		->join('mst_sektor','potensi.sektor = mst_sektor.id')
		->join('mst_kecamatan','potensi.kecamatan = mst_kecamatan.id')
		->join('mst_kelurahan','potensi.kelurahan = mst_kelurahan.id');
		if(!empty($this->input->get('kec'))) {
			$this->db->where("potensi.kecamatan",$this->input->get('kec'));
		}
		return $this->db->get()->result();
	}
	public function get_data_potensi_limit($limit=NULL, $offset=NULL) {
		if(!$limit && $offset) {
			$this->db->select('potensi.*, mst_sektor.nama as sektor, mst_kecamatan.nama as kecamatan, mst_kelurahan.nama as kelurahan')
			->from('potensi')
			->join('mst_sektor','potensi.sektor = mst_sektor.id')
			->join('mst_kecamatan','potensi.kecamatan = mst_kecamatan.id')
			->join('mst_kelurahan','potensi.kelurahan = mst_kelurahan.id');
			if ($this->input->get("sektor")) {
				$this->db->where("sektor",$this->input->get("sektor"));
			}
			if ($this->input->get("cari")) {
				$this->db->like("nama",$this->input->get("cari"));
			}
			return $this->db->get()->result();
		} else {
			$this->db->select('potensi.*, mst_sektor.nama as sektor, mst_kecamatan.nama as kecamatan, mst_kelurahan.nama as kelurahan')
			->from('potensi')
			->join('mst_sektor','potensi.sektor = mst_sektor.id')
			->join('mst_kecamatan','potensi.kecamatan = mst_kecamatan.id')
			->join('mst_kelurahan','potensi.kelurahan = mst_kelurahan.id');
			if ($this->input->get("sektor")) {
				$this->db->where("potensi.sektor",$this->input->get("sektor"));
			}
			if ($this->input->get("cari")) {
				$this->db->like("potensi.nama",$this->input->get("cari"));
			}
			return $this->db->limit($limit,$offset)->get()->result();
		}
	}
	public function insert_potensi($data) {
		return $this->db->insert("potensi",$data);
	}
	public function get_potensi($id) {
		return $this->db->select('potensi.*, mst_sektor.nama as sektor, mst_kecamatan.nama as kecamatan, mst_kelurahan.nama as kelurahan')
		->from('potensi')
		->join('mst_sektor','potensi.sektor = mst_sektor.id')
		->join('mst_kecamatan','potensi.kecamatan = mst_kecamatan.id')
		->join('mst_kelurahan','potensi.kelurahan = mst_kelurahan.id')
		->where('potensi.id',$id)
		->get()->row_array();
	}
	public function get_potensi_by_slug($slug)
	{
		return $this->db->select('potensi.*, mst_sektor.nama as sektor, mst_kecamatan.nama as kecamatan, mst_kelurahan.nama as kelurahan')
		->from('potensi')
		->join('mst_sektor','potensi.sektor = mst_sektor.id')
		->join('mst_kecamatan','potensi.kecamatan = mst_kecamatan.id')
		->join('mst_kelurahan','potensi.kelurahan = mst_kelurahan.id')
		->where('potensi.slug',$slug)
		->get()->row_array();
	}
	public function update_potensi($data,$id) {
		return $this->db->update("potensi",$data,["id" => $id]);
	}
	public function delete_potensi($id) {
		return $this->db->delete("potensi",["id" => $id]);
	}
}

