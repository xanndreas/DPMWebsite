<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Oprec</h3>
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
              <h2>Data Form Oprec</small></h2>
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
                      Data Oprec
                    </p>
                    <form action="<?= base_url(); ?>admin/oprec/handleAllAction" method="post">
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
                            <th>NAMA</th>
                            <th>NIM</th>
                            <th>TTL</th>
                            <th>Jurusan</th>
                            <th>Prodi</th>
                            <th>Alamat asal</th>
                            <th>Alamat kos</th>
                            <th>Motivasi</th>
                            <th>Kelebihan</th>
                            <th>Kekurangan</th>
                            <th>Alasan</th>
                            <th>Prestasi</th>
                            <th>Nama Foto</th>
                            <th>Tanggal</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $a = 1;
                          foreach ($op as $s) : ?>
                            <tr>
                              <td><input type="checkbox" id="check-all" name="pilih[]" value="<?= $s->id_oprec; ?>"> </td>
                              <td><?= $a; ?></td>
                              <td> <?= $s->nama; ?> </td>
                              <td> <?= $s->nim; ?> </td>
                              <td><?= $s->ttl; ?></td>
                              <td><?= $s->jurusan; ?></td>
                              <td><?= $s->prodi; ?></td>
                              <td><?= $s->alamat_asal; ?></td>
                              <td><?= $s->alamat_kos; ?></td>
                              <td><?= $s->motivasi; ?></td>
                              <td><?= $s->kelebihan; ?></td>
                              <td><?= $s->kekurangan; ?></td>
                              <td><?= $s->alasan; ?></td>
                              <td><?= $s->prestasi; ?></td>
                              <td><?= $s->foto; ?></td>
                              <td><?= $s->date; ?></td>
                            </tr>
                          <?php $a++;
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
  
	<script src="<?= base_url() ?>js/sweetalert2.all.min.js "></script>