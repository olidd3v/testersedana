<?php $this->load->view('element/head');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" xmlns="http://www.w3.org/1999/html">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Penjualan Form
        <small>List Penjualan</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
	
      <div class="row">
        <div class="col-xs-12">
          <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="<?php echo site_url('sales/create');?>">Input Penjualan</a></li>
            <li role="presentation"><a href="<?php echo site_url('sales?page');?>">List Penjualan</a></li>
            <li role="presentation"><a href="<?php echo site_url('sales/report');?>">Report Penjualan</a></li>
          </ul>
		  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Penjualan</h3>
              <?php if($this->session->flashdata('form_false')){?>
                <div class="alert alert-danger text-center">
                  <strong><?php echo $this->session->flashdata('form_false');?></strong>
                </div>
              <?php } ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php if(!empty($penjualan)){?>
            <form id="transaction-form" class="form-horizontal" method="POST" action="<?php echo site_url('sales/update').'/'.$penjualan[0]->id;?>">
            <?php }else{?>
            <form id="transaction-form" class="form-horizontal" method="POST" action="<?php echo site_url('sales/add_process');?>">
            <?php } ?>
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="kode">Kode Penjualan</label>
                    <div class="col-sm-8">
                      <input type="text" name="id" value="<?php echo !empty($code_penjualan) ? $code_penjualan : '';?>" class="form-control" disabled/>
                      <input type="hidden" name="penjualan_id" id="penjualan_id" value="<?php echo !empty($code_penjualan) ? $code_penjualan : '';?>"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="id_user">Resto</label>
                    <div class="col-sm-8">
                      <?php if(isset($resto) && is_array($resto)){?>
                      <?php foreach($resto as $item){?>
                        <?php if ($user[0]['code_resto'] == $item->code_resto) {?>
                      <input type="hidden" class="form-control" id="customer_id" value="<?php echo $item->id_user;?>" name="customer_id">
                      <input type="text"  value="<?php echo $item->name_resto;?>" class="form-control" disabled />
                      <input type="hidden" name="id_resto" value="<?php echo $item->id;?>" class="form-control"/>
                      <input type="hidden" value="<?php echo $_SESSION['id'];?>" name="id_user" id="id_user" class="form-control" />
                      <?php }?>
                      <?php }?>
                      <?php }?>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="date">Tanggal</label>
                    <div class="col-sm-8">
                      <input type="date" value="<?php echo date('Y-m-d');?>" id="date" name="date" class="form-control"/>
                    </div>
                  </div>
                  <div class="form-group" style="display: none;">
                    <label class="col-sm-4 control-label" for="category_id">Metode Pembayaran</label>
                    <div class="col-sm-8">
                      <select class="form-control" id="is_cash" name="is_cash">
                        <option value="1" <?php if(!empty($penjualan) && $penjualan[0]->is_cash == true) echo 'selected="selected"';?>>
                          Cash
                        </option>
                        <option value="0" <?php if(!empty($penjualan) && $penjualan[0]->is_cash == false) echo 'selected="selected"';?>>
                          Debit
                        </option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-11 col-md-offset-1">
                  <h3 class="content-title">Informasi Barang</h3>
                  <div class="content-process">
                    <table class="table table-striped">
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
                    <div id="dynamic-container">
                    </div>
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
                  <a class="btn btn-default" href="<?php echo site_url('sales?page');?>">Cancel</a>
                  <button type="submit" class="btn btn-info pull-right">Submit</a>
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
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <script>
    $(function() {

  $("#test").on("click", function() {
    $("#dynamic-container").append($("<po><select class='form-control select2' name='product_id[]' style='width: 350px;'><option value='0'>Please select one</option><?php if(isset($produks) && is_array($produks)){?><?php foreach($produks as $item){?><option value='<?php echo $item->id;?>'><?php echo $item->nama_menu;?></option><?php }?><?php }?></select><input type='number' class='form-control' name='jumlah[]' min='1' value='0' style='margin-left: 90px;'/><button type='button' class='remove-field btn btn-danger' style='float: right; margin-right: 150px;'>Delete Menu</button><br><br></po>"));
    // $("select").addClass("select2");
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
            if (elm && elm.nodeName === "select2") {
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