  <?php if($data['msg']): ?>
        <div class="alert alert-success alert-flat">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>   
        <h4>Sucesso!</h4>
       	
        <?php echo $data['msg']; ?>
        <?php if (isset($data['link'])): ?>
        	<a href="<?php echo $this->base_url.''.$data['link']?>">Voltar</a>
        <?php endif ?>
        </div>
        <?php if(isset($data['img'])): ?>
        <div class="divider"></div>
        	<div class="col-lg-8 img-show">
        		<img src="<?php echo $this->base_url.''.$data['img'] ?>" class="col-lg-12 img-responsive img-show">
        	</div>
        <?php endif; ?>
  <?php endif; ?>