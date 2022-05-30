<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Detail Pertandingan</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-6 col-sm-12  ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Pertandingan</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left">
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3" id="detail_nama1"></label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="hidden" name="id_pertandingan" id="id_pertandingan">
                                <input type="number" class="form-control" placeholder="Score" id="score1">
                                <span class="fa fa-futbol-o form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3" id="detail_nama2"></label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="number" class="form-control" placeholder="Score" id="score2">
                                <span class="fa fa-futbol-o form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3" id="detail_nama2">Waktu</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control" id="detail_waktu" readonly>
                                <span class="fa fa-clock-o form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-sm-3 col-xs-3">
                                <button type="button" onclick="play()" id="play" class="btn btn-success btn-sm"><i
                                        class="fa fa-play"></i></button>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <div class="pull-left"
                                    style="background: #fff; cursor: pointer; padding: 5px 8px; border: 1px solid #ccc">
                                    <i class="fa fa-clock-o"></i>
                                    <span id="ten-countdown">00:00</span>
                                </div>
                            </div>


                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group row">
                            <div class="col-md-9 offset-md-3">
                                <button type="button" class="btn btn-primary btn-sm" id="btn_batal"
                                    onclick="batal()">Batal</button>
                                <button type="button" class="btn btn-success btn-sm" id="btn_update"
                                    onclick="update_rinci()">Update</button>
                                <button type="button" class="btn btn-success btn-sm" id="btn_simpan"
                                    onclick="simpan()">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Monitoring Penonton</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card-box table-responsive">

                                <table id="penonton" class="table table-striped table-bordered dt-responsive nowrap"
                                    cellspacing="0" width="100%">
                                    <thead>
                                        <tr>

                                            <th>Masuk</th>
                                            <th>Keluar</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    /* display: none; <- Crashes Chrome on hover */
    -webkit-appearance: none;
    margin: 0;
    /* <-- Apparently some margin are still there even though it's hidden */
}

input[type=number] {
    -moz-appearance: textfield;
    /* Firefox */
}
</style>