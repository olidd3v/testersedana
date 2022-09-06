<?php $this->load->view('element/head');?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Transaksi Penjualan Detail
                <small>Detail</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="nav nav-tabs">
                        <li role="presentation"><a href="<?php echo site_url('sales/create');?>">Input Penjualan</a></li>
                        <li role="presentation" class="active"><a href="<?php echo site_url('sales');?>">List Penjualan</a></li>
                        <li role="presentation"><a href="<?php echo site_url('sales/report');?>">Report Penjualan</a></li>
                    </ul>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Transaksi Detail <?php echo $details[0]->id;?></h3>
                            <div class="pull-right">
                                <span><a href="<?php echo site_url('sales');?>" class="btn btn-sm btn-default">Back</a></span>
                                <!-- <span><a href="<?php echo site_url('pemakaian/print_now').'/'.$details[0]->id;?>" class="btn btn-sm btn-primary btnPrint"><i class="fa fa-print"></i> Print</a></span> -->
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Transaction ID</th>
                                    <th>Total Item</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $details[0]->id;?></td>
                                        <td><?php echo $details[0]->total_item;?></td>
                                        <td><?php echo $details[0]->date;?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr />
                            <h4>Transaction Data</h4>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama Menu</th>
                                        <th>Qty</th>
                                        <th>Harga Pokok</th>
                                        <th>Harga Jual</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if(isset($details) && is_array($details)){ ?>
                                    <?php foreach($details as $transaksi){?>
                                        <tr>
                                            <td><?php echo $transaksi->nama_menu;?></td>
                                            <td><?php echo $transaksi->qty;?></td>
                                            <td>Rp<?php echo number_format($transaksi->harga_pokok);?></td>
                                            <td>Rp<?php echo number_format($transaksi->harga_jual);?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                                </tbody>

                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<?php $this->load->view('element/footer');?>