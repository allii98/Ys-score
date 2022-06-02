<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Url Api</h3>
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

        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Url</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <ul class="list-unstyled timeline">
                        <li>
                            <div class="block">
                                <div class="tags">
                                    <a href="#" class="tag">
                                        <span>Key</span>
                                    </a>
                                </div>
                                <div class="block_content">
                                    <h2 class="title">
                                        <b><u><?= $key->key ?></u></b>
                                    </h2>

                                    <p class="excerpt">Untuk mengakses server membutuhkan key
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="block">
                                <div class="tags">
                                    <a href="#" class="tag">
                                        <span>Url Masuk</span>
                                    </a>
                                </div>
                                <div class="block_content">
                                    <h2 class="title">
                                        <b><?= base_url() ?>Data/masuk_keluar?key=<?= $key->key ?>&data=XXXX&type=masuk</b>
                                    </h2>
                                    <p class="excerpt">Url masuk untuk mengakses server
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="block">
                                <div class="tags">
                                    <a href="#" class="tag">
                                        <span>Url Keluar</span>
                                    </a>
                                </div>
                                <div class="block_content">
                                    <h2 class="title">
                                        <b><?= base_url() ?>Data/masuk_keluar?key=<?= $key->key ?>&data=XXXX&type=keluar</b>
                                    </h2>
                                    <p class="excerpt">Url keluar untuk mengakses server
                                    </p>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>