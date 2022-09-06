<html>
<head>
    <meta charset="ISO-8859-1">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url('public');?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public');?>/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public');?>/plugins/ionic/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('public');?>/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public');?>/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public');?>/css/fa-loading.css">
    <link rel="stylesheet" href="<?php echo base_url('public');?>/css/main.css">
    <style>
        @media print {
          html, body {
            height: 99%;
          }
            @page {
                size: 24cm;
                /* size: 24cm 14cm . Random dot?; */
            }
        }
    </style>
</head>
<body onload="setup();">
              <div style="font-size: medium;">
              <br>
              <center>
              <b><?php print_r($app[0]['judul_app']);?></b>
              <br>
              <?php print_r($app[0]['alamat']);?>
              <br>
              Telp. <?php print_r($app[0]['no_telp']);?>
              </center>
              <br>
            </div>
            <div style="border-bottom: 1px solid #000;"></div>
            <br>
            <H4><b><center>LAPORAN PENJUALAN</center></b></H4>
            <div style="font-size: medium;">
              <b>Periode</b>: <?php
              if(!empty($_GET['date_from'] && $_GET['date_end'])){
                echo $_GET['date_from']." s/d ".$_GET['date_end'];
              } elseif (!empty($_GET['date_from'])) {
                echo $_GET['date_from'];
                }elseif(!empty($_GET['date_end'])){
                  echo $_GET['date_end'];
                }else{
                  echo "Semua";
                  } ?>
            </div>
            <br>
            <table id="tb" class="table">
              <thead style="text-align: left; border-top: 1px solid #000;border-bottom: 1px solid #000;">
                <tr>
                <th style="width: 50px; border-bottom: 1px solid #000;">No</th>
                <th style="border-bottom: 1px solid #000;">Date</th>
                <th style="border-bottom: 1px solid #000;">Transaksi ID</th>
                <th style="border-bottom: 1px solid #000;">Resto</th>
                <th style="border-bottom: 1px solid #000;">Menu</th>
                <th style="border-bottom: 1px solid #000;">Terjual</th>
                <th style="border-bottom: 1px solid #000;">Harga Pokok</th>
                <th style="border-bottom: 1px solid #000;">Harga Jual</th>
                <th style="border-bottom: 1px solid #000;">Profit</th>
                  <!-- <th style="border-bottom: 1px solid #000;">Metode Pembayaran</th> -->
                </tr>
                </thead>
                <tbody>
                <?php if(isset($user) && is_array($user)){ ?>
                  <?php foreach($user as $user){?>
                    <?php $no = 1; if(isset($penjualans) && is_array($penjualans)){ ?>
                      <?php foreach($penjualans as $penjualan){?>
                      <?php if ($user['code_resto'] == $penjualan->code_resto) { ?>
                    <tr>
                      <td><?php $no <= count($penjualans); echo $no++; ?></td>
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
                <tr>
                  <th colspan="5" style="border-top: 1px solid #000;">Total</th>
                  <th id="total" style="border-top: 1px solid #000;"></th>
                  <th style="border-top: 1px solid #000;"></th>
                  <th style="border-top: 1px solid #000;"></th>
                  <th colspan="1" id="harga" style="border-top: 1px solid #000;"></th>
                </tr>
                </tbody>
              </table>
</body>
<footer>
  <!-- ./wrapper -->

		<!-- jQuery 2.2.0 -->
		<script src="<?php echo base_url('public');?>/plugins/jQuery/jQuery-2.2.0.min.js"></script>
		<script src="<?php echo base_url('public');?>/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url('public');?>/dist/js/app.js"></script>
		<script src="<?php echo base_url('public');?>/dist/js/demo.js"></script>		
		<script src="<?php echo base_url('public');?>/js/fa-loading.js"></script>
		<script src="<?php echo base_url('public');?>/plugins/jquery-price-format/jquery.price_format.2.0.min.js"></script>
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
</footer>

  
</html>