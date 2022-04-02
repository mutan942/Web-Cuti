<table class="table table-borderless datatablek">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Data</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no = 0;
        foreach($cuti as $c): 
        $no++;
        $urldelete = base_url("pages/deletecuti");
        ?>
        <tr>
            <td><?=$no;?></td>
            <td>
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            Nomor Induk : <?=$c->nomor_induk;?> <br>
                            Nama : <?=$c->nama;?>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            Tanggal Cuti : <?=$c->tanggal_cuti;?><br>
                            Sampai Tanggal : <?=$c->sampai_tanggal;?> <br>
                            Lama : <?=$c->lama_cuti;?> <br>
                            Keterangan : <?=$c->keterangan;?>
                        </p>
                        <button style="float:right;" class="btn btn-danger btn-sm"
                            onclick='deletecutidetail("<?=$c->id?>","<?=$urldelete?>")'><i
                                class='bi bi-trash2-fill'></i></button>
                    </div>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script src="<?=base_url("assets");?>/perpage.js"></script>