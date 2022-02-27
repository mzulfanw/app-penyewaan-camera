<?= $this->extend('Admin/Layouts/header')   ?>
<?= $this->section('content')  ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            Form Tambah Barang
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger" role="alert">
                    <h4>Periksa Kembali Form</h4>
                    </hr />
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <form method="POST" action="<?= base_url() ?>/admin/barang/store" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Barang *</label>
                    <input type="text" class="form-control" name="nama_barang" placeholder="Masukan Nama Barang" value="<?= old('nama_barang'); ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Harga *</label>
                    <input type="text" id="harga" class="form-control" name="harga" placeholder="Masukan Harga" value="<?= old('harga'); ?>">
                </div>
                <div class="mb-3">
                    <label for="berkas" class="form-label">Gambar *</label>
                    <input type="file" class="form-control" id="berkas" name="gambar">
                </div>
                <select class="form-select" name="kategori_id" aria-label="Default select example">
                    <option selected>-- Pilih Kategori --</option>
                    <?php foreach ($kategori as $k) : ?>
                        <option value="<?= $k['id'] ?>"><?= $k['nama_kategori'] ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="mb-3">
                    <label for="" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="keterangan" name="deskripsi" rows="3"><?= old('deskripsi'); ?></textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary btn-sm" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    let harga = document.getElementById('harga')

    harga.addEventListener('keyup', function(e) {
        harga.value = formatRupiah(this.value)
    })

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>

<?= $this->endSection() ?>