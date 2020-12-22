<div class="page-header">
    <h3>Transaksi Baru</h3>
</div>
<form action="<?php echo
                    base_url() . 'member/tambah_peminjaman_act' ?>" method="post">

    <div class="form-group">
        <label>Buku</label>
        <input type="hidden" name="id_buku" value="<?php echo $buku->id_buku ?>">
        <input class="form-control" readonly="" type="text" name="judul_buku" value="<?php echo $buku->judul_buku ?>">
        <?php echo form_error('buku'); ?>
    </div>
    <div class="form-group">
        <label>Tanggal Pinjam</label>
        <input type="date" name="tgl_pinjam" class="form-control">
        <?php echo form_error('tgl_pinjam'); ?>
    </div>
    <div class="form-group">
        <label>Tanggal Kembali</label>
        <input type="date" name="tgl_kembali" class="form-control">
        <?php echo form_error('tgl_kembali'); ?>
    </div>

    <div class="form-group">
        <input type="submit" value="Simpan" class="btn
btn-primary btn-sm">
    </div>
</form>