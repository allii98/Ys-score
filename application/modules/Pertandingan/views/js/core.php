<script type="text/javascript">
function addData() {
    $('#add_pertandingan').modal('show');
    $('#labeladd_pertandingan').css('display', 'block');
    $('#labelupdate_pertandingan').css('display', 'none');
    $('#old1').css('display', 'none');
    $('#old2').css('display', 'none');
    $("form")[0].reset();
}

function detail(id) {
    window.location.href = "<?php echo base_url('Pertandingan/detail/') ?>" + id;
    // $('#detail').modal('show');
    // countdown("ten-countdown", 01, 0);
    // $.ajax({
    //     url: "<?php echo base_url('Pertandingan/get_data_by_id') ?>",
    //     type: "POST",
    //     data: {
    //         id: id
    //     },
    //     dataType: "JSON",
    //     success: function(data) {
    //         $('#id_pertandingan').val(data.id);
    //         var tgl = data.tgl;
    //         //date format

    //         $('#detail_tgl').html(tgl);
    //         $('#detail_nama1').html(data.nama_club1);
    //         $('#detail_nama2').html(data.nama_club2);
    //         $('#detail_waktu').html(data.waktu + " Menit");
    //         $('#score1').val(data.score_club1);
    //         $('#score2').val(data.score_club2);
    //     },
    //     error: function(jqXHR, textStatus, errorThrown) {
    //         alert('Error get data from ajax');
    //     }
    // });
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

            $.ajax({
                url: '<?= base_url('Pertandingan/delete') ?>',
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
                    list_pertandingan()
                }
            })
        }
    })
}

