<div class="container-fluid">
	<section class="content-header mt-4 text-center">
		<h1>
			Detail My Ihram Tickets
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<form method="post" action="<?= base_url('ticket_register/edit') ?>" enctype="multipart/form-data">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<!-- Form Pertanyaan My Ihram -->
					<div class="card">
						<div class="card-header text-center">
							<h3 class="card-title">Data Ticket</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body no-padding">
							<table class="table">
								<thead>
									<th>Kolom</th>
									<th>Isi</th>
								</thead>
								<tr>
									<td><b>ID My Ihram</b></td>
									<td><input type="text" class="form-control" name="id_myihram" id="id_myihram" value="<?= $data->id_myihram ?>" readonly required></td>
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
									<td><b>Nama Travel</b></td>
									<td><input type="text" class="form-control enable" name="nama_travel" id="nama_travel" value="<?= $data->nama_travel ?>" readonly required></td>
								</tr>
								<tr>
									<td><b>Status:</b></td>
									<td>
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
											echo '<label class="badge badge-primary">Selesai</label>';
										}
										?>
									</td>
								</tr>
								<!-- Tombol ini muncul khusus untuk user -->
								<?php if (($this->session->userdata('level') == 1) && ($data->id_approval == 0 || $data->id_approval == 1)) { ?>
									<tr>
										<td>
											<button type="button" id="ubah" class="btn btn-secondary">Ubah Data</button>
										</td>
										<td></td>
									</tr>
								<?php } ?>
								<!-- Tombol ini muncul khusus untuk SUPERUSER -->
								<?php if ($this->session->userdata('level') == 5) { ?>
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
											<a class="btn btn-primary" href="<?= base_url('Admin1/approve/myihram/id/' . $data->id_myihram) ?>">Approve</a>
											<a class="btn btn-danger" href="<?= base_url('Admin1/reject/myihram/id/' . $data->id_myihram) ?>">Reject</a>
										</td>
									</tr>
								<?php } ?>
								<?php if ($this->session->userdata('level') == 3 && $data->id_approval == 2) { ?>
									<tr>
										<td><b>Aksi:</b></td>
										<td>
											<a class="btn btn-primary" href="<?= base_url('Admin2/complete/myihram/id/' . $data->id_myihram) ?>">Approve</a>
											<a class="btn btn-danger" href="<?= base_url('Admin2/reject/myihram/id/' . $data->id_myihram) ?>">Reject</a>
										</td>
									</tr>
								<?php } ?>
								<!-- Tombol Aksi ini akan muncul untuk Admin Superuser -->
								<?php if ($this->session->userdata('level') == 5) { ?>
									<tr>
										<td><b>Aksi:</b></td>
										<td>
											<a class="btn btn-info mt-1" href="<?= base_url('Superuser/complete/myihram/id/' . $data->id_myihram) ?>">Complete</a>
											<a class="btn btn-danger mt-1" href="<?= base_url('Superuser/reject/myihram/id/' . $data->id_myihram) ?>">Reject</a>
										</td>
									</tr>
								<?php } ?>
							</table>
						</div>
					</div>
				</div>
				<!-- Bagian Munculin lampiran -->
				<div class="col-lg-6 col-md-12 mt-2">
					<!-- Form Upload Lampiran -->
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
										<td><?php if ($data->upload_file1 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myihram/' . $data->upload_file1) ?>"><?= $data->upload_file1 ?></a></td><?php } ?>
										<td><input name="upload_file1" id="upload_file1" type="file" class="form-control enable col-12" disabled></td>
									</tr>
									<tr>
										<td><?php if ($data->upload_file2 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myihram/' . $data->upload_file2) ?>"><?= $data->upload_file2 ?></a></td><?php } ?>
										<td><input name="upload_file2" id="upload_file2" type="file" class="form-control enable col-12" disabled></td>
									</tr>
									<tr>
										<td><?php if ($data->upload_file3 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myihram/' . $data->upload_file3) ?>"><?= $data->upload_file3 ?></a></td><?php } ?>
										<td><input name="upload_file3" id="upload_file3" type="file" class="form-control enable col-12" disabled></td>
									</tr>
									<tr>
										<td><?php if ($data->upload_file4 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myihram/' . $data->upload_file4) ?>"><?= $data->upload_file4 ?></a></td><?php } ?>
										<td><input name="upload_file4" id="upload_file4" type="file" class="form-control enable col-12" disabled></td>
									</tr>
									<tr>
										<td><?php if ($data->upload_file5 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myihram/' . $data->upload_file5) ?>"><?= $data->upload_file5 ?></a></td><?php } ?>
										<td><input name="upload_file5" id="upload_file5" type="file" class="form-control enable col-12" disabled></td>
									</tr>
									<tr>
										<td><?php if ($data->upload_file6 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myihram/' . $data->upload_file6) ?>"><?= $data->upload_file6 ?></a></td><?php } ?>
										<td><input name="upload_file6" id="upload_file6" type="file" class="form-control enable col-12" disabled></td>
									</tr>
									<tr>
										<td><?php if ($data->upload_file7 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myihram/' . $data->upload_file7) ?>"><?= $data->upload_file7 ?></a></td><?php } ?>
										<td><input name="upload_file7" id="upload_file7" type="file" class="form-control enable col-12" disabled></td>
									</tr>
									<tr>
										<td><?php if ($data->upload_file8 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myihram/' . $data->upload_file8) ?>"><?= $data->upload_file8 ?></a></td><?php } ?>
										<td><input name="upload_file8" id="upload_file8" type="file" class="form-control enable col-12" disabled></td>
									</tr>
									<tr>
										<td><?php if ($data->upload_file9 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myihram/' . $data->upload_file9) ?>"><?= $data->upload_file9 ?></a></td><?php } ?>
										<td><input name="upload_file9" id="upload_file9" type="file" class="form-control enable col-12" disabled></td>
									</tr>
									<tr>
										<td><?php if ($data->upload_file10 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myihram/' . $data->upload_file10) ?>"><?= $data->upload_file10 ?></a></td><?php } ?>
										<td><input name="upload_file10" id="upload_file10" type="file" class="form-control enable col-12" disabled></td>
									</tr>
								</tbody>
							</table>
						</div>
						<?php if (($this->session->userdata('level') == 1) && ($data->id_approval == 0 || $data->id_approval == 1)) { ?>
							<div class="card-footer text-center">
								<!-- Tombol ini muncul khusus untuk user -->
								<!-- <button type="button" id="ubah" class="btn btn-secondary">Ubah Data</button> -->
								<button type="submit" id="edit_myihram" class="btn btn-primary enable" name="edit_myihram" disabled>Kirim Data!</button>
							</div>
						<?php } ?>
						<?php if ($this->session->userdata('level') == 5) { ?>
							<div class="card-footer text-center">
								<!-- Tombol ini muncul khusus untuk user -->
								<!-- <button type="button" id="ubah" class="btn btn-secondary">Ubah Data</button> -->
								<button type="submit" id="edit_myihram_superuser" class="btn btn-primary enable" name="edit_myihram_superuser" disabled>Kirim Data!</button>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</form>

		<!-- Post Komentar -->
		<div class="row mt-4">
			<div class="col-lg-12 col-md-12">
				<form method="post" action="<?= base_url('comment/post_comment/id_myihram') ?>">
					<div class="card">
						<div class="card-header with-border">
							<b>Post Komentar</b>
						</div>
						<div class="card-body">
							<div class="form-group">
								<textarea class="form-control" name="post_comment" id="post_comment" cols="10" rows="2" placeholder="Masukkan Komentar Anda" required></textarea>
								<input type="hidden" name="id_komentar" value="<?= $data->id_myihram ?>">
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
							<div class="user-block"> <b><span class="username"><?= $komen->name ?> (<?= $komen->nama_cabang ?>)</span></b><br>
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
								<hr>
							<?php } ?>
						</div>
						<div class="card-footer">
							<form action="<?= base_url('comment/post_reply/id_myihram'); ?>" method="post">
								<div class="img-push">
									<input name="parent_comment" type="hidden" value="<?= $komen->id ?>">
									<input type="hidden" name="id_user" value="<?= $this->fungsi->user_login()->id_user ?>">
									<input name="id_komentar" type="hidden" value="<?= $data->id_myihram ?>">
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