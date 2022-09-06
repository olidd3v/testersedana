<?php $this->load->view('element/head');?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Menu Index
                <small>List Menu</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="nav nav-tabs">
                        <li role="presentation"><a href="<?php echo site_url('menu/create');?>">Input Menu</a></li>
                        <li role="presentation" class="active"><a href="<?php echo site_url('menu');?>">List Menu</a></li>
                    </ul>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Table Menu</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form action="<?php echo site_url('menu?search=true');?>" method="GET">
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
                                    <th>Kode Menu</th>
                                    <th>Nama Menu</th>
                                    <th>Harga Pokok</th>
                                    <th>Harga Jual</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(isset($produks) && is_array($produks)){ ?>
                                    <?php foreach($produks as $produk){?>
                                        <tr>
                                            <td><?php echo $produk->kd_menu;?></td>
                                            <td><?php echo $produk->nama_menu;?></td>
                                            <td><?php echo "Rp".number_format($produk->harga_pokok);?></td>
                                            <td><?php echo "Rp".number_format($produk->harga_jual);?></td>
                                            <td>
                                                <a href="<?php echo site_url('menu/edit').'/'.$produk->id;?>" class="btn btn-xs btn-primary">Edit</a>
                                                <a onclick="return confirm('Anda yakin hapus menu ini?');" href="<?php echo site_url('menu/delete').'/'.$produk->id;?>" class="btn btn-xs btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                  <!--  <th>Kode</th>
                                    <th>Nama Produk</th>
                                    <th>Deskripsi</th>
                                    <th>QTY</th>
                                    <th>Price</th>
                                    <th>Price 1</th>
                                    <th>Price 2</th>
                                    <th>Price 3</th>
                                    <th>Action</th> -->
                                </tr>
                                </tfoot>
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