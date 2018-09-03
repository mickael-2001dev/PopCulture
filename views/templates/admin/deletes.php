<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Exclusões
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Registros</a></li>
        <li class="active"><a href="#">Exclusões</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
           <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Todas Notícias: </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="news-table-deleted" class="table cell-border table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center">ID</th>
                  <th class="text-center">Titulo</th>
                  <th class="text-center">Artigo</th>
                  <th class="text-center">Data</th>
                  <th class="text-center">Recuperar</th>
                  <th class="text-center">Excluir</th>
                </tr>
                </thead>
                <tbody id="news-deleted">
                  <tr v-for="td in results">
                    <!--<td class="text-center">1</td>
                    <td class="text-center">Teste</td>
                    <td class="text-center">Teste</td>
                    <td class="text-center">13/02/2018</td>
                    <td class="text-center"><button class="btn btn-warning  btn-flat"><i class="fa fa-pencil"></i></button></td>
                    <td class="text-center"><button class="btn btn-danger btn-flat"><i class="fa fa-times"></i></button></td>
                  </tr>-->
                  <td class="text-center" v-text="td.id"></td>
                  <td class="text-center" v-text="td.title"></td>
                  <td class="text-center"  v-text="td.article"></td>
                  <td class="text-center" v-text="td.date_time"></td>
                  <td class="text-center"><button class="btn btn-flat btn-info recovery-news" v-bind:value="td.id"><i class="fa fa-undo"></i></button></td>
                   <td class="text-center"><button class="btn btn-flat btn-danger delete-definitve-news" v-bind:value="td.id"><i class="fa fa-times "></i></button></td>
                </tr>
               </tbody>
              </table>
              <img width="160" src="http://localhost/PopCulture/app/views/img/load.gif" class="col-lg-offset-5 loading-img" style="display: none;">
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
           <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Todos os Posts: </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="post-table-deleted" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center">ID</th>
                  <th class="text-center">Titulo</th>
                  <th class="text-center">Artigo</th>
                  <th class="text-center">Data</th>
                  <th class="text-center">Data de Atualização</th>
                  <th class="text-center">Categoria</th>
                  <th class="text-center">Recuperar</th>
                  <th class="text-center">Excluir</th>
                </tr>
                </thead>
                <tbody id="post-deleted">
                  <tr v-for="td in results">
                    <!--<td class="text-center">1</td>
                    <td class="text-center">Teste</td>
                    <td class="text-center">Teste</td>
                    <td class="text-center">13/02/2018</td>
                    <td class="text-center"><button class="btn btn-warning  btn-flat"><i class="fa fa-pencil"></i></button></td>
                    <td class="text-center"><button class="btn btn-danger btn-flat"><i class="fa fa-times"></i></button></td>
                  </tr>-->
                  <td class="text-center" v-text="td.id"></td>
                  <td class="text-center" v-text="td.title"></td>
                  <td class="text-center"  v-text="td.article"></td>
                  <td class="text-center" v-text="td.date_time"></td>
                  <td class="text-center"  v-text="td.categoria"></td>
                  <td class="text-center"><button class="btn btn-flat btn-info recovery-post" v-bind:value="td.id"><i class="fa fa-undo"></i></button></td>
                  <td class="text-center"><button class="btn btn-flat btn-danger delete-definitve-post" v-bind:value="td.id"><i class="fa fa-times "></i></button></td>
                </tr>
               </tbody>
              </table>
              <img width="160" src="http://localhost/PopCulture/app/views/img/load.gif" class="col-lg-offset-5 loading-img" style="display: none;">
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
           <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Todos os Videos: </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="video-table-deleted" class="table cell-border table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center">ID</th>
                  <th class="text-center">Titulo</th>
                  <th class="text-center">Artigo</th>
                  <th class="text-center">Data</th>
                  <th class="text-center">Recuperar</th>
                  <th class="text-center">Excluir</th>
                </tr>
                </thead>
                <tbody id="videopage-deleted">
                  <tr v-for="td in results">
                    <!--<td class="text-center">1</td>
                    <td class="text-center">Teste</td>
                    <td class="text-center">Teste</td>
                    <td class="text-center">13/02/2018</td>
                    <td class="text-center"><button class="btn btn-warning  btn-flat"><i class="fa fa-pencil"></i></button></td>
                    <td class="text-center"><button class="btn btn-danger btn-flat"><i class="fa fa-times"></i></button></td>
                  </tr>-->
                  <td class="text-center" v-text="td.id"></td>
                  <td class="text-center" v-text="td.title"></td>
                  <td class="text-center"  v-text="td.article"></td>
                  <td class="text-center" v-text="td.date_time"></td>
                  <td class="text-center"><button class="btn btn-flat btn-info recovery-videopage" v-bind:value="td.id"><i class="fa fa-undo"></i></button></td>
                  <td class="text-center"><button class="btn btn-flat btn-danger delete-definitve-videopage" v-bind:value="td.id"><i class="fa fa-times "></i></button></td>
                </tr>
               </tbody>
              </table>
              <img width="160" src="http://localhost/PopCulture/app/views/img/load.gif" class="col-lg-offset-5 loading-img" style="display: none;">
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

  </div>
  