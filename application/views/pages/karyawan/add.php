<div class="row d-flex justify-content-center">
    <div class="col-md-6">

        <form id="form-submit" multiple="table_employee" action="<?=base_url("pages/save_employee")?>">
            <div class="mb-3">
                <label class="form-label">Nomor Induk</label>
                <input type="number" class="form-control" name="nomor_induk">
                <div id="emailHelp" class="form-text">Pastikan nomor induk unik.</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat">
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir">
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Bergabung</label>
                <input type="date" class="form-control" name="tanggal_bergabung" value="<?=date("Y-m-d");?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>

    </div>
</div>
<script src="<?=base_url("assets");?>/perpage.js"></script>