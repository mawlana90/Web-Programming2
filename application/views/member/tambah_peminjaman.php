<div class="page-header">
    <h3>Transaksi Baru</h3>
</div>
<form action="<?php echo
                    base_url() . 'member/tambah_peminjaman_act' ?>" method="post">
    <div class="form-group">
        <label>Anggota</label>
        <input type="text" name="anggota" value="<?php echo $this->session->userdata('nama_agt')  ?>" class="form-control"></input>

        <?php echo form_error('anggota'); ?>
    </div>
    <div class="form-group">
        <label>Buku</label>
        <select name="buku" class="form-control">
            <option value="">-Pilih Buku-</option>
            <?php foreach ($buku as $b) { ?>
                <option value="<?php echo
                                    $b->id_buku; ?>"><?php echo
                                                            $b->judul_buku; ?></option>
            <?php } ?>
        </select>
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