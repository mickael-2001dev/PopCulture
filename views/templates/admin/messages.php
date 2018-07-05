<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Mensagens
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Mensagens</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
           <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Todas Mensagens: </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="message-table" class="table cell-border table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center">ID</th>
                  <th class="text-center">Nome</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Mensagem</th>
                  <th class="text-center">Ver</th>
                  <th class="text-center">Responder</th>
                  <th class="text-center">Excluir</th>
                </tr>
                </thead>
                <tbody id="message">
                  <tr v-for="td in results">
                    <!--<td class="text-center">1</td>
                    <td class="text-center">Teste</td>
                    <td class="text-center">Teste</td>
                    <td class="text-center">13/02/2018</td>
                    <td class="text-center"><button class="btn btn-warning  btn-flat"><i class="fa fa-pencil"></i></button></td>
                    <td class="text-center"><button class="btn btn-danger btn-flat"><i class="fa fa-times"></i></button></td>
                  </tr>-->
                  <td class="text-center" v-text="td.id"></td>
                  <td class="text-center" v-text="td.name_ms"></td>
                  <td class="text-center"  v-text="td.email"></td>
                  <td class="text-center" v-text="td.message"></td>
                  <td class="text-center"><button class="btn btn-primary  btn-flat view-message" v-bind:value="td.id"><i class="fa fa-eye"></i></button></td>
                  <td class="text-center"><button class="btn bg-purple  btn-flat reply-message" v-bind:value="td.id"><i class="fa fa-reply"></i></button></td>
                  <td class="text-center"><button class="btn btn-danger btn-flat delete-message" v-bind:value="td.id"><i class="fa fa-times"></i></button></td>
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
    <div class="modal modal-danger fade" id="modal-delete-message">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Excluir Notícia</h4>
              </div>
              <div class="modal-body">
                <p>Excluir a mensagem <strong><span id="message-id"></span></span></strong>?</p>
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


      <div class="modal modal-primary fade" id="view-message">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Mensagem</h4>
              </div>
              <div class="modal-body">
                <h4><strong>Email: </strong><span id="email"></span></h4>
                <h4><strong>Nome: </strong><span id="name_ms"></span></h4>
                <h4><strong>Mensagem: </strong><span id="message-received"></span></h4>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Fechar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

    <div class="modal modal-purple fade" id="modal-reply-message">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-purple">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>


                <h4 class="modal-title">Responder Mensagem</h4>
              </div>
              <div class="update-body">
                  <form role="form" method="post" id="reply-message-form" enctype="multipart/form-data">

                <!-- text input -->
                <input type="hidden" id="idperson">
              <div class="form-group">
                  <label>Mensagem: </label>
                   
                   
                     <textarea  name="message" id="editor1" placeholder="Insira um artigo"
                          ></textarea>
                      <p class="help-block with-errors">Inserir mensagem</p>
                </div>
             
              
            
              </form>
              </div>
              <div class="row">
                <div id="resp" class="col-lg-10 col-lg-offset-1" style="display: none;"></div>
                <br><br>
              </div>
              
              <div class="modal-footer bg-purple">
                
                <button type="submit" id="save" class="btn btn-outline">Salvar</button>

              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>