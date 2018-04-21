 
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <h1>
        Adicionar uma nova Notícia:
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Painel de Controle</a></li>
        <li><a href="#">Notícias</a></li>
        <li class="active">Adicionar Notícia</li>
      </ol>
    </section>
<section class="content">
  <div class="row">
  <div class="box box-success">
            <div class="box-header with-border">
                <div id="resp" style="display: none;">
                
              </div>
              <h3 class="box-title">Nova Notícia:</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" data-toggle="validator" method="post" id="add-news-form">
                <!-- text input -->
                <div class="form-group">
                  <label>Título: </label>
                  <input  type="text" name="title" class="form-control" pattern="[A-Z]{1}[a-z]{2,}\s*[A-Z]*[a-z]*" placeholder="Título" data-pattern-error="No mínimo 3 caracteres e inicio com letra maiscula" data-required-error="Por favor preencha este campo!" required="">
                  <p class="help-block with-errors">Inserir título da notícia</p>
                </div>
              
                 <div class="form-group">

                <label>Data:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="date_time" placeholder="dd/mm/yyyy" class="form-control pull-right" required data-required-error="Por favor preencha este campo!">
                 
                </div>
                <!-- /.input group -->
                 <p class="help-block with-errors">Inserir data da notícia</p>
              </div>

                <!-- textarea -->
                <div class="form-group">
                  <label>Artigo: </label>
                   <textarea  id="editor1" name="article" rows="5" cols="80" required  data-required-error="Por favor preencha este campo!">
                       
                    </textarea>
                     <p class="help-block with-errors">Inserir artigo da notícia</p>
                </div>
               

              <div class="form-group">

                <button class="btn btn-success btn-lg btn-flat" type="submit">
                  Adicionar&nbsp;&nbsp;<i class="fa fa-plus"></i>
                </button>
              </div>
              </form>
            </div>
          </div>
        </div>

      </section>
