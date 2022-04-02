<?php $this->load->view("pages/head"); ?>
<div class="card mb-3">
    <div class="card-header">
        <h5>Data Karyawan</h5>
        <input type="text" id="input-cari" placeholder="Cari pegawai..." class="form-control" />
        <hr>
        <div class="d-flex justify-content-end">
            <div class="btn-group">
                <button class="btn btn-primary"
                    onclick='openmodal("<?=base_url("pages/form_addemployee");?>","Tambah Karyawan")'>Tambah</button>
            </div>
        </div>
    </div>
    <div class="card-body table-responsive">
        <table id="table_employee" class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Data</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h5>Karyawan Tertua</h5>

    </div>
    <div class="card-body table-responsive">
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Data</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 0;
                foreach($tertua as $t){
                    $no++;
                    echo "
                    <tr>
                        <td>$no</td>
                        <td>
                        <div class='row'>
				<div class='col-md-6'>
					<p>Nomor Induk : $t->nomor_induk<br>Nama : $t->nama</p>
				</div>
				<div class='col-md-6'>
					<p><Alamat : $t->alamat<br>Tanggal Lahir : $t->tanggal_lahir<br>Tanggal Bergabung : $t->tanggal_bergabung</p>
				</div>
			</div>
                        </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->load->view("pages/foot"); ?>