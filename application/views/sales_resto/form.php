<?php $this->load->view('element/head');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" xmlns="http://www.w3.org/1999/html">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sales Form
        <small>List Sales</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Sales Form</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	
      <div class="row">
        <div class="col-xs-12">
          <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="<?php echo site_url('sales_resto/create');?>">Input Sales</a></li>
            <li role="presentation"><a href="<?php echo site_url('sales_resto');?>">List Sales</a></li>
          </ul>
		  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Sales</h3>
              <?php if($this->session->flashdata('form_false')){?>
                <div class="alert alert-danger text-center">
                  <strong><?php echo $this->session->flashdata('form_false');?></strong>
                </div>
              <?php } ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php if(!empty($sales)){?>
            <form class="form-horizontal" method="POST" action="<?php echo site_url('sales_resto/save').'/'.$sales['id'];?>">
            <?php }else{?>
            <form class="form-horizontal" method="POST" action="<?php echo site_url('sales_resto/save');?>">
            <?php } ?>
              <div class="box-body">
                <div class="col-md-6">
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="id_user">Resto</label>
                    <div class="col-sm-8">
                      <?php if(isset($resto) && is_array($resto)){?>
                      <?php foreach($resto as $item){?>
                        <?php if ($user[0]['code_resto'] == $item->code_resto) {?>
                      <input type="text"  value="<?php echo $item->name_resto;?>" class="form-control" disabled />
                      <input type="hidden" name="id_resto" value="<?php echo $item->id;?>" class="form-control"/>
                      <?php }?>
                      <?php }?>
                      <?php }?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="netsales">Net Sales</label>
                    <div class="col-sm-8">
                      <input type="text" value="<?php echo !empty($sales) ? $sales['netsales'] : '';?>" name="netsales" placeholder="Netsales" id="netsales" class="form-control" required/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="transfer">Transfer</label>
                    <div class="col-sm-8">
                      <input type="text" value="<?php echo !empty($sales) ? $sales['transfer'] : '';?>" name="transfer" placeholder="Transfer" id="transfer" class="form-control" required/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="koreksi_kasir">Koreksi Kasir</label>
                    <div class="col-sm-8">
                      <input type="text" value="<?php echo !empty($sales) ? $sales['koreksi_kasir'] : '';?>" name="koreksi_kasir" placeholder="Koreksi Kasir" id="koreksi_kasir" class="form-control" required/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="address">Pajak Resto</label>
                    <div class="col-sm-8">
                      <input type="text" value="<?php echo !empty($sales) ? $sales['pajak_resto'] : '';?>" name="pajak_resto" placeholder="Pajak Resto" id="pajak_resto" class="form-control" required/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="setoran_tunai">Setoran Tunai</label>
                    <div class="col-sm-8">
                      <input type="text" value="<?php echo !empty($sales) ? $sales['setoran_tunai'] : '';?>" name="setoran_tunai" placeholder="Setoran Tunai" id="setoran_tunai" class="form-control" required/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="date">Tanggal</label>
                    <div class="col-sm-8">
                      <input type="date" name="sales_date" value="<?php echo !empty($sales) ? $sales['date'] : date('Y-m-d');?>" id="date" class="form-control"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="bank_mandiri">Bank Mandiri</label>
                    <div class="col-sm-8">
                      <input type="text" value="<?php echo !empty($sales) ? $sales['bank_mandiri'] : '';?>" name="bank_mandiri" placeholder="Bank Mandiri" id="bank_mandiri" class="form-control"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="bank_bca">Bank BCA</label>
                    <div class="col-sm-8">
                      <input type="text" value="<?php echo !empty($sales) ? $sales['bank_bca'] : '';?>" name="bank_bca" placeholder="Bank BCA" id="bank_bca" class="form-control"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="bank_bni">Bank BNI</label>
                    <div class="col-sm-8">
                      <input type="text" value="<?php echo !empty($sales) ? $sales['bank_bni'] : '';?>" name="bank_bni" placeholder="Bank BNI" id="bank_bni" class="form-control"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="bank_maybank">Bank Maybank</label>
                    <div class="col-sm-8">
                      <input type="text" value="<?php echo !empty($sales) ? $sales['bank_maybank'] : '';?>" name="bank_maybank" placeholder="Bank Maybank" id="bank_maybank" class="form-control"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="bank_papua">Bank Papua</label>
                    <div class="col-sm-8">
                      <input type="text" value="<?php echo !empty($sales) ? $sales['bank_papua'] : '';?>" name="bank_papua" placeholder="Bank Papua" id="bank_papua" class="form-control"/>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="col-md-3 col-md-offset-4">
                  <a class="btn btn-default" href="<?php echo site_url('sales_resto');?>">Cancel</a>
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