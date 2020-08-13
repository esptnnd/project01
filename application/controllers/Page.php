<?php
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
	
    $this->load->library('datatables');
    $this->load->model('crud_model');	
	
    //validasi jika user belum login
    if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		}
  }

  function index(){
	  if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
    // $this->load->view('v_dashboard');
	  $this->load->view('menu');
    $this->load->view('loadjavascript');	
    $this->load->view('v_chart_dashboard');	
    //$x['kategori']=$this->crud_model->get_kategori();
    //$this->load->view('crud_view',$x);	
	  }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
	  
  }

  function detail_monitor(){
    // function ini hanya boleh diakses oleh admin dan dosen
    if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
	 $this->load->view('menu');

		$x['kategori']=$this->crud_model->get_kategori();
      $this->load->view('listdata',$x);	
    }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }

  }

  function input_nilai(){
    // function ini hanya boleh diakses oleh admin dan dosen
    if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		
	 $this->load->view('menu');
   $this->load->view('loadjavascript');	
   $x['kategori']=$this->crud_model->get_kategori();	
   $this->load->view('v_input_nilai');
    }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  function krs(){
    // function ini hanya boleh diakses oleh admin dan mahasiswa
    if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='3'){
	 $this->load->view('menu');
	 $this->load->view('loadjavascript');
      $this->load->view('v_krs');
    }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }
  function lhs(){
    // function ini hanya boleh diakses oleh admin dan mahasiswa
    if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='3'){
	 $this->load->view('menu');
	 $this->load->view('loadjavascript');
      $this->load->view('v_lhs');
    }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }
  


  
  function detail_alarm(){
    // function ini hanya boleh diakses oleh admin dan mahasiswa
    if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='3'){
	 $this->load->view('menu');
	 $this->load->view('loadjavascript');
   $this->load->view('v_detail_alarm');
    }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }  




//   #############  TEST SEND VARIABLE TO MODEL ###############  //
  function coba_data() { //data data produk by JSON object
    //header('Content-Type: text/plain');
    header('Content-Type: application/json');
    $pass_data=str_replace("%20"," ",$this->uri->segment(3));
    echo $this->crud_model->get_sample($pass_data);
    //echo $this->crud_model->get_sample();
    
  }






  function source_csv() {  

  if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='3'){ 
   // file name 
   $filename = 'chart_pie.csv'; 
   header("Content-Description: File Transfer"); 
   header("Content-Disposition: attachment; filename=$filename"); 
   header("Content-Type: application/csv; ");
   
   // get data 
   $usersData = $this->crud_model->get_count_data();

   // file creation 
   $file = fopen('php://output', 'w');
 
   $header = array("Category","Count"); 
   fputcsv($file, $header);
   foreach ($usersData as $key=>$line){ 
     fputcsv($file,$line); 
   }
   fclose($file); 
   exit; 

  }else{
    echo "Anda tidak berhak mengakses halaman ini";
  }

  }
  

  
  /////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////
 /////////////////////////////////////////////////////////////////
   function get_list_json() { //data data produk by JSON object
    header('Content-Type: application/json');
    echo $this->crud_model->get_list_data();
  }

 
  function get_guest_json() { //data data produk by JSON object
    header('Content-Type: application/json');
    echo $this->crud_model->get_all_produk();
  }





 
   function simpan(){ //function simpan data
    $data=array(
      'barang_kode'     => $this->input->post('kode_barang'),
      'barang_nama'     => $this->input->post('nama_barang'),
      'barang_harga'    => $this->input->post('harga'),
      'barang_kategori_id' => $this->input->post('kategori')
    );
    $this->db->insert('barang', $data);
    redirect('page/input_nilai');
  }

  function update(){ //function update data
    $kode=$this->input->post('kode_barang');
    $data=array(
      'barang_nama'     => $this->input->post('nama_barang'),
      'barang_harga'    => $this->input->post('harga'),
      'barang_kategori_id' => $this->input->post('kategori')
    );
    $this->db->where('barang_kode',$kode);
    $this->db->update('barang', $data);
    redirect('page/input_nilai');
  }

  function delete(){ //function hapus data
    $kode=$this->input->post('kode_barang');
    $this->db->where('barang_kode',$kode);
    $this->db->delete('barang');
    redirect('page/input_nilai');
  }

 
  
}

