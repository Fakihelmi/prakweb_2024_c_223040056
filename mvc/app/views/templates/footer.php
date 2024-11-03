<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="<?= BASEURL; ?>/js/bootsrap.js"></script>
<script src="<?= BASEURL; ?>/js/script.js"></script>
<script>
    $(document).ready(function() {
        // Event listener untuk tombol "Ubah"
        $('.tampilModalUbah').on('click', function() {
            const id = $(this).data('id');
            $.ajax({
                url: '<?= BASEURL; ?>/mahasiswa/getById/' + id,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#formModalLabel').text('Ubah Data Mahasiswa');
                    $('#id').val(data.id);
                    $('#nama').val(data.nama);
                    $('#nrp').val(data.nrp);
                    $('#email').val(data.email);
                    $('#jurusan').val(data.jurusan);
                }
            });
        });
    });
</script>
</body>

</html>