<?php $this->load->view('element/head');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" xmlns="http://www.w3.org/1999/html">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Menu Form
        <small>List Menu</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
	
      <div class="row">
        <div class="col-xs-12">
          <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="<?php echo site_url('menu/create');?>">Input Menu</a></li>
            <li role="presentation"><a href="<?php echo site_url('menu');?>">List Menu</a></li>
          </ul>
		  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Menu</h3>
              <?php if($this->session->flashdata('form_false')){?>
                <div class="alert alert-danger text-center">
                  <strong><?php echo $this->session->flashdata('form_false');?></strong>
                </div>
              <?php } ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php if(!empty($produk)){?>
            <form class="form-horizontal" method="POST" action="<?php echo site_url('menu/save').'/'.$produk['id'];?>">
            <?php }else{?>
            <form class="form-horizontal" method="POST" action="<?php echo site_url('menu/save');?>">
            <?php } ?>
              <div class="box-body">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="address">Kode Menu</label>
                    <div class="col-sm-10">
                    <input type="hidden" name="kode_menu" value="<?php echo $_SESSION['kd_menu']; ?>">
                    <input type="text" name="kode_menu" value="<?php echo !empty($produk) ? $produk['kd_menu'] : '';?>" id="kode_menu" class="form-control" placeholder="Kode Menu"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="address">Nama Menu</label>
                    <div class="col-sm-10">
                    <input type="text" value="<?php echo !empty($produk) ? $produk['nama_menu'] : '';?>" name="nama_menu" placeholder="Nama Menu" id="name" class="form-control" required/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="address">Harga Pokok</label>
                    <div class="col-sm-10">
                      <input type="number" value="<?php echo !empty($produk) ? $produk['harga_pokok'] : '';?>" name="harga_pokok" placeholder="Harga Pokok" id="qty" class="form-control"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="address">Harga Jual</label>
                    <div class="col-sm-10">
                      <input type="text" value="<?php echo !empty($produk) ? $produk['harga_jual'] : '';?>" name="harga_jual" placeholder="Harga Jual" id="sale" class="form-control" required/>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="col-md-3 col-md-offset-4">
                  <a class="btn btn-default" href="<?php echo site_url('menu');?>">Cancel</a>
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