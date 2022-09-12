  <aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
          <li class="treeview <?php echo is_menu('resto');?>">
          <a href="#"><i class="fa fa-institution"></i> <span>Resto</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu"> 
			    <li class="<?php echo is_menu('resto');?>"><a href="<?php echo site_url('resto');?>"><i class="fa fa-institution" aria-hidden="true"></i> <span>List Resto</span></a></li>
			    <li class="<?php echo is_menu('resto','create');?>"><a href="<?php echo site_url('resto/create');?>"><i class="fa fa-plus-square-o" aria-hidden="true"></i> <span>Add Resto</span></a></li>
          </ul>
          </li>
        </li>
      </ul>
      <br />
      <br />
    </section>
  </aside>
