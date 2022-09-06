<?php $this->load->view('element/head');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" xmlns="http://www.w3.org/1999/html">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        satuan Form
        <small>List satuan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> satuan Form</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	
      <div class="row">
        <div class="col-xs-12">
          <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="<?php echo site_url('satuan/create');?>">Input satuan</a></li>
            <li role="presentation"><a href="<?php echo site_url('satuan');?>">List satuan</a></li>
          </ul>
		  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">satuan</h3>
              <?php if($this->session->flashdata('form_false')){?>
                <div class="alert alert-danger text-center">
                  <strong><?php echo $this->session->flashdata('form_false');?></strong>
                </div>
              <?php } ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php if(!empty($satuan)){?>
            <form class="form-horizontal" method="POST" action="<?php echo site_url('satuan/save').'/'.$satuan['id'];?>">
            <?php }else{?>
            <form class="form-horizontal" method="POST" action="<?php echo site_url('satuan/save');?>">
            <?php } ?>
              <div class="box-body">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="kode">Code Satuan</label>
                    <div class="col-sm-8">
                      <input type="hidden" name="user" value="<?php echo $_SESSION['id']; ?>">
                      <input type="text" name="satuan_id" value="<?php echo !empty($satuan) ? $satuan['code_satuan'] : '';?>" id="kode" class="form-control" placeholder="Code Satuan"/>
                    </div>
                  </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="name">Name Satuan</label>
                    <div class="col-sm-8">
                      <input type="text" value="<?php echo !empty($satuan) ? $satuan['name_satuan'] : '';?>" name="name_satuan" placeholder="satuan Name" id="name" class="form-control" required/>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="col-md-3 col-md-offset-4">
                  <a class="btn btn-default" href="<?php echo site_url('satuan');?>">Cancel</a>
                  <button class="btn btn-info pull-right" type="submit">Save</button>
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
<?php $this->load->view('element/footer');?>