<div class="container-fluid mt-4 mb-4">
	<section class="content-header text-center mb-4">
		<h4>
			Detail Mitra Kerjasama
		</h4>
		<p><?= date('d F, Y') ?></p>
	</section>

	<!-- Main content -->
	<section class="content">
		<form method="post" action="<?= base_url('ticket_register/edit') ?>" enctype="multipart/form-data">
			<div class="row">
				<!-- Form Pertanyaan Mitra Kerjasama -->
				<div class="col-lg-6 col-md-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Data Ticket</h3>
							<div class="row p-0 m-0">
								<div class="col-6 p-0 m-0">
									<a href="#" id="id-ticket">ID Ticket: #<?= $data->id_ticket ?></a>
								</div>
								<div class="col-6 p-0 m-0">
									<div id="status-ticket" class="pull-right">
										<?php
										if ($data->id_approval == 0) {
											echo '<label class="badge badge-secondary">Pending</label>';
										}
										if ($data->id_approval == 1) {
											echo '<label class="badge badge-danger">Ditolak</label>';
										}
										if ($data->id_approval == 2) {
											echo '<label class="badge badge-success">Disetujui Admin 1</label>';
										}
										if ($data->id_approval == 3) {
											echo '<label class="badge badge-info">Selesai</label>';
										}
										?>
									</div>
								</div>
							</div>
							<hr class="hr">
							<div id="hide-detail-ticket" class="row p-0 m-0">
								<div class="col-6 p-0 m-0">
									<?= ($data->tanggal_dibuat != NULL ? '<p>Created on ' . $data->tanggal_dibuat . '</p>' : '') ?>
									<?= ($data->tanggal_diubah != NULL ? '<p>Terakhir diubah ' . $data->tanggal_diubah . '</p>' : '')  ?>
									<?= ($data->tanggal_disetujui != NULL ? '<p>Approved on ' . $data->tanggal_disetujui . '</p>' : '')  ?>
									<?= ($data->tanggal_diselesaikan != NULL ? '<p>Completed on ' . $data->tanggal_diselesaikan . '</p>' : '')  ?>
									<?php if ($data->id_approval == 1) {
										echo ($data->tanggal_ditolak != NULL ? '<p>Rejected on ' . $data->tanggal_ditolak . '</p>' : '');
									} ?>
								</div>
								<div class="col-6 p-0 m-0">

								</div>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body no-padding">
							<!-- ID Ticket -->
							<div class="form-group">
								<label for="">ID Ticket</label>
								<input type="text" class="form-control" name="id_ticket" id="id_ticket" value="<?= $data->id_ticket ?>" readonly required>
								<input type="hidden" class="form-control" name="id_mitra_kerjasama" id="id_mitra_kerjasama" value="<?= $data->id_mitra_kerjasama ?>" readonly required>
							</div>

							<div class="form-group">
								<label for="">Nama Cabang</label>
								<input type="text" class="form-control" name="nama_cabang" id="nama_cabang" value="<?= $data->nama_cabang ?>" readonly required>
							</div>

							<div class="form-group">
								<label for="">Nama Mitra</label>
								<input type="text" class="form-control enable" name="nama_mitra" id="nama_mitra" value="<?= $data->nama_mitra ?>" readonly required>
							</div>

							<div class="form-group">
								<label for="">Jenis Mitra</label>
								<select class="form-control enable" name="jenis_mitra" id="jenis_mitra" disabled>
									<option value="Perorangan" <?= $data->jenis_mitra == 'Perorangan' ? 'selected' : ''  ?>>
										Perorangan</option>
									<option value="Badan Usaha" <?= $data->jenis_mitra == 'Badan Usaha' ? 'selected' : ''  ?>>
										Badan Usaha</option>
								</select>
							</div>

							<!-- Bidang Usaha -->
							<div class="form-group">
								<label for="bidang_usaha">Bidang Usaha</label>
								<input name="bidang_usaha" id="bidang_usaha" type="text" class="form-control enable" placeholder="Bidang Usaha" value="<?= $data->bidang_usaha ?>" readonly required>
							</div>

							<!-- Web / Sosial Media -->
							<div class="form-group">
								<label for="sosial_media">Web / Sosial Media </label>
								<input name="sosial_media" id="sosial_media" type="text" class="form-control enable" placeholder="Web / Sosial Media" value="<?= $data->sosial_media ?>" readonly required>
							</div>

							<div id="status-ticket" class="pull-right">
								<label for="">Status:</label>
								<?php
								if ($data->id_approval == 0) {
									echo '<label class="badge badge-secondary">Pending</label>';
								}
								if ($data->id_approval == 1) {
									echo '<label class="badge badge-danger">Ditolak</label>';
								}
								if ($data->id_approval == 2) {
									echo '<label class="badge badge-success">Disetujui Admin 1</label>';
								}
								if ($data->id_approval == 3) {
									echo '<label class="badge badge-success">Selesai</label>';
								}
								?>
							</div>
							<!-- Tombol ini muncul khusus untuk user -->
							<?php if (($this->session->userdata('level') == 1)  && ($data->id_approval == 0 || $data->id_approval == 1)) { ?>
							<button type="button" id="ubah" class="btn btn-secondary">Ubah Data</button>
							<?php } ?>
							<!-- Tombol ini muncul khusus untuk user -->
							<?php if ($this->session->userdata('level') == 5) { ?>
							<button type="button" id="ubah" class="btn btn-secondary">Ubah Data</button>
							<?php } ?>
						</div>
						<div class="card-footer">
							<!-- Tombol Aksi ini akan muncul untuk Admin 1 -->
							<?php if ($this->session->userdata('level') == 2 && $data->id_approval == 0) { ?>
							<a class="btn btn-info" onclick="return confirm('Apakah Anda yakin MENYETUJUI request support ini?')" href="<?= base_url('Admin1/approve/mitra_kerjasama/id/' . $data->id_mitra_kerjasama) ?>">Approve</a>
							<a class="btn btn-danger" onclick="return confirm('Apakah Anda yakin MENOLAK request support ini?')" href="<?= base_url('Admin1/reject/mitra_kerjasama/id/' . $data->id_mitra_kerjasama) ?>">Reject</a>
							<?php } ?>
							<!-- Tombol Aksi ini akan muncul untuk Admin 2 -->
							<?php if ($this->session->userdata('level') == 3 && $data->id_approval == 2) { ?>
							<a class="btn btn-info" onclick="return confirm('Apakah Anda yakin MENYELESAIKAN request support ini?')" href="<?= base_url('Admin2/complete/mitra_kerjasama/id/' . $data->id_mitra_kerjasama) ?>">Approve</a>
							<a class="btn btn-danger" onclick="return confirm('Apakah Anda yakin MENOLAK request support ini?')" href="<?= base_url('Admin2/reject/mitra_kerjasama/id/' . $data->id_mitra_kerjasama) ?>">Reject</a>
							<?php } ?>
							<!-- Tombol Aksi ini akan muncul untuk Admin Superuser -->
							<?php if ($this->session->userdata('level') == 5) { ?>
							<a class="btn btn-info" href="<?= base_url('Superuser/complete/mitra_kerjasama/id/' . $data->id_mitra_kerjasama) ?>">Complete</a>
							<a class="btn btn-danger" href="<?= base_url('Superuser/reject/mitra_kerjasama/id/' . $data->id_mitra_kerjasama) ?>">Reject</a>
							<?php } ?>
						</div>
					</div>
				</div>
				<!-- Form Upload Lampiran -->
				<div class="col-lg-6 col-md-12 mt-2">
					<div id="upload" class="card">
						<div class="card-header">
							<h3 class="card-title text-center">Lampiran (Attachment)</h3>
						</div>
						<div class="card-body p-0" id="dynamic-field">
							<table class="table text-center" width="100%">
								<thead>
									<th>File Terlampir</th>
									<th>Ubah/tambah file lampiran</th>
								</thead>
								<tbody>
									<tr>
										<td><?php if ($data->upload_file1 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/mitra_kerjasama/' . $data->upload_file1) ?>"><?= $data->upload_file1 ?></a><?php } ?></td>
										<td>
											<div class="form-group">
												<input type="file" name="upload_file1" class="file-upload-default">
												<div class="input-group col-xs-12">
													<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
													<span class="input-group-append">
														<button class="file-upload-browse btn btn-info enable" type="button" disabled>Upload</button>
													</span>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td><?php if ($data->upload_file2 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/mitra_kerjasama/' . $data->upload_file2) ?>"><?= $data->upload_file2 ?></a><?php } ?></td>
										<td>
											<div class="form-group">
												<input type="file" name="upload_file2" class="file-upload-default">
												<div class="input-group col-xs-12">
													<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
													<span class="input-group-append">
														<button class="file-upload-browse btn btn-info enable" type="button" disabled>Upload</button>
													</span>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td><?php if ($data->upload_file3 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/mitra_kerjasama/' . $data->upload_file3) ?>"><?= $data->upload_file3 ?></a><?php } ?></td>
										<td>
											<div class="form-group">
												<input type="file" name="upload_file3" class="file-upload-default">
												<div class="input-group col-xs-12">
													<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
													<span class="input-group-append">
														<button class="file-upload-browse btn btn-info enable" type="button" disabled>Upload</button>
													</span>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td><?php if ($data->upload_file4 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/mitra_kerjasama/' . $data->upload_file4) ?>"><?= $data->upload_file4 ?></a><?php } ?></td>
										<td>
											<div class="form-group">
												<input type="file" name="upload_file4" class="file-upload-default">
												<div class="input-group col-xs-12">
													<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
													<span class="input-group-append">
														<button class="file-upload-browse btn btn-info enable" type="button" disabled>Upload</button>
													</span>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td><?php if ($data->upload_file5 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/mitra_kerjasama/' . $data->upload_file5) ?>"><?= $data->upload_file5 ?></a><?php } ?></td>
										<td>
											<div class="form-group">
												<input type="file" name="upload_file5" class="file-upload-default">
												<div class="input-group col-xs-12">
													<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
													<span class="input-group-append">
														<button class="file-upload-browse btn btn-info enable" type="button" disabled>Upload</button>
													</span>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td><?php if ($data->upload_file6 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/mitra_kerjasama/' . $data->upload_file6) ?>"><?= $data->upload_file6 ?></a><?php } ?></td>
										<td>
											<div class="form-group">
												<input type="file" name="upload_file6" class="file-upload-default">
												<div class="input-group col-xs-12">
													<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
													<span class="input-group-append">
														<button class="file-upload-browse btn btn-info enable" type="button" disabled>Upload</button>
													</span>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td><?php if ($data->upload_file7 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/mitra_kerjasama/' . $data->upload_file7) ?>"><?= $data->upload_file7 ?></a><?php } ?></td>
										<td>
											<div class="form-group">
												<input type="file" name="upload_file7" class="file-upload-default">
												<div class="input-group col-xs-12">
													<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
													<span class="input-group-append">
														<button class="file-upload-browse btn btn-info enable" type="button" disabled>Upload</button>
													</span>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td><?php if ($data->upload_file8 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/mitra_kerjasama/' . $data->upload_file8) ?>"><?= $data->upload_file8 ?></a><?php } ?></td>
										<td>
											<div class="form-group">
												<input type="file" name="upload_file8" class="file-upload-default">
												<div class="input-group col-xs-12">
													<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
													<span class="input-group-append">
														<button class="file-upload-browse btn btn-info enable" type="button" disabled>Upload</button>
													</span>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td><?php if ($data->upload_file9 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/mitra_kerjasama/' . $data->upload_file9) ?>"><?= $data->upload_file9 ?></a><?php } ?></td>
										<td>
											<div class="form-group">
												<input type="file" name="upload_file9" class="file-upload-default">
												<div class="input-group col-xs-12">
													<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
													<span class="input-group-append">
														<button class="file-upload-browse btn btn-info enable" type="button" disabled>Upload</button>
													</span>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td><?php if ($data->upload_file10 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/mitra_kerjasama/' . $data->upload_file10) ?>"><?= $data->upload_file10 ?></a><?php } ?></td>
										<td>
											<div class="form-group">
												<input type="file" name="upload_file10" class="file-upload-default">
												<div class="input-group col-xs-12">
													<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
													<span class="input-group-append">
														<button class="file-upload-browse btn btn-info enable" type="button" disabled>Upload</button>
													</span>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<?php if (($this->session->userdata('level') == 1) && ($data->id_approval == 0 || $data->id_approval == 1)) { ?>
						<div class="card-footer text-center">
							<!-- Tombol ini muncul khusus untuk user -->
							<button type="submit" id="edit_mitra_kerjasama" class="btn btn-primary enable" name="edit_mitra_kerjasama" disabled>Update Data!</button>
						</div>
						<?php } ?>
						<?php if ($this->session->userdata('level') == 5) { ?>
						<div class="card-footer text-center">
							<!-- Tombol ini muncul khusus untuk user -->
							<!-- <button type="button" id="ubah" class="btn btn-secondary">Ubah Data</button> -->
							<button type="submit" id="edit_mitra_kerjasama_superuser" class="btn btn-primary enable" name="edit_mitra_kerjasama_superuser" disabled>Update Data!</button>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</form>

		<?php if ($komentar->num_rows() == 0) { ?>
		<!-- Post Komentar -->
		<div class="row mt-4">
			<div class="col-lg-12 col-md-12">
				<form method="post" action="<?= base_url('comment/post_comment/id_mitra_kerjasama') ?>">
					<div class="card">
						<div class="card-header with-border">
							<label for="">Post Komentar</label>
						</div>
						<div class="card-body">
							<div class="form-group">
								<textarea class="form-control" name="post_comment" id="post_comment" cols="10" rows="2" placeholder="Masukkan Komentar Anda" required></textarea>
								<input type="hidden" name="id_komentar" value="<?= $data->id_mitra_kerjasama ?>">
								<input type="hidden" name="id_user" value="<?= $this->fungsi->user_login()->id_user ?>">
								<input type="hidden" name="id_ticket_komentar" value="<?= $data->id_ticket ?>">
								<input type="hidden" name="redirect" value="<?= $this->uri->uri_string() ?>">
							</div>
						</div>
						<div class="card-footer">
							<button type="submit" class="btn btn-info pull-right" name="submit_komentar">Post Komentar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<?php } ?>
		<!-- Menampilkan Komentar -->
		<?php foreach ($komentar->result() as $komen) { ?>
		<div class="row mt-4">
			<div class="col-lg-12 col-md-12">x`
				<div class="card card-widget">
					<div class="card-header with-border">
						<div class="user-block"> <label for=""><span class="username"><?= $komen->name ?> (<?= $komen->nama_cabang ?>)</span></label><br>
							<span class="description">Diposting: <?= $komen->date ?></span>
						</div>
					</div>
					<div class="card-body">
						<p><?= $komen->comment ?></p>
					</div>

					<!-- Reply card Comment -->
					<div class="card-footer card-comments">
						<?php
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
									<label for=""><?= $balasan->name ?> (<?= $balasan->nama_cabang ?>)</label><br>
									<p class="text-muted pull-right"><?= $balasan->date ?></p>
								</span>
								<?= $balasan->comment ?>
							</div>
						</div>
						<hr>
						<?php } ?>
					</div>
					<div class="card-footer">
						<form action="<?= base_url('comment/post_reply/id_mitra_kerjasama'); ?>" method="post">
							<div class="img-push">
								<input name="parent_comment" type="hidden" value="<?= $komen->id ?>">
								<input type="hidden" name="id_user" value="<?= $this->fungsi->user_login()->id_user ?>">
								<input name="id_ticket_reply" type="hidden" value="<?= $data->id_ticket ?>">
								<input name="id_komentar" type="hidden" value="<?= $data->id_mitra_kerjasama ?>">
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