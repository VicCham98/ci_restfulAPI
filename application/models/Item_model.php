<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Item_model extends CI_Model {

	public function getProductos(){
		$this->db->select("p.*,c.nombre as categoria");
		$this->db->from("productos p");
		$this->db->join("categorias c", "p.categoria_id = c.id");
		$this->db->where("p.estado","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function index_get($id){
		if(!empty($id)){
			$this->db->where('id', $id);
			$resultado = $this->db->get("items");
			return $resultado->row();
		}else{
			$resultado = $this->db->get("items");
			return $resultado->result();
		}
	}

	public function index_post($data){
		return $this->db->insert('items',$data);
	}

	public function index_put($id,$data){
		$this->db->where('id',$id);
		return $this->db->update('items', $data);
	}

	public function index_delete($id){
		$this->db->where('id',$id);
		return $this->db->delete('items');
	}

}
