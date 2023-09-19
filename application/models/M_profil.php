<?php  
class M_profil extends CI_Model {
	public function get_data_profil(){
		return $this->db->get('profil')->result();
	}
	public function get_profil($id)
	{
		return $this->db->get_where("profil",["id"=>$id])->row_array();
	}
	public function get_profil_by_slug($slug)
	{
		return $this->db->get_where("profil",["slug" => $slug])->row_array();
	}
	public function insert_profil($data)
	{
		return $this->db->insert("profil",$data);
	}
	public function update_profil($data,$id)
	{
		return $this->db->update("profil",$data,["id"=>$id]);
	}
	public function delete_profil($id)
	{
		return $this->db->delete("profil",["id"=>$id]);
	}
	public function draft_profil($id)
	{
		return $this->db->update("profil",["status"=>"draft"],["id"=>$id]);
	}
	public function publish_profil($id)
	{
		return $this->db->update("profil",["status"=>"publish"],["id"=>$id]);
	}
}