 <div class="">
     <div class="page-title">
         <div class="title_left">
             <h3>Pertandingan </h3>
         </div>
         <!-- <div class="title_right">
             <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                 <div class="input-group">
                     <input type="text" class="form-control" placeholder="Search for...">
                     <span class="input-group-btn">
                         <button class="btn btn-secondary" type="button">Go!</button>
                     </span>
                 </div>
             </div>
         </div> -->
     </div>
     <div class="clearfix"></div>
     <div class="row">

         <div class="col-md-12 col-sm-12 ">
             <div class="x_panel">
                 <div class="x_title">
                     <h2>Data Pertandingan</h2>
                     <ul class="nav navbar-right panel_toolbox">
                         <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                         </li>
                         <li class="dropdown">
                             <a href="javascript:;" onclick="addData()" role="button" aria-expanded="false"><i
                                     class="fa fa-plus"></i></a>

                         </li>

                     </ul>
                     <div class="clearfix"></div>
                 </div>
                 <div class="x_content">
                     <div class="row">
                         <div class="col-sm-12">
                             <div class="card-box table-responsive">

                                 <table id="data-pertandingan"
                                     class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                     width="100%">
                                     <thead>
                                         <tr>
                                             <th>#</th>
                                             <th>No</th>
                                             <th>Tanggal</th>
                                             <th>Club1</th>
                                             <th>Club2</th>
                                             <th>Time</th>
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

 <!-- modal add data -->
 <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="add_pertandingan" data-backdrop="static"
     aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title" id="labeladd_pertandingan" style="display: block;">Tambah Pertandingan</h4>
                 <h4 class="modal-title" id="labelupdate_pertandingan" style="display: none;">Update Pertandingan</h4>
                 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form action="#" id="form">

                     <div class="item form-group">
                         <label class="col-form-label col-md-3 col-sm-3 label-align" for="tgl">Tanggal<span
                                 class="required">*</span>
                         </label>
                         <div class="col-md-6 col-sm-6 ">
                             <input type="hidden" name="id_pertandingan" id="id_pertandingan">
                             <input type="text" id="tgl" required="required" name="tgl" class="form-control">
                         </div>
                     </div>
                     <div class="item form-group">
                         <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Jam
                             Pertandingan<span class="required">*</span>
                         </label>
                         <div class="col-md-6 col-sm-6 ">
                             <input type="text" id="jam" required="required" name="jam" class="form-control">
                         </div>
                     </div>

                     <div class="item form-group">
                         <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nama Club 1<span
                                 class="required">*</span>
                         </label>
                         <div class="col-md-6 col-sm-6 ">
                             <input type="text" id="nama1" name="nama1" required="required" class="form-control">
                         </div>
                     </div>
                     <div class="item form-group">
                         <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Icon Club 1<span
                                 class="required">*</span></label>
                         <div class="col-md-3 col-sm-3 ">
                             <input id="icon1" class="form-control" type="file" name="icon1">
                         </div>
                         <div class="col-md-3 col-sm-3 " id="old1" style="display: none;">
                             <img src="" width="50" height="50">
                         </div>
                     </div>
                     <div class="item form-group">
                         <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nama Club 2<span
                                 class="required">*</span>
                         </label>
                         <div class="col-md-6 col-sm-6 ">
                             <input type="text" id="nama2" name="nama2" required="required" class="form-control">
                         </div>
                     </div>
                     <div class="item form-group">
                         <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Icon Club 2<span
                                 class="required">*</span></label>
                         <div class="col-md-3 col-sm-3 ">
                             <input id="icon2" class="form-control" type="file" name="icon2">
                         </div>
                         <div class="col-md-3 col-sm-3" id="old2">
                             <img src="" width="50" height="50">
                         </div>
                     </div>

                     <div class="item form-group">
                         <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Waktu (tulis dalam
                             menit)<span class="required">*</span>
                         </label>
                         <div class="col-md-6 col-sm-6 ">
                             <input type="number" id="time" name="time" required="required" class="form-control">
                         </div>
                     </div>
                     <div class="item form-group">
                         <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Tandai Sebagai
                             Trending
                         </label>
                         <div class="col-md-6 col-sm-6 ">
                             <input type="checkbox" name="trend" id="trend">

                         </div>
                     </div>

                 </form>


                 <!-- <div class="ln_solid"></div> -->

             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-success" onclick="save_pertandingan()">Save</button>
             </div>
         </div>
     </div>
 </div>