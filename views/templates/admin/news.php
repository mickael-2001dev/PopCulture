<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Notícias
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Notícias</a></li>
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
              <table id="news-table" class="table cell-border table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center">ID</th>
                  <th class="text-center">Titulo</th>
                  <th class="text-center">Artigo</th>
                  <th class="text-center">Data</th>
                  <th class="text-center">Editar</th>
                  <th class="text-center">Excluir</th>
                </tr>
                </thead>
                <tbody id="news">
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
                  <td class="text-center"><button class="btn btn-warning  btn-flat update-news" v-bind:value="td.id"><i class="fa fa-pencil"></i></button></td>
                  <td class="text-center"><button class="btn btn-danger btn-flat delete-news" v-bind:value="td.id"><i class="fa fa-times"></i></button></td>
                </tr>
               </tbody>
              </table>
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
  </div>
    <div class="modal modal-danger fade" id="modal-delete-news">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Excluir Notícia</h4>
              </div>
              <div class="modal-body">
                <p>Excluir a notícia <strong><span id="news-id"></span></span></strong>?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-outline" id="delete">Excluir</button>
              </div>
            </div>
          </div>
        </div>

            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
  

        <div class="modal modal-success fade" id="success-delete">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Successo</h4>
              </div>
              <div class="modal-body">
                <p>Notícia excluida com sucesso!</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Fechar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

    <div class="modal modal-warning fade" id="modal-update-news">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>


                <h4 class="modal-title">Editar Notícia</h4>
              </div>
              <div class="update-body">
                  <form role="form" method="post" id="update-news-form" enctype="multipart/form-data">

                <!-- text input -->

                <div class="form-group">
                  <label>Título: </label>
                  <input type="text" name="title" id="title" class="form-control" placeholder="Título" data-pattern-error="No mínimo 3 caracteres e inicio com letra maiscula" >
                  <p class="help-block with-errors">Inserir título da notícia</p>

                  <input type="hidden" name="idinput" id="idinput">


                </div>
              
                 <div class="form-group">

                <label>Data:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" id="date" name="date_time" placeholder="dd/mm/yyyy" class="form-control pull-right">
                 
                </div>
              
                 <p class="help-block with-errors">Inserir data da notícia</p>
              </div>


              <div class="form-group">
                  <label>Artigo: </label>
                   
                   
                     <textarea  name="article" id="editor1" placeholder="Insira um artigo"
                          ></textarea>
                      <p class="help-block with-errors">Inserir artigo da notícia</p>
                </div>
             
              
            
              </form>
              </div>
              <div class="modal-footer">
                
                <button type="submit" id="save" class="btn btn-outline">Salvar</button>

              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>