<script>
    function btnAnalisa() {
        const fromDate   = $('#fromDate').val();
        const toDate     = $('#toDate').val();
        const minSupport = $('#minSupport').val();
        if (fromDate === null ||fromDate === '') {
            return Swal.fire('Oops!', 'Silakan Pilih Tanggal Mulai', 'warning');
        }
        if (toDate === null ||toDate === '') {
            return Swal.fire('Oops!', 'Silakan Pilih Tanggal Akhir', 'warning');
        }
        if (fromDate > toDate) {
            return Swal.fire('Oops!', 'Tanggal mulai tidak boleh lebih besar dari tanggal akhir!', 'warning');
        }
        if (minSupport < 1 || minSupport > 100) {
            return Swal.fire('Oops!', 'Min support tidak valid!', 'warning');
        }
        Swal.fire({
        title: 'Konfirmasi',
        text: 'Lakukan Analisa Apriori pada data penjualan tersebut?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Ya!',
        cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) 
                {
                    $.ajax({
                        type: 'POST',
                        url: '<?= base_url('analisa/get-analisa'); ?>', // Corrected URL for the controller method
                        dataType: 'html',
                        data: {
                            tgl_awal: fromDate,
                            tgl_akhir: toDate,
                            min_support: minSupport
                        },
                        beforeSend:function() {
                            $("#dataAnalisa").hide();
                            $("#gambar1").show();
                            $("#processingResults").removeAttr("hidden");
                            $("#btnFitlerAnalisa").attr("disabled", true);
                        },
                        complete:function() {
                            $("#gambar1").hide();
                            $("#processingResults").attr("hidden", true); 
                            $("#dataAnalisa").show();
                            $("#btnFitlerAnalisa").removeAttr("disabled");
                        },
                        success: function(result) {
                            $('#dataAnalisa').html(result); 
                            feather.replace();
                            $('#tabelAnalisa').DataTable({
                                "destroy": true,
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                } 
});

}
</script>