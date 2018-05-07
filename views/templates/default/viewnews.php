 <?php  $imgs = $data['news']->getListimagens() ?>

 <header class="masthead text-center text-white bgParallax" style=" background-image: url('<?php echo $this->base_url ?>views/img/<?php echo $imgs[0]->getSrc() ?>'); background-position: 0 50%;">
      <div class="masthead-content">
        <div class="container">
          <h1 class="masthead-heading mb-0"><?php echo $data['news']->getTitle(); ?></h1>
        </div>
      </div>
     
    </header>

 

  <section class="news custom-views">
      <div class="container text-center">
          <p><?php echo $data['news']->getArticle(); ?></p>

    </div>
    
    <?php if(count($imgs) > 1): ?>
     
      <div class="col-lg-6 d-block mx-auto">
         <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" >
         <ol class="carousel-indicators">
          <?php foreach($imgs as $img): ?>
          <?php if(key($imgs) == 0): ?>
          <li data-target="#carouselExampleControls" data-slide-to="<?php echo key($imgs) ?>" class="active"></li>
          <?php else: ?>
          <li data-target="#carouselExampleControls" data-slide-to="<?php echo key($imgs) ?>"></li>
          <?php endif; ?>
          <?php next($imgs) ?>
         <?php endforeach; ?>
        </ol>
        <div class="carousel-inner" role="listbox">
       
        <?php foreach($imgs as $img): ?>
     
      	<?php if(key($imgs) == 0): ?>

        <div class="carousel-item active">
             <div class="img">
               <img src="<?php echo $this->base_url.'views/img/'.$img->getSrc(); ?>" class=" col-lg-12">
              </div>
        </div>
        <?php next($imgs) ?>
   		<?php else: ?>
   		 <div class="carousel-item">
            <div class="img">
               <img src="<?php echo $this->base_url.'views/img/'.$img->getSrc(); ?>" class=" col-lg-12">
            </div>
        </div>
       <?php endif; ?>
      <?php endforeach; ?>
 	
         
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>

        </div>
      </div>
      </div>
  	<?php endif;?>
     
  </section>
  <section class="container custom-view news">
      <div class="col-lg-2 comment-h">
         <h4>Comentários</h4>
      </div>
     
     <div class="row comments">
        <div class="col-lg-2">
           <img src="img/03.jpg" class="col-lg-8">
           <p class="text-center">Fulano de tal</p>
        </div>
        <div class="col-lg-10 ">
           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In id rhoncus tortor. Sed scelerisque ante massa, vel scelerisque purus convallis eget. Donec libero nunc, aliquam et volutpat ut, pharetra in velit. Sed ullamcorper posuere mauris eget ultricies. In quis justo convallis, venenatis ex a, fermentum nisi. Curabitur non vehicula erat, nec euismod mauris. Pellentesque nec ornare nunc.</p>
        </div>

        <div class="row comments-secondary">
          <div class="col-lg-2">
             <img src="img/03.jpg" class="col-lg-8">
             <p class="text-center">Fulano de tal</p>
          </div>
          <div class="col-lg-10 ">
             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In id rhoncus tortor. Sed scelerisque ante massa, vel scelerisque purus convallis eget. Donec libero nunc, aliquam et volutpat ut, pharetra in velit. Sed ullamcorper posuere mauris eget ultricies. In quis justo convallis, venenatis ex a, fermentum nisi. Curabitur non vehicula erat, nec euismod mauris. Pellentesque nec ornare nunc.</p>
          </div>
       </div>

     </div>
      <div class="row comments">
        <div class="col-lg-2">
           <img src="img/03.jpg" class="col-lg-8">
           <p class="text-center">Fulano de tal</p>
        </div>
        <div class="col-lg-10 ">
           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In id rhoncus tortor. Sed scelerisque ante massa, vel scelerisque purus convallis eget. Donec libero nunc, aliquam et volutpat ut, pharetra in velit. Sed ullamcorper posuere mauris eget ultricies. In quis justo convallis, venenatis ex a, fermentum nisi. Curabitur non vehicula erat, nec euismod mauris. Pellentesque nec ornare nunc.</p>
        </div>
     </div>
      <div class="row comments">
        <div class="col-lg-2">
           <img src="img/03.jpg" class="col-lg-8">
           <p class="text-center">Fulano de tal</p>
        </div>
        <div class="col-lg-10 ">
           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In id rhoncus tortor. Sed scelerisque ante massa, vel scelerisque purus convallis eget. Donec libero nunc, aliquam et volutpat ut, pharetra in velit. Sed ullamcorper posuere mauris eget ultricies. In quis justo convallis, venenatis ex a, fermentum nisi. Curabitur non vehicula erat, nec euismod mauris. Pellentesque nec ornare nunc.</p>
        </div>
     </div>
      <div class="row comments">
        <div class="col-lg-2">
           <img src="img/03.jpg" class="col-lg-8">
           <p class="text-center">Fulano de tal</p>
        </div>
        <div class="col-lg-10 ">
           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In id rhoncus tortor. Sed scelerisque ante massa, vel scelerisque purus convallis eget. Donec libero nunc, aliquam et volutpat ut, pharetra in velit. Sed ullamcorper posuere mauris eget ultricies. In quis justo convallis, venenatis ex a, fermentum nisi. Curabitur non vehicula erat, nec euismod mauris. Pellentesque nec ornare nunc.</p>
        </div>
        <div class="row comments-secondary">
          <div class="col-lg-2">
             <img src="img/03.jpg" class="col-lg-8">
             <p class="text-center">Fulano de tal</p>
          </div>
          <div class="col-lg-10 ">
             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In id rhoncus tortor. Sed scelerisque ante massa, vel scelerisque purus convallis eget. Donec libero nunc, aliquam et volutpat ut, pharetra in velit. Sed ullamcorper posuere mauris eget ultricies. In quis justo convallis, venenatis ex a, fermentum nisi. Curabitur non vehicula erat, nec euismod mauris. Pellentesque nec ornare nunc.</p>
          </div>
       </div>
     </div>
  </section>