<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="skin-purple content-header">
      <h1>
        PopCulture Brasil
        <small>Painel de Controle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Painel de Controle</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo AdminMessage::getTotal(); ?></h3>

              <p>Mensagens</p>
            </div>
            <div class="icon">
              <i class="fa fa-comments"></i>
            </div>
            <a href="<?php echo $this->base_url ?>adminmessage" class="small-box-footer">Ver Mais <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo Data::getInsertedData(); ?></h3>

              <p>Inserções</p>
            </div>
            <div class="icon">
              <i class="fa fa-plus"></i>
            </div>
            <a href="<?php echo $this->base_url ?>admindata/inserctions"" class="small-box-footer">Ver Mais <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo Data::getUpdatedData(); ?></h3>

              <p>Atualizações</p>
            </div>
            <div class="icon">
              <i class="fa fa-edit"></i>
            </div>
            <a href="<?php echo $this->base_url ?>admindata/updates"" class="small-box-footer">Ver Mais <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo Data::getDeletedData(); ?></h3>

              <p>Exclusões</p>
            </div>
            <div class="icon">
              <i class="fa fa-times-circle"></i>
            </div>
            <a href="<?php echo $this->base_url ?>admindata/deletes"" class="small-box-footer">Ver Mais <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="box box-success">
            <div class="box-header with-border">
              <i class="fa fa-life-bouy"></i>
              <h3 class="box-title">Registros</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height:230px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.nav-tabs-custom -->

          <!-- Chat box -->
      
          <!-- /.box (chat box) -->

          <!-- TO DO List -->
         
          <!-- /.box -->

          <!-- quick email widget -->
          <div class="box box-primary">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">Email Rapido</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-primary btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">
              <form action="#" method="post">
                <div class="form-group">
                  <input type="email" class="form-control" name="email" placeholder="Email:">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="assunto" placeholder="Assunto: ">
                </div>
                <div>
                  <textarea class="textarea" 
                            style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
              </form>
            </div>
            <div class="box-footer clearfix">
              <button type="button" class="pull-right btn btn-default" id="sendEmail">Enviar
                <i class="fa fa-arrow-circle-right"></i></button>
            </div>
          </div>

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          <!-- Map box -->
         <!-- LINE CHART -->
          

          <!-- Calendar -->
          <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Calendário</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="#">Add new event</a></li>
                    <li><a href="#">Clear events</a></li>
                    <li class="divider"></li>
                    <li><a href="#">View calendar</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>


          
          <!-- /.box -->
        </div>

        <div class="box box-primary">
            <div class="box-header">
              <i class="fa fa-newspaper-o"></i>
              <h3 class="box-title">Ultimas Notícias</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Titulo</th>
                  <th>Data</th>
  
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Lorem Ipsum</td>
                    <td>19/02/2018</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Lorem Ipsum</td>
                    <td>19/02/2018</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Lorem Ipsum</td>
                    <td>19/02/2018</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Lorem Ipsum</td>
                    <td>19/02/2018</td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Lorem Ipsum</td>
                    <td>19/02/2018</td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td>Lorem Ipsum </td>
                    <td>19/02/2018</td>
                  </tr>
                   <tr>
                    <td>7</td>
                    <td>Lorem Ipsum </td>
                    <td>19/02/2018</td>
                  </tr>
                   <tr>
                    <td>8</td>
                    <td>Lorem Ipsum </td>
                    <td>19/02/2018</td>
                  </tr>
                   <tr>
                    <td>9</td>
                    <td>Lorem Ipsum </td>
                    <td>19/02/2018</td>
                  </tr>
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>


        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    



      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
