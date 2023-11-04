<?= $this->extend('layout/templates') ?>

<?= $this->section('content') ?>

<div class="card p-4">
    <div class="row">
        <div class="col-lg-9 col-md-6 col-sm-12 mb-1">
            <h1 class="h3 mb-0 text-gray-800">Data Item</h1>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <button id="btnTambahItem" class="m-1 btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahItem"><i class="mdi mdi-plus"></i> Tambah Item</button>
            <button id="btnTambahItemExcel" class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahItemMultiple"><i class="mdi mdi-plus"></i> Tambah Item by Excel</button>
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
                                    <th scope="col">ID Barang</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no= 1;
                                    foreach ($item as $key => $i) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $i['item_id'] ?></td>
                                        <td><?= $i['name'] ?></td>
                                        <td><?= $i['category'] ?></td>
                                        <td>
                                        <button class="btn btn-sm btn-warning" onclick="btnEditItem('<?=$i['item_id']?>')"><i class="mdi mdi-pencil"></i></button>
                                        <button class="btn btn-sm btn-danger" onclick="btnDeleteItem()"><i class="mdi mdi-delete"></i></button>
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
<?php include __DIR__ . '/_scripts.php'; ?>
<?php include __DIR__ . '/modals/insertExcel.php'; ?>
<?php include __DIR__ . '/modals/insertItem.php'; ?>
<?= $this->endSection() ?>
