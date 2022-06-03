<script type="text/javascript">
$(document).ready(function() {
    getDATA()
    CKEDITOR.replace('isi');
});

function getDATA() {
    $.ajax({
        url: "<?php echo base_url('Sejarah/get_data') ?>",
        type: "POST",
        data: {},
        dataType: "JSON",
        success: function(data) {
            $('#judul').val(data.judul);
            CKEDITOR.instances.isi.setData(data.isi)
            $('#id').val(data.id);
            $('#old').html('<img src="<?php echo base_url() ?>assets/uploads/sejarah/' + data.foto +
                '" width="50" height="50">');

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function save() {
    var form_data = new FormData();
    form_data.append('judul', $('#judul').val());
    form_data.append('isi', CKEDITOR.instances.isi.getData());
    form_data.append('id', $('#id').val());
    form_data.append('foto', $('#foto').prop('files')[0]);


    $.ajax({
        url: '<?php echo base_url('Sejarah/update_sejarah') ?>',
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

                setTimeout(function() {
                    window.location.href = "<?php echo base_url('Sejarah') ?>";
                }, 1000);
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