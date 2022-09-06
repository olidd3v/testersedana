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
            <li role="presentation"><a href="<?php echo site_url('transaksi/create');?>">Input Transaksi</a></li>
            <li role="presentation"><a href="<?php echo site_url('transaksi');?>">List Transaksi</a></li>
            <!-- <li role="presentation"><a href="<?php echo site_url('transaksi/confirm_index');?>">List Transaksi PO</a></li> -->
            <li role="presentation" class="active"><a href="<?php echo site_url('transaksi/report?search=true&date_from=&date_end=');?>">Report Transaksi</a></li>
          </ul>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table Transaksi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="<?php echo site_url('transaksi/report?search=true');?>" method="GET">
                <input type="hidden" class="form-control" name="search" value="true"/>
                <div class="box-body pad">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Date From</label>
                      <div class="input-group date">
                        <input type="text" class="form-control datepicker" name="date_from" value="<?php echo !empty($_GET['date_from']) ? $_GET['date_from'] : '';?>"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Date End</label>
                      <div class="input-group date">
                        <input type="text" class="form-control datepicker" name="date_end" value="<?php echo !empty($_GET['date_end']) ? $_GET['date_end'] : '';?>"/>
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
                      <a href="<?php echo site_url('transaksi/print_report/')."?search=true&date_from=".$_GET['date_from']."&date_end=".$_GET['date_end'];?>" class="form-control btn btn-success btnPrint"><i class="fa fa-print"></i> Print</a>
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
                  <th>Nama Barang</th>
                  <th>Total Qty</th>
                  <th>Total Harga</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1; if(isset($transaksis) && is_array($transaksis)){ ?>
                  <?php foreach($transaksis as $transaksi){?>
                    <?php if ($transaksi->id_user == $_SESSION['id']) { ?>
                    <?php if ($transaksi->total_price == 0 || $transaksi->total_price == NULL) { ?>
                    <?php }else{ ?>
                      <tr>
                      <td><?php $no <= count($transaksis); echo $no++; ?></td>
                      <td><?php echo $transaksi->date;?></td>
                      <td><?php echo $transaksi->id;?></td>
                      <td><?php echo $transaksi->supplier_name;?></td>
                      <td><?php echo $transaksi->product_name;?></td>
                      <td id="item"><?php echo $transaksi->quantity;?></td>
                      <td>Rp<?php echo number_format($transaksi->total_price);?></td>
                      <td id="item_2" style="display: none;"><?php echo $transaksi->total_price;?></td>
                    </tr>
                    <?php } ?>
                    <?php } ?>
                  <?php } ?>
                <?php } ?>
                </tbody>
                <tfoot style="text-align: left;">
                <tr>
                  <th colspan="5">Total</th>
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
  <script>
    function printData()
    {
      var divToPrint=document.getElementById("example1");
      newWin= window.open("");
      newWin.document.write("<div style='margin-bottom: 10px; text-align: center;'> <h1> Laporan Penjualan Barang</h1><h3><?php echo $_GET['date_from'].' - '.$_GET['date_end']; ?></h3><hr></div>");
      newWin.document.write(divToPrint.outerHTML);
      var css =`table, tfoot, td, th {
          // border: 1px solid #000;
          text-align:left;
          padding: 0px 5px;
          width: 100%;
      }

      html{font-family:sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%}

      tfoot {
        border-top: 1px solid #000;
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