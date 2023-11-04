<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<script>
     $(document).ready(function() {
        // $('#dataTable').DataTable();
    });

    function btnSimpanUser() {
        console.log($('#formTambahUser').serialize());
        Swal.fire({
        title: 'Konfirmasi',
        text: 'Anda yakin ingin menyimpan data?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Ya, Simpan',
        cancelButtonText: 'Batal'
        }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '<?= base_url('user/simpan'); ?>',
                        dataType: 'json',
                        data: $('#formTambahUser').serialize(),
                        success: function(response) {
                            console.log(response);
                            if (response.Code === 200) {
                            Swal.fire(
                                'Simpan!',
                                response.Message,
                                'success'
                            );
                            location.reload();
                            } else {
                                console.log(response);
                                Swal.fire(
                                    'Error',
                                    response.Message,
                                    'error'
                                );
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr)
                            var errorMessage = +': ' + xhr.statusText
                            swal.fire(
                                '404',
                                xhr.responseText,
                                'warning'
                            )
                        }
                    });
                    return false;
                }
            });
    }


    function btnEditUser(uname)
    {
        console.log(uname);
        // alert('test');
        $.ajax({
            method: "POST",
            url: '<?= base_url('user/edituser') ?>',
            data: {
                username: uname,
            },
            beforeSend: function() {
                $("#dataEditUser").hide();
            },
            complete: function() {
                $(".loading2").hide();
                $("#dataEditUser").show();
            },
            success: function(data) {
                console.log(data);
                $('#dataEditUser').html(data);
                feather.replace();
            },
            error: function() {
                console.log('error');
            alert('Terjadi kesalahan dalam mengambil data pengguna.');
        }

        });
        $('#editUser').modal('show');
        
    }

    function btnUpdateUser() {
        console.log($('#formEditUser').serialize());
        Swal.fire({
        title: 'Konfirmasi',
        text: 'Anda yakin ingin menyimpan data?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Ya, Simpan',
        cancelButtonText: 'Batal'
        }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '<?= base_url('user/simpan'); ?>',
                        dataType: 'json',
                        data: $('#formEditUser').serialize(),
                        success: function(response) {
                            console.log(response);
                            if (response.Code === 200) {
                            Swal.fire(
                                'Update!',
                                response.Message,
                                'success'
                            );
                            location.reload();
                            } else {
                                console.log(response);
                                Swal.fire(
                                    'Error',
                                    response.Message,
                                    'error'
                                );
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr)
                            var errorMessage = +': ' + xhr.statusText
                            swal.fire(
                                '404',
                                xhr.responseText,
                                'warning'
                            )
                        }
                    });
                    return false;
                }
            });
    }

    function btnDeleteUser()
    {
        alert('tes');
    }
    


</script>