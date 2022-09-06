<?php $this->load->view('element/head');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" xmlns="http://www.w3.org/1999/html">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Barang Form
        <small>List Barang</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
	
      <div class="row">
        <div class="col-xs-12">
          <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="<?php echo site_url('barang/create');?>">Input Barang</a></li>
            <li role="presentation"><a href="<?php echo site_url('barang');?>">List Barang</a></li>
          </ul>
		  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Barang</h3>
              <?php if($this->session->flashdata('form_false')){?>
                <div class="alert alert-danger text-center">
                  <strong><?php echo $this->session->flashdata('form_false');?></strong>
                </div>
              <?php } ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php if(!empty($produk)){?>
            <form class="form-horizontal" method="POST" action="<?php echo site_url('barang/save').'/'.$produk['id'];?>">
            <?php }else{?>
            <form class="form-horizontal" method="POST" action="<?php echo site_url('barang/save');?>">
            <?php } ?>
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="kode">Kode Barang</label>
                    <div class="col-sm-8">
                    <input type="hidden" name="user" value="<?php echo $_SESSION['id']; ?>">
                      <input type="text" name="kode_barang" value="<?php echo !empty($produk) ? $produk['id'] : '';?>" id="kode_barang" class="form-control" placeholder="Kode Barang"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="name">Nama Barang</label>
                    <div class="col-sm-8">
                      <input type="text" value="<?php echo !empty($produk) ? $produk['product_name'] : '';?>" name="product_name" placeholder="Nama Barang" id="name" class="form-control" required/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group" style="display: none;">
                    <label class="col-sm-4 control-label" for="date">Tanggal</label>
                    <div class="col-sm-8">
                      <input type="text" value="<?php echo !empty($produk) ? $produk['date'] : date('Y-m-d H:i:s');?>" id="date" class="form-control" disabled/>
                      <input type="hidden" name="product_date" value="<?php echo !empty($produk) ? $produk['date'] : date('Y-m-d H:i:s');?>" id="product_date" class="form-control"/>
                    </div>
                  </div>
                  <div class="form-group" style="display: none;">
                    <label class="col-sm-4 control-label" for="category_id">Kategori</label>
                    <div class="col-sm-8">
                      <select class="form-control" id="category_id" name="category_id">
                        <?php if(isset($category) && is_array($category)){?>
                          <?php foreach($category as $item){?>
                            <option value="<?php echo $item->id;?>" <?php if(!empty($produk) && $item->id == $produk['category_id']) echo 'selected="selected"';?>>
                              <?php echo $item->category_name;?>
                            </option>
                          <?php }?>
                        <?php }?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="satuan">Satuan</label>
                    <div class="col-sm-8">
                      <select class="form-control select2" id="satuan" name="code_satuan">
                        <option value="">== PILIH SATUAN ==</option>
                        <?php if(isset($satuan) && is_array($satuan)){?>
                          <?php foreach($satuan as $item){?>
                            <option value="<?php echo $item->code_satuan;?>" <?php if(!empty($produk) && $item->code_satuan == $produk['code_satuan']) echo 'selected="selected"';?>>
                              <?php echo $item->name_satuan;?>
                            </option>
                          <?php }?>
                          <?php }?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="satuan">Supplier</label>                    
                    <div class="col-sm-8">
                      <select class="form-control select2" id="code_supplier" name="code_supplier">
                        <option value="">== PILIH SUPPLIER ==</option>
                        <?php if(isset($supplier) && is_array($supplier)){?>
                          <?php foreach($supplier as $item){?>
                            <option value="<?php echo $item->id;?>" <?php if(!empty($produk) && $item->id == $produk['code_supplier']) echo 'selected="selected"';?>>
                              <?php echo $item->supplier_name;?>
                            </option>
                          <?php }?>
                          <?php }?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group" style="display: none;">
                    <label class="col-sm-2 control-label" for="address">Deskripsi</label>
                    <div class="col-sm-10">
                      <!-- <textarea name="product_desc" placeholder="Description" id="desc" class="form-control"/><?php echo !empty($produk) ? $produk['product_desc'] : '';?></textarea> -->
                      <input type="hidden" name="product_desc" value="0">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="address">Qty</label>
                    <div class="col-sm-10">
                      <input type="number" value="<?php echo !empty($produk) ? $produk['product_qty'] : '';?>" name="product_qty" placeholder="Quantity" id="qty" class="form-control"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="address">Harga</label>
                    <div class="col-sm-10">
                      <input type="text" value="<?php echo !empty($produk) ? $produk['sale_price'] : '';?>" name="sale_price" placeholder="Harga" id="sale" class="form-control" required/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6" style="display: none;">
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="address">Harga Type 1</label>
                    <div class="col-sm-8">
                      <input type="text" value="<?php echo !empty($produk) ? $produk['sale_price_type1'] : '';?>" name="sale_price_type1" placeholder="Product Sale type 1" id="product_sale_type1" class="form-control"/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6" style="display: none;">
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="address">Harga Type 2</label>
                    <div class="col-sm-8">
                      <input type="text" value="<?php echo !empty($produk) ? $produk['sale_price_type2'] : '';?>" name="sale_price_type2" placeholder="Product Sale type 2" id="product_sale_type2" class="form-control"/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6" style="display: none;">
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="address">Harga Type 3</label>
                    <div class="col-sm-8">
                      <input type="text" value="<?php echo !empty($produk) ? $produk['sale_price_type3'] : '';?>" name="sale_price_type3" placeholder="Product Sale type 3" id="product_sale_type3" class="form-control"/>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="col-md-3 col-md-offset-4">
                  <a class="btn btn-default" href="<?php echo site_url('barang');?>">Cancel</a>
                  <button class="btn btn-info pull-right" type="submit">Save</button>
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