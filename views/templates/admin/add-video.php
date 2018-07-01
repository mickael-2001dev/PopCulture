 
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <h1>
        Adicionar um novo Video:
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Painel de Controle</a></li>
        <li><a href="#">Videos</a></li>
        <li class="active">Adicionar Video</li>
      </ol>
    </section>
<section class="content">
  <div class="row">
  <div class="box box-success">
            <div class="box-header with-border">
                
              <h3 class="box-title">Novo Video:</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <div id="resp" style="display: none;">
                
              </div>
              <form role="form" method="post" id="add-video-form" enctype="multipart/form-data">
                <!-- text input -->
                <div class="form-group">
                  <label>Título: </label>
                  <input  type="text" name="title" class="form-control" placeholder="Título" data-pattern-error="No mínimo 3 caracteres e inicio com letra maiscula" >
                  <p class="help-block with-errors">Inserir título do video</p>
                </div>
              
                 <div class="form-group">

                <label>Data:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="date_time" placeholder="dd/mm/yyyy" class="form-control pull-right">
                 
                </div>
              
                 <p class="help-block with-errors">Inserir data do video</p>
              </div>

              <div class="form-group">
                  <label>Imagem: </label>
                  <input type="file" name="image">

                  <p class="help-block with-errors">Inserir imagem do video</p>
                </div>

              <div class="form-group">
                  <label>Artigo: </label>
                   
                   
                     <textarea  name="article" id="editor1" placeholder="Insira um artigo"
                          ></textarea>
                      <p class="help-block with-errors">Inserir artigo do video</p>
                </div>

      

        <div class="form-group">
            <label>Video</label>
            <div class="input-group">

                <input type="text" id="query" name="query" class="form-control" placeholder="Pesquisar">

                <span class="input-group-btn">

                    <button type="button" id="search" class="btn btn-success btn-flat">Pesquisar</button>
                    <input type="hidden" name="codevideo" id="codevideo">
                </span>

            </div>
        </div>
        
     
             
              
              <div class="form-group">

                <button class="btn btn-success btn-lg btn-flat" type="submit">
                  Adicionar&nbsp;&nbsp;<i class="fa fa-plus"></i>
                </button>
              </div>
              </form>

              <div id="videos" style="display: none" class="row">
                  <div class="col-lg-6" v-for="li in results.items"><iframe class="col-lg-12" width="480" height="300" :src="'https://www.youtube.com/embed/' + li.id.videoId" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    <div class="col-lg-12 ">
                      <button class="btn btn-success btn-flat btn-block select-video" v-on:click="select(li.id.videoId)">Selecionar</button>
                      <br>
                    </div> 
                   
                  </div>
              </div>

            </div>
          </div>
        </div>

      </section>
