<script type="text/javascript">
$(document).ready(function() {
    getID();
    $('#btn_batal').hide();
    $('#btn_simpan').hide();
    $('#btn_update').show();


    $('#play').click(function() {
        countdown("ten-countdown", $('#wktu').val(), 0);
    });
});

function penonton(id) {
    // console.log(id, ' adalah id nya');
    $('#penonton').DataTable().destroy();
    var dt = $('#penonton').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],

        "ajax": {
            "url": "<?php echo site_url('Pertandingan/detail_penonton') ?>",
            "type": "POST",
            "data": {
                id: id
            }
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
        $('#penonton').DataTable().ajax.reload();
        clearInterval(rel);
    }, 100);
}


function countdown(elementName, minutes, seconds) {
    var element, endTime, hours, mins, msLeft, time;
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Mohon tidak meninggalkan halaman ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Mulai',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            var status_play = 1;
            update_status(status_play);

            function twoDigits(n)

            {
                return (n <= 9 ? "0" + n : n);
            }

            element = document.getElementById(elementName);
            endTime = (+new Date) + 1000 * (60 * minutes + seconds) + 500;
            updateTimer();


            function updateTimer() {
                msLeft = endTime - (+new Date);

                if (msLeft < 1000) {
                    element.innerHTML = "Time is up!";
                    var status_done = 2;
                    update_status(status_done);
                } else {
                    time = new Date(msLeft);
                    hours = time.getUTCHours();
                    mins = time.getUTCMinutes();
                    element.innerHTML = (hours ? hours + ':' + twoDigits(mins) : mins) + ':' + twoDigits(time
                        .getUTCSeconds());
                    setTimeout(updateTimer, time.getUTCMilliseconds() + 500);
                }
            }
        }
    });
}

function update_status(status_play) {
    $.ajax({
        url: "<?php echo site_url('Pertandingan/update_status') ?>",
        type: "POST",
        data: {
            id: $('#id_pertandingan').val(),
            status: status_play
        },
        success: function(data) {
            if (data = true) {

                console.log("status ON");
            }
        }
    });
}

function getID() {
    var id = '<?php echo $this->uri->segment('3'); ?>';
    penonton(id);
    $.ajax({
        url: "<?php echo base_url('Pertandingan/get_data_by_id') ?>",
        type: "POST",
        data: {
            id: id
        },
        dataType: "JSON",
        success: function(data) {
            $('#id_pertandingan').val(data.id);
            //date format
            $('#score1').attr('disabled', true);
            $('#score2').attr('disabled', true);
            $('#detail_nama1').html(data.nama_club1);
            $('#detail_nama2').html(data.nama_club2);
            $('#detail_waktu').val(data.waktu + " Menit");
            $('#wktu').val(data.waktu);
            $('#score1').val(data.score_club1);
            $('#score2').val(data.score_club2);
            if (data.status == 2) {
                $('#play').hide();
                $('#ten-countdown').html("Time is up!");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function update_rinci() {
    $('#score1').removeAttr('disabled');
    $('#score2').removeAttr('disabled');
    $('#btn_batal').show();
    $('#btn_simpan').show();
    $('#btn_update').hide();
}

function batal() {
    var id = '<?php echo $this->uri->segment('3'); ?>';
    $.ajax({
        url: "<?php echo base_url('Pertandingan/get_data_by_id') ?>",
        type: "POST",
        data: {
            id: id
        },
        dataType: "JSON",
        success: function(data) {
            $('#id_pertandingan').val(data.id);
            //date format
            $('#score1').attr('disabled', true);
            $('#score2').attr('disabled', true);
            $('#detail_nama1').html(data.nama_club1);
            $('#detail_nama2').html(data.nama_club2);
            $('#detail_waktu').val(data.waktu + " Menit");
            $('#score1').val(data.score_club1);
            $('#score2').val(data.score_club2);
            $('#btn_batal').hide();
            $('#btn_simpan').hide();
            $('#btn_update').show();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function simpan() {
    var form_data = new FormData();
    form_data.append('id', $('#id_pertandingan').val());
    form_data.append('score1', $('#score1').val());
    form_data.append('score2', $('#score2').val());
    $.ajax({
        url: '<?php echo base_url('Pertandingan/update_score') ?>',
        type: 'POST',
        dataType: 'json',
        cache: false,
        processData: false,
        contentType: false,
        data: form_data,
        success: function(data) {
            if (data = true) {
                new PNotify({
                    title: 'Success!',
                    text: 'Data berhasil diupdate',
                    type: 'success',
                    styling: 'bootstrap3'
                })
                batal();
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
</script>