<?= $this->extend('layout/templates') ?>

<?= $this->section('content') ?>

<div class="card p-3">
    <div class="row card-header mb-1">
            <h5 class="h5 mb-0 text-gray-800">Filter Data Penjualan</h5>
    </div>
    <div class="row card-body">
        <div class=" col-lg-4 col-sm-12 mb-1">
            <label for="formFile">Dari Tanggal</label>
            <input class="form-control" name="from_date" type="date" id="fromDate" placeholder="from date">
        </div>
        <div class=" col-lg-5 col-sm-12 mb-1">
            <label for="formFile">Sampai Tanggal</label>
            <input class="form-control" name="to_date" type="date" id="toDate" placeholder="to date">
        </div>
        <div class="col-lg-3 col-sm-12 d-flex align-items-end mb-1">
            <button id="btnFitlerAnalisa" class="btn waves-effect waves-light btn-info pull-right hidden-sm-down" onclick="btnAnalisa()">Analisa</button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-7">
        <div class="card">
            hello
        </div>
    </div>
</div>
<?php include __DIR__ . '/_scripts.php'; ?>
<?= $this->endSection() ?>
