 
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <h1>
        Adicionar um novo Post:
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Painel de Controle</a></li>
        <li><a href="#">Postagenss</a></li>
        <li class="active">Adicionar Post</li>
      </ol>
    </section>
<section class="content">
  <div class="row">
  <div class="box box-success">
            <div class="box-header with-border">
                
              <h3 class="box-title">Novo Post:</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <div id="resp" style="display: none;">
                
              </div>
              <form role="form" method="post" id="add-post-form" enctype="multipart/form-data">
                <!-- text input -->
                <div class="form-group">
                  <label>Título: </label>
                  <input  type="text" name="title" class="form-control" placeholder="Título" data-pattern-error="No mínimo 3 caracteres e inicio com letra maiscula" >
                  <p class="help-block with-errors">Inserir título do post</p>
                </div>
              
                 <div class="form-group">

                <label>Data:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="date_time" placeholder="dd/mm/yyyy" class="form-control pull-right">
                 
                </div>
              
                 <p class="help-block with-errors">Inserir data do post</p>
              </div>

              <div class="form-group">
                  <label>Imagem: </label>
                  <input type="file" name="image">

                  <p class="help-block with-errors">Inserir imagem do post</p>
                </div>

              <div class="form-group" >
                  <label>Categoria: </label>
                  <select id="categoria" class="form-control pull-right">
                    <option value="">
                       Selecionar Categoria
                    </option>
                    <option v-for="c in results" v-bind:value="c.id">
                      {{ c.categoria }}
                    </option>
                  </select>
              </div>

              <div class="form-group">
                  <label>Artigo: </label>
                   
                   
                     <textarea  name="article" id="editor1" placeholder="Insira um artigo"
                          ></textarea>
                      <p class="help-block with-errors">Inserir artigo do post</p>
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
