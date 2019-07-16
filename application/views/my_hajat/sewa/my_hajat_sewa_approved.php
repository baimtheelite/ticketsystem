<section class="content-header">
  <h1>
    Approved My Hajat Wedding Tickets
    <!-- <small>it all starts here</small> -->
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-lg-2">
    </div>
    <div class="col-lg-6">
      <table id="table-admin1" class="table">
        <thead>
          <th>ID Ticket</th>
          <th>Nama Konsumen</th>
          <th>Jenis Konsumen</th>
          <th>Nama Pemilik</th>
          <th>Ticket Status</th>
          <th></th>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($data as $d) {  ?>
            <tr>
              <td>#<?= $d->id_sewa ?></td>
              <td><?= $d->nama_konsumen ?></td>
              <td><?= $d->jenis_konsumen?></td>
              <td><?= $d->nama_pemilik ?></td>
              <td><span class="label label-success">Disetujui</span></td>
              <td><a class="btn btn-default" href="<?= base_url('status/approved/myhajat/sewa/' . $d->id_sewa) ?>">Detail</a></td>
            </tr>
            <?php
            $no++;
          } ?>
        </tbody>
      </table>
    </div>
    <div class="col-lg-2">

    </div>
  </div>
</section>