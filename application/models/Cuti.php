<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Cuti extends CI_Model {
 
    var $table = 'tbl_cuti';
    var $column_order = array(null, 'tbl_karyawan.nomor_induk','tbl_karyawan.nama','tanggal_cuti','lama_cuti','keterangan','sampai_tanggal'); //set column field database for datatable orderable
    var $column_search = array('nomor_induk','keterangan'); //set column field database for datatable searchable 
    var $order = array('tanggal_cuti' => 'DESC'); // default order 
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    private function _get_datatables_query($cnama,$type)
    {
        $this->db->select(array('tbl_cuti.id','tbl_karyawan.nomor_induk','tbl_karyawan.nama','tanggal_cuti','lama_cuti','keterangan','sampai_tanggal','sampai_tanggal','COUNT(*) as countcuti'));
        $this->db->join("tbl_karyawan","tbl_karyawan.nomor_induk=tbl_cuti.nomor_induk","JOIN");
        if(!empty($cnama)){
            $this->db->group_start();
            $this->db->like("tbl_karyawan.nama",$cnama,"both");
            $this->db->or_like("tbl_cuti.nomor_induk",$cnama,"both");
            $this->db->group_end();
        }
        $this->db->from($this->table);
        
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if(@$_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, @$_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, @$_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
        if($type=="sigle"){
            $this->db->group_by("tbl_cuti.nomor_induk");
            $this->db->having('COUNT(*)',  1);
        }else{
            $this->db->group_by("tbl_cuti.nomor_induk");
            $this->db->having('COUNT(*) >',  1);
        }
    }
 
    function get_datatables($cnama,$type)
    {
        $this->_get_datatables_query($cnama,$type);
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered($cnama,$type)
    {
        $this->_get_datatables_query($cnama,$type);
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
 
}