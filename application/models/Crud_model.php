<?php
class Crud_model extends CI_Model{

  function get_kategori(){
    $hsl=$this->db->get('kategori');
    return $hsl;
  }
  function get_all_produk() {
        $this->datatables->select('barang_kode,barang_nama,barang_harga,kategori_id,kategori_nama');
        $this->datatables->from('barang');
        $this->datatables->join('kategori', 'barang_kategori_id=kategori_id');
        $this->datatables->add_column('view', '<a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-kode="$1" data-nama="$2" data-harga="$3" data-kategori="$4">Edit</a>  <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-kode="$1">Hapus</a>','barang_kode,barang_nama,barang_harga,kategori_id,kategori_nama');
        return $this->datatables->generate();
  }

  function get_list_data() {
		$this->datatables->select('nodename');
		$this->datatables->from('nodelist_1');
  return $this->datatables->generate();
  }

function parse_schedule_backup(){
    $this->db->select('nodename');
    $this->db->from('nodelist');
    $query = $this->db->get();

    // Return associative data array
    return $query->result_array();
}




//   #############  TEST AMBIL DATA ###############  //
function get_sample($x) {
  $this->datatables->select('eventTime,NodeName,alarmingObject,probableCause,category_alarm,specificProblem,objectOfReference,action_taken');
  $this->datatables->from('alarm_table');
  $this->datatables->join('lookup_category', 'probableCause=alarm','left');

  if($x != ''){
    if($x == 'Other Alarm Category'){
      $this->datatables->where('category_alarm', null);
    }else{ 
      $this->datatables->where('category_alarm', $x);
    }
  }

  $this->datatables->add_column('view', '<a href="javascript:void(0);" 
  class="check_action btn btn-info btn-xs" 
  data-event_time="$1" data-namanode="$2"  data-alarm_obj="$3"
  data-pcause="$4" data-category="$5"
  data-objectofref="$7"  data-action_taken="$8"
  data-specific_problem="$6">Alarm Details</a> ',
  'eventTime,NodeName,alarmingObject,probableCause,category_alarm,specificProblem,objectOfReference,action_taken');
  return $this->datatables->generate();
}



//   #############  GENERATE CSV SUMMARY ###############  //
function get_count_data() {
  $response = array();
 
  // Select record
  $this->db->select('category1,Count1');
  $q = $this->db->get('alarm_summary_view');
  $response = $q->result_array();

  return $response;
}





}
