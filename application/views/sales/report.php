<?php $this->load->view('element/head');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Penjualan
        <small>Report Penjualan</small>
<?php $sess = $this->session->userdata('msg'); if (isset($sess)) { session_start(); $_SESSION['ix'] = "in"; header('Location: '. base_url() . 'penjualan/detail/' . $sess); exit;} else echo ''; ?>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <ul class="nav nav-tabs">
            <li role="presentation"><a href="<?php echo site_url('sales/create');?>">Input Penjualan</a></li>
            <li role="presentation"><a href="<?php echo site_url('sales?page');?>">List Penjualan</a></li>
            <li role="presentation" class="active"><a href="<?php echo site_url('sales/report');?>">Report Penjualan</a></li>
          </ul>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table Penjualan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="<?php echo site_url('sales/report?search=true');?>" method="GET">
                <input type="hidden" class="form-control" name="search" value="true"/>
                <div class="box-body pad">
                  <!-- <div class="col-md-2">
                    <div class="form-group">
                      <label for="id">Kode Penjualan</label>
                      <input type="text" class="form-control" name="id" value="<?php echo !empty($_GET['id']) ? $_GET['id'] : '';?>"/>
                    </div>
                  </div> -->
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Date From</label>
                      <div class="input-group date">
                        <input type="text" class="form-control datepicker-transaksi" name="date_from" value="<?php echo !empty($_GET['date_from']) ? $_GET['date_from'] : '';?>"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Date End</label>
                      <div class="input-group date">
                        <input type="text" class="form-control datepicker-transaksi" name="date_end" value="<?php echo !empty($_GET['date_end']) ? $_GET['date_end'] : '';?>"/>
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
                      <a href="<?php echo site_url('sales/print_report/')."?search=true&date_from=".$_GET['date_from']."&date_end=".$_GET['date_end'];?>" class="form-control btn btn-success btnPrint"><i class="fa fa-print"></i> Print</a>
                      <!-- <div id="print" class="form-control btn btn-success" onclick="printData();"><i class="fa fa-print"></i> Print </div> -->
                    </div>
                  </div>
                </div>
              </form>
              <table id="example1" class="table table-bordered table-striped">
                <thead style="text-align: left;">
                  <th>Date</th>
                  <th>Transaksi ID</th>
                  <th>Resto</th>
                  <th>Menu</th>
                  <th>Terjual</th>
                  <th>Harga Pokok</th>
                  <th>Harga Jual</th>
                  <th>Profit</th>
                </tr>
                </thead>
                <tbody>

                <?php if(isset($user) && is_array($user)){ ?>
                  <?php foreach($user as $user){?>
                    <?php if(isset($penjualans) && is_array($penjualans)){ ?>
                      <?php foreach($penjualans as $penjualan){?>
                      <?php if ($user['code_resto'] == $penjualan->code_resto) { ?>
                    <tr>
                      <td><?php echo $penjualan->date;?></td>
                      <td><?php echo $penjualan->id_sales_order;?></td>
                      <td><?php echo $penjualan->name_resto;?></td>
                      <td><?php echo $penjualan->nama_menu;?></td>
                      <td id="item"><?php echo $penjualan->qty;?></td>
                      <td><?php echo "Rp".number_format($penjualan->harga_pokok);?></td>
                      <td><?php echo "Rp".number_format($penjualan->harga_jual);?></td>
                      <td><?php echo "Rp".number_format(($penjualan->qty*$penjualan->harga_jual)-($penjualan->qty*$penjualan->harga_pokok));?></td>
                      <td style="display: none;" id="item_2"><?php echo ($penjualan->qty*$penjualan->harga_jual)-($penjualan->qty*$penjualan->harga_pokok);?></td>
                    </tr>
                  <?php } ?>
                  <?php } ?>
                  <?php } ?>
                  <?php } ?>
                <?php } ?>
                  <th colspan="4" style="border-top: 1px solid #000;">Total</th>
                  <th id="total" style="border-top: 1px solid #000;"></th>
                  <th></th>
                  <th></th>
                  <th colspan="1" id="harga" style="border-top: 1px solid #000;"></th>
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