    <br>
    <h3 align="center">List Peminjaman Inventaris DPM</h3>
    <br/>
    <div class="table-responsive">
        <table id="data-invent" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>Nama Peminjam</td>
                    <td>Nama Organisasi</td>
                    <td>Tanggal Plot</td>
                    <td>Tanggal Peminjaman</td>
                    <td>Tanggal Pengembalian</td>
                    <td>Keperluan</td>
                    <td>Jaminan</td>
                    <td>Status</td>
                </tr>
            </thead>
            <?php foreach ($plot as $pl) : ?>
                <tr>
                    <td><?=  $pl->NAMA_PEMINJAM ?></td>
                    <td><?=  $pl->NAMA_ORGANISASI ?></td>
                    <td><?=  $pl->TANGGAL_PLOT ?></td>
                    <td><?=  $pl->TANGGAL_PEMINJAMAN ?></td>
                    <td><?=  $pl->TANGGAL_PENGEMBALIAN ?></td>
                    <td><?=  $pl->UNTUK_KEPERLUAN ?></td>
                    <td><?=  $pl->JAMINAN ?></td>
                    <td>
                        <?php if($pl->STATUS == 0) { ?>
                            Belum Dikembalikan
                        <?php } else { ?>
                            Sudah Dikembalikan
                        <?php } ?>

                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
