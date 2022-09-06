<?php $this->load->view('element/head');?>
    <!-- Content Wrapper. Contains page content -->
    <?php if (empty($_SESSION['role'] == 1)) { ?>
        <script>
            alert('Role anda tidak diizinkan mengakses halaman ini!');
            window.location.href = "<?php echo site_url();?>";
        </script>
    <?php } ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Permintaan Detail
                <small>Detail Permintaan</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="nav nav-tabs">
                        <?php if (empty($_SESSION['role'] == 1)) { ?>
                        <li role="presentation"><a href="<?php echo site_url('permintaan/create');?>">Input Permintaan</a></li>
                        <?php } ?>
                        <li role="presentation" class="active"><a href="<?php echo site_url('permintaan');?>">List Permintaan</a></li>
                    </ul>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Permintaan Detail <?php echo $details[0]->id;?></h3>
                            <div class="pull-right">
                                <span><a href="<?php echo site_url('permintaan');?>" class="btn btn-sm btn-default">Back</a></span>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Permintaan ID</th>
                                    <th>Resto</th>
                                    <th>User</th>
                                    <th>Total Item</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $details[0]->id;?></td>
                                        <td><?php echo $details[0]->name_resto;?></td>
                                        <td><?php echo $details[0]->name;?></td>
                                        <td><?php echo $details[0]->total_item;?></td>
                                        <td><?php echo $details[0]->tgl;?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr />
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Konfirmasi Pengiriman Barang</h3>
                        </div>
                        <div class="box-body">
                            <form class="form-horizontal" method="POST" action="<?php echo site_url('permintaan/permintaan_process');?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Tgl. Pengiriman</label>
                                    <br>
                                    <input type="date" name="date_pengiriman" class="form-control" value="<?php echo date('Y-m-d');?>">
                                </div>
                            </div>
                            <input type="hidden" name="pengiriman_transaction" value="<?php echo $details[0]->id;?>">
                            <input type="hidden" name="id_resto" value="<?php echo $details[0]->id_resto;?>">
                            <input type="hidden" name="id_user" value="<?php echo $details[0]->id_user;?>">
                            <hr>
                            <div class="row" style="margin-top: 15px !important;">
                            <div class="col-md-6"><label>Product Name</label></div>
                            <div class="col-md-1"><label>Quantity</label></div>
                            <div class="col-md-1"><label>Unit</label></div>
                            <div class="col-md-1"><label>Stock</label></div>
                            <div class="col-md-3"><label>Confirm</label></div>
                            </div>
                            <?php if(isset($details) && is_array($details)){ ?>
                                <?php $nox=1;$noz=1; foreach($details as $transaksi){?>
                                    <div class="row" style="margin-bottom: 15px !important;">
                                    <div class="col-md-6">
                                    <input type="text" value="<?php echo $transaksi->product_name; ?>" class="form-control" disabled>
                                    <?php if ($transaksi->product_qty < 1) { ?>
                                    <input type="hidden" name="product_idxxx[]" value="<?php echo $transaksi->product_id; ?>" class="form-control">
                                    <?php } else {?>
                                    <input type="hidden" name="product_id[]" value="<?php echo $transaksi->product_id; ?>" class="form-control">
                                    <?php } ?>
                                    </div>
                                    <div class="col-md-1">
                                    <input type="number" value="<?php echo $transaksi->quantity; ?>" class="form-control" disabled>
                                    <input type="hidden"  name="qty[]" value="<?php echo $transaksi->product_qty; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-1">
                                    <input type="text" value="<?php echo $transaksi->name_satuan; ?>" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-1">
                                    <input type="text" value="<?php echo $transaksi->product_qty; ?>" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-3">
                                    <?php if ($transaksi->product_qty < 1) { ?>
                                    <input type="hidden" name="stok_habis[]" value="stok_habis">
                                    <span class="badge">Stok Gudang Utama Habis!</span>
                                    <input type="hidden" id="jml_qty_<?php echo $nox++;?>">
                                    <?php } else { ?>
                                    <input type="number" id="jml_qty_<?php echo $nox++;?>"  name="confirm_qty[]" max="<?php echo $transaksi->product_qty;?>" min="1" class="form-control" oninput="runx_<?php echo $noz++;?>();">
                                    <?php } ?>
                                    </div>
                                    </div>
                                    <?php } ?>
                                <?php } ?>
                                <div class="row">
                                    <div class="col-md-12 pull-right" style="margin-top: 20px !important;">
                                        <button type="submit" class="btn btn-primary form-control">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
    <?php $no=1; $nop=1; foreach($details as $transaksi) {?>
        function runx_<?php echo $no++; ?>(){
          var con = document.getElementById("jml_qty_<?php echo $nop++;?>").value;
          if (con > <?php echo $transaksi->product_qty;?> ) {
            alert('Jumlah Barang Input Melebihi Total Qty Stok Barang Gudang Utama!');
            // location.reload();
          }
        //   if (con == 0 ) {
        //     alert('Jumlah Barang Input Tidak Boleh Kosong!');
        //     location.reload();
        //   }
        }
        <?php } ?>
    </script>
<?php $this->load->view('element/footer');?>