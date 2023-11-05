<?= $this->extend('layout/templates') ?>

<?= $this->section('content') ?>

<div class="card p-3">
    <div class="row card-header mb-1">
            <h5 class="h5 mb-0 text-gray-800">Filter Data Penjualan</h5>
    </div>
    <div class="row card-body">
        <div class=" col-lg-4 col-sm-12 mb-1">
            <label for="from_date">Dari Tanggal</label>
            <input class="form-control" name="from_date" type="date" id="fromDate" placeholder="from date">
        </div>
        <div class=" col-lg-4 col-sm-12 mb-1">
            <label for="to_date">Sampai Tanggal</label>
            <input class="form-control" name="to_date" type="date" id="toDate" placeholder="to date">
        </div>
        <div class=" col-lg-2 col-sm-12 mb-1">
            <label for="min_support">Min Support (%)</label>
            <input class="form-control" name="min_support" type="number" id="minSupport" placeholder="min support">
        </div>
        <div class="col-lg-2 col-sm-12 d-flex align-items-end mb-1">
            <button id="btnFitlerAnalisa" class="btn waves-effect waves-light btn-info pull-right hidden-sm-down" onclick="btnAnalisa()">Analisa</button>
        </div>
    </div>
</div>
<div class="row">
    <div class=" card col-lg-12 col-md-7 p-2">
        <div id="dataAnalisa"></div>
        <div id="gambar1" style="display: flex; justify-content: center; align-items: center;"><img alt="Your Image" style="width: 25%; height: auto;" src="<?=base_url()?>/app-assets/report2.png" alt="homepage"  /></div>
        <span id="processingResults" style="display: flex; justify-content: center; align-items: center;" class="badgeProcess badge badge-success" hidden>processing ...</span>
        
    </div>
</div>
<?php include __DIR__ . '/_scripts.php'; ?>
<?= $this->endSection() ?>
