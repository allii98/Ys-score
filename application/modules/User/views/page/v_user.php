 <div class="">
     <div class="page-title">
         <div class="title_left">
             <h3>Users </h3>
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
                     <h2>Data Users</h2>
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

                                 <table id="data-user" class="table table-striped table-bordered dt-responsive nowrap"
                                     cellspacing="0" width="100%">
                                     <thead>
                                         <tr>
                                             <th>#</th>
                                             <th>No</th>
                                             <th>Nama</th>
                                             <th>Username</th>
                                             <th>Email</th>
                                             <th>Foto</th>
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
 <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="adduser" data-backdrop="static"
     aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title" id="labeladd" style="display: block;">Add New Users</h4>
                 <h4 class="modal-title" id="labelupdate" style="display: none;">Update Users</h4>
                 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form action="#" id="form">

                     <div class="item form-group">
                         <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama<span
                                 class="required">*</span>
                         </label>
                         <div class="col-md-6 col-sm-6 ">
                             <input type="hidden" name="id" id="id">
                             <input type="text" id="nama" required="required" name="nama" class="form-control">
                         </div>
                     </div>
                     <div class="item form-group">
                         <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Username<span
                                 class="required">*</span>
                         </label>
                         <div class="col-md-6 col-sm-6 ">
                             <input type="text" id="username" name="username" required="required" class="form-control">
                         </div>
                     </div>
                     <div class="item form-group">
                         <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Email<span
                                 class="required">*</span>
                         </label>
                         <div class="col-md-6 col-sm-6 ">
                             <input type="email" id="email" name="email" required="required" class="form-control">
                         </div>
                     </div>
                     <div class="item form-group" id="pw">
                         <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Password<span
                                 class="required">*</span></label>
                         <div class="col-md-6 col-sm-6 ">
                             <input id="password" class="form-control" type="password" name="password">
                         </div>
                     </div>

                     <div class="item form-group">
                         <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Foto</label>
                         <div class="col-md-6 col-sm-6 ">
                             <input id="photo" class="form-control" type="file" name="photo">
                         </div>
                     </div>

                     <div class="item form-group" id="img" style="display: none;">
                         <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align"></label>
                         <div class="col-md-6 col-sm-6 " id="old">
                             <img src="" width="50" height="50">
                         </div>
                     </div>
                 </form>


                 <!-- <div class="ln_solid"></div> -->

             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-success" onclick="save_user()">Save</button>
             </div>
         </div>
     </div>
 </div>
 <!-- end modal add data -->