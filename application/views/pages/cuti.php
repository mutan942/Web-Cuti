<?php $this->load->view("pages/head"); ?>
<div class="card mb-3">
    <div class="card-header">
        <h5>Data Cuti Sekali</h5>
        <input type="text" id="input-cari2" placeholder="Cari pegawai..." class="form-control" />
        <hr>
        <div class="d-flex justify-content-end">
            <div class="btn-group">
            </div>
        </div>
    </div>
    <div class="card-body table-responsive">
        <table id="table_cuti" class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">
        <h5>Data Cuti</h5>
        <input type="text" id="input-cari3" placeholder="Cari pegawai..." class="form-control" />
        <hr>
        <div class="d-flex justify-content-end">
            <div class="btn-group">
            </div>
        </div>
    </div>
    <div class="card-body table-responsive">
        <table id="table_cuti2" class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<?php $this->load->view("pages/foot"); ?>