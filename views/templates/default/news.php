<?php $news = $data['news']; ?>
<header class="masthead text-center text-white bgParallax"  id="news">
      <div class="masthead-content">
        <div class="container">
          <h1 class="masthead-heading mb-0">Notícias</h1>
        </div>
      </div>
     
    </header>

 

  <section class="news custom-views">
      <div class="container">
        <div class="row align-items-center">
        <?php foreach ($news as $new):?>
          <div class="col-lg-4">
            <div class="p-5">
            <?php $img = $new->getListimagens() ?>
         
           
              <a href="<?php echo $this->base_url ?>News/viewNews/<?php echo $new->getId() ?>"><img class="img-fluid" src="<?php echo $this->base_url.'views/img/'.$img[0]->getSrc(); ?>" alt=""></a>
            </div>
          
              <h4 class="text-center"><?php echo $new->getTitle(); ?></h4>
              <p class="text-center"><?php echo $new->getArticle(); ?> </p>
           
          </div>
      <?php endforeach; ?>
        
      
          </div>
         
        </div>



    <div class="container pagination-custom">
         <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
            <li class="page-item custom-page-item">
              <a class="page-link custom-page-link" href="viewnews.html" tabindex="-1">Anterior</a>
            </li>
            <li class="page-item custom-page-item"><a class="page-link custom-page-link" href="#">1</a></li>
            <li class="page-item custom-page-item active"><a class="page-link custom-page-link" href="#">2</a></li>
            <li class="page-item custom-page-item"><a class="page-link custom-page-link" href="#">3</a></li>
            <li class="page-item custom-page-item">
              <a class="page-link custom-page-link" href="#">Próximo</a>
            </li>
          </ul>
        </nav>
    </div>

  </section>