<div class="box-centering">
	<div class="page-wrapper">
		<div class="page-content">
			<div style="margin-bottom: 30px;">
				<h1>Open Recruitment</h1>
			</div>
			<div>
				<p>Isi form di bawah ini secara lengkap dan jelas. 
				Wajib mensertakan hardcopy untuk foto 3x4, lampiran jika ada ke sekretariat DPM gd.AS</p>
			</div>
			<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash-data') ?>"></div>
			<div class="box-centering">
				<div class="box-input">
					<form action="<?= base_url(); ?>Oprec/oprec" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="Nama-input">Nama</label>
							<input type="text" name="nama" class="form-control form-content" id="nama" value="<?= $ud['nama']; ?>" readonly>
						</div>
						<div class="form-group">
							<label for="nim-input">Nomer Induk Mahasiswa (NIM)</label>
							<input type="text" name="nim" class="form-control form-content" id="nim" maxlength="10" value="<?= $ud['nim']; ?>" readonly>
							
						</div>
						<div class="form-group">
							<label for="ttl">Tempat Tanggal Lahir</label>
							<input type="text" name="ttl" class="form-control form-content" id="ttl" maxlength="50" value="" required>
						</div>
						<div class="form-group">
							<label for="jurusan">Jurusan</label>
							<select name="jurusan" class="form-control form-content" id="jurusan" required>
								<option value="Akuntansi">Jurusan Akuntansi</option>
								<option value="Administrasi Niaga">Jurusan Administrasi Niaga</option>
								<option value="Teknik Sipil">Jurusan Teknik Sipil</option>
								<option value="Teknik Elektro">Jurusan Teknik Elektro</option>
								<option value="Teknik Mesin">Jurusan Teknik Mesin</option>
								<option value="Teknik Kimia">Jurusan Teknik Kimia</option>
								<option value="Teknologi Informasi">Jurusan Teknologi Informasi</option>
							</select>
						</div>
						<div class="form-group">
							<label for="nim-input">Program Studi</label>
							<input type="text" name="prodi" class="form-control form-content" id="prodi" maxlength="50" value="" require>
						</div>
						<div class="form-group">
							<label for="nim-input">Alamat Asal</label>
							<input type="text" name="alamat_asal" class="form-control form-content" id="alamat_asal" maxlength="50" value="" required>
						</div>
						<div class="form-group">
							<label for="nim-input">Alamat Kos (jika kos)</label>
							<input type="text" name="alamat_kos" class="form-control form-content" id="alamat_kos" maxlength="50" value="" required>
						</div>
						<div class="form-group">
							<label for="aspirasi-input">Motivasi mengikuti DPM</label>
							<textarea name="motivasi" class="form-control text-area-input" id="motivasi" required></textarea>
						</div>
						<div class="form-group">
							<label for="aspirasi-input">Kelebihan diri anda</label>
							<textarea name="kelebihan" class="form-control text-area-input" id="kelebihan" required></textarea>
						</div>
						<div class="form-group">
							<label for="aspirasi-input">Kekurangan diri anda</label>
							<textarea name="kekurangan" class="form-control text-area-input" id="kekurangan" required></textarea>
						</div>
						<div class="form-group">
							<label for="aspirasi-input">Alasan mengikuti DPM</label>
							<textarea name="alasan" class="form-control text-area-input" id="alasan" required></textarea>
						</div>
						<div class="form-group">
							<label for="aspirasi-input">Prestasi (lampiran hardcopy jika ada)</label>
							<textarea name="prestasi" class="form-control text-area-input" id="prestasi" required></textarea>
						</div>
						<div class="form-group">
							<label for="aspirasi-input">Foto 3x4 (nama foto disesuaikan, lampiran hardcopy)</label>
							<input type="file" name="foto" data-role="magic-overlay" data-target="" data-edit="insertImage" required>
						</div>
						<div class="box-centering">
							<button type="button" class="btn btn-outline-warning btn-input">Clear</button>
							<button type="submit" name="send" value="aspirasi" class="btn btn-primary btn-input">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="<?= base_url() ?>js/sweetalert2.all.min.js "></script>