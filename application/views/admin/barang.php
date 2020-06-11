  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Peminjaman</h3>
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
              <h2>Form Tambah Barang</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <form class="" action="<?= base_url(); ?>admin/Peminjaman/ins_barangP" method="post" novalidate>
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

                <div class="field item form-group">
                  <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Barang<span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6">
                    <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="namabarang" required="required" />
                  </div>
                </div>
                <div class="field item form-group">
                  <label class="col-form-label col-md-3 col-sm-3  label-align">Jumlah Barang<span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6">
                    <input type="number" value="0" class="form-control" data-validate-length-range="6" data-validate-words="2" name="jumlah" required="required" />
                  </div>
                </div>
                <div class="ln_solid">
                  <div class="form-group">
                    <div class="col-md-6 offset-md-3">
                      <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                      <button type='reset' class="btn btn-success">Reset</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>


      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>List Barang</small></h2>
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
                      Data Barang
                    </p>
                    <form action="<?= base_url(); ?>Peminjaman/del_barangP" method="POST">
                      <table id="datatable-checkbox" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                          <tr>
                            <th>Check</th>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Action</th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php $n = 1;
                          foreach ($brg as $g) : ?>
                            <tr>
                              <td><input type="checkbox" id="check-all" name="pilih[]" value="<?= $g->ALAT_ID; ?>"> </td>
                              <td><?= $n; ?></td>
                              <td> <?= $g->ALAT_NAMA; ?></td>
                              <td><?= $g->JUMLAH_ALAT; ?></td>
                              <td><button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editBarang">
                                  Edit
                              </button>
                              </td>

                            </tr>
                          <?php $n++;
                          endforeach ?>
                        </tbody>
                      </table>
                      <button type="submit" class="btn btn-round btn-warning" style="margin-left: 15px">Hapus</button>
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
  <div class="modal fade" id="editBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <!-- modaledit -->
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url(); ?>admin/Peminjaman/handleAllAction" method="post">
                <div class="modal-body">
                <input type="hidden" class="form-control" name="id" id="id" value="<?= $g->ALAT_ID; ?>" >
                    <div class="form-group">
                        <label for="namabarang">Nama Barang</label>
                        <input type="text" class="form-control" name="namabarang" id="namabarang" value="<?= $g->ALAT_NAMA; ?>">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" id="jumlah" value="<?= $g->JUMLAH_ALAT; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="edit" value="barangedit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>