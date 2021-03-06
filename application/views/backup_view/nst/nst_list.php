<section class="content-header text-center mb-4 mt-4">
    <h4>
        <?= ucfirst($this->uri->segment(2)) ?> NST Tickets
        <!-- <small>it all starts here</small> -->
    </h4>
    <p><?= date('d F, y') ?></p>
</section>

<!-- Main content -->
<section class="content m-2">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="row mt-4 m-1">
                    <div class="col-lg-12">
                        <form action="#" method="get" class="form-inline my-2 my-lg-0 pull-right">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control form-rounded cariTiket" type="text" placeholder="Search" aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-outline-secondary input-group-text form-rounded" type="button"><i class="icon-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="input-group row ml-3">
                        <form class="form-inline">
                            <label for="statusTiket"><b>Sort by:</b></label>
                            <select class="form-control form-rounded ml-3" id="statusTiket">
                                <option id="all-tickets" value="">All</option>
                                <option id="pending" value="Pending">Pending</option>
                                <option id="approved" value="Disetujui">Disetujui</option>
                                <option id="rejected" value="Ditolak">Ditolak</option>
                                <option id="completed" value="Selesai">Selesai</option>
                            </select>
                        </form>
                    </div>
                </div>
                <table class="table status dt-responsive" width="100%">
                    <thead>
                        <th>ID Ticket</th>
                        <th>Lead ID</th>
                        <th>Nama Konsumen</th>
                        <th>Produk</th>
                        <th>Ticket Status</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data->result() as $d) {  ?>
                            <tr>
                                <td><?= $d->id_ticket ?></td>
                                <td><?= $d->lead_id ?></td>
                                <td><?= $d->nama_konsumen ?></td>
                                <td><?= $d->produk ?></td>
                                <?php if ($d->id_approval == 0) { ?>
                                    <td><label class="badge badge-secondary">Pending</span></td>
                                    <td><a class="btn btn-secondary" href="<?= base_url('status/detail/nst/id/' . $d->id_nst) ?>">Detail</a></td>
                                <?php } else if ($d->id_approval == 1) { ?>
                                    <td><label class="badge badge-danger">Ditolak</span></td>
                                    <td><a class="btn btn-secondary" href="<?= base_url('status/detail/nst/id/' . $d->id_nst) ?>">Detail</a></td>
                                <?php } else if ($d->id_approval == 2) { ?>
                                    <td><label class="badge badge-success">Disetujui</span></td>
                                    <td><a class="btn btn-secondary" href="<?= base_url('status/detail/nst/id/' . $d->id_nst) ?>">Detail</a></td>
                                <?php } else if ($d->id_approval == 3) { ?>
                                    <td><label class="badge badge-primary">Selesai</label></td>
                                    <td><a class="btn btn-secondary" href="<?= base_url('status/detail/nst/id/' . $d->id_nst) ?>">Detail</a></td>
                                <?php } ?>
                            </tr>
                        <?php
                            $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>