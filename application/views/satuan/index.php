<?php $this->load->view('element/head');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        satuan Index
        <small>List satuan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> satuan Index</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <ul class="nav nav-tabs">
                <li role="presentation"><a href="<?php echo site_url('satuan/create');?>">Input satuan</a></li>
                <li role="presentation" class="active"><a href="<?php echo site_url('satuan');?>">List satuan</a></li>
            </ul>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table satuan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form action="<?php echo site_url('satuan?search=true');?>" method="GET">
                <input type="hidden" class="form-control" name="search" value="true"/>
                <div class="box-body pad">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="id">Code satuan</label>
                      <input type="text" class="form-control" name="id" value="<?php echo !empty($_GET['id']) ? $_GET['id'] : '';?>"/>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="submit">&nbsp</label>
                      <input type="submit" value="Cari" class="form-control btn btn-primary">
                    </div>
                  </div>
                </div>
              </form>
              </form>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Code ID</th>
                  <th>satuan Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php if(isset($satuans) && is_array($satuans)){ ?>
				  <?php foreach($satuans as $satuan){?>
					<tr>
            <td><?php echo $satuan->code_satuan;?></td>
					  <td><?php echo $satuan->name_satuan;?></td>
					  <td>
						<a href="<?php echo site_url('satuan/edit').'/'.$satuan->id;?>" class="btn btn-xs btn-primary">Edit</a>
						<a onclick="return confirm('Are you sure you want to delete this satuan?');" href="<?php echo site_url('satuan/delete').'/'.$satuan->id;?>" class="btn btn-xs btn-danger">Delete</a>
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