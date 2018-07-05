 <footer class="py-5 bg-black">
      <div class="container text-center social-medias">
          <a href="https://www.facebook.com/mickael.brazdesouza"  style="text-decoration: none;">
                        <span class="fa-stack fa-lg circle">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-facebook fa-stack-1x fa-inverse social"></i>
                        </span>
                    </a>
                    <a href="https://twitter.com/space_mika"  style="text-decoration: none">
                        <span class="fa-stack fa-lg circle">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-twitter fa-stack-1x fa-inverse social"></i>
                        </span>
                    </a>
                    <a href="#" style="text-decoration: none;" >
                        <span class="fa-stack fa-lg circle">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-envelope fa-stack-1x fa-inverse social"></i>
                        </span>
                    </a>

      </div>
      <div class="container">
        
        <p class="m-0 text-center text-white">Copyright &copy; PopCulture Brasil 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo $this->asset ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo $this->asset ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        $('.carousel').carousel();
        $('div.bgParallax').each(function(){
            var $obj = $(this);
         
            $(window).scroll(function() {
                var yPos = -($(window).scrollTop() / $obj.data('speed')); 
         
                var bgpos = '50% '+ yPos + 'px';
         
                $obj.css('background-position', bgpos );
         
            }); 
        });

        $("#message-form").submit(function(){
            var data = new FormData($('#message-form')[0]);
            $('#resp').show();
            $('#resp').html("<img width='80' src='http://profanderson.blog.etecarmine.com.br/wp-content/uploads/2017/10/loading-gif-transparent-10.gif'>");
            $.ajax({
                type: 'POST',
                url: '/PopCulture/app/Contato/sendMessage',
                data: data,
                processData: false,
                contentType: false,
                dataType: 'html',
                success: function(response){
                    
                    $('#resp').html(response)
                }
            });
            return false;
        });
    </script>
  </body>

</html>
