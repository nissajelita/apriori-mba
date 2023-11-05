<div class="p-2">
    <div class="row m-1"><h3><?= $title ?></h3></div>
    <div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card p-1">
                <div class="card-block">
                    <div class="row p-1">
                        <div class=" table-responsive">
                            <table class="table table-striped table-sm"  id="tabelAnalisa" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Antecedents</th>
                                        <th scope="col">Consequents</th>
                                        <th scope="col">Confidence</th>
                                        <th scope="col">Supports</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach($response as $key => $r){ ?>
                                    <tr>
    
                                        <td><?= $no++ ?></td>
                                        <td><?= $r['antecedents'][0] ?></td>
                                        <td><?= $r['consequents'][0] ?></td>
                                        <td><?= $r['confidence'] ?></td>
                                        <td><?= $r['support'] ?></td>
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
    <div class="row">
        <div class="col-lg-10 col-sm-12">
            <div class="card p-1">
                <div class="card-block">
                    <img alt="Your Image" style="width: 100%; height: auto; max-width: 100%; aspect-ratio: 9 / 4;" src="<?=base_url()?>/img/grafik.png" alt="homepage"  />
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-sm-12">
            <div class="card p-1">
                <div class="card-block">
                    <button>Export Laporan</button>
                </div>
            </div>
        </div>
    </div>
</div>