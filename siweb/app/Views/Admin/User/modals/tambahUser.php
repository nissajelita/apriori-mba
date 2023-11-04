<div class="modal fade" id="tambahUserModal" tabindex="-1" role="dialog" aria-labelledby="tambahUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahUserModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formTambahUser">
                    <div class="form-group">
                        <label for="namaUser">Nama User</label>
                        <input type="text" class="form-control" id="namaUser" name="namaUser" aria-describedby="namaUsers" placeholder="Nama User">
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" aria-describedby="usernames" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="jenisUser">Jenis User</label>
                        <select class="form-control" id="jenisUser" name="jenisUser">
                            <option value="1">Siswa</option>
                            <option value="2">Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="passwordUser">Password</label>
                        <input type="password" class="form-control" id="passwordUser" name="passwordUser" placeholder="Password">
                    </div>
                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                </form>
            </div>
            <div class="modal-footer">
                <button txype="submit" class="btn btn-primary" onclick="btnSimpanUser()">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
