<script type="text/javascript">
$(document).ready(function() {
    CKEDITOR.replace('content');
    getDATA()
});


function getDATA() {
    $.ajax({
        url: "<?php echo base_url('About/get_data') ?>",
        type: "POST",
        data: {},
        dataType: "JSON",
        success: function(data) {
            $('#content').val(data.isi);
            $('#id').val(data.id);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}


function save() {
    var form_data = new FormData();
    form_data.append('isi', CKEDITOR.instances.content.getData());
    form_data.append('id', $('#id').val());


    $.ajax({
        url: '<?php echo base_url('About/update_sejarah') ?>',
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
                    window.location.href = "<?php echo base_url('About') ?>";
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