<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light" data-toggle="modal" data-target="#add">Tambah</button><br>
                    <!-- <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light" data-toggle="modal" data-target="#qrcode">reload</button><br> -->
                    <br>

                    <table id="tabelkaryawan" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NO</th>
                                <th>NIK</th>
                                <th>NAMA</th>
                                <th>DEPT</th>
                                <th>QRCODE</th>
                            </tr>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <!-- modalsimpan -->
    <div class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="scrollableModalTitle" aria-hidden="true" id="add">
        <div class="modal-dialog modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Tambah data karyawan</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nik">NIK*</label>
                        <input type="text" class="form-control" id="nik" aria-describedby="emailHelp" name="nik" placeholder="Masukkan Nik Karyawan" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama*</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Karyawan" name="nama" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="dept">Departement*</label>
                        <input type="text" class="form-control" id="dept" placeholder="Masukkan Departement" name="dept" autocomplete="off" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary waves-effect waves-light" onclick="validasi()">Simpan</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- endmodalsimpan -->

    <!-- //modalupdate -->
    <div class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="scrollableModalTitle" aria-hidden="true" id="edit">
        <div class="modal-dialog modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Update data karyawan</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nikk">NIK*</label>
                        <input type="hidden" name="idkar" id="idkar">
                        <input type="text" class="form-control" id="nikk" aria-describedby="emailHelp" name="nikk" placeholder="Masukkan Nik Karyawan" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="namaa">Nama*</label>
                        <input type="text" class="form-control" id="namaa" placeholder="Masukkan Nama Karyawan" name="namaa" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="deptt">Departement*</label>
                        <input type="text" class="form-control" id="deptt" placeholder="Masukkan Departement" name="deptt" autocomplete="off" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary waves-effect waves-light" onclick="validasi2()">Update</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- endmodalupdate -->
</div>


<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = false;

    var pusher = new Pusher('4b5f48325321d8418421', {
        cluster: 'ap1',
        forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
        reload();
    });


    $(document).ready(function() {
        tampil_data_karyawan();

        $(document).on('click', '#btn_ubah', function() {
            // var id = $(this).data('id');

            $('#idkar').val($(this).data('id'));
            $('#nikk').val($(this).data('nik'));
            $('#namaa').val($(this).data('nama'));
            $('#deptt').val($(this).data('dept'));
            $('#edit').modal('show');
            // console.log(id);
        })
        $(document).on('click', '#btn_hapus', function() {
            // var id = $(this).data('id');
            var id = $(this).data('id');
            console.log(id);

            Swal.fire({
                title: 'Hapus data karyawan',
                text: "Apakah anda yakin?",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya Hapus!'
            }).then((result) => {
                if (result.value) {
                    // var no_po = $('#hidden_no_po').val();
                    deleteKaryawan(id);
                }
            });
            // console.log(id);
        })



    });

    function validasi() {
        var nik = $('#nik').val();

        $.ajax({ //create an ajax request to display.php
            type: "GET",
            url: "<?php echo site_url('Home/check_data') ?>",
            dataType: "JSON", //expect html to be returned   
            data: {
                nik: nik
            },
            success: function(data) {
                var d = $('#nik').val();

                var nama = $('#nama').val();
                var dept = $('#dept').val();
                // console.log(data);
                if (data != null) {
                    $('#nik').css({
                        "background": "#FFCECE"
                    });
                    $('#nik').after('<small id="pesan_error" style="margin-top:0px;color:red;">Nik sudah ada!&nbsp;</small>');
                } else if (!d) {

                    $('#nik').css({
                        "background": "#FFCECE"
                    });
                    $('#nik').after('<small id="pesan_error" style="margin-top:0px;color:red;">Harus diisi!</small>');

                } else if (!nama) {

                    $('#nama').css({
                        "background": "#FFCECE"
                    });
                    $('#nama').after('<small id="pesan_error" style="margin-top:0px;color:red;">Harus diisi!</small>');

                } else if (!dept) {

                    $('#dept').css({
                        "background": "#FFCECE"
                    });
                    $('#dept').after('<small id="pesan_error" style="margin-top:0px;color:red;">Harus diisi!</small>');

                } else if (data == null) {
                    console.log("oke");
                    simpan();
                }
            }

        });


    }

    function validasi2() {
        var nik = $('#nikk').val();
        var nama = $('#namaa').val();
        var dept = $('#deptt').val();

        if (!nik) {

            $('#nikk').css({
                "background": "#FFCECE"
            });
            $('#nikk').after('<small id="pesan_error" style="margin-top:0px;color:red;">Harus diisi!</small>');

        } else if (!nama) {

            $('#namaa').css({
                "background": "#FFCECE"
            });
            $('#namaa').after('<small id="pesan_error" style="margin-top:0px;color:red;">Harus diisi!</small>');

        } else if (!dept) {

            $('#deptt').css({
                "background": "#FFCECE"
            });
            $('#deptt').after('<small id="pesan_error" style="margin-top:0px;color:red;">Harus diisi!</small>');

        } else {
            console.log("oke");
            update();
        }


    }

    function simpan() {

        var nik = $('#nik').val();
        var nama = $('#nama').val();
        var dept = $('#dept').val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Home/save') ?>",
            dataType: "JSON",
            data: {
                nik: nik,
                nama: nama,
                dept: dept
            },
            success: function(data) {
                $('[name="nik"]').val("");
                $('[name="nama"]').val("");
                $('[name="dept"]').val("");
                $('#add').modal('hide');
                $.toast({
                    heading: 'Success',
                    text: 'Berhasil disimpan',
                    position: 'top-right',
                    icon: 'success',
                    showHideTransition: 'plain'
                    // reload: false
                });
                // tampil_data_karyawan();
            }
        });

    }

    function update() {
        var id = $('#idkar').val();
        var nik = $('#nikk').val();
        var nama = $('#namaa').val();
        var dept = $('#deptt').val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Home/update') ?>",
            dataType: "JSON",
            data: {
                id: id,
                nik: nik,
                nama: nama,
                dept: dept
            },
            success: function(data) {
                $('[name="nikk"]').val("");
                $('[name="namaa"]').val("");
                $('[name="deptt"]').val("");
                $('#edit').modal('hide');
                $.toast({
                    heading: 'Success',
                    text: 'Berhasil diupdate',
                    position: 'top-right',
                    icon: 'success',
                    showHideTransition: 'plain'
                    // reload: false
                });
                // tampil_data_karyawan();
            }
        });
    }

    function deleteKaryawan(id) {

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Home/hapus') ?>",
            dataType: "JSON",
            data: {
                id: id,

            },
            success: function(data) {
                $.toast({
                    heading: 'Success',
                    text: 'Berhasil dihapus',
                    position: 'top-right',
                    icon: 'success',
                    showHideTransition: 'plain'

                });
                // tampil_data_karyawan();
            }
        });
    }

    function tampil_data_karyawan() {

        $('#tabelkaryawan').DataTable({

            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?php echo site_url('Home/get_ajax') ?>",
                "type": "POST"
            },
            "columnDefs ": [{
                "targets": [0],
                "orderable": false,
            }, ],

        });

    }

    function reload() {

        $('#tabelkaryawan').DataTable().ajax.reload();
    }
</script>