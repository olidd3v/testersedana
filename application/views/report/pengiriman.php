<?php $this->load->view('element/head');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengiriman
        <small>Report Pengiriman</small>
<?php $sess = $this->session->userdata('msg'); if (isset($sess)) { session_start(); $_SESSION['ix'] = "in"; header('Location: '. base_url() . 'penjualan/detail/' . $sess); exit;} else echo ''; ?>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <ul class="nav nav-tabs">
          <!-- <li role="presentation"><a href="<?php echo site_url('report?search=true&supplier_id=&date_from=&date_end=');?>">Report Pembelian</a></li> -->
          <li role="presentation" class="active"><a href="<?php echo site_url('report/pengiriman?search=true&id_resto=&date_from=&date_end=');?>">Report Pengiriman</a></li>
          <li role="presentation"><a href="<?php echo site_url('report/pemakaian?search=true&supplier_id=&date_from=&date_end=');?>">Report Pemakaian</a></li>
          <li role="presentation"><a href="<?php echo site_url('report/penjualan_report?search=true&date_from=&date_end=');?>">Report Penjualan</a></li>
          <li role="presentation"><a href="<?php echo site_url('report/report_sales?search=true&date_from=&date_end=');?>">Report Sales</a></li>
          </ul>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table Pengiriman</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form action="<?php echo site_url('report/pengiriman?search=true');?>" method="GET">
                <input type="hidden" class="form-control" name="search" value="true"/>
                <div class="box-body pad">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Resto</label>
                    <select name="resto_id" id="resto_id" class="form-control">
                      <option value="">== PILIH RESTO == </option>
                    <?php if(isset($resto) && is_array($resto)){?>
                        <?php foreach($resto as $item){?>
                            <option value="<?php echo $item->id;?>">
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
                    <select name="supplier_id" id="supplier_id" class="form-control select2">
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
                      <a href="<?php echo site_url('report/print_report_pengiriman/')."?search=true&resto_id=".$_GET['$resto_id']."&supplier_id=".$_GET['supplier_id']."&produk_id=".$_GET['produk_id']."&date_from=".$_GET['date_from']."&date_end=".$_GET['date_end'];?>" class="form-control btn btn-success btnPrint"><i class="fa fa-print"></i> Print</a>
                      <!-- <div id="print" class="form-control btn btn-success" onclick="printData();"><i class="fa fa-print"></i> Print </div> -->
                    </div>
                  </div>
                </div>
              </form>
              <table id="example1" class="table table-bordered table-striped">
                <thead style="text-align: left;">
                <tr>
                <th>Pengiriman ID</th>
                  <th>Date</th>
                  <th>Resto</th>
                  <th>Supplier</th>
                  <th>Nama Barang</th>
                  <th>Total Item</th>
                  <th>Harga Satuan</th>
                  <th>Total Harga</th>
                </tr>
                </thead>
                <tbody>
                <?php if(isset($pengiriman) && is_array($pengiriman)){ ?>
                  <?php foreach($pengiriman as $pengiriman){?>
                    <tr>
                      <td><?php echo $pengiriman->pengiriman_transaction;?></td>
                      <td><?php echo $pengiriman->date;?></td>
                      <td><?php echo $pengiriman->name_resto;?></td>
                      <td><?php echo $pengiriman->supplier_name;?></td>
                      <td><?php echo $pengiriman->product_name;?></td>
                      <td id="item"><?php echo $pengiriman->qty;?></td>
                      <td>Rp<?php echo number_format($pengiriman->sale_price);?></td>
                      <td>Rp<?php echo number_format($pengiriman->qty*$pengiriman->sale_price);?></td>
                      <td style="display: none;" id="item_2"><?php echo $pengiriman->sale_price;?></td>
                      <td style="display: none;" id="item_3"><?php echo $pengiriman->qty*$pengiriman->sale_price;?></td>
                    </tr>
                <?php } ?>
                <?php } ?>
                <tr>
                  <th colspan="5" style="border-top: 1px solid #000;">Total</th>
                  <th id="total" style="border-top: 1px solid #000;"></th>
                  <th id="harga" style="border-top: 1px solid #000;"></th>
                  <th style="border-top: 1px solid #000;" id="harga_satuan"></th>
                </tr>
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
  <script>
    function printData()
    {
      var divToPrint=document.getElementById("example1");
      newWin= window.open("");
      newWin.document.write("<div style='margin-bottom: 10px; text-align: center;'> <h1> Laporan Penjualan Barang</h1><h3><?php echo $_GET['date_from'].' - '.$_GET['date_end']; ?></h3><hr></div>");
      newWin.document.write(divToPrint.outerHTML);
      var css =`table, tfoot, td, th {
          border: 1px solid #000;
          text-align:left;
          padding: 0px 5px;
          width: 100%;
      }

      html{font-family:sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%}

      tfoot {
          height: 30px;
      }

      th {
          background-color: #7a7878;
          text-align:left
      }`;
    var div = $("<div />", {
      html: '&shy;<style>' + css + '</style>'
    }).appendTo( newWin.document.body);
      newWin.print();
      newWin.close();
    }

    $('button').on('click',function(){
    printData();
    })
  </script>
      <script type="text/javascript">
       function setup(){
        var TotalValue = 0;
        var TotalValuer = 0;
        var TotalValuerx = 0;
        

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

        $("tr #item_3").each(function(index,value){
          currentRow = parseFloat($(this).text());
          TotalValuerx += currentRow
        });

        var	reverse = TotalValuerx.toString().split('').reverse().join(''),
          ribuanx 	= reverse.match(/\d{1,3}/g);
          ribuanx	= ribuanx.join(',').split('').reverse().join('');
        
        document.getElementById('harga_satuan').innerHTML = 'Rp' + ribuanx;
        }
    </script>
<?php $this->load->view('element/footer');?>