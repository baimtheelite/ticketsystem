<section class="content-header text-center mt-4">
  <h4>
    Detail My Hajat Franchise Tickets
  </h4>
  <p><?= date('d F, Y'); ?></p>
</section>

<!-- Main content -->
<section class="content">
  <form method="post" action="<?= base_url('ticket_register/edit') ?>" enctype="multipart/form-data">
    <div class="row">
      <!-- Formulir -->
      <div class="col-lg-6">
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
                  if ($data->status == 0) {
                    echo '<label class="badge badge-secondary">Pending</label>';
                  }
                  if ($data->status == 1) {
                    echo '<label class="badge badge-danger">Rejected</label>';
                  }
                  if ($data->status == 2) {
                    echo '<label class="badge badge-success">Reviewed</label>';
                  }
                  if ($data->status == 3) {
                    echo '<label class="badge badge-info">Completed</label>';
                  }
                  if ($data->status == 4) {
                    echo '<label class="badge badge-warning">In Process</label>';
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
                <?php if ($data->status == 1) {
                  echo ($data->tanggal_ditolak != NULL ? '<p>Rejected on ' . $data->tanggal_ditolak . '</p>' : '');
                } ?>
              </div>
              <div class="col-6 p-0 m-0">

              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="id_ticket">ID Ticket</label>
              <input type="text" class="form-control" name="id_ticket" id="id_ticket" value="<?= $data->id_ticket ?>" readonly required>
              <input type="hidden" class="form-control" name="id_franchise" id="id_franchise" value="<?= $data->id_franchise ?>" readonly required>
            </div>
            <!-- ID Vendor -->
            <input type="hidden" class="form-control id_vendor" name="id_vendor_franchise" id="id_vendor_franchise" value="<?= $data->id_vendor ?>" readonly required>
            <div class="form-group">
              <label for="nama_cabang">Nama Cabang</label>
              <input type="text" class="form-control" name="nama_cabang" id="nama_cabang" value="<?= $data->nama_cabang ?>" readonly required>
            </div>
            <div class="form-group">
              <label for="nama_konsumen">Nama Konsumen</label>
              <input type="text" class="form-control enable" name="nama_konsumen" id="nama_konsumen" value="<?= $data->nama_konsumen ?>" readonly required>
            </div>
            <div class="form-group">
              <label for="jenis_konsumen">Jenis Konsumen</label>
              <select class="form-control enable" name="jenis_konsumen" id="jenis_konsumen" disabled>
                <option value="Internal" <?= $data->jenis_konsumen == 'Internal' ? 'selected' : ''  ?>>
                  Internal</option>
                <option value="Eksternal" <?= $data->jenis_konsumen == 'Eksternal' ? 'selected' : ''  ?>>Eksternal</option>
              </select>
            </div>

            <!-- Nama Vendor -->
            <div class="form-group">
              <label for="nama_franchise">Nama Franchise</label><br>
              <div class="input-group">
                <input name="nama_franchise" type="text" class="form-control nama_vendor_myhajat" value="<?= $data->nama_franchise ?>" readonly required>
                <div class="input-group-append">
                  <button type="button" class="btn btn-danger clear-nama-vendor">x</button>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="jumlah_cabang">Jumlah Cabang</label>
              <input type="number" class="form-control enable" name="jumlah_cabang" id="jumlah_cabang" value="<?= $data->jumlah_cabang ?>" readonly required>
            </div>
            <div class="form-group">
              <label for="jenis_franchise">Jenis Franchise</label>
              <select class="form-control enable" name="jenis_franchise" id="jenis_franchise" disabled required>
                <option value="Makanan dan Minuman" <?= $data->jenis_franchise == 'Makanan dan Minuman' ? 'selected' : '' ?>>Makanan dan Minuman</option>
                <option value="Otomotif" <?= $data->jenis_franchise == 'Otomotif' ? 'selected' : '' ?>>Otomotif</option>
                <option value="Pendidikan/pelatihan" <?= $data->jenis_franchise == 'Pendidikan/pelatihan' ? 'selected' : '' ?>>Pendidikan/Pelatihan</option>
                <option value="Hiburan & Hobi" <?= $data->jenis_franchise == 'Hiburan & Hobi' ? 'selected' : '' ?>>Hiburan & Hobi</option>
                <option value="Komputer/Teknologi" <?= $data->jenis_franchise == 'Komputer/Teknologi' ? 'selected' : '' ?>>Komputer/Teknologi</option>
                <option value="Kesehatan & Kecantikan" <?= $data->jenis_franchise == 'Kesehatan & Kecantikan' ? 'selected' : '' ?>>Kesehatan & Kecantikan</option>
                <option value="Retail" <?= $data->jenis_franchise == 'Retail' ? 'selected' : '' ?>>Retail</option>
                <option value="Lainnya" <?= $data->jenis_franchise == 'Lainnya' ? 'selected' : '' ?>>Lainnya</option>
              </select>
            </div>
            <div class="form-group">
              <label for="tahun_berdiri_franchise">Tahun Berdiri Franchise</label>
              <input type="text" class="form-control enable" name="tahun_berdiri_franchise" id="tahun_berdiri_franchise" value="<?= $data->tahun_berdiri_franchise ?>" readonly required>
            </div>
            <div class="form-group">
              <label for="harga_franchise">Harga Franchise</label>
              <input type="number" class="form-control enable" name="harga_franchise" id="harga_franchise" value="<?= $data->harga_franchise ?>" readonly required>
            </div>
            <div class="form-group">
              <label for="jangka_waktu_franchise">Jangka Waktu Franchise</label>
              <select name="jangka_waktu_franchise" id="jangka_waktu_franchise" class="form-control enable" disabled>
                <option value="Selamanya" <?= $data->jangka_waktu_franchise == 'Selamanya' ? 'selected' : ''  ?>>Selamanya</option>
                <option value="Jangka Tertentu" <?= $data->jangka_waktu_franchise == 'Jangka Tertentu' ? 'selected' : ''  ?>>Jangka Tertentu</option>
              </select>
            </div>
            <div class="form-group">
              <label for="akun_sosmed_website">Akun Media Sosial / Website Franchise</label>
              <input type="text" class="form-control enable" name="akun_sosmed_website" id="akun_sosmed_website" value="<?= $data->akun_sosmed_website ?>" readonly required>
            </div>
            <div class="form-group">
              <label for="informasi_tambahan">Informasi Tambahan</label>
              <textarea cols="40" rows="5" class="form-control enable" name="informasi_tambahan" id="informasi_tambahan" readonly> <?= $data->informasi_tambahan ?></textarea>
            </div>
            <!-- Tombol ini muncul khusus untuk user -->
            <?php if (($this->session->userdata('level') == 1 || $this->session->userdata('level') == 6) && ($data->status == 0 || $data->status == 1)) { ?>
              <button type="button" id="ubah" class="btn btn-secondary">Ubah Data</button>
            <?php } ?>
            <?php if ($this->session->userdata('level') == 5) { ?>
              <button type="button" id="ubah" class="btn btn-secondary">Ubah Data</button>
            <?php } ?>
            <div id="status-ticket" class="pull-right">
              <label for="">Status:</label>
              <?php
              if ($data->status == 0) {
                echo '<label class="badge badge-secondary">Pending</label>';
              }
              if ($data->status == 1) {
                echo '<label class="badge badge-danger">Rejected</label>';
              }
              if ($data->status == 2) {
                echo '<label class="badge badge-success">Reviewed</label>';
              }
              if ($data->status == 3) {
                echo '<label class="badge badge-success">Selesai</label>';
              }
              ?>
            </div>
          </div>
          <div class="card-footer">
            <!-- Tombol Aksi ini akan muncul untuk Admin 1 -->
            <?php if ($this->session->userdata('level') == 2 && ($data->status == 0 || $data->status == 4)) { ?>

              <a class="btn btn-info" onclick="return confirm('Apakah Anda yakin menyetujui request support?')" href="<?= base_url('Aksi/approve/' . $data->id_ticket) ?>">Approve</a>
              <a class="btn btn-danger" onclick="return confirm('Apakah Anda yakin MENOLAK request support ini?')" href="<?= base_url('Aksi/reject/' . $data->id_ticket) ?>">Reject</a>
            <?php } ?>
            <?php if ($this->session->userdata('level') == 3 && $data->status == 2) { ?>

              <a class="btn btn-info" onclick="return confirm('Apakah Anda yakin MENYELESAIKAN request support ini?')" href="<?= base_url('Aksi/complete/' . $data->id_ticket) ?>">Approve</a>
              <a class="btn btn-danger" onclick="return confirm('Apakah Anda yakin MENOLAK request support ini?')" href="<?= base_url('Aksi/reject/' . $data->id_ticket) ?>">Reject</a>
            <?php } ?>
            <!-- Tombol Aksi ini akan muncul untuk Admin Superuser -->
            <?php if ($this->session->userdata('level') == 5) { ?>

              <a class="btn btn-info" href="<?= base_url('Aksi/complete/' . $data->id_ticket) ?>">Complete</a>
              <a class="btn btn-danger" href="<?= base_url('Aksi/reject/' . $data->id_ticket) ?>">Reject</a>
            <?php } ?>
          </div>
        </div>
      </div>

      <!-- Form Upload Lampiran -->
      <div class="col-lg-6">
        <div id="upload" class="card">
          <div class="card-header">
            <h3 class="card-title text-center">Lampiran (Attachment) <a class="btn btn-info float-right" href="<?= base_url('zip/createzip/tb_my_hajat_franchise/id_franchise/myhajat/' . $data->id_franchise) ?>">Download All</a></h3>
          </div>
          <div class="card-body p-0" id="dynamic-field">
            <table class="table text-center" width="100%">
              <thead>
                <th width="50%">File Terlampir</th>
                <th>Ubah/tambah file lampiran</th>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <?php if ($data->upload_file1 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myhajat/' . $data->upload_file1) ?>"><?= $data->upload_file1 ?></a><?php } ?>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="file" name="upload_file1" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info enable" disabled type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <?php if ($data->upload_file2 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myhajat/' . $data->upload_file2) ?>"><?= $data->upload_file2 ?></a><?php } ?>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="file" name="upload_file2" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info enable" disabled type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <?php if ($data->upload_file3 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myhajat/' . $data->upload_file3) ?>"><?= $data->upload_file3 ?></a><?php } ?>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="file" name="upload_file3" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info enable" disabled type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <?php if ($data->upload_file4 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myhajat/' . $data->upload_file4) ?>"><?= $data->upload_file4 ?></a><?php } ?>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="file" name="upload_file4" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info enable" disabled type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <?php if ($data->upload_file5 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myhajat/' . $data->upload_file5) ?>"><?= $data->upload_file5 ?></a><?php } ?>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="file" name="upload_file5" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info enable" disabled type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <?php if ($data->upload_file6 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myhajat/' . $data->upload_file6) ?>"><?= $data->upload_file6 ?></a><?php } ?>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="file" name="upload_file6" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info enable" disabled type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <?php if ($data->upload_file7 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myhajat/' . $data->upload_file7) ?>"><?= $data->upload_file7 ?></a><?php } ?>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="file" name="upload_file7" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info enable" disabled type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <?php if ($data->upload_file8 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myhajat/' . $data->upload_file8) ?>"><?= $data->upload_file8 ?></a><?php } ?>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="file" name="upload_file8" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info enable" disabled type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <?php if ($data->upload_file9 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myhajat/' . $data->upload_file9) ?>"><?= $data->upload_file9 ?></a><?php } ?>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="file" name="upload_file9" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info enable" disabled type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <?php if ($data->upload_file10 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myhajat/' . $data->upload_file10) ?>"><?= $data->upload_file10 ?></a><?php } ?>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="file" name="upload_file10" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info enable" disabled type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <?php if (($this->session->userdata('level') == 1 || $this->session->userdata('level') == 6) && ($data->status == 0 || $data->status == 1)) { ?>
            <div class="card-footer text-center">
              <!-- Tombol ini muncul khusus untuk user -->
              <!-- <button type="button" id="ubah" class="btn btn-secondary">Ubah Data</button> -->
              <button type="submit" id="edit_franchise" class="btn btn-info enable" name="edit_franchise" disabled>Update Data!</button>
            </div>
          <?php } ?>
          <?php if ($this->session->userdata('level') == 5) { ?>
            <div class="card-footer text-center">
              <!-- Tombol ini muncul khusus untuk SUPERUSER -->
              <button type="submit" id="edit_franchise_superuser" class="btn btn-info enable" name="edit_franchise_superuser" disabled>Update Data!</button>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </form>

  <?php if ($komentar->num_rows() == 0) { ?>

    <!-- Post Komentar -->
    <div class="row mt-4">
      <div class="col-lg-12 col-md-6">
        <form method="post" action="<?= base_url('comment/post_comment/id_franchise') ?>">
          <div class="card">
            <div class="card-header with-border">
              <label for="">Post Komentar</label>
            </div>
            <div class="card-body">
              <div class="form-group">
                <textarea class="form-control" name="post_comment" id="post_comment" cols="10" rows="2" placeholder="Masukkan Komentar Anda" required></textarea>
                <input type="hidden" name="id_komentar" value="<?= $data->id_franchise ?>">
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


  <?php foreach ($komentar->result() as $komen) { ?>
    <div class="row mt-4">
      <div class="col-lg-12 col-md-12">

        <div class="card card-widget">
          <div class="card-header with-border">
            <div class="user-block"> <span class="username"><?= $komen->name ?> (<?= $komen->nama_cabang ?>)</span>
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
                    <label for=""><?= $balasan->name ?> (<?= $balasan->nama_cabang ?>)</label>:
                    <span class="text-muted pull-right"> <?= $komen->date ?></span>
                  </span>
                  <?= $balasan->comment ?>
                </div>
              </div>
            <?php } ?>
          </div>
          <div class="card-footer">
            <form action="<?= base_url('comment/post_reply/id_franchise'); ?>" method="post">
              <div class="img-push">
                <input name="parent_comment" type="hidden" value="<?= $komen->id ?>">
                <input type="hidden" name="id_user" value="<?= $this->fungsi->user_login()->id_user ?>">
                <input type="hidden" name="id_ticket_reply" value="<?= $data->id_ticket ?>">
                <input name="id_komentar" type="hidden" value="<?= $data->id_franchise ?>">
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