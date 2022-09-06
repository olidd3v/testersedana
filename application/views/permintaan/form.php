<?php $this->load->view('element/head');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" xmlns="http://www.w3.org/1999/html">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Permintaan Form
        <small>List Permintaan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Permintaan Form</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content --->
    <section class="content">
	
      <div class="row">
        <div class="col-xs-12">
          <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="<?php echo site_url('permintaan/create');?>">Input Permintaan</a></li>
            <li role="presentation"><a href="<?php echo site_url('permintaan');?>">List Permintaan</a></li>
            <li role="presentation"><a href="<?php echo site_url('permintaan/pengiriman');?>">List Pengiriman</a></li>
            <!-- <li role="presentation"><a href="<?php echo site_url('permintaan/report?search=true&date_from=&date_end=');?>">Report Transaksi</a></li> -->
          </ul>
		  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Permintaan</h3>
              <?php if($this->session->flashdata('form_false')){?>
                <div class="alert alert-danger text-center">
                  <strong><?php echo $this->session->flashdata('form_false');?></strong>
                </div>
              <?php } ?>
              <div class="box-body">
            <!-- /.box-header -->
            <!-- form start -->
            <?php if(!empty($transaksi)){?>
            <form id="transaction-form" class="form-horizontal" method="POST" action="<?php echo site_url('permintaan/update').'/'.$transaksi[0]->id;?>">
            <?php }else{?>
            <form id="transaction-form" class="form-horizontal" method="POST" action="<?php echo site_url('permintaan/add_process');?>">
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
                    <label class="col-sm-4 control-label">Resto</label>
                    <div class="col-sm-8">
                      <?php if(isset($resto) && is_array($resto)){?>
                      <?php foreach($resto as $item){?>
                        <?php if ($user[0]['code_resto'] == $item->code_resto) {?>
                      <input type="text"  value="<?php echo $item->name_resto;?>" class="form-control" disabled />
                      <input type="hidden" name="id_resto"  value="<?php echo $item->id;?>" class="form-control"/>
                      <?php }?>
                      <?php }?>
                      <?php }?>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="date">Tanggal Permintaan</label>
                    <div class="col-sm-8">
                      <!-- <input type="text" value="<?php echo date('Y-m-d');?>" id="date" class="form-control" disabled/> -->
                      <input type="date" name="date" id="date" value="<?php echo date('Y-m-d');?>" class="form-control"/>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <h3 class="content-title">Informasi Permintaan Stok Barang</h3>
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
                          <!-- <td>Harga Satuan</td> -->
                          <td style="text-align: center;">Delete Barang</td>
                        </tr>
                      </thead>
                      <tbody>
                    <tr>
                        <td colspan="3">
                        <div class="multi-field-wrapper">
                    <!-- <button type="button" class="add-field btn btn-success">Tambah Item</button> -->
                    <button type="button" id="test" class="btn btn-success">Tambah Item</button>
                    <br><br>
                    <div class="multi-fields form-inline">
                    <div class="multi-field" style="margin-bottom: 15px;">
                    <div id="dynamic-container"></div>
                    </div>
                    </div>
                    </div>
                        </td>
                    </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="col-md-3 col-md-offset-4">
                  <a class="btn btn-default" href="<?php echo site_url('transaksi');?>">Cancel</a>
                  <button type="submit" class="btn btn-info pull-right" href="#">Submit</button>
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
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script>
    $(function() {
  $("#test").on("click", function() {
    $("#dynamic-container").append($("<po><select class='form-control select2' name='product_id[]' style='width: 350px;'><option value='0'>Please select one</option><?php if(isset($produks) && is_array($produks)){?><?php foreach($produks as $item){?><option value='<?php echo $item->id;?>'><?php echo $item->product_name.' - '.$item->name_satuan;?></option><?php }?><?php }?></select><input type='number' class='form-control' name='jumlah[]' min='1' value='0' style='margin-left: 90px;'/><button type='button' class='remove-field btn btn-danger' style='float: right; margin-right: 150px;'>Delete Barang</button><br><br></po>"));
  });

  $(document).on("click",".remove-field",function(){
    $(this).closest('po').remove()
    });

  // select the target node
  var target = document.getElementById('dynamic-container');

  if (target) {
    // create an observer instance
    var observer = new MutationObserver(function(mutations) {
      //loop through the detected mutations(added controls)
      mutations.forEach(function(mutation) {
      //addedNodes contains all detected new controls
        if (mutation && mutation.addedNodes) {
          mutation.addedNodes.forEach(function(elm) {
          //only apply select2 to select elements
            if (elm && elm.nodeName === "SELECT") {
              $(elm).select2();
            }
          });
        }
      });
    }); 
    
    // pass in the target node, as well as the observer options
    observer.observe(target, {
      childList: true
    });

    // later, you can stop observing
    //observer.disconnect();
  }
});
  </script>
<?php $this->load->view('element/footer');?>