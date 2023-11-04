<?= $this->extend('layout/templates') ?>

<?= $this->section('content') ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data User</h1>
    <button id="btnTambahUser" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahUserModal"><i class="mdi mdi-plus"></i> Tambah User</button>
</div>
<div class="row">
    <div class="col-lg-12 col-md-7">
        <div class="card">
            <div class="card-block">
                <div class="row p-1">
                    <!-- <h3 class="card-title">Data User</h3> -->
                    <div class=" table-responsive">
                        <table class="table table-striped"  id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Uname</th>
                                    <th scope="col">Group ID</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no= 1;
                                    foreach ($user as $key => $usr) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $usr['nm_user'] ?></td>
                                        <td><?= $usr['uname'] ?></td>
                                        <td><?= $usr['group_id'] ?></td>
                                        <td>
                                            <span class="badge <?= $usr['stt_user'] == 1 ? 'badge-info' : 'badge-danger' ?>">
                                            <?= $usr['stt_user'] == 1 ? 'Aktif' : 'Tidak Aktif' ?>
                                            </span>
                                        </td>
                                        <td>
                                        <button class="btn btn-sm btn-warning" onclick="btnEditUser('<?=$usr['uname']?>')"><i class="mdi mdi-pencil"></i></button>
                                        <button class="btn btn-sm btn-danger" onclick="btnDeleteUser()"><i class="mdi mdi-delete"></i></button>
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
<?php include __DIR__ . '/script/scriptUser.php'; ?>
<?php include __DIR__ . '/modals/tambahUser.php'; ?>
<?php include __DIR__ . '/modals/editUser.php'; ?>
<?= $this->endSection() ?>
