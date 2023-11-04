<form id="formEditUser">
    <div class="form-group">
        <label for="namaUser">Nama User</label>
        <input type="text" class="form-control" id="namaUser" name="namaUser" aria-describedby="namaUsers" placeholder="Nama User" value="<?=$user['nm_user'] ?>">
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="id_user" name="id_user" value="<?=$user['id_user'] ?>" hidden>
        <input type="text" class="form-control" id="usr_pwd" name="usr_pwd" value="<?=$user['usr_pwd'] ?>" readonly>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="usernames" placeholder="Username" value="<?=$user['uname'] ?>" readonly>
    </div>
    <div class="form-group">
        <label for="jenisUser">Jenis User</label>
        <select class="form-control" id="jenisUser" name="jenisUser">
            <option value="1" <?=$user['group_id'] == 1 ? 'selected' : ''?>>Siswa</option>
            <option value="2" <?=$user['group_id'] == 2 ? 'selected' : ''?>>Admin</option>
        </select>
    </div>
    <div class="form-group">
        <label for="sttUser">Status User</label>
        <select class="form-control" id="sttUser" name="sttUser">
            <option value="1" <?=$user['stt_user'] == 1 ? 'selected' : ''?>>Aktif</option>
            <option value="0" <?=$user['stt_user'] == 0 ? 'selected' : ''?>>Tidak Aktif</option>
        </select>
    </div>
    <div class="form-group">
        <label for="passwordUser">Ubah Password</label>
        <input type="password" class="form-control" id="passwordUser" name="passwordUser">
        <small id="passwordHelp" class="form-text text-muted "><span class="text-danger">Biarkan kosong jika tidak ingin diganti</span></small>
    </div>
</form>
<div class="mt-1">
    &nbsp;
    <button type="submit" class="btn btn-primary w-100" onclick="btnUpdateUser()">Update</button>
</div>