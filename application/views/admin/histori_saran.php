  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Histori</h3>
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
              <h2>Kotak Histori Saran</small></h2>
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
                      Data Histori Saran
                    </p>
                    <form action="<?= base_url(); ?>admin/histori/handleAllAction/<?= $handleType ?>" method="post">
                        <!--flashedit-->
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
                            <th>Check</th>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Saran</th>
                            <th>Tanggal</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $n = 1;
                          foreach ($hsr as $k) : ?>
                            <tr>
                              <td><input type="checkbox" id="check-all" name="pilih[]" value="<?= $k->SARAN_ID; ?>"> </td>
                              <td><?= $n; ?></td>
                              <td><?= $k->NIM; ?></td>
                              <td><?= $k->SARAN; ?></td>
                              <td><?= $k->DATE; ?>/td>
                            </tr>
                          <?php $n++;
                          endforeach ?>
                        </tbody>
                      </table>
                      <button type="submit" name="request" value="delete" class="btn btn-round btn-warning" style="margin-left: 15px">Hapus</button>
                      <button type="submit" name="request" value="print" class="btn btn-round btn-success">Print</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>