<?php $this->load->view('element/head');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Transaksi Pembelian
        <small>List Transaksi</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <ul class="nav nav-tabs">
            <!-- <li role="presentation" class="active"><a href="<?php echo site_url('report?search=true&supplier_id=&date_from=&date_end=');?>">Report Pembelian</a></li> -->
            <li role="presentation"><a href="<?php echo site_url('report/pemakaian?search=true&supplier_id=&date_from=&date_end=');?>">Report Pemakaian</a></li>
          </ul>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table Pembelian</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="<?php echo site_url('report?search=true');?>" method="GET">
                <input type="hidden" class="form-control" name="search" value="true"/>
                <div class="box-body pad">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Resto</label>
                    <select name="resto_id" id="resto_id" class="form-control">
                      <option value="">== PILIH RESTO == </option>
                    <?php if(isset($resto) && is_array($resto)){?>
                        <?php foreach($resto as $item){?>
                            <option value="<?php echo $item->id_user;?>">
                              <?php echo $item->name_resto;?>
                            </option>
                        <?php }?>
                      <?php }?>
                    </select>
                  </div>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                    <label>Supplier</label>
                    <select name="supplier_id" id="supplier_id" class="form-control">
                      <option value="">== PILIH SUPPLIER == </option>
                    <?php if(isset($supplier) && is_array($supplier)){?>
                        <?php foreach($supplier as $item){?>
                            <option value="<?php echo $item->id;?>">
                              <?php echo $item->supplier_name;?>
                            </option>
                        <?php }?>
                      <?php }?>
                    </select>
                  </div>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                    <label>Barang</label>
                    <select name="produk_id" id="produk_id" class="form-control select2">
                      <option value="">== PILIH BARANG == </option>
                    <?php if(isset($product) && is_array($product)){?>
                        <?php foreach($product as $item){?>
                            <option value="<?php echo $item->id;?>">
                              <?php echo $item->product_name;?>
                            </option>
                        <?php }?>
                      <?php }?>
                    </select>
                  </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Date From</label>
                      <div class="input-group date">
                        <input type="text" class="form-control datepicker" name="date_from" value="<?php echo !empty($_GET['date_from']) ? $_GET['date_from'] : '';?>" autocomplete="off"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Date End</label>
                      <div class="input-group date">
                        <input type="text" class="form-control datepicker" name="date_end" value="<?php echo !empty($_GET['date_end']) ? $_GET['date_end'] : '';?>" autocomplete="off"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="submit">&nbsp</label>
                      <input type="submit" value="Cari" class="form-control btn btn-primary">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="submit">&nbsp</label>
                      <a href="<?php echo site_url('report/print_report_pembelian/')."?search=true&resto_id=".$_GET['$resto_id']."&supplier_id=".$_GET['supplier_id']."&produk_id=".$_GET['produk_id']."&date_from=".$_GET['date_from']."&date_end=".$_GET['date_end'];?>" class="form-control btn btn-success btnPrint"><i class="fa fa-print"></i> Print</a>
                      <!-- <div id="print" class="form-control btn btn-success" onclick="printData();"><i class="fa fa-print"></i> Print </div> -->
                    </div>
                  </div>
                </div>
              </form>
              <table id="example1" class="table table-bordered table-striped">
              <thead style="text-align: left;">
                <tr>
                  <th style="width: 50px;">No</th>
                  <th>Date</th>
                  <th>Transaksi ID</th>
                  <th>Supplier Name</th>
                  <th>Resto</th>
                  <th>Nama Barang</th>
                  <th>Total Item</th>
                  <th>Total Harga</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1; if(isset($transaksis) && is_array($transaksis)){ ?>
                  <?php foreach($transaksis as $transaksi){?>
                      <tr>
                      <td><?php $no <= count($transaksis); echo $no++; ?></td>
                      <td><?php echo $transaksi->date;?></td>
                      <td><?php echo $transaksi->id;?></td>
                      <td><?php echo $transaksi->supplier_name;?></td>
                      <td><?php echo $transaksi->name_resto;?></td>
                      <td><?php echo $transaksi->product_name;?></td>
                      <td id="item"><?php echo $transaksi->quantity;?></td>
                      <td>Rp<?php echo number_format($transaksi->total_price);?></td>
                      <td id="item_2" style="display: none;"><?php echo $transaksi->total_price;?></td>
                    </tr>
                    <?php } ?>
                <?php } ?>
                </tbody>
                <tfoot style="text-align: left;">
                <tr>
                  <th colspan="6">Total</th>
                  <th id="total"></th>
                  <th colspan="2" id="harga"></th>
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
    <script type="text/javascript">
       function setup(){
        var TotalValue = 0;
        var TotalValuer = 0;

        $("tr #item").each(function(index,value){
          currentRow = parseFloat($(this).text());
          TotalValue += currentRow
        });

        document.getElementById('total').innerHTML = TotalValue;

        $("tr #item_2").each(function(index,value){
          currentRow = parseFloat($(this).text());
          TotalValuer += currentRow
        });

        // document.getElementById('harga').innerHTML = TotalValuer;

        var	reverse = TotalValuer.toString().split('').reverse().join(''),
          ribuan 	= reverse.match(/\d{1,3}/g);
          ribuan	= ribuan.join(',').split('').reverse().join('');
        
        document.getElementById('harga').innerHTML = 'Rp' + ribuan;
        }
    </script>
  <!-- /.content-wrapper -->
<?php $this->load->view('element/footer');?>