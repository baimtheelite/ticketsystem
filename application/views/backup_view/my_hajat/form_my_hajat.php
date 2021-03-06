<section class="content-header">
  <h1>Form My Hajat</h1>
</section>

<form id="ticket_form" method="post" action="<?= site_url('Ticket_register/add') ?>" enctype="multipart/form-data">
  <section class="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">

          <!-- card Data Konsumen -->
          <div id="card-konsumen" class="card card-primary">
            <div class="card-header with-border">
              <h3 class="card-title">Konsumen</h3>
            </div>
            <div class="card-body">
              <!-- Nama Konsumen -->
              <div class="form-group">
                <label for="nama_konsumen">Nama Konsumen</label>
                <?= form_error('nama_konsumen'); ?>
                <input name="nama_konsumen" id="nama_konsumen" type="text" class="form-control" placeholder="Nama Konsumen" value="<?= set_value('nama_konsumen') ?>">
              </div>
              <!-- Jenis Calon Konsumen -->
              <div class="form-group">
                <label for="jenis_konsumen">Jenis Calon Konsumen</label>
                <?= form_error('jenis_konsumen'); ?>
                <select name="jenis_konsumen" id="jenis_konsumen" class="form-control">
                  <option value="Internal">Internal</option>
                  <option value="Eksternal">Eksternal</option>
                </select>
              </div>
              <div class="form-group">
                <label for="cabang">Cabang</label>
                <?= form_error('cabang'); ?>
                <select name="cabang" id="cabang" class="form-control" disabled>
                  <option disabled selected value="">- Pilih Cabang -</option>
                  <?php
                  foreach ($pertanyaan as $p) {
                    ?>
                    <option value="<?= $p->id_cabang ?>" <?= $this->fungsi->user_login()->id_cabang == $p->id_cabang ? 'selected' : '' ?>><?= $p->nama_cabang ?></option>
                  <?php }  ?>
                </select>
                <input type="hidden" name="cabang" value="<?= $this->fungsi->user_login()->id_cabang ?>">
                <!-- Insert ID User -->
                <input name="id_user" id="id_user" type="hidden" value="<?= $this->fungsi->user_login()->id_user ?>">
              </div>
            </div>
          </div>

          <!-- card Kategori My Hajat -->
          <div id="card-kategori-myhajat" class="card card-primary">
            <div class="card-header with-border">
              <h3 class="card-title">Kategori My Hajat</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <div class="form-check">
                  <label class="form-check-label"><input class="kategori form-check-input" id="renovasi" type="radio" name="kategori_myhajat">Renovasi</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label"><input class="kategori form-check-input" id="sewa" type="radio" name="kategori_myhajat">Sewa</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label"><input class="kategori form-check-input" id="wedding" type="radio" name="kategori_myhajat">Wedding</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label"><input class="kategori form-check-input" id="franchise" type="radio" name="kategori_myhajat">Franchise</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label"><input class="kategori form-check-input" id="lainnya" type="radio" name="kategori_myhajat">Lainnya</label>
                </div>
              </div>
            </div>
            <div class="card-footer">

            </div>
          </div>

          <!-- card Renovasi -->
          <div id="card-renovasi" class="card card-primary pertanyaan mt-4">
            <div class="card-header with-border">
              <h3 class="card-title">Renovasi</h3>
            </div>
            <div class="card-body">
              <!-- Nama Vendor -->
              <div class="form-group">
                <label for="nama_vendor">Nama Vendor</label>
                <?= form_error('nama_vendor'); ?>
                <input name="nama_vendor" id="nama_vendor" type="text" class="form-control" placeholder="Nama Vendor" value="<?= set_value('nama_vendor') ?>">
              </div>
              <!-- Jenis Vendor -->
              <div class="form-group">
                <label for="jenis_vendor">Jenis Vendor</label>
                <?= form_error('jenis_vendor'); ?>
                <div class="form-check">
                  <label class="form-check-label"><input class="kategori form-check-input" id="perorangan" type="radio" name="jenis_vendor" value="Perorangan">Perorangan</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label"><input class="kategori form-check-input" id="badan_usaha" type="radio" name="jenis_vendor" value="Badan Usaha">Badan Usaha</label>
                </div>
              </div>
              <div class="form-group">
                <label for="jenis_pekerjaan">Jenis Pekerjaan</label>
                <?= form_error('jenis_pekerjaan'); ?>
                <div class="form-check">
                  <label class="form-check-label"><input class="kategori form-check-input" id="borongan" type="radio" name="jenis_pekerjaan" value="Borongan">Borongan</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label"><input class="kategori form-check-input" id="harian" type="radio" name="jenis_pekerjaan" value="Harian">Harian</label>
                </div>

              </div>
              <div class="form-group">
                <?= form_error('bagian_bangunan'); ?>

                <label for="bagian_bangunan">Bagian Bangunan Yang Direnovasi</label>
                <input name="bagian_bangunan" id="bagian_bangunan" type="text" class="form-control" placeholder="Bagian Bangunan Yang Direnovasi" value="<?= set_value('bagian_bangunan') ?>">
              </div>
              <div class="form-group">
                <?= form_error('luas_bangunan'); ?>

                <label for="luas_bangunan">Luas Bangunan</label>
                <input name="luas_bangunan" id="luas_bangunan" type="text" class="form-control" placeholder="Luas Bangunan" value="<?= set_value('luas_bangunan') ?>">
              </div>
              <div class="form-group">
                <?= form_error('jumlah_pekerja'); ?>

                <label for="jumlah_pekerja">Jumlah Tukang/Pekerja</label>
                <input name="jumlah_pekerja" id="jumlah_pekerja" type="text" class="form-control" placeholder="Jumlah Tukang / Pekerja" value="<?= set_value('jumlah_pekerja') ?>">
              </div>
              <div class="form-group">
                <?= form_error('estimasi_waktu'); ?>

                <label for="estimasi_waktu">Estimasi Waktu Pelaksanaan</label>
                <input name="estimasi_waktu" id="estimasi_waktu" type="text" class="form-control" placeholder="Estimasi Waktu Pelaksanaan" value="<?= set_value('estimasi_waktu') ?>">
              </div>
              <div class="form-group">
                <?= form_error('nilai_biaya'); ?>
                <label for="nilai_biaya">Nilai Pembiayaan</label>
                <input name="nilai_biaya" id="nilai_biaya" type="number" class="form-control" placeholder="Nilai Pembiayaan" value="<?= set_value('nilai_biaya') ?>">
              </div>
              <div class="form-group">
                <label for="informasi_tambahan">Informasi Tambahan</label>
                <textarea name="informasi_tambahan" id="informasi_tambahan" cols="30" rows="10" class="form-control"></textarea>
              </div>
            </div>
          </div>

          <!-- card Sewa -->
          <div id="card-sewa" class="card card-primary pertanyaan mt-4">
            <div class="card-header with-border">
              <h3 class="card-title">Sewa</h3>
            </div>
            <div class="card-body">
              <!-- Nama Pemilik -->
              <div class="form-group">
                <label for="nama_pemilik">Nama Pemilik</label>
                <?= form_error('nama_pemilik'); ?>
                <input name="nama_pemilik" id="nama_pemilik" type="text" class="form-control" placeholder="Nama Konsumen" value="<?= set_value('nama_pemilik') ?>">
              </div>
              <!-- Jenis Pemilik -->
              <div class="form-group">
                <label for="jenis_pemilik">Jenis Calon Konsumen</label>
                <?= form_error('jenis_pemilik'); ?>
                <select name="jenis_pemilik" id="jenis_pemilik" class="form-control">
                  <option value="Perorangan">Perorangan</option>
                  <option value="Perusahaan">Perusahaan/Badan Usaha</option>
                </select>
              </div>
              <!-- Hubungan dengan pemohon -->
              <div class="form-group">
                <label for="hubungan_pemohon">Hubungan dengan pemohon</label>
                <?= form_error('hubungan_pemohon'); ?>
                <input name="hubungan_pemohon" id="hubungan_pemohon" type="text" class="form-control" placeholder="Jenis Pemilik" value="<?= set_value('hubungan_pemohon') ?>">
              </div>
              <!-- Luas x Panjang -->
              <div class="form-group">
                <label for="luas_panjang">Luas x Panjang</label>
                <?= form_error('luas_panjang'); ?>
                <input name="luas_panjang" id="luas_panjang" type="text" class="form-control" placeholder="Luas x Panjang" value="<?= set_value('luas_panjang') ?>">
              </div>
              <!-- Biaya sewa per tahun -->
              <div class="form-group">
                <label for="biaya_pertahun">Biaya Sewa per Tahun</label>
                <?= form_error('biaya_pertahun'); ?>
                <input name="biaya_pertahun" id="biaya_pertahun" type="text" class="form-control" placeholder="Biaya Sewa per Tahun" value="<?= set_value('biaya_pertahun') ?>">
              </div>
              <!-- Informasi Tambahan -->
              <div class="form-group">
                <label for="informasi_tambahan">Informasi Tambahan</label>
                <textarea name="informasi_tambahan" id="informasi_tambahan" cols="30" rows="10" class="form-control"></textarea>
              </div>
            </div>
          </div>

          <!-- card Wedding -->
          <div id="card-wedding" class="card card-primary pertanyaan mt-4">
            <div class="card-header with-border">
              <h3 class="card-title">Wedding</h3>
            </div>
            <div class="card-body">
              <!-- Nama WO -->
              <div class="form-group">

                <label for="nama_wo">Nama WO</label>
                <?= form_error('nama_wo'); ?>
                <input name="nama_wo" id="nama_wo" type="text" class="form-control" placeholder="Nama WO" value="<?= set_value('nama_wo') ?>">
              </div>
              <!-- Jenis WO -->
              <div class="form-group">
                <label for="jenis_wo">Jenis WO</label>
                <?= form_error('jenis_wo'); ?>
                <input name="jenis_wo" id="jenis_wo" type="text" class="form-control" placeholder="Jenis WO" value="<?= set_value('jenis_wo') ?>">
              </div>
              <!-- Lama Usaha Berdiri -->
              <div class="form-group">
                <label for="lama_berdiri">Lama Usaha Berdiri</label>
                <?= form_error('lama_berdiri'); ?>
                <input name="lama_berdiri" id="lama_berdiri" type="text" class="form-control" placeholder="Lama Usaha Berdiri" value="<?= set_value('lama_berdiri') ?>">
              </div>
              <!-- Jumlah Biaya -->
              <div class="form-group">
                <label for="jumlah_biaya">Jumlah Biaya</label>
                <?= form_error('jumlah_biaya'); ?>
                <input name="jumlah_biaya" id="jumlah_biaya" type="text" class="form-control" placeholder="Jumlah Biaya" value="<?= set_value('jumlah_biaya') ?>">
              </div>
              <!-- Jumlah Undangan -->
              <div class="form-group">
                <label for="jumlah_undangan">Jumlah Undangan</label>
                <?= form_error('jumlah_undangan'); ?>
                <input name="jumlah_undangan" id="jumlah_undangan" type="text" class="form-control" placeholder="Jumlah Undangan" value="<?= set_value('jumlah_undangan') ?>">
              </div>
              <!-- Akun Sosial Media -->
              <div class="form-group">
                <label for="akun_sosmed">Akun Sosial Media</label>
                <?= form_error('akun_sosmed'); ?>
                <input name="akun_sosmed" id="akun_sosmed" type="text" class="form-control" placeholder="Akun Sosial Media" value="<?= set_value('akun_sosmed') ?>">
              </div>
              <!-- Informasi Tambahan -->
              <div class="form-group">
                <label for="informasi_tambahan">Informasi Tambahan</label>
                <textarea name="informasi_tambahan" id="informasi_tambahan" cols="30" rows="10" class="form-control"></textarea>
              </div>
            </div>
          </div>

          <!-- card Franchise -->
          <div id="card-franchise" class="card card-primary pertanyaan mt-4">
            <div class="card-header with-border">
              <h3 class="card-title">Franchise</h3>
            </div>
            <div class="card-body">
              <!-- Nama Franchise -->
              <div class="form-group">
                <label for="nama_franchise">Nama Franchise</label>
                <?= form_error('nama_franchise'); ?>
                <input name="nama_franchise" id="nama_franchise" type="text" class="form-control" placeholder="Nama Franchise" value="<?= set_value('nama_franchise') ?>">
              </div>
              <!-- Jumlah Cabang -->
              <div class="form-group">
                <label for="jumlah_cabang">Jumlah Cabang</label>
                <?= form_error('jumlah_cabang'); ?>
                <input name="jumlah_cabang" id="jumlah_cabang" type="number" class="form-control" placeholder="Jumlah Cabang" value="<?= set_value('jumlah_cabang') ?>">
              </div>
              <!-- Jenis Franchise -->
              <div class="form-group">
                <label for="jenis_franchise">Jenis Franchise</label>
                <?= form_error('jenis_franchise'); ?>
                <select name="jenis_franchise" id="jenis_franchise" class="form-control">
                  <option value="Makanan dan Minuman">Makanan dan Minuman</option>
                  <option value="otomotif">Otomotif</option>
                  <option value="pendidikan/pelatihan">Pendidikan/Pelatihan</option>
                  <option value="Hiburan & Hobi">Hiburan & Hobi</option>
                  <option value="Komputer/Teknologi">Komputer/Teknologi</option>
                  <option value="Kesehatan & Kecantikan">Kesehatan & Kecantikan</option>
                  <option value="Retail">Retail</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
              </div>
              <!-- Tahun Berdiri -->
              <div class="form-group">
                <label for="tahun_berdiri_franchise">Tahun Berdiri Franchise</label>
                <?= form_error('tahun_berdiri_franchise'); ?>
                <input name="tahun_berdiri_franchise" id="tahun_berdiri_franchise" type="text" class="form-control" placeholder="Tahun Berdiri" value="<?= set_value('tahun_berdiri_franchise') ?>">
              </div>
              <!-- Harga -->
              <div class="form-group">
                <label for="harga_franchise">Harga Franchise</label>
                <?= form_error('harga_franchise'); ?>
                <input name="harga_franchise" id="harga_franchise" type="text" class="form-control" placeholder="Harga" value="<?= set_value('harga_franchise') ?>">
              </div>
              <!-- Jangka Waktu Kepemilikan -->
              <div class="form-group">
                <label for="jangka_waktu_franchise">Jangka Waktu Franchise</label>
                <?= form_error('jangka_waktu_franchise'); ?>
                <select name="jangka_waktu_franchise" id="jangka_waktu_franchise" class="form-control">
                  <option value="Selamanya">Selamanya</option>
                  <option value="Jangka Tertentu">Jangka Tertentu</option>
                </select>
              </div>
              <!-- Akun Sosial Media -->
              <div class="form-group">
                <label for="akun_sosmed_website">Akun Sosial Media/Website</label>
                <?= form_error('akun_sosmed_website'); ?>
                <input name="akun_sosmed_website" id="akun_sosmed_website" type="text" class="form-control" placeholder="Akun Sosial Media" value="<?= set_value('akun_sosmed_website') ?>">
              </div>
              <!-- Informasi Tambahan -->
              <div class="form-group">
                <label for="informasi_tambahan">Informasi Tambahan</label>
                <textarea name="informasi_tambahan" id="informasi_tambahan" cols="30" rows="10" class="form-control"></textarea>
              </div>
              <button name="submit_franchise" class="btn btn-primary" name="submit">Kirim Data!</button>
            </div>
          </div>

          <!-- card Penyedia Jasa -->
          <div id="card-lainnya" class="card card-primary pertanyaan mt-4">
            <div class="card-header with-border">
              <h3 class="card-title">Penyedia Jasa</h3>
            </div>
            <div class="card-body">
              <!-- Nama Penyedia Jasa -->
              <div class="form-group">
                <label for="nama_penyedia_jasa">Nama Penyedia Jasa</label>
                <?= form_error('nama_penyedia_jasa'); ?>
                <input name="nama_penyedia_jasa" id="nama_penyedia_jasa" type="text" class="form-control" placeholder="Nama Penyedia Jasa" value="<?= set_value('nama_penyedia_jasa') ?>">
              </div>
              <!-- Jenis Penyedia Jasa -->
              <div class="form-group">
                <label for="jenis_penyedia_jasa">Jenis Penyedia Jasa</label>
                <?= form_error('jenis_penyedia_jasa'); ?>
                <select name="jenis_penyedia_jasa" id="jenis_penyedia_jasa" class="form-control" value="<?= set_value('jenis_penyedia_jasa') ?>">
                  <option value="Perorangan">Perorangan</option>
                  <option value="Badan Usaha">Badan Usaha</option>
                </select>
              </div>
              <!-- Nilai Pengajuan Pembiayaan -->
              <div class="form-group">
                <label for="nilai_pembiayaan">Nilai Pengajuan Pembiayaan</label>
                <?= form_error('nilai_pembiayaan'); ?>
                <input name="nilai_pembiayaan" id="nilai_pembiayaan" type="text" class="form-control" placeholder="Nilai Pengajuan Pembiayaan" value="<?= set_value('nilai_pembiayaan') ?>">
              </div>
              <!-- Informasi Tambahan -->
              <div class="form-group">
                <label for="informasi_tambahan">Informasi Tambahan</label>
                <textarea name="informasi_tambahan" id="informasi_tambahan" cols="30" rows="10" class="form-control"><?= set_value('informasi_tambahan') ?></textarea>
              </div>
            </div>
          </div>

          <!-- card Upload File -->
          <div class="card card-primary mt-4 pertanyaan upload">
            <div class="card-header with-border">
              <h3 class="card-title">Upload File</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <?= form_error('upload_file1'); ?>
                <label for="upload_file1">Upload Berkas 1 *</label>
                <input name="upload_file1" id="upload_file1" type="file" class="form-control col-8" required>
              </div>
              <div class="form-group">
                <label for="upload_file2">Upload Berkas 2</label>
                <input name="upload_file2" id="upload_file2" type="file" class="form-control col-8">
              </div>
              <div class="form-group">
                <label for="upload_file3">Upload Berkas 3</label>
                <input name="upload_file3" id="upload_file3" type="file" class="form-control col-8">
              </div>
              <div class="form-group">
                <label for="upload_file4">Upload Berkas 4</label>
                <input name="upload_file4" id="upload_file4" type="file" class="form-control col-8">
              </div>
              <div class="form-group">
                <label for="upload_file5">Upload Berkas 5</label>
                <input name="upload_file5" id="upload_file5" type="file" class="form-control col-8">
              </div>
              <p><b>Note: </b> Wajib diisi (*)</p>
            </div>
            <div class="card-footer text-center">
              <button onclick="return confirm('Harap periksa kembali\n,Apakah Anda yakin data yang diisi sudah benar?');" id="submit" class="btn btn-primary" name="">Kirim Data!</button>
</form>
</div>
</div>
</div>
</div>
</div>
</section>