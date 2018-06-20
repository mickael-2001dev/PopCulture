 
<aside class="skin-purple main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="skin-purple sidebar">
      <!-- Sidebar user panel -->
     
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="skin-purple sidebar-menu" data-widget="tree">
        <li class="header custom-header">ADMIN</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Painel de Controle</span>
          </a>
        </li>
    
        <li class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o"></i>
            <span>Notícias</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $this->base_url ?>AdminNews"><i class="fa fa-list"></i> Listar</a></li>
            <li><a href="<?php echo $this->base_url ?>AdminNews/add"><i class="fa fa-plus"></i> Adicionar</a></li>
          </ul>
        </li>

         <li class="treeview">
          <a href="#">
            <i class="fa fa-archive"></i>
            <span>Postagens</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-film"></i> Cinema</a></li>
            <li><a href="#"><i class="fa fa-tv"></i> TV</a></li>
            <li><a href="#"><i class="fa fa-gamepad"></i> Games</a></li>
            <li><a href="#"><i class="fa fa-comment"></i> Quadrinhos</a></li>
            <li><a href="#"><i class="fa fa-music"></i> Música</a></li>
            <li><a href="<?php echo $this->base_url ?>AdminPost"><i class="fa fa-list"></i> Listar</a></li>
            <li><a href="<?php echo $this->base_url ?>AdminPost/add"><i class="fa fa-plus"></i> Adicionar</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-video-camera"></i>
            <span>Videos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-list"></i> Listar</a></li>
            <li><a href="#"><i class="fa fa-plus"></i> Adicionar</a></li>
          </ul>
        </li>

        <li>
          <a href="#">
            <i class="fa fa-envelope"></i> <span>Mensagens</span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa  fa-life-bouy"></i>
            <span>Registros</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-plus"></i>Inserções</a></li>
            <li><a href="#"><i class="fa fa-pencil"></i> Atualizações</a></li>
            <li><a href="#"><i class="fa fa-remove"></i> Exclusões</a></li>
          </ul>
        </li>

        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
