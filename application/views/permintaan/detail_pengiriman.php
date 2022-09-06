<?php $this->load->view('element/head');?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Pengiriman Detail
                <small>Detail Pengiriman</small>
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
                        <li role="presentation"><a href="<?php echo site_url('permintaan');?>">List Permintaan</a></li>
                        <li role="presentation" class="active"><a href="<?php echo site_url('permintaan/pengiriman');?>">List Pengiriman</a></li>
                    </ul>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Pengiriman Detail <?php echo $details[0]->id;?></h3>
                            <div class="pull-right">
                                <span><a href="<?php echo site_url('permintaan/pengiriman');?>" class="btn btn-sm btn-default">Back</a></span>
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
                            <h4 class="alert alert-danger">Permintaan Data</h4>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Unit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if(isset($details) && is_array($details)){ ?>
                                    <?php foreach($details as $transaksi){?>
                                        <tr>
                                            <td><?php echo $transaksi->product_name;?></td>
                                            <td><?php echo $transaksi->quantity;?></td>
                                            <td><?php echo $transaksi->name_satuan;?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                                </tbody>
                            </table>
                            <hr>
                            <h4 class="alert alert-success">Konfirmasi Pengiriman Data</h4>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Unit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if(isset($valid) && is_array($valid)){ ?>
                                    <?php foreach($valid as $transaksix){?>
                                        <tr>
                                        <td><?php echo $transaksix->product_name;?></td>
                                        <td><?php if (isset($transaksix->qty)) { echo $transaksix->qty;} else { echo " - ";}?></td>
                                        <td><?php echo $transaksix->name_satuan;?></td>
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