 <?php if($data['msg']): ?>
        <div class="alert alert-danger">
        	<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        	<h4>Erro!</h4>
        <?php echo $data['msg']; ?>
            
        </div>
  <?php endif; ?>