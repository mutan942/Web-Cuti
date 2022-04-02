<form id="form-submit" multiple="table_employee" action="<?=base_url("pages/cuti_employee")?>">
    <input type="hidden" name="nomor_induk" value="<?=$user["nomor_induk"]?>" />
    <p>Nama : <?=$user["nama"]?><br>
        Nomor Induk : <?=$user["nomor_induk"]?></p>
    <hr>
    <div class="mb-3">
        <label class="form-label">Keterangan</label>
        <textarea class="form-control" name="keterangan"></textarea>
        <div id="emailHelp" class="form-text">Pastikan keterangan valid.</div>
    </div>
    <div class="mb-3">
        <label class="form-label">Dari Tanggal</label>
        <input type="date" class="form-control" name="tanggal_cuti">
    </div>
    <div class="mb-3">
        <label class="form-label">Hingga Tanggal</label>
        <input type="date" class="form-control" name="sampai_tanggal">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </div>
</form>
<script src="<?=base_url("assets");?>/perpage.js"></script>