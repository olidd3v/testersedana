<?php $this->load->view('element/head');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" xmlns="http://www.w3.org/1999/html">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transaki Form
        <small>List Transaki</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Transaki Form</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	
      <div class="row">
        <div class="col-xs-12">
          <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="<?php echo site_url('transaksi/create');?>">Input Transaki</a></li>
            <li role="presentation"><a href="<?php echo site_url('transaksi');?>">List Transaki</a></li>
            <li role="presentation"><a href="<?php echo site_url('transaksi/report?search=true&date_from=&date_end=');?>">Report Transaksi</a></li>
          </ul>
		  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Transaki</h3>
              <?php if($this->session->flashdata('form_false')){?>
                <div class="alert alert-danger text-center">
                  <strong><?php echo $this->session->flashdata('form_false');?></strong>
                </div>
              <?php } ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php if(!empty($transaksi)){?>
            <form id="transaction-form" class="form-horizontal" method="POST" action="<?php echo site_url('transaksi/update').'/'.$transaksi[0]->id;?>">
            <?php }else{?>
            <form id="transaction-form" class="form-horizontal" method="POST" action="<?php echo site_url('transaksi/add_process');?>">
            <?php } ?>
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="kode">Kode Transaksi</label>
                    <div class="col-sm-8">
                      <input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['id']; ?>">
                      <input data-attr="" type="text" name="transaction_id" data-origin="<?php echo !empty($code_pembelian) ? $code_pembelian : '';?>" value="<?php echo !empty($code_pembelian) ? $code_pembelian : '';?>" id="kode_transaksi" class="form-control" disabled/>
                      <input data-attr="" type="hidden" name="transaction_id" data-origin="<?php echo !empty($code_pembelian) ? $code_pembelian : '';?>" value="<?php echo !empty($code_pembelian) ? $code_pembelian : '';?>" id="kode_transaksi" class="form-control" required/>
                      <span class="help-inline label label-danger" id="status_kode"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="category_id">Supplier</label>
                    <div class="col-sm-8">
                      <select class="form-control select2" id="supplier_id" name="supplier_id" required="required">
                        <option value="">== PILIH SUPPLIER  ==</option>
                      <?php if(isset($suppliers) && is_array($suppliers)){?>
                        <?php foreach($suppliers as $item){?>
                            <option value="<?php echo $item->id;?>" <?php if(!empty($transaksi) && $item->id == $transaksi[0]->supplier_id) echo 'selected="selected"';?>>
                              <?php echo $item->supplier_name;?>
                            </option>
                        <?php }?>
                      <?php }?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="date">Tanggal Pembelian</label>
                    <div class="col-sm-8">
                      <!-- <input type="text" value="<?php echo date('Y-m-d');?>" id="date" class="form-control" disabled/> -->
                      <input type="date" name="date" id="date" value="<?php echo date('Y-m-d');?>" class="form-control"/>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <h3 class="content-title">Informasi Barang</h3>
                  <div class="content-process">
                    <table class="table">
                      <thead>
                        <tr>
                          <td style="display: none;">Kategori</td>
                          <td>Nama Barang</td>
                          <td>Jumlah</td>
                          <td style="display: none;">Harga Beli Satuan</td>
                          <td style="display: none;">Disc 1</td>
                          <td style="display: none;">Disc 2</td>
                          <td style="display: none;">Disc 3</td>
                          <td>Harga Satuan</td>
                          <td>Input Barang</td>
                        </tr>
                      </thead>
                      <tbody id="transaksi-item">
                        <tr>
                          <td style="display: none;">
                            <select class="form-control" id="transaksi_category_id" name="category_id">
                              <option value="0">
                                Please select one
                              </option>
                              <?php if(isset($kategoris) && is_array($kategoris)){?>
                                <?php foreach($kategoris as $item){?>
                                  <option value="<?php echo $item->id;?>">
                                    <?php echo $item->category_name;?>
                                  </option>
                                <?php }?>
                              <?php }?>
                            </select>
                          </td>
                          <td>
                            <select class="form-control select2" id="transaksi_product_id" name="product_id">
                            <option value="0">
                                Please select one
                              </option>  
                            <?php if(isset($produks) && is_array($produks)){?>
                                <?php foreach($produks as $item){?>
                                  <option value="<?php echo $item->id;?>">
                                    <?php echo $item->product_name." (Stok: ".$item->product_qty.$item->name_satuan.")";?>
                                  </option>
                                <?php }?>
                              <?php }?>
                            </select>
                          </td>
                          <td>
                            <input type="number" id="jumlah" class="form-control" name="jumlah" min="1" value="1"/>
                          </td>
                          <td>
                            <input type="text" class="form-control form-price-format discount-trx" data-attr="0" id="sale_price" name="sale_price" placeholder="Harga" required autocomplete="off"/>
                          </td>

                          <td style="display: none;">
                            <input type="number" value="0" min="0" max="100" class="form-control discount-trx" data-attr="1" id="disc_1" name="disc_1" placeholder="Diskon 1" disabled/>
                          </td>
                          <td style="display: none;">
                            <input type="number" value="0" min="0" max="100" class="form-control discount-trx" data-attr="2" id="disc_2" name="disc_2" placeholder="Diskon 2" disabled/>
                          </td>
                          <td style="display: none;">
                            <input type="number" value="0" min="0" max="100" class="form-control discount-trx" data-attr="3" id="disc_3" name="disc_3" placeholder="Diskon 3" disabled/>
                          </td>
                          <td style="display: none;">
                            <input type="text" class="form-control" id="harga_satuan_net" name="harga_satuan_net" placeholder="Harga Satuan Net"/>
                          </td>

                          <td>
                            <a href="#" class="btn btn-primary form-control" id="tambah-barang">Input Barang</a>
                          </td>
                        </tr>
                        <?php if(!empty($carts) && is_array($carts)){?>
                            <?php foreach($carts['data'] as $k => $cart){?>
                              <tr id="<?php echo $k;?>" class="cart-value">
                                <td><?php echo $cart['category_name'];?></td>
                                <td><?php echo $cart['name'];?></td>
                                <td><?php echo $cart['qty'];?></td>
                                <td>Rp<?php echo number_format($cart['price']);?></td>
                                <td><span class="btn btn-danger btn-sm transaksi-delete-item" data-cart="<?php echo $k;?>">x</span></td>
                              </tr>
                            <?php }?>
                        <?php }?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="2">Total Pembelian</th>
                          <th colspan="2" id="total-pembelian"><?php echo !empty($carts) ? 'Rp'.number_format($carts['total_price']) : '';?></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="col-md-3 col-md-offset-4">
                  <a class="btn btn-default" href="<?php echo site_url('transaksi');?>">Cancel</a>
                  <a class="btn btn-info pull-right" href="#" id="submit-transaksi">Submit</a>
                </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
		</div>
        <!-- /.col -->
      </div>
	  <!-- row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('element/footer');?>