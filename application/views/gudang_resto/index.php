<?php $this->load->view('element/head');?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Gudang Resto
                <small>List Barang</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="nav nav-tabs">
                        <li role="presentation" class="active"><a href="<?php echo site_url('gudang');?>">List Barang</a></li>
                    </ul>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Table Barang</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form action="<?php echo site_url('gudang?search=true');?>" method="GET">
                                <input type="hidden" class="form-control" name="search" value="true"/>
                                <div class="box-body pad">
                                    <?php echo search_form('product');?>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="submit">&nbsp</label>
                                            <input type="submit" value="Cari" class="form-control btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Barang</th>
                                    <th>Satuan</th>
                                    <th>QTY</th>
                                    <th>Harga</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(isset($user) && is_array($user)){ ?>
                                <?php foreach($user as $user){?>
                                <?php if(isset($produks) && is_array($produks)){ ?>
                                    <?php foreach($produks as $produk){?>
                                        <?php if ($user['code_resto'] == $produk->code_resto) { ?>
                                            <tr>
                                            <td><?php echo $produk->id;?></td>
                                            <td><?php echo $produk->product_name;?></td>
                                            <td><?php echo $produk->name_satuan;?></td>
                                            <td><?php echo $produk->qty_gudang_resto_fix;?></td>
                                            <td><?php echo "Rp".number_format($produk->sale_price);?></td>
                                            </tr>
                                    <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="text-center">
                            <?php echo $paggination;?>
                        </div>
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