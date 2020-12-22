<div class="page-header">
  <h3>Dashboard</h3>
</div>
<div class="row">
  <div class="col-lg-3 col-md-6">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="glyphicon glyphiconfolder-open"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge">
              <font size="18"><b><?php echo $this->M_perpus->get_data('buku')->num_rows(); ?></b></font>
            </div>
            <div><b>Jumlah Buku yang terdaftar</b></div>
          </div>
        </div>
      </div>
      <a href="<?php echo base_url() . 'member/buku' ?>">
        <div class="panel-footer">
          <span class="pull-left">View Details</span>
          <span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>



  <div class="col-lg-3 col-md-6">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="glyphicon glyphiconsort"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge">
              <font size="18"><b><?php echo $this->M_perpus->edit_data(array('status_peminjaman' => 0), 'transaksi')->num_rows(); ?></b></font>
            </div>
            <div><b>Peminjaman belum selesai</b></div>
          </div>
        </div>
      </div>
      <a href="<?php echo base_url() . 'member/peminjaman' ?>">
        <div class="panel-footer">
          <span class="pull-left">View Details</span>
          <span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>

  <div class="col-lg-3 col-md-6">
    <div class="panel panel-danger">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="glyphicon glyphiconok"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge">
              <font size="18"><b><?php echo $this->M_perpus->edit_data(array('status_peminjaman' => 1), 'transaksi')->num_rows(); ?></b></font>
            </div>
            <div><b>Peminjaman Sudah selesai ok</b></div>
          </div>
        </div>
      </div>
      <a href="<?php echo base_url() . 'member/peminjaman' ?>">
        <div class="panel-footer">
          <span class="pull-left">View Details</span>
          <span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>
</div>

<hr>

<div class="row">
  <div class="col-lg-4">
    <div class="panel panel-deafult">
      <div class="panel-heading">
        <h3 class="panel-title" style="font-size:18px;font-weight:bold;"><i class="glyphicon glyphicon-random arrow-right"></i> Buku</h3>
      </div>
      <div class="panel-body">
        <div class="list-group">
          <?php foreach ($buku as $b) { ?>
            <a href="#" class="list-group-item">
              <span class="badge"><?php if ($b->status_buku == 1) {
                                    echo "Tersedia";
                                  } else {
                                    echo "Dipinjam";
                                  } ?></span>
              <i class="glyphicon glyphiconuser"></i><?php echo $b->judul_buku; ?>
            </a>
          <?php } ?>
        </div>
        <div class="text-right">
          <a href="<?php echo base_url() . 'member/buku' ?>">Lihat Semua Buku <i class="glyphicon glyphicon-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </div>

  <!-- /.row -->
</div>