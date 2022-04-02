<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Employee','cmodel');
        $this->load->model('Cuti','dmodel');
		$this->load->library('form_validation');
    }
	
	public function index()
	{
		$data["tertua"] = $this->db->query("SELECT * FROM tbl_karyawan ORDER BY tanggal_bergabung, id ASC LIMIT 3")->result();
		$this->load->view('pages/page',$data);
	}

	public function get_employee(){
		$cnama = $_POST["nama"];
		$list = $this->cmodel->get_datatables($cnama);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
            $no++;
			$urldelete = base_url("pages/deletekaryawan");
			$urledit = base_url("pages/form_editemployee/").$customers->nomor_induk;
			$urlcuti = base_url("pages/formcuti/").$customers->nomor_induk;
            $row = array();
            $row[] = $no;
			$row[] = "
			<div class='row'>
				<div class='col-md-6'>
					<p>Nomor Induk : $customers->nomor_induk<br>Nama : $customers->nama</p>
				</div>
				<div class='col-md-6'>
					<p><Alamat : $customers->alamat<br>Tanggal Lahir : $customers->tanggal_lahir<br>Tanggal Bergabung : $customers->tanggal_bergabung</p>

					<div class='btn-group' style='float:right;'>
					<button class='btn btn-danger btn-sm' onclick='deleteaction(\"$customers->nomor_induk\",\"$urldelete\")'><i class='bi bi-trash2-fill'></i></button>
			<button class='btn btn-warning btn-sm' onclick='openmodal(\"$urledit\",\"Edit Karyawan\")'><i class='bi bi-pencil-fill'></i></button>
			<button class='btn btn-success btn-sm' onclick='openmodal(\"$urlcuti\",\"Ambil Cuti\")'><i class='bi bi bi-bug-fill'></i> Cuti</button>
					</div>
				</div>
			</div>
			";
        
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->cmodel->count_all(),
                        "recordsFiltered" => $this->cmodel->count_filtered($cnama),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

	public function form_addemployee(){
		$this->load->view("pages/karyawan/add");
	}

	public function form_editemployee($id){
		$data["user"] = $this->db->get_where("tbl_karyawan",["nomor_induk"=>$id])->row_array();
		$this->load->view("pages/karyawan/edit",$data);
	}

	public function save_employee(){
		$this->form_validation->set_rules('nomor_induk', 'Nomor Induk', 'trim|numeric|required|min_length[5]|max_length[25]|is_unique[tbl_karyawan.nomor_induk]');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('tanggal_bergabung', 'Tanggal Bergabung', 'trim|required|min_length[5]');
		if ($this->form_validation->run() == FALSE){
			$res = [
				"header" => "Omg... !",
				"text" => validation_errors('<p>', '</p>'),
				"type" => "error"
			];
			echo json_encode($res);
        }else{
			$data = $this->input->post();
			$this->db->insert("tbl_karyawan",$data);
			$res = [
				"header" => "Good Jobs !",
				"text" => "Karyawan berhasil didaftarkan !",
				"type" => "success"
			];
			echo json_encode($res);
		}
	}

	public function update_employee(){
		$this->form_validation->set_rules('nomor_induk', 'Nomor Induk', 'trim|numeric|required|min_length[5]|max_length[25]');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('tanggal_bergabung', 'Tanggal Bergabung', 'trim|required|min_length[5]');
		if ($this->form_validation->run() == FALSE){
			$res = [
				"header" => "Omg... !",
				"text" => validation_errors('<p>', '</p>'),
				"type" => "error"
			];
			echo json_encode($res);
        }else{
			$data = $this->input->post();
			$this->db->where("nomor_induk",$data["nomor_induk"]);
			$this->db->update("tbl_karyawan",$data);
			$res = [
				"header" => "Good Jobs !",
				"text" => "Karyawan berhasil diubah !",
				"type" => "success"
			];
			echo json_encode($res);
		}
	}

	public function deletekaryawan(){
		$id = $this->input->post("id");
		$this->db->where("nomor_induk",$id);
		$this->db->delete("tbl_karyawan");
		$res = [
			"header" => "Good Jobs !",
			"text" => "Karyawan berhasil dihapus !",
			"type" => "warning"
		];
		echo json_encode($res);
	}
	
	public function formcuti($nip){
		$data['user'] = $this->db->get_where("tbl_karyawan",["nomor_induk"=>$nip])->row_array();
		$this->load->view("pages/karyawan/cuti",$data);
	}

	public function cuti_employee(){
		$this->form_validation->set_rules('nomor_induk', 'Nomor Induk', 'trim|numeric|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('tanggal_cuti', 'Tanggal Cuti', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('sampai_tanggal', 'Sampai Tanggal', 'trim|required|min_length[5]');
		if ($this->form_validation->run() == FALSE){
			$res = [
				"header" => "Omg... !",
				"text" => validation_errors('<p>', '</p>'),
				"type" => "error"
			];
			echo json_encode($res);
        }else{
			$data = $this->input->post();
			$tgl1 = strtotime($data["tanggal_cuti"]); 
			$tgl2 = strtotime($data["sampai_tanggal"]); 
			$tahunku = date("Y", $tgl1);
			$jarak = $tgl2 - $tgl1;
			$hari = $jarak / 60 / 60 / 24;
			$hari = $hari+1;
			if($hari<=0){
				$res = [
					"header" => "Alert !",
					"text" => "Jarak tanggal cuti salah !",
					"type" => "error"
				];
			}else{
				$sudah = $this->db->query("SELECT sum(lama_cuti) as lama FROM tbl_cuti WHERE nomor_induk='$data[nomor_induk]' AND YEAR(tanggal_cuti)=$tahunku")->row_array();
				$jumlah = intval($sudah["lama"])+$hari;
				$sisa = 12-(intval($sudah["lama"]));
				if($jumlah>12){
					$res = [
						"header" => "Alert !",
						"text" => "Sisa cuti anda : ".$sisa." Hari",
						"type" => "error"
					];
				}else{
					$data["lama_cuti"] = $hari;
					$this->db->insert("tbl_cuti",$data);
					$res = [
						"header" => "Good Jobs !",
						"text" => "Cuti berhasil diajukan !",
						"type" => "success"
					];
				}
			}
			
			echo json_encode($res);
		}
	}

	public function cuti(){
		$this->load->view('pages/cuti');
	}

	public function get_cuti(){
		$cnama = $_POST["nama"];
		$list = $this->dmodel->get_datatables($cnama,"sigle");
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
            $no++;
			$urldelete = base_url("pages/deletecuti");
            $row = array();
            $row[] = $no;
            $row[] = "<div class='row'>
                    <div class='col-md-6'>
                        <p>
                            Nomor Induk : $customers->nomor_induk <br>
                            Nama : $customers->nama
                        </p>
                    </div>
                    <div class=col-md-6>
                        <p>
                            Tanggal Cuti : $customers->tanggal_cuti<br>
                            Sampai Tanggal : $customers->sampai_tanggal <br>
                            Lama : $customers->lama_cuti <br>
                            Keterangan : $customers->keterangan
                        </p>
                        <button style='float:right;' class='btn btn-danger btn-sm' onclick='deletecuti(\"$customers->id\",\"$urldelete\")'><i class='bi bi-trash2-fill'></i></button>
                    </div>
                </div>";
				
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->dmodel->count_all(),
                        "recordsFiltered" => $this->dmodel->count_filtered($cnama,"sigle"),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

	public function get_cuti2(){
		$cnama = @$_POST["nama"];
		$list = $this->dmodel->get_datatables($cnama,"double");
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $customers) {
            $no++;
			$url = base_url("pages/loadcuti/").$customers->nomor_induk;
            $row = array();
            $row[] = $no;
			$row[] = "
			<div class='row'>
				<div class='col-md-12'><p>
				Nomor Induk : $customers->nomor_induk <br>
				Nama : $customers->nama <br>
				Jumlah Cuti : $customers->countcuti<br>
				<button style='float:right;' class='btn btn-primary btn-sm' onclick='opentable(\"$url\",\"Table Cuti $customers->nama\")'><i class='bi bi-info-lg'></i></button>
				</p></div>
			</div>
			";
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => @$_POST['draw'],
                        "recordsTotal" => $this->dmodel->count_all(),
                        "recordsFiltered" => $this->dmodel->count_filtered($cnama,"double"),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

	public function deletecuti(){
		$id = $this->input->post("id");
		$this->db->where("id",$id);
		$this->db->delete("tbl_cuti");
		$res = [
			"header" => "Good Jobs !",
			"text" => "Cuti berhasil dibatalkan !",
			"type" => "warning"
		];
		echo json_encode($res);
	}

	public function loadcuti($nip){
		$data["cuti"] = $this->db->query("SELECT a.id,a.nomor_induk,a.lama_cuti,a.tanggal_cuti,a.sampai_tanggal,a.keterangan,b.nama FROM tbl_cuti a INNER JOIN tbl_karyawan b ON a.nomor_induk=b.nomor_induk WHERE a.nomor_induk='$nip'")->result();
		$this->load->view("pages/tblcuti",$data);
	}
}