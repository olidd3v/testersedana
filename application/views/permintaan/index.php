<?php $this->load->view('element/head');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Permintaan
        <small>List Permintaan</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <ul class="nav nav-tabs">
            <?php if (empty($_SESSION['role'] == 1)) { ?>
            <li role="presentation"><a href="<?php echo site_url('permintaan/create');?>">Input Permintaan</a></li>
            <?php } ?>
            <li role="presentation" class="active"><a href="<?php echo site_url('permintaan');?>">List Permintaan</a></li>
            <li role="presentation"><a href="<?php echo site_url('permintaan/pengiriman');?>">List Pengiriman</a></li>
            <!-- <li role="presentation"><a href="<?php echo site_url('permintaan/confirm_index');?>">List permintaan PO</a></li> -->
            <!-- <li role="presentation"><a href="<?php echo site_url('permintaan/report?search=true&date_from=&date_end=');?>">Report permintaan</a></li> -->
          </ul>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table Permintaan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="<?php echo site_url('permintaan?search=true');?>" method="GET">
                <input type="hidden" class="form-control" name="search" value="true"/>
                <div class="box-body pad">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="id">Kode Permintaan</label>
                      <input type="text" class="form-control" name="id" value="<?php echo !empty($_GET['id']) ? $_GET['id'] : '';?>"/>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Date From</label>
                      <div class="input-group date">
                        <input type="text" class="form-control datepicker" name="date_from" value="<?php echo !empty($_GET['date_from']) ? $_GET['date_from'] : '';?>"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Date End</label>
                      <div class="input-group date">
                        <input type="text" class="form-control datepicker" name="date_end" value="<?php echo !empty($_GET['date_end']) ? $_GET['date_end'] : '';?>"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="submit">&nbsp</label>
                      <input type="submit" value="Cari" class="form-control btn btn-primary">
                    </div>
                  </div>
                </div>
              </form>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>permintaan ID</th>
                  <th>Resto</th>
                  <th>User</th>
                  <th>Total Item</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php if(isset($permintaans) && is_array($permintaans)){ ?>
                  <?php foreach($permintaans as $permintaan){?>
                    <?php if ($permintaan->confirm == 0) { ?>
                    <?php if ($permintaan->id_user == $_SESSION['id']) { ?>
                    <tr>
                      <td><?php echo $permintaan->id;?></td>
                      <td><?php echo $permintaan->name_resto;?></td>
                      <td><?php echo $permintaan->name;?></td>
                      <td><?php echo $permintaan->total_item;?></td>
                      <td><?php echo $permintaan->date;?></td>
                      <td>
                        <a href="<?php echo site_url('permintaan/detail').'/'.$permintaan->id;?>" class="btn btn-xs btn-default">Detail</a>
                        <a onclick="return confirm('Are you sure you want to delete this transaction?');" href="<?php echo site_url('permintaan/delete').'/'.$permintaan->id;?>" class="btn btn-xs btn-danger">Delete</a>
                      </td>
                    </tr>
                  <?php } else if ($_SESSION['role'] == 1) { ?>
                    <tr>
                      <td><?php echo $permintaan->id;?></td>
                      <td><?php echo $permintaan->name_resto;?></td>
                      <td><?php echo $permintaan->name;?></td>
                      <td><?php echo $permintaan->total_item;?></td>
                      <td><?php echo $permintaan->date;?></td>
                      <td>
                        <?php if ($permintaan->confirm == 0) { ?>
                          <a href="<?php echo site_url('permintaan/proses').'/'.$permintaan->id;?>" class="btn btn-xs btn-primary">Proses</a>
                          <?php } ?>
                        <a href="<?php echo site_url('permintaan/detail').'/'.$permintaan->id;?>" class="btn btn-xs btn-default">Detail</a>
                        <a onclick="return confirm('Are you sure you want to delete this transaction?');" href="<?php echo site_url('permintaan/delete').'/'.$permintaan->id;?>" class="btn btn-xs btn-danger">Delete</a>
                      </td>
                    </tr>
                  <?php } ?>
                  <?php } ?>
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