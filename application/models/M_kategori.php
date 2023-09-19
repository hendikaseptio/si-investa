<?php  
class M_kategori extends CI_Model {
	public function get_data_kategori(){
		return $this->db->get('mst_sektor')->result();
	}
	public function get_kategori($id)
	{
		return $this->db->get_where("mst_sektor",["id"=>$id])->row_array();
	}
	public function get_kategori_by_slug($slug)
	{
		return $this->db->get_where("mst_sektor",["slug" => $slug])->row_array();
	}
	public function insert_kategori($data)
	{
		return $this->db->insert("mst_sektor",$data);
	}
	public function update_kategori($data,$id)
	{
		return $this->db->update("mst_sektor",$data,["id"=>$id]);
	}
	public function delete_kategori($id)
	{
		return $this->db->delete("mst_sektor",["id"=>$id]);
	}
	public function draft_kategori($id)
	{
		return $this->db->update("mst_sektor",["status"=>"draft"],["id"=>$id]);
	}
	public function publish_kategori($id)
	{
		return $this->db->update("mst_sektor",["status"=>"publish"],["id"=>$id]);
	}
}