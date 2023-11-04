<div class="modal fade" id="tambahItem" tabindex="-1" role="dialog" aria-labelledby="tambahItemLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahItemLabel">Tambah Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formTambahItemToko">
                    <div class="form-group">
                        <label for="namaItem">Nama Item</label>
                        <input type="text" class="form-control" id="namaItem" name="nama_item"  placeholder="Nama Item">
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control" id="Ktegori" name="kategori">
                            <option value="0">Pilih Kategori</option>
                            <?php foreach($category as $ktg) { ?>
                                <option value="<?= $ktg['category'] ?>"><?= $ktg['category'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                </form>
            </div>
            <div class="modal-footer">
                <button txype="submit" class="btn btn-primary" onclick="btnSimpanItem()">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
