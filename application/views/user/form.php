<?php $this->load->view('element/head');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" xmlns="http://www.w3.org/1999/html">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        user Form
        <small>List user</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
	
      <div class="row">
        <div class="col-xs-12">
          <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="<?php echo site_url('user/create');?>">Input user</a></li>
            <li role="presentation"><a href="<?php echo site_url('user');?>">List user</a></li>
          </ul>
		  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">user</h3>
              <?php if($this->session->flashdata('form_false')){?>
                <div class="alert alert-danger text-center">
                  <strong><?php echo $this->session->flashdata('form_false');?></strong>
                </div>
              <?php } ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php if(!empty($user)){?>
            <form class="form-horizontal" method="POST" action="<?php echo site_url('user/save').'/'.$user['id'];?>">
            <?php }else{?>
            <form class="form-horizontal" method="POST" action="<?php echo site_url('user/save');?>">
            <?php } ?>
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="kode">Code User</label>
                    <div class="col-sm-8">
                      <input type="text" value="<?php echo !empty($user) ? $user['code_user'] : '';?>" name="code_user" id="kode" class="form-control" placeholder="Code User"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="username">Username</label>
                    <div class="col-sm-8">
                      <input type="text" value="<?php echo !empty($user) ? $user['username'] : '';?>" name="username" placeholder="Username" id="username" class="form-control" required autocomplete="off"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="name">Name</label>
                    <div class="col-sm-8">
                      <input type="text" value="<?php echo !empty($user) ? $user['name'] : '';?>" name="name" placeholder="Name" id="name" class="form-control" required autocomplete="off"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="password">Password</label>
                    <div class="col-sm-8">
                      <input type="password" name="password" placeholder="Password" id="password" class="form-control" required autocomplete="new-password"/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="role">Role</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="role" name="role">
                        <option value="1" <?php if(!empty($user) && $user['role'] == true) echo 'selected="selected"';?>>
                          Admin
                        </option>
                        <option value="0" <?php if(!empty($user) && $user['role'] == false) echo 'selected="selected"';?>>
                          Operator
                        </option>
                      </select>
                    </div>
                  </div>
                  <?php if (!empty($user)){ ?>
                    <?php if (isset($user['role']) === 1) { ?>
                    <input type="hidden" name="code_resto" value="x">
                  <?php } else {?>
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="Code Resto">Resto</label>
                    <div class="col-sm-8">
                    <select class="form-control" id="Code Resto" name="code_resto">
                        <?php if(isset($resto) && is_array($resto)){?>
                          <?php if (!isset($user['code_resto'])) { ?>
                          <?php foreach($resto as $item){?>
                            <option value="<?php echo $item->code_resto;?>" <?php if(!empty($user) && $item->code_resto == $user['code_resto']) echo 'selected="selected"';?>>
                              <?php echo $item->name_resto;?>
                            </option>
                          <?php }?>
                          <?php } else { ?>
                            <option value="0">== Select Resto ==</option>
                            <?php foreach($resto as $item){?>
                            <option value="<?php echo $item->code_resto;?>" <?php if(!empty($user) && $item->code_resto == $user['code_resto']) echo 'selected="selected"';?>>
                              <?php echo $item->name_resto;?>
                            </option>
                            <?php }?>
                          <?php }?>
                        <?php }?>
                      </select>
                    </div>
                  </div>
                  <?php } ?>
                    <?php } else { ?>
                      <div class="form-group">
                    <label class="col-sm-4 control-label" for="Code Resto">Resto</label>
                    <div class="col-sm-8">
                    <select class="form-control" id="Code Resto" name="code_resto">
                      <option value="0">== Select Resto ==</option>
                      <?php foreach($resto as $item){?>
                        <option value="<?php echo $item->code_resto;?>">
                        <?php echo $item->name_resto;?>
                      </option>
                      <?php }?>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="col-md-3 col-md-offset-4">
                  <a class="btn btn-default" href="<?php echo site_url('user');?>">Cancel</a>
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