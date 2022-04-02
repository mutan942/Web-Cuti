var table_employee;
var table_cuti;
var table_cuti2;
$(document).ready(function() {
    //datatables
    table_employee = $('#table_employee').DataTable({
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "searching": false,
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": base_url + "pages/get_employee",
            "type": "POST",
            "data": function(data) {
                // Read values
                var nama = $('#input-cari').val();
                // Append to data
                data.nama = nama;
            }
        },

        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [0], //first column / numbering column
            "orderable": false, //set not orderable
        }, ],

    });

    table_cuti = $('#table_cuti').DataTable({
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "searching": false,
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": base_url + "pages/get_cuti",
            "type": "POST",
            "data": function(data) {
                // Read values
                var nama = $('#input-cari2').val();
                // Append to data
                data.nama = nama;
            }
        },

        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [0], //first column / numbering column
            "orderable": false, //set not orderable
        }, ],

    });

    table_cuti2 = $('#table_cuti2').DataTable({
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "searching": false,
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": base_url + "pages/get_cuti2",
            "type": "POST",
            "data": function(data) {
                // Read values
                var nama = $('#input-cari3').val();
                // Append to data
                data.nama = nama;
            }
        },

        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [0], //first column / numbering column
            "orderable": false, //set not orderable
        }, ],

    });
});

$("#input-cari").keyup(function() {
    table_employee.draw();
});

$("#input-cari2").keyup(function() {
    table_cuti.draw();
});

$("#input-cari3").keyup(function() {
    table_cuti2.draw();
});

function openmodal(link, text) {
    $("#section-data-ajax").load(link);
    $("#exampleModalLabel").text(text);
    $("#exampleModal").modal("toggle");
}

function alert_sweet(header, text, type) {
    Swal.fire(
        header,
        text,
        type
    )
}

function deleteaction(id, url) {
    Swal.fire({
        title: 'Alert',
        showCancelButton: true,
        html: 'Data anda akan terhapus <br> Yakin lanjutkan ?',
        confirmButtonText: 'Delete',
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                type: 'POST',
                data: { id: id },
                success: function(data) {
                    data = JSON.parse(data);
                    alert_sweet(data["header"], data["text"], data["type"]);
                    table_employee.ajax.reload(null, false);
                }
            });
        }
    })
}

function deletecuti(id, url) {
    Swal.fire({
        title: 'Alert',
        showCancelButton: true,
        html: 'Data anda akan terhapus <br> Yakin lanjutkan ?',
        confirmButtonText: 'Delete',
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                type: 'POST',
                data: { id: id },
                success: function(data) {
                    data = JSON.parse(data);
                    alert_sweet(data["header"], data["text"], data["type"]);
                    table_cuti.ajax.reload(null, false);
                    table_cuti2.ajax.reload(null, false);
                }
            });
        }
    })
}

function opentable(link, text) {
    $("#section-data-ajax").load(link);
    $("#exampleModalLabel").text(text);
    $("#exampleModal").modal("toggle");
}