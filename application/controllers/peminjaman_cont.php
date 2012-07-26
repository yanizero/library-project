<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Peminjaman_cont extends CI_Controller{
	
	private $flag_notify= FALSE;
	private $success_message='';

	function index(){
		$data['flag_notify']=$this->flag_notify;
		$data['success_message']=$this->success_message;
		$data['list_peminjaman']= $this->get_all_peminjaman();
		$this->load->view('manage_peminjaman',$data);
	}
	
	function get_all_peminjaman(){
		return $this->peminjaman_mod->get_active_peminjaman();
		
	}
	function load_view_add_peminjaman(){
		$this->load->view('tambah_peminjaman');
	}
	
	function load_view_akhiri_peminjaman(){
		$id_peminjaman = $this->uri->segment(3);
		$data['detail_peminjaman']= $this->peminjaman_mod->get_detail_peminjaman($id_peminjaman);
		$this->load->view('akhiri_peminjaman',$data);
	
	}
	
	function add_peminjaman(){	
		
		$input['nim'] = $this->input->post('nim');
		$input['id_petugas']=session_name('id_petugas');
		$input['kode_buku']= $this->input->post('kode_buku');
		$input['judul_buku']=$this->input->post('judul_buku');
		$input['tanggal_pinjam']=$this->input->post('judul_buku');
		$input['tanggal_kembali']=$this->input->post('judul_buku');
		
		$this->flag_notify = TRUE;
		
		if($this->peminjaman_mod->add_new_peminjaman($input)){
			$this->success_message='data berhasil ditambahkan';
		}else{
			$this->success_message='data gagal ditambahkan';
		}
		$this->index();
	}
	
	function search_peminjaman(){
		$keyword = $this->input->post('keyword');
		$data['hasil_search']=$this->peminjaman_mod->search_peminjaman($keyword);
		$this->load->view('hasil_peminjaman',$data);
	}
	
	function get_detail_peminjaman(){
		$id_peminjaman = $this->uri->segment(3);
		$data['detail_peminjaman']= $this->peminjaman_mod->get_detail_peminjaman($id_peminjaman);
		$this->load->view('detail_peminjaman',$data);
	}
	
	function akhiri_peminjaman(){
		$id_peminjaman = $this->uri->segment(3);
		$tanggal_pengembalian=$this->input->post('tanggal_pengembalian');
		
		$this->flag_notify = TRUE;
		if($this->peminjaman_mod->update_peminjaman($id_peminjaman,$tanggal_pengembalian)){
			
			$this->success_message =  "peminjaman telah berakhir";
		}
		$data['list_peminjaman']= $this->get_all_peminjaman();
		$this->index();
	}
	
	function lookup(){
		
		$keyword = $this->input->post('term');
		$data['response'] = 'false'; 
		$this->load->model('peminjaman_mod'); 
		$query = $this->peminjaman_mod->lookup($keyword);
		
		if(! empty($query) ) {
			$data['response'] = 'true'; 
			$data['message'] = array(); 
			foreach( $query as $row ){
				$data['message'][] = array('label' => $row->nama_anggota, 'value' => $row->nama_anggota); 
			}
		
		}
		
		if('IS_AJAX'){//IS_AJAX in undefined
			echo json_encode($data); 
		}
		else {
			$this->load->view('autocomplete',$data); 
		}
		
	}
	
	
	function lookup_nim(){
	
		$keyword = $this->input->post('term');
		$data['response'] = 'false';
		$this->load->model('peminjaman_mod');
		$query = $this->peminjaman_mod->lookup_nim($keyword);
	
		if(! empty($query) ) {
			$data['response'] = 'true';
			$data['message'] = array();
			foreach( $query as $row ){
				$data['message'][] = array('label' => $row->nim, 'value' => $row->nim);
			}
	
		}
	
		if('IS_AJAX'){//IS_AJAX in undefined
			echo json_encode($data);
		}
		else {
			$this->load->view('autocomplete',$data);
		}
	
	}
}