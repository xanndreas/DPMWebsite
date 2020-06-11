  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Aspirasi</h3>
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
              <h2>Aspirasi</small></h2>
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
                    <form action="<?= base_url(); ?>admin/aspirasi/handleAllAction" method="POST">
                      <!--flashedit-->
                      <?php
                      $data = $this->session->flashdata('success');
                      if ($data != "") { ?>
                        <div id="notifikasi" class="alert alert-success"><strong>Success!</strong> <?= $data; ?></div>
                      <?php } ?>

                      <?php
                      $data2 = $this->session->flashdata('error');
                      if ($data2 != "") { ?>
                        <div id="notifikasi" class="alert alert-danger"><strong> Error! </strong> <?= $data2; ?></div>
                      <?php } ?>
                      <table id="datatable-checkbox" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                          <tr>
                            <th>Check</th>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Kategori</th>
                            <th>Prodi</th>
                            <th>Konten</th>
                            <th>Tanggal</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $n = 1;
                          foreach ($asp as $a) : ?>
                            <tr>
                              <td><input type="checkbox" name="pilih[]" value="<?= $a->ASP_ID; ?>"> </td>
                              <td><?= $n; ?> </td>
                              <td><?= $a->NIM; ?> </td>
                              <td><?= $a->KAT_NAMA; ?> </td>
                              <td><?= $a->PRODI; ?> </td>
                              <td><?= $a->KONTEN; ?> </td>
                              <td><?= $a->DATE; ?> </td>
                            </tr>
                          <?php $n++;
                          endforeach ?>
                        </tbody>
                      </table>
                      <button type="submit" name="request" value="delete" class="btn btn-round btn-warning" style="margin-left: 15px">Hapus</button>
                      <button type="submit" name="request" value="print" class="btn btn-round btn-success">Print</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Cetak Aspirasi</h2>
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
                    
                    <form method="POST" action="<?= base_url(); ?>admin/aspirasi/handleAllAction">
                      <div class="field item form-group">
                        <div class="col-md-6 col-sm-6">
                          <label>Print by Kategori</label>
                          <select id="kategori" name="kategori" class="form-control" required="">
                            <?php foreach($kategori as $as) { ?>
                              <option value="<?= $as->KAT_NAMA ?>"><?= $as->KAT_NAMA ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <button type="submit" name="request" value="printKategori" class="btn btn-round btn-success">Print</button>
                    </form>

                    <form method="POST" action="<?= base_url(); ?>admin/aspirasi/handleAllAction">
                      <div class="field item form-group">
                        <div class="col-md-6 col-sm-6">
                          <label>Print by Prodi</label>
                          <select id="prodi" name="prodi" class="form-control" required="">
                            <?php foreach($prodi as $as) { ?>
                              <option value="<?= $as->PRODI ?>"><?= $as->PRODI ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <button type="submit" name="request" value="printProdi" class="btn btn-round btn-success">Print</button>
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