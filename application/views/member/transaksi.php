<div class="page-header">
    <h3>Data Transaksi</h3>
</div>
<a href="<?php echo
                base_url() . 'member/tambah_peminjaman'; ?>" class="btn
btn-primary btn-xs"><span class="glyphicon
glyphicon-plus"></span> Transaksi Baru</a>
<br><br>
<div class="table-responsive">
    <table class="table table-bordered table-striped
table-hover" id="table-datatable">
        <thead>
            <tr>
                <th>No</th>

                <th>Buku</th>
                <th>Tgl. Pinjam</th>
                <th>Tgl. Kembali</th>
                <th>Tgl. Dikembalikan</th>
                <th>Denda/Hari</th>
                <th>Total Denda</th>
                <th>Status Buku</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($transaksi as $t) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>

                    <td><?php echo $t->judul_buku ?></td>
                    <td><?php echo
                            date(
                                'd/m/Y',
                                strtotime($t->tgl_pinjam)
                            ); ?></td>
                    <td><?php echo
                            date(
                                'd/m/Y',
                                strtotime($t->tgl_kembali)
                            ); ?></td>
                    <td>
                        <?php
                        if ($t->tgl_pengembalian == "0000-00-00") {
                            echo "-";
                        } else {
                            echo
                                date(
                                    'd/m/Y',
                                    strtotime($t->tgl_pengembalian)
                                );
                        } ?>
                    </td>
                    <td>
                        <?php echo $t->denda; ?>
                    </td>
                    <td>
                        <?php echo "Rp. " . number_format($t->total_denda) . ",-"; ?></td>
                    <td>
                        <?php
                        if ($t->status_buku == "Selesai") {
                            echo "Selesai";
                        } else {
                            echo "-";
                        } ?>
                    </td>

                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>