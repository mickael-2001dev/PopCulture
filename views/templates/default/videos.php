<?php $videos = $data['videos']; ?>
<header class="masthead text-center text-white bgParallax"  id="videos">
      <div class="masthead-content">
        <div class="container">
          <h1 class="masthead-heading mb-0">Videos</h1>
        </div>
      </div>
     
    </header>

 

  <section class="news custom-views">
      <div class="container">
        <h2 class="text-center">Ultimos Videos</h2>
        <?php foreach ($videos as $video):?>
        <div class="row align-items-center mx-auto">
       
          <div class="col-lg-12 mx-auto">
            <div class="p-5">
            <?php $img = $video->getListimagens() ?>
               
               <br>
              <a href="<?php echo $this->base_url ?>videos/article/<?php echo $video->getId() ?>">
                <div class="col-lg-8 mx-auto mx-auto custom-new"><h3 class="text-left custom-title"><?php echo $video->getTitle(); ?></h3> <img class="img-fluid " src="<?php echo $this->base_url.'views/img/'.$img[0]->getSrc(); ?>" alt=""></a></div>
            </div>
          
             
             
           
          </div>
   
        
      
          </div>
        <?php endforeach; ?>
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