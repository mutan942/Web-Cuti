$("#form-submit").on("submit", function(e) {
    e.preventDefault();
    var url = $(this).attr("action");
    $.ajax({
        url: url,
        type: 'POST',
        data: $(this).serialize(),
        success: function(data) {
            data = JSON.parse(data);
            alert_sweet(data["header"], data["text"], data["type"]);
            if (data["type"] == "success") {
                $("#exampleModal").modal("toggle");
                table_employee.ajax.reload(null, false);
            }
        }
    });
});

$(document).ready(function() {
    $('.datatableku').DataTable({
        aoColumns: [
            { sWidth: '5%' },
            { sWidth: '95%' }
        ]
    });
});

function deletecutidetail(id, urldel) {
    Swal.fire({
        title: 'Alert',
        showCancelButton: true,
        html: 'Data anda akan terhapus <br> Yakin lanjutkan ?',
        confirmButtonText: 'Delete',
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                url: urldel,
                type: 'POST',
                data: { id: id },
                success: function(data) {
                    data = JSON.parse(data);
                    alert_sweet(data["header"], data["text"], data["type"]);
                    $("#exampleModal").modal("toggle");
                    table_cuti.draw();
                    table_cuti2.draw();
                }
            });
        }
    })
}