<script type="text/javascript">
function addData() {
    $('#adduser').modal('show');
    $('#labeladd').css('display', 'block');
    $('#labelupdate').css('display', 'none');
    $('#pw').show();
    $('#img').css('display', 'none');
    $("form")[0].reset();
}

function hapus(id) {
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Anda tidak akan dapat mengembalikan ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Swal.fire(
            //     'Deleted!',
            //     'Your file has been deleted.',
            //     'success'
            // )
            $.ajax({
                url: '<?= base_url('User/delete') ?>',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    id: id
                },
                success: function(data) {
                    Swal.fire(
                        'Hapus!',
                        'File Anda telah dihapus.',
                        'success'
                    )
                    list_user()
                }
            })
        }
    })
}

function updatemodal(id) {
    $('#adduser').modal('show');
    $('#labeladd').css('display', 'none');
    $('#labelupdate').css('display', 'block');
    $('#pw').hide();
    $('#photo').val('');
    $.ajax({
        url: "<?php echo base_url('User/get_data_by_id/') ?>",
        type: "POST",
        data: {
            id: id
        },
        dataType: "JSON",
        success: function(data) {
            $('#id').val(data.user_id);
            $('#nama').val(data.user_nama);
            $('#username').val(data.username);
            $('#password').val(data.user_pass);
            $('#email').val(data.email);
            $('#img').css('display', 'block');
            $('#old').html('<img src="<?php echo base_url() ?>assets/uploads/user/' + data.user_foto +
                '" width="50" height="50">');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function save_user() {
    var id = $('#id').val();
    var nama = $('#nama').val();
    var username = $('#username').val();
    var email = $('#email').val();
    var password = $('#password').val();
    // var foto = $('#photo').val();
    var foto = $('#photo').prop('files')[0];

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
        form_data.append('id', id);
        form_data.append('nama', nama);
        form_data.append('username', username);
        form_data.append('email', email);
        form_data.append('password', password);
        form_data.append('photo', foto);


        if (!id) {
            //save user
            $.ajax({
                url: '<?php echo base_url('User/save_user') ?>',
                type: 'POST',
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                data: form_data,
                success: function(data) {
                    if (data = true) {
                        $('#adduser').modal('hide');
                        new PNotify({
                            title: 'Success!',
                            text: 'Data berhasil disimpan',
                            type: 'success',
                            styling: 'bootstrap3'
                        })
                        list_user()
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
        } else {
            //update user
            $.ajax({
                url: '<?php echo base_url('User/update_user') ?>',
                type: 'POST',
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                data: form_data,
                success: function(data) {
                    if (data = true) {
                        $('#adduser').modal('hide');
                        new PNotify({
                            title: 'Success!',
                            text: 'Data berhasil diupdate',
                            type: 'success',
                            styling: 'bootstrap3'
                        })
                        list_user()
                    } else {
                        new PNotify({
                            title: 'Oh No!',
                            text: 'Data gagal diupdate',
                            type: 'error',
                            styling: 'bootstrap3'
                        })
                    }
                }
            });

        }
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