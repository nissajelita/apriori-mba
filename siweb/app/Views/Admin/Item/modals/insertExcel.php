<div class="modal fade" id="tambahItemMultiple" tabindex="-1" role="dialog" aria-labelledby="tambahItemMultipleLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahItemMultipleLabel">Tambah Item Toko</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form class="form-import-item-toko" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
                <?= csrf_field(); ?>
                <div class="row">
                    <div class=" col-lg-6 col-sm-12">
                        <label for="formFile">Import File</label>
                        <input class="form-control" name="fileexcel" type="file" id="formFile" accept=".xlsx, .xls" >
                    </div>
                </div>
                
            </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-simpan-berkas" onclick="btnSimpanMulti()">Import</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
