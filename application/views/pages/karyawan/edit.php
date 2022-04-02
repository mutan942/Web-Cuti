<div class="row d-flex justify-content-center">
    <div class="col-md-6">

        <form id="form-submit" multiple="table_employee" action="<?=base_url("pages/update_employee")?>">
            <div class="mb-3">
                <label class="form-label">Nomor Induk</label>
                <input type="number" class="form-control" name="nomor_induk" value="<?=$user["nomor_induk"]?>" readonly
                    required>
                <div id="emailHelp" class="form-text">Pastikan nomor induk unik.</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value="<?=$user["nama"]?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" value="<?=$user["alamat"]?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir" value="<?=$user["tanggal_lahir"]?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Bergabung</label>
                <input type="date" class="form-control" name="tanggal_bergabung"
                    value="<?=$user["tanggal_bergabung"]?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>

    </div>
</div>
<script src="<?=base_url("assets");?>/perpage.js"></script>