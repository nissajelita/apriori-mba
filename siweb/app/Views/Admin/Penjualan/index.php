<?= $this->extend('layout/templates') ?>

<?= $this->section('content') ?>

<div class="card p-4">
    <div class="row">
        <div class="col-lg-9 col-md-6 col-sm-12 mb-1">
            <h1 class="h3 mb-0 text-gray-800">Data Penjualan</h1>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <button id="btnTambahPenjualan" class="m-1 btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahPenjualan"><i class="mdi mdi-plus"></i> Tambah Data</button>
            <button id="btnTambahPenjualanExcel" class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahPenjualanMultiple"><i class="mdi mdi-plus"></i> Tambah Data by Excel</button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-7">
        <div class="card">
            <div class="card-block">
                <div class="row p-1">
                    <div class=" table-responsive">
                        <table class="table table-striped"  id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">No Faktur</th>
                                    <th scope="col">Tgl Penjualan</th>
                                    <th scope="col">Nama Item</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no= 1;
                                    foreach ($penjualan as $key => $p) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $p['sale_id'] ?></td>
                                        <td><?= $p['tgl_penjualan'] ?></td>
                                        <td><?= $p['name'] ?></td>
                                        <td><?= $p['quantity_purchased'] ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-warning" onclick="btnEditPenjualan('<?=$p['id_penjualan']?>')"><i class="mdi mdi-pencil"></i></button>
                                            <button class="btn btn-sm btn-danger" onclick="btnDeletePenjualan()"><i class="mdi mdi-delete"></i></button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
