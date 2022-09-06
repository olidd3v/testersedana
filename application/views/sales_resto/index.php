<?php $this->load->view('element/head');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        sales Index
        <small>List sales</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> sales Index</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <ul class="nav nav-tabs">
                <li role="presentation"><a href="<?php echo site_url('sales_resto/create');?>">Input sales</a></li>
                <li role="presentation" class="active"><a href="<?php echo site_url('sales_resto');?>">List sales</a></li>
            </ul>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table sales</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="<?php echo site_url('sales_resto?search=true');?>" method="GET">
                <input type="hidden" class="form-control" name="search" value="true"/>
                <div class="box-body pad">
                <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                          <label>Date From</label>
                          <input type="date" class="form-control" name="date_from" value="<?php if (isset($_GET['date_from'])) { echo $_GET['date_from'];} ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Date End</label>
                        <input type="date" class="form-control" name="date_end" value="<?php if (isset($_GET['date_end'])) { echo $_GET['date_end'];} ?>">
                    </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                      <label for="submit">&nbsp;</label>
                      <input type="submit" value="Cari" class="form-control btn btn-primary">
                </div>
                </div>
                </div>
              </form>
              <table id="example1" class="table table-bordered table-striped responsive table-responsive">
                <thead>
                <tr>
                  <th>Resto</th>
                  <th>Date</th>
                  <th>Net Sales</th>
                  <th>Transfer</th>
                  <th>Koreksi Kasir</th>
                  <th>Pajak Resto</th>
                  <th>Bank Mandiri</th>
                  <th>Bank BCA</th>
                  <th>Bank BNI</th>
                  <th>Bank Maybank</th>
                  <th>Bank Papua</th>
                  <th>Setoran Tunai</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php if(isset($sales) && is_array($sales)){ ?>
				  <?php foreach($sales as $sales){?>
					<tr>
          <td><?php echo $sales->name_resto;?></td>
					<td><?php echo $sales->date;?></td>
					<td><?php echo $sales->netsales;?></td>
					<td><?php echo $sales->transfer;?></td>
					<td><?php echo $sales->koreksi_kasir;?></td>
					<td><?php echo $sales->pajak_resto;?></td>
					<td><?php echo $sales->bank_mandiri;?></td>
					<td><?php echo $sales->bank_bca;?></td>
					<td><?php echo $sales->bank_bni;?></td>
					<td><?php echo $sales->bank_maybank;?></td>
					<td><?php echo $sales->bank_papua;?></td>
					<td><?php echo $sales->setoran_tunai;?></td>
					<td>
					<a href="<?php echo site_url('sales_resto/edit').'/'.$sales->id;?>" class="btn btn-xs btn-primary">Edit</a>
					<a onclick="return confirm('Are you sure you want to delete this sales?');" href="<?php echo site_url('sales_resto/delete').'/'.$sales->id;?>" class="btn btn-xs btn-danger">Delete</a>
					</td>
					</tr>
				  <?php } ?>
				<?php } ?>
                </tbody>
                <tfoot>
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
  <!-- /.content-wrapper -->
<?php $this->load->view('element/footer');?>