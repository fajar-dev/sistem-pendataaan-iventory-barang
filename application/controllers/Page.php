<?php
class Page extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('Model_page');
		
		if($this->session->userdata('status')!= "login"){
			redirect(base_url('login'));
		}
	}
	
	public function index(){
		$data['semua'] =  $this->Model_page->semua('tbl_barang');
		$data['kurang'] =  $this->Model_page->kurang('tbl_barang')->num_rows();
		$data['baik'] =  $this->Model_page->baik('tbl_barang')->num_rows();
		$data['title'] = 'Dashboard';
		$this->load->view('header', $data);
    $this->load->view('dashboard');
    $this->load->view('footer');
	} 
	
	public function semua_barang(){
		$data['hasil']= $this->Model_page->tampil('tbl_barang')->result();
		$data['title'] = 'Semua Data Barang';
		$this->load->view('header', $data);
    $this->load->view('barang');
    $this->load->view('footer');
	} 

	public function kondisi_baik(){
		$data['hasil']= $this->Model_page->tampil_baik('tbl_barang')->result();
		$data['title'] = 'Kondisi Barang Baik';
		$this->load->view('header', $data);
    $this->load->view('barang');
    $this->load->view('footer');
	}

	public function kondisi_kurang_baik(){
		$data['hasil']= $this->Model_page->tampil_kurang('tbl_barang')->result();
		$data['title'] = 'Kondisi Barang Kurang Baik';
		$this->load->view('header', $data);
    $this->load->view('barang');
    $this->load->view('footer');
	}

	public function tambah_barang(){
		$data['title'] = 'Tambah Barang';
		$this->load->view('header', $data);
    $this->load->view('tambah');
    $this->load->view('footer');
	}

	public function tambah()
	{
		$nama = $_POST['nama'];
		$tgl = $_POST['tgl'];
		$jumlah = $_POST['jumlah'];
		$kondisi = $_POST['kondisi'];
		$data = array(
			'nama'=>$nama,
			'tgl_masuk'=>$tgl,
			'jumlah'=>$jumlah,
			'kondisi'=>$kondisi
			);
		$this->Model_page->tambah('tbl_barang',$data);
		$this->session->set_flashdata('msg',
		'<div class="alert alert-success alert-has-icon">
		<div class="alert-icon"><i class="fas fa-check"></i></div>
		<div class="alert-body">
			<div class="alert-title">Success</div>
			Data barang berhasil diinput
		</div>
		</div>'
		);
		redirect(base_url('page/semua_barang'));
	}

	public function edit_barang($id){
		$where = array('id' => $id);
		$data['hasil'] = $this->Model_page->edit_barang($where,'tbl_barang')->row();
		$data['title'] = 'Edit Barang';
		$this->load->view('header', $data);
    $this->load->view('edit');
    $this->load->view('footer');
	}

	public function edit()
	{
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$tgl = $_POST['tgl'];
		$jumlah = $_POST['jumlah'];
		$kondisi= $_POST['kondisi'];

		$data = array(
			'nama'=>$nama,
			'tgl_masuk'=>$tgl,
			'jumlah'=>$jumlah,
			'kondisi'=>$kondisi
		);
	 
		$where = array(
			'id' => $id
		);
	 
		$this->Model_page->edit($where,$data,'tbl_barang');
		$this->session->set_flashdata('msg',
		'<div class="alert alert-success alert-has-icon">
		<div class="alert-icon"><i class="fas fa-check"></i></div>
		<div class="alert-body">
			<div class="alert-title">Success</div>
			Data barang berhasil diedit
		</div>
		</div>'
		);
		redirect(base_url('page/semua_barang'));
	}

	function hapus($id)
	{
		$where = array('id'=>$id);
		$this->Model_page->hapus('tbl_barang',$where);
		$this->session->set_flashdata('msg',
		'<div class="alert alert-success alert-has-icon">
		<div class="alert-icon"><i class="fas fa-check"></i></div>
		<div class="alert-body">
			<div class="alert-title">Success</div>
			Data barang berhasil dihapus
		</div>
		</div>'
		);
		redirect(base_url('page/semua_barang'));
	}
}