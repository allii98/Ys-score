<script type="text/javascript">
function addData() {
    $('#adduser').modal('show');
}

function save_user() {
    var nama = $('#nama').val();
    var username = $('#username').val();
    var username = $('#username').val();
    var password = $('#password').val();
    var foto = $('#foto').val();

    if (!nama) {
        $('#nama').css({
            "background": "#FFCECE"
        })
        new PNotify({
            title: 'Oh No!',
            text: 'Nama Harus diisi',
            type: 'error',
            styling: 'bootstrap3'
        })

    } else if (!username) {
        $('#username').css({
            "background": "#FFCECE"
        })
        new PNotify({
            title: 'Oh No!',
            text: 'Username Harus diisi',
            type: 'error',
            styling: 'bootstrap3'
        })
    } else if (!email) {
        $('#email').css({
            "background": "#FFCECE"
        })
        new PNotify({
            title: 'Oh No!',
            text: 'Email Harus diisi',
            type: 'error',
            styling: 'bootstrap3'
        })
    } else if (!password) {
        $('#password').css({
            "background": "#FFCECE"
        })
        new PNotify({
            title: 'Oh No!',
            text: 'Password Harus diisi',
            type: 'error',
            styling: 'bootstrap3'
        })
    } else {
        $('#nama,#username,#email,#password').css({
            "background": "#ffffff"
        })

        var form_data = new FormData();
        form_data.append('nama', nama);
        form_data.append('username', username);
        form_data.append('password', password);
        form_data.append('foto', foto);

        $.ajax({
            url: '<?php echo base_url('User/save_user') ?>',
            type: 'POST',
            dataType: 'json',
            cache: false,
            processData: false,
            contentType: false,
            data: form_data,
            success: function(data) {
                if (data.status == 'success') {
                    $('#adduser').modal('hide');
                    new PNotify({
                        title: 'Success!',
                        text: 'Data berhasil disimpan',
                        type: 'success',
                        styling: 'bootstrap3'
                    })
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    new PNotify({
                        title: 'Oh No!',
                        text: 'Data gagal disimpan',
                        type: 'error',
                        styling: 'bootstrap3'
                    })
                }
            }
        });
    }
}

function list_user() {
    $('#data-user').DataTable().destroy();
    var dt = $('#data-user').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],

        "ajax": {
            "url": "<?php echo site_url('User/data') ?>",
            "type": "POST"
        },
        "language": {
            "infoFiltered": ""
        },

        "columnDefs": [{
            "targets": [],
            "orderable": false,
        }, ]
    });

    var rel = setInterval(function() {
        $('#data-user').DataTable().ajax.reload();
        clearInterval(rel);
    }, 100);
}


$(document).ready(function() {
    list_user();
});
</script>