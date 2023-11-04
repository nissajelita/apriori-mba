<script>
     function btnSimpanItem() {
        console.log($('#formTambahItemToko').serialize());
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
                        url: '<?= base_url('item/simpan'); ?>',
                        dataType: 'json',
                        data: $('#formTambahItemToko').serialize(),
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



    function btnSimpanMulti() {
    if (!window.File || !window.FileReader || !window.FileList || !window.Blob) {
        return Swal.fire('Oops!', 'File API tidak sepenuhnya didukung di browser ini.', 'warning');
    }

    let input = document.getElementById('formFile');
    if (!input) {
        return Swal.fire('Oops!', 'tidak dapat menemukan elemen fileinput', 'warning');
    } else if (!input.files) {
        return Swal.fire('Oops!', 'Browser ini sepertinya tidak mendukung properti `files` dari input file.', 'warning');
    } else if (!input.files[0]) {
        return Swal.fire('Oops!', 'Harap pilih file sebelum mengklik', 'warning');
    } else {
        let formData = new FormData();
        formData.append('fileexcel', input.files[0]); // Append the file to the FormData

        Swal.fire({
            title: 'Apakah anda yakin?',
            html: "Pastikan data yang <i><u><b>diimport</b></u></i> sudah benar",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4B77BE',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Kembali',
            confirmButtonText: 'Iya, import!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url('item/save-multi'); ?>',
                    dataType: 'json',
                    data: formData,
                    processData: false,
                    contentType: false,
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
}

</script>