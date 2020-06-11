<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>List Users</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <p class="text-muted font-13 m-b-30">
                                        NIM Data
                                    </p>
                                    <form action="<?= base_url(); ?>admin/users/handleAllAction" method="post">
                                    <?php 
                                        $data=$this->session->flashdata('success');
                                        if($data!=""){ ?>
                                        <div id="notifikasi" class="alert alert-success"><strong>Success!</strong> <?=$data;?></div>
                                    <?php } ?>
                                    
                                    <?php 
                                        $data2=$this->session->flashdata('error');
                                        if($data2!=""){ ?>
                                        <div id="notifikasi" class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
                                    <?php } ?>
                                        <table id="datatable-checkbox" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Message</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $a = 1;
                                                foreach ($email as $s) : ?>
                                                    <tr>
                                                        <td><?= $a; ?></td>
                                                        <td> <?= $s->NAME; ?> </td>
                                                        <td> <?= $s->EMAIL; ?> </td>
                                                        <td><?= $s->MESSAGE; ?></td>
                                                    </tr>
                                                <?php $a++;
                                                endforeach ?>
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>