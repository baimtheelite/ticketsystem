<div class="container-fluid">
	<section class="content-header">
		<h1>
			Detail My Ta'lim Tickets
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="row">
					<div class="mx-auto">
						<a id="img-link" target="_blank" href="<?= base_url('uploads/mytalim/' . $data->upload_file1) ?>"><img id="gambar" class="rounded" src="<?= base_url('uploads/mytalim/' . $data->upload_file1) ?>" alt="" max-width="100%" max-height="100%"></a>
					</div>
				</div>
				<div class="row mt-1">
					<div class="col-lg-2 col-md-2 col-sm-2 col-2">
						<img class="img-thumbnail <?= $data->upload_file1 != NULL ? 'thumb' : '' ?>" src="<?= base_url($data->upload_file1 != NULL ? 'uploads/mytalim/' . $data->upload_file1 : 'assets2/img/no-pict.png') ?>" alt="" max-width="100%" max-height="100%" data-toggle="tooltip" data-placement="top" title="File 1">
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2 col-2">
						<img class="img-thumbnail <?= $data->upload_file2 != NULL ? 'thumb' : '' ?>" src="<?= base_url($data->upload_file2 != NULL ? 'uploads/mytalim/' . $data->upload_file2 : 'assets2/img/no-pict.png') ?>" alt="" max-width="100%" max-height="100%" data-toggle="tooltip" data-placement="top" title="File 2">
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2 col-2">
						<img class="img-thumbnail <?= $data->upload_file3 != NULL ? 'thumb' : '' ?>" src="<?= base_url($data->upload_file3 != NULL ? 'uploads/mytalim/' . $data->upload_file3 : 'assets2/img/no-pict.png') ?>" alt="" max-width="100%" max-height="100%" data-toggle="tooltip" data-placement="top" title="File 3">
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2 col-2">
						<img class="img-thumbnail <?= $data->upload_file4 != NULL ? 'thumb' : '' ?>" src="<?= base_url($data->upload_file4 != NULL ? 'uploads/mytalim/' . $data->upload_file4 : 'assets2/img/no-pict.png') ?>" alt="" max-width="100%" max-height="100%" data-toggle="tooltip" data-placement="top" title="File 4">
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2 col-2">
						<img class="img-thumbnail <?= $data->upload_file5 != NULL ? 'thumb' : '' ?>" src="<?= base_url($data->upload_file5 != NULL ? 'uploads/mytalim/' . $data->upload_file5 : 'assets2/img/no-pict.png') ?>" alt="" max-width="100%" max-height="100%" data-toggle="tooltip" data-placement="top" title="File 5">
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2 col-2">
						<img class="img-thumbnail <?= $data->upload_file6 != NULL ? 'thumb' : '' ?>" src="<?= base_url($data->upload_file6 != NULL ? 'uploads/mytalim/' . $data->upload_file6 : 'assets2/img/no-pict.png') ?>" alt="" max-width="100%" max-height="100%" data-toggle="tooltip" data-placement="top" title="File 6">
					</div>
				</div>
				<div class="row mt-1">
					<div class="col-lg-2 col-md-2 col-sm-2 col-2">
						<img class="img-thumbnail <?= $data->upload_file7 != NULL ? 'thumb' : '' ?>" src="<?= base_url($data->upload_file7 != NULL ? 'uploads/mytalim/' . $data->upload_file7 : 'assets2/img/no-pict.png') ?>" alt="" max-width="100%" max-height="100%" data-toggle="tooltip" data-placement="top" title="File 1">
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2 col-2">
						<img class="img-thumbnail <?= $data->upload_file8 != NULL ? 'thumb' : '' ?>" src="<?= base_url($data->upload_file8 != NULL ? 'uploads/mytalim/' . $data->upload_file8 : 'assets2/img/no-pict.png') ?>" alt="" max-width="100%" max-height="100%" data-toggle="tooltip" data-placement="top" title="File 2">
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2 col-2">
						<img class="img-thumbnail <?= $data->upload_file9 != NULL ? 'thumb' : '' ?>" src="<?= base_url($data->upload_file9 != NULL ? 'uploads/mytalim/' . $data->upload_file9 : 'assets2/img/no-pict.png') ?>" alt="" max-width="100%" max-height="100%" data-toggle="tooltip" data-placement="top" title="File 3">
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2 col-2">
						<img class="img-thumbnail <?= $data->upload_file10 != NULL ? 'thumb' : '' ?>" src="<?= base_url($data->upload_file10 != NULL ? 'uploads/mytalim/' . $data->upload_file10 : 'assets2/img/no-pict.png') ?>" alt="" max-width="100%" max-height="100%" data-toggle="tooltip" data-placement="top" title="File 4">
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 p-0">
				<form method="post" action="<?= base_url('ticket_register/edit') ?>" enctype="multipart/form-data">

					<!-- Form Pertanyaan My Ta'lim -->
					<div class="card">
						<div class="card-header text-center">
							<h3 class="card-title">Data Ticket</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body p-0">
							<table class="table">
								<thead>
									<th>Kolom</th>
									<th>Isi</th>
								</thead>
								<tr>
									<td><b>ID Ticket</b></td>
									<td><input type="text" class="form-control" name="id_mytalim" id="id_mytalim" value="<?= $data->id_mytalim ?>" readonly required></td>
								</tr>
								<tr>
									<td><b>Nama Cabang</b></td>
									<td>
										<input type="text" class="form-control" name="nama_cabang" id="nama_cabang" value="<?= $data->nama_cabang ?>" readonly required>
									</td>
								</tr>
								<tr>
									<td><b>Nama Konsumen</b></td>
									<td><input type="text" class="form-control enable" name="nama_konsumen" id="nama_konsumen" value="<?= $data->nama_konsumen ?>" readonly required></td>
								</tr>
								<tr>
									<td><b>Jenis Konsumen</b></td>
									<td>
										<select class="form-control enable" name="jenis_konsumen" id="jenis_konsumen" disabled>
											<option value="Internal" <?= $data->jenis_konsumen == 'Internal' ? 'selected' : ''  ?>>
												Internal</option>
											<option value="Eksternal" <?= $data->jenis_konsumen == 'Eksternal' ? 'selected' : ''  ?>>Eksternal</option>
										</select>
									</td>
								</tr>
								<tr>
									<td><b>Nama Siswa/Mahasiswa</b></td>
									<td><input type="text" class="form-control enable" name="nama_siswa" id="nama_siswa" value="<?= $data->nama_siswa ?>" readonly required></td>
								</tr>
								<tr>
									<td><b>Pendidikan</b></td>
									<td>
										<select class="form-control enable" name="pendidikan" id="pendidikan" disabled>
											<option value="Universitas" <?= $data->pendidikan == 'Universitas' ? 'selected' : ''  ?>>
												Universitas</option>
											<option value="Sekolah" <?= $data->pendidikan == 'Sekolah' ? 'selected' : ''  ?>>Sekolah</option>
											<option value="Kursus" <?= $data->pendidikan == 'Kursus' ? 'selected' : ''  ?>>Kursus</option>
											<option value="Lainnya" <?= $data->pendidikan == 'Lainnya' ? 'selected' : ''  ?>>Lainnya</option>
										</select>
									</td>
								</tr>
								<tr>
									<td><b>Nama Lembaga</b></td>
									<td><input type="text" class="form-control enable" name="nama_lembaga" id="nama_lembaga" value="<?= $data->nama_lembaga ?>" readonly required></td>
								</tr>
								<tr>
									<td><b>Tahun Berdiri</b></td>
									<td><input type="text" class="form-control enable" name="tahun_berdiri" id="tahun_berdiri" value="<?= $data->tahun_berdiri ?>" readonly required></td>
								</tr>
								<tr>
									<td><b>Akreditasi</b></td>
									<td><input type="text" class="form-control enable" name="akreditasi" id="akreditasi" value="<?= $data->akreditasi ?>" readonly required></td>
								</tr>
								<tr>
									<td><b>Tahun Periode</b></td>
									<td><input type="text" class="form-control enable" name="periode" id="periode" value="<?= $data->periode ?>" readonly required></td>
								</tr>
								<tr>
									<td><b>Tujuan Pembiayaan</b></td>
									<td><input type="text" class="form-control enable" name="tujuan_pembiayaan" id="tujuan_pembiayaan" value="<?= $data->tujuan_pembiayaan ?>" readonly required></td>
								</tr>
								<tr>
									<td><b>Nilai Pembiayaan</b></td>
									<td><input type="number" class="form-control enable" name="nilai_pembiayaan" id="nilai_pembiayaan" value="<?= $data->nilai_pembiayaan ?>" readonly required></td>
								</tr>
								<tr>
									<td><b>Informasi Tambahan</b></td>
									<td>
										<textarea cols="40" rows="5" class="form-control enable" name="informasi_tambahan" id="informasi_tambahan" readonly> <?= $data->informasi_tambahan ?></textarea>
									</td>
								</tr>
								<tr>
									<td><b>Status:</b></td>
									<td>
										<?php
										if ($data->id_approval == 0) {
											echo '<label class="badge badge-warning">Belum Direview</label>';
										}
										if ($data->id_approval == 1) {
											echo '<label class="badge badge-danger">Ditolak</label>';
										}
										if ($data->id_approval == 2) {
											echo '<label class="badge badge-success">Disetujui Admin 1</label>';
										}
										if ($data->id_approval == 3) {
											echo '<label class="badge badge-primary">Selesai</label>';
										}
										?>
									</td>
								</tr>
								<!-- Tombol ini muncul khusus untuk user -->
								<?php if ($this->session->userdata('level') == 1 && ($data->id_approval == 0 || $data->id_approval == 1)) { ?>
									<tr>
										<td>
											<button type="button" id="ubah" class="btn btn-secondary">Ubah Data</button>
										</td>
										<td></td>
									</tr>
								<?php } ?>

								<!-- Tombol Aksi ini akan muncul untuk Admin 1 -->
								<?php if ($this->session->userdata('level') == 2 && $data->id_approval == 0) { ?>
									<tr>
										<td><b>Aksi:</b></td>
										<td>
											<a class="btn btn-primary" href="<?= base_url('Admin1/approve/mytalim/id/' . $data->id_mytalim) ?>">Approve</a>
											<a class="btn btn-danger" href="<?= base_url('Admin1/reject/mytalim/id/' . $data->id_mytalim) ?>">Reject</a>
										</td>
									</tr>
								<?php } ?>
								<?php if ($this->session->userdata('level') == 3 && $data->id_approval == 2) { ?>
									<tr>
										<td><b>Aksi:</b></td>
										<td>
											<a class="btn btn-primary" href="<?= base_url('Admin2/complete/mytalim/id/' . $data->id_mytalim) ?>">Approve</a>
											<a class="btn btn-danger" href="<?= base_url('Admin2/reject/mytalim/id/' . $data->id_mytalim) ?>">Reject</a>
										</td>
									</tr>
								<?php } ?>
							</table>
						</div>
					</div>
					<!-- Form Upload Lampiran -->
					<div id="upload" class="card card-primary mt-4">
						<div class="card-header with-border">
							<h3 class="card-title">Upload File</h3>
						</div>
						<div class="card-body" id="dynamic-field">
							<div class="form-group">
								<label for="upload_file1">Upload Berkas 1</label>
								<input name="upload_file1" id="upload_file1" type="file" class="form-control enable col-10" disabled>
							</div>
							<div class="form-group">
								<label for="upload_file2">Upload Berkas 2</label>
								<input name="upload_file2" id="upload_file2" type="file" class="form-control enable col-10" disabled>
							</div>
							<div class="form-group">
								<label for="upload_file3">Upload Berkas 3</label>
								<input name="upload_file3" id="upload_file3" type="file" class="form-control enable col-10" disabled>
							</div>
							<div class="form-group">
								<label for="upload_file4">Upload Berkas 4</label>
								<input name="upload_file4" id="upload_file4" type="file" class="form-control enable col-10" disabled>
							</div>
							<div class="form-group">
								<label for="upload_file5">Upload Berkas 5</label>
								<input name="upload_file5" id="upload_file5" type="file" class="form-control enable col-10" disabled>
							</div>
							<div class="form-group">
								<label for="upload_file6">Upload Berkas 6</label>
								<input name="upload_file6" id="upload_file6" type="file" class="form-control enable col-10" disabled>
							</div>
							<div class="form-group">
								<label for="upload_file7">Upload Berkas 7</label>
								<input name="upload_file7" id="upload_file7" type="file" class="form-control enable col-10" disabled>
							</div>
							<div class="form-group">
								<label for="upload_file8">Upload Berkas 8</label>
								<input name="upload_file8" id="upload_file8" type="file" class="form-control enable col-10" disabled>
							</div>
							<div class="form-group">
								<label for="upload_file9">Upload Berkas 9</label>
								<input name="upload_file9" id="upload_file9" type="file" class="form-control enable col-10" disabled>
							</div>
							<div class="form-group">
								<label for="upload_file10">Upload Berkas 10</label>
								<input name="upload_file10" id="upload_file10" type="file" class="form-control enable col-10" disabled>
							</div>
						</div>
						<?php if ($this->session->userdata('level') == 1 && ($data->id_approval == 0 || $data->id_approval == 1)) { ?>
							<div class="card-footer text-center">
								<!-- Tombol ini muncul khusus untuk user -->
								<!-- <button type="button" id="ubah" class="btn btn-secondary">Ubah Data</button> -->
								<button onclick="return confirm('Harap periksa kembali\n,Apakah Anda yakin data yang diisi sudah benar?');" type="submit" id="edit_mytalim" class="btn btn-primary enable" name="edit_mytalim" disabled>Kirim Data!</button>
							</div>
						<?php } ?>
					</div>
				</form>
			</div>
		</div>

		<!-- Post Komentar -->
		<div class="row mt-4">
			<div class="col-lg-12 col-md-12">
				<form method="post" action="<?= base_url('comment/post_comment/id_mytalim') ?>">
					<div class="card">
						<div class="card-header with-border">
							<b>Post Komentar</b>
						</div>
						<div class="card-body">
							<div class="form-group">
								<textarea class="form-control" name="post_comment" id="post_comment" cols="10" rows="2" placeholder="Masukkan Komentar Anda" required></textarea>
								<input type="hidden" name="id_komentar" value="<?= $data->id_mytalim ?>">
								<input type="hidden" name="id_user" value="<?= $this->fungsi->user_login()->id_user ?>">
								<input type="hidden" name="redirect" value="<?= $this->uri->uri_string() ?>">
							</div>
						</div>
						<div class="card-footer">
							<button type="submit" class="btn btn-primary pull-right" name="submit_komentar">Kirim</button>
						</div>
					</div>
				</form>
			</div>
		</div>

		<!-- Menampilkan Komentar -->
		<?php foreach ($komentar as $komen) { ?>
			<div class="row mt-4">
				<div class="col-lg-12 col-md-12">

					<div class="card card-widget">
						<div class="card-header with-border">
							<div class="user-block"><b><span class="username"><?= $komen->name ?> (<?= $komen->nama_cabang ?>)</span></b><br>
								<span class="description">Diposting: <?= $komen->date ?></span>
							</div>
						</div>
						<div class="card-body">
							<p><?= $komen->comment ?></p>
						</div>

						<!-- Reply card Comment -->
						<div class="card-footer card-comments">
							<?php
							$this->db->select('*, DATE_FORMAT(date, "%d %M %Y %H:%i:%s") AS date');
							$this->db->from('tb_comment, user, tb_cabang');
							$this->db->where('parent_comment_id = ' . $komen->id . ' AND
                              user.id_user = tb_comment.id_user AND
                              user.id_cabang = tb_cabang.id_cabang');
							$reply = $this->db->get();
							?>
							<?php foreach ($reply->result() as $balasan) { ?>
								<div class="card-comment">
									<div class="comment-text">
										<span class="username">
											<b><?= $balasan->name ?> (<?= $balasan->nama_cabang ?>)</b><br>
											<p class="text-muted pull-right"><?= $balasan->date ?></p>
										</span>
										<?= $balasan->comment ?>
									</div>
								</div>
							<?php } ?>
						</div>
						<div class="card-footer">
							<form action="<?= base_url('comment/post_reply/id_mytalim'); ?>" method="post">
								<div class="img-push">
									<input name="parent_comment" type="hidden" value="<?= $komen->id ?>">
									<input type="hidden" name="id_user" value="<?= $this->fungsi->user_login()->id_user ?>">
									<input name="id_komentar" type="hidden" value="<?= $data->id_mytalim ?>">
									<input type="hidden" name="redirect" value="<?= $this->uri->uri_string() ?>">
									<input name="post_reply" type="text" class="form-control input-sm" placeholder="Press enter to post comment">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

	</section>
</div>