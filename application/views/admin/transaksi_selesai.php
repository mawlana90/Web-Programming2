<div class="page-header">
    <h3>Transaksi Baru</h3>
</div>
<form action="<?php echo
                    base_url() . 'admin/transaksi_selesai_act' ?>" method="post">
    <div class="form-group">
        <label>Anggota</label>
        <input type="text" class="form-control" value="<?php echo $peminjaman->nama_anggota ?>">
        <?php echo form_error('anggota'); ?>
    </div>
    <div class="form-group">
        <label>Buku</label>
        <input type="text" class="form-control" value="<?php echo $peminjaman->judul_buku ?>">
        <?php echo form_error('buku'); ?>
    </div>
    <div class="form-group">
        <label>Tanggal Pinjam</label>
        <input type="date" name="tgl_pinjam" value="<?php echo $peminjaman->tgl_pinjam ?>" class="form-control">
        <?php echo form_error('tgl_pinjam'); ?>
    </div>
    <div class="form-group">
        <label>Tanggal Kembali</label>
        <input type="date" name="tgl_kembali" value="<?php echo $peminjaman->tgl_kembali ?>" class="form-control">
        <?php echo form_error('tgl_kembali'); ?>
    </div>
    <div class="form-group">
        <label>Tanggal Pengembalian</label>
        <input type="date" name="pengembalian" class="form-control">
        <?php echo form_error('denda'); ?>
    </div>
    <div class="form-group">
        <input type="submit" value="Simpan" class="btn
btn-primary btn-sm">
    </div>
    <input type="hidden" name="id" value="<?php echo $peminjaman->id_pinjam ?>">
    <input type="hidden" name="denda" value="<?php echo $peminjaman->denda ?>">
</form>