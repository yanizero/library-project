<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Peminjaman_Mod extends CI_Model{
	
	function Peminjaman_Mod(){
		
		parent::__construct();
	}
	
	function get_active_peminjaman(){
		$this->db->select('*')->from('peminjaman');
		$this->db->where('tanggal_pengembalian','0000-00-00');
		$query = $this->db->get();
		
		if ($query->num_rows()>0){		
			foreach ($query->result() as $row){
		
				$data_peminjaman[]= get_object_vars($row);// convert stdclass Obj to Array
			}
		}
		return $data_peminjaman;
	}
	
	function add_new_peminjaman($input){
		$result = $this->db->insert('peminjaman', $input);
		return $result;
	}
	
	function delete_peminjaman(){
		$id_peminjaman = $this->uri->segment(3);
	}
	
	function search_peminjaman($keyword){
		$this->db->select('*')->from('peminjaman');
		$this->db->like('judul_buku',$keyword,'after');
		$this->db->like('nim',$keyword,'after');
		$query = $this->db->get();
			
		if ($query->num_rows()>0){		
			foreach ($query->result() as $row){
		
				$hasil_pencarian[]= get_object_vars($row);// convert stdclass Obj to Array
			}
		}
		return $hasil_pencarian;
	}
	
	function update_peminjaman($id_peminjaman,$tanggal_pengembalian){
		
		$data = array(
				'tanggal_pengembalian' => $tanggal_pengembalian
		);
		
		$this->db->where('id_peminjaman', $id_peminjaman);
		$result = $this->db->update('peminjaman', $data);
		return $result;
	}
	
	function get_detail_peminjaman($id_peminjaman){
		$this->db->select('*')->from('peminjaman');
		$this->db->where("id_peminjaman",$id_peminjaman);
		$query = $this->db->get();
		
		if($query->num_rows()>0){
			foreach ($query->result() as $row){
				$data_detail= get_object_vars($row);// convert stdclass Obj to Array
			}
			
			return $data_detail; 
		}
		
	}
	
	function lookup($keyword){
		$this->db->select('*')->from('anggota');
		$this->db->like('nama_anggota',$keyword,'after');
		$query = $this->db->get();
		 
		return $query->result();
	}
	
	function lookup_nim($keyword){
		$this->db->select('*')->from('peminjaman');
		$this->db->like('nim',$keyword,'after');
		$query = $this->db->get();
			
		return $query->result();
	}
}