function updatemodal(id) {
    $('#add_pertandingan').modal('show');
    $('#labeladd_pertandingan').css('display', 'none');
    $('#labelupdate_pertandingan').css('display', 'block');
    // $('#pw').hide();
    $('#icon1').val('');
    $('#icon2').val('');

    $.ajax({
        url: "<?php echo base_url('Pertandingan/get_data_by_id') ?>",
        type: "POST",
        data: {
            id: id
        },
        dataType: "JSON",
        success: function(data) {
            $('#id_pertandingan').val(data.id);
            var tgl = data.tgl;
            //date format

            $('#tgl').val(tgl);
            $('#jam').val(data.jam);
            $('#nama1').val(data.nama_club1);
            $('#nama2').val(data.nama_club2);
            $('#time').val(data.waktu);

            $('#old1').css('display', 'block');
            $('#old2').css('display', 'block');
            $('#old1').html('<img src="<?php echo base_url() ?>assets/uploads/club/' + data.icon_club1 +
                '" width="50" height="50">');
            $('#old2').html('<img src="<?php echo base_url() ?>assets/uploads/club/' + data.icon_club2 +
                '" width="50" height="50">');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}



function save_pertandingan() {
    var id = $('#id_pertandingan').val();
    var tgl = $('#tgl').val();
    var jam = $('#jam').val();
    var nama1 = $('#nama1').val();
    var icon1 = $('#icon1').prop('files')[0];
    var nama2 = $('#nama2').val();
    var icon2 = $('#icon2').prop('files')[0];
    var time = $('#time').val();
    if ($('#trend').is(":checked")) {
        var trend = 1;
    } else {
        var trend = 0;
    }

    if (!tgl) {
        $('#tgl').css({
            "background": "#FFCECE"
        })
        new PNotify({
            title: 'Oh No!',
            text: 'Tanggal Harus diisi',
            type: 'error',
            styling: 'bootstrap3'
        })

    } else if (!jam) {
        $('#jam').css({
            "background": "#FFCECE"
        })
        new PNotify({
            title: 'Oh No!',
            text: 'Jam Harus diisi',
            type: 'error',
            styling: 'bootstrap3'
        })
    } else if (!nama1) {
        $('#nama1').css({
            "background": "#FFCECE"
        })
        new PNotify({
            title: 'Oh No!',
            text: 'Nama Club 1 Harus diisi',
            type: 'error',
            styling: 'bootstrap3'
        })
    } else if (!nama2) {
        $('#nama2').css({
            "background": "#FFCECE"
        })
        new PNotify({
            title: 'Oh No!',
            text: 'Nama Club 2 Harus diisi',
            type: 'error',
            styling: 'bootstrap3'
        })
    } else if (!time) {
        $('#time').css({
            "background": "#FFCECE"
        })
        new PNotify({
            title: 'Oh No!',
            text: 'Waktu Harus diisi',
            type: 'error',
            styling: 'bootstrap3'
        })
    } else {
        $('#tgl,#jam,#nama1,#nama2,#icon1,#time').css({
            "background": "#ffffff"
        })

        var form_data = new FormData();
        form_data.append('id', id);
        form_data.append('tgl', tgl);
        form_data.append('jam', jam);
        form_data.append('nama1', nama1);
        form_data.append('nama2', nama2);
        form_data.append('icon1', icon1);
        form_data.append('icon2', icon2);
        form_data.append('time', time);
        form_data.append('trend', trend);


        if (!id) {
            if (!icon1) {
                $('#icon1').css({
                    "background": "#FFCECE"
                })
                new PNotify({
                    title: 'Oh No!',
                    text: 'Icon Club 1 Harus diisi',
                    type: 'error',
                    styling: 'bootstrap3'
                })
            } else if (!icon2) {
                $('#icon2').css({
                    "background": "#FFCECE"
                })
                new PNotify({
                    title: 'Oh No!',
                    text: 'Icon Club 2 Harus diisi',
                    type: 'error',
                    styling: 'bootstrap3'
                })
            } else {

                //save user
                $.ajax({
                    url: '<?php echo base_url('Pertandingan/save') ?>',
                    type: 'POST',
                    dataType: 'json',
                    cache: false,
                    processData: false,
                    contentType: false,
                    data: form_data,
                    success: function(data) {
                        if (data = true) {
                            $('#add_pertandingan').modal('hide');
                            new PNotify({
                                title: 'Success!',
                                text: 'Data berhasil disimpan',
                                type: 'success',
                                styling: 'bootstrap3'
                            })
                            list_pertandingan()
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
        } else {
            //update user
            $.ajax({
                url: '<?php echo base_url('Pertandingan/update_pertandingan') ?>',
                type: 'POST',
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                data: form_data,
                success: function(data) {
                    if (data = true) {
                        $('#add_pertandingan').modal('hide');
                        new PNotify({
                            title: 'Success!',
                            text: 'Data berhasil diupdate',
                            type: 'success',
                            styling: 'bootstrap3'
                        })
                        list_pertandingan()
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

function list_pertandingan() {
    $('#data-pertandingan').DataTable().destroy();
    var dt = $('#data-pertandingan').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],

        "ajax": {
            "url": "<?php echo site_url('Pertandingan/data') ?>",
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
        $('#data-pertandingan').DataTable().ajax.reload();
        clearInterval(rel);
    }, 100);
}

$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})


$(function() {
    $('#tgl').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false,
        ignoreReadonly: true,
        allowInputToggle: true,
        showClear: true,
        showClose: true,
        showTodayButton: true,
        showClose: true,
        keepOpen: false,
        toolbarPlacement: 'top',
        debug: false,
        widgetPositioning: {
            horizontal: 'left',
            vertical: 'bottom'
        }
    });
    $('#jam').datetimepicker({
        format: 'HH:mm',
        useCurrent: false,
        ignoreReadonly: true,
        allowInputToggle: true,
        showClear: true,
        showClose: true,
        showTodayButton: true,
        showClose: true,
        keepOpen: false,
        toolbarPlacement: 'top',
        debug: false,
        widgetPositioning: {
            horizontal: 'left',
            vertical: 'bottom'
        }
    });
});

$(document).ready(function() {
    list_pertandingan();

});
</script>