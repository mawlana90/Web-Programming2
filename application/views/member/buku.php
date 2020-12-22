<div class="page-header">
    <h3>Data Buku</h3>
</div>
<a href="<?php echo base_url() . 'admin/tambah_buku'; ?>"></a>
<br><br>
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover" id="table-datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>ISBN</th>
                <th>Lokasi</th>
                <th>Status</th>
                <th>Pilihan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($buku as $b) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><img src="<?php echo base_url() . '/assets/upload/' . $b->gambar; ?>" width="80" height="80" alt="gambar tidak ada"></td>
                    <td><?php echo $b->judul_buku ?></td>
                    <td><?php echo $b->pengarang ?></td>
                    <td><?php echo $b->penerbit ?></td>
                    <td><?php echo $b->thn_terbit ?></td>
                    <td><?php echo $b->isbn ?></td>
                    <td><?php echo $b->lokasi ?></td>
                    <td>
                        <?php
                        if ($b->status_buku == "1") {
                            echo "Tersedia";
                        } else if ($b->status_buku == "0") {
                            echo "Sedang dipinjam";
                        }
                        ?>
                    </td>
                    <td nowrap="nowrap">
                        <a class="btn btn-primary btn-xs" href="<?php echo base_url() . 'member/pinjam_buku/' . $b->id_buku; ?>"><span class="glyphicon glyphicon-book"> Pinjam Buku</span></a>

                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>