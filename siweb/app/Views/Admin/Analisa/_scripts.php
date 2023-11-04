<script>
    function btnAnalisa() {

        const fromDate = $('#fromDate').val();
        const toDate = $('#toDate').val();
        console.log(fromDate);
        if (fromDate === null ||fromDate === '') {
            return Swal.fire('Oops!', 'Silakan Pilih Tanggal Mulai', 'warning');
        }
        if (toDate === null ||toDate === '') {
            return Swal.fire('Oops!', 'Silakan Pilih Tanggal Akhir', 'warning');
        }
        if (fromDate > toDate) {
            return Swal.fire('Oops!', 'Tanggal mulai tidak boleh lebih besar dari tanggal akhir!', 'warning');
        }

        Swal.fire({
        title: 'Konfirmasi',
        text: 'Lakukan Analisa Apriori pada data penjualan tersebut?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Ya!',
        cancelButtonText: 'Batal'
        }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '<?= base_url('analisa/get-analisa'); ?>',
                        dataType: 'json',
                        data: 
                            {
                                tgl_awal: fromDate,
                                tgl_akhir: toDate,
                            },
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
</script>