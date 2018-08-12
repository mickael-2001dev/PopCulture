<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script src="<?php echo $this->asset ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo $this->asset ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo $this->asset ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo $this->asset ?>bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo $this->asset ?>bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo $this->asset ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo $this->asset ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo $this->asset ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo $this->asset ?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo $this->asset ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo $this->asset ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo $this->asset ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo $this->asset ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo $this->asset ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo $this->asset ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $this->asset ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo $this->asset ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $this->asset ?>dist/js/demo.js"></script>

<script src="<?php echo $this->asset ?>dist/js/auth.js"></script>

<script src="<?php echo $this->asset ?>bower_components/chart.js/Chart.js"></script>

<script src="<?php echo $this->asset ?>bower_components/ckeditor/ckeditor.js"></script>

<script src="<?php echo $this->asset ?>plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo $this->asset ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo $this->asset ?>plugins/input-mask/jquery.inputmask.extensions.js"></script>

<!--<script src="<?php echo $this->asset ?>plugins/validator.js"></script>-->

<script src="<?php echo $this->asset ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $this->asset ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script>
<script type="text/javascript" src="<?php echo $this->asset ?>dist/js/charts.js">"></script>
<!-- FastClick -->
<!-- AdminLTE App -->
<!-- page script -->
<script>
window.onload = function(){
 
 $(document).ready(function() {
    function replaceAll(string, token, newtoken) {
      while (string.indexOf(token) != -1) {
        string = string.replace(token, newtoken);
      }
      return string;
    }
var news = new Vue({
     el: '#news',
          data: {
          results: [
         
          ],
        },
        methods: {
          getNews: function() {
            $('table').hide();
            $('.loading-img').show();
            axios.get('/PopCulture/app/AdminNews/get').then(response => {
              this.results = response.data;
            }).then(()=>{
              $('table').show();
              $('.loading-img').hide();
              $('#news-table').DataTable({
                 "paging": true,
                  "ordering": true,
                  "info": true,
                  "autoWidth": false
              });
             
              deleteNews();
              updateNews();  
            })
          },
          getNewsTableNone: function() {
             axios.get('/PopCulture/app/AdminNews/get').then(response => {
              this.results = response.data
            })
          }
        },
        mounted() {
          this.getNews();
        },
  }); 
var message = new Vue({
      el: '#message',
          data: {
          results: [
         
          ],
        },
        methods: {
          getMessage: function() {
            $('table').hide();
            $('.loading-img').show();
            axios.get('/PopCulture/app/AdminMessage/get').then(response => {
              this.results = response.data
            }).then(()=>{
                $('table').show();
              $('.loading-img').hide();
              $('#message-table').DataTable({
                 "paging": true,
                  "ordering": true,
                  "info": true,
                  "autoWidth": false
              }); 
             
              deleteMessage();
              replyMessage();
              viewMessage();
            })
          },
          getMessageTableNone: function(){
             axios.get('/PopCulture/app/AdminMessage/get').then(response => {
              this.results = response.data
            })
          }
        },
        mounted() {
          this.getMessage();
        },
      
  }); 
 var videopage = new Vue({
      el: '#videopage',
          data: {
          results: [
         
          ],
        },
        methods: {
          getVideo: function() {
            $('table').hide();
            $('.loading-img').show();
            axios.get('/PopCulture/app/AdminVideo/get').then(response => {
              this.results = response.data
            }).then(()=>{
              $('table').show();
              $('.loading-img').hide();
              $('#video-table').DataTable({
                "paging": true,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false
              });  
              
              deleteVideo();
              updateVideo(); 
            })
          },
          getVideoTableNone: function() {
             axios.get('/PopCulture/app/AdminVideo/get').then(response => {
              this.results = response.data
            })
          }
        },
        mounted() {
          this.getVideo();
          console.log(this.results);
        }
  }); 
var post = new Vue({
      el: '#post',
          data: {
          results: [
         
          ],
        },
        methods: {
          getPost: function() {
            $('table').hide();
            $('.loading-img').show();
            axios.get('/PopCulture/app/AdminPost/get').then(response => {
              this.results = response.data;
            }).then(()=>{
              $('table').show();
              $('.loading-img').hide();
              $('#post-table').DataTable({
                 "paging": true,
                  "ordering": true,
                  "info": true,
                  "autoWidth": false
              });
             
              deletePost();
              updatePost();  
            })
          },
          getPostTableNone: function() {
             axios.get('/PopCulture/app/AdminPost/get').then(response => {
              this.results = response.data
            })
          }
        },
        mounted() {
          this.getPost();
        },
  }); 
 var categoria = new Vue({
      el: '#categoria',
          data: {
          results: [
         
          ],
        },
        methods: {
          getCategoria: function() {
            axios.get('/PopCulture/app/AdminPost/getCategoria').then(response => {
              this.results = response.data
            })
          }
        },
        mounted() {
          this.getCategoria();
        }
  }); 
var videos = new Vue({
      el: '#videos',
          data: {
          results: [
         
          ],
        },
        methods: {
          getVideos: function(q) {
            axios.get('https://www.googleapis.com/youtube/v3/search', {params:{part: 'id', maxResults: 10, q: q, type:'video', key:'AIzaSyCnAlD9ZyhG3271N-jJZS0yvwCYTlGyj-4'}}).then(response => {
              this.results = response.data;
            })
          },
          select: function(val) {
            selectVideo(val);
          }
        }
   });
  $('#search').click(function(){
    var q = $('#query').val();
    $('#videos').show().fadeIn(400);
       
    videos.getVideos(q);//Enviando a keyword via requisição http com Vue
    console.log(videos.results);
  });
  
  /*Salvando o video selecionado*/
    function selectVideo(id){
      $('#codevideo').val(id);
      console.log( $('#codevideo').val());
      $('#videos').css({
        display: 'none'
      });
    }
      
    
    function deleteNews(){
      $('.delete-news').click(function() {
          var id = $(this).val();
          $('#modal-delete-news').modal('show');
          $('#news-id').html(id);
          $('#delete').click(function() {
            $.ajax({
                url:'/PopCulture/app/AdminNews/delete/'+id,
                success: function(){
                    $('#modal-delete-news').modal('hide');
                    $('#success-delete').modal('show');
                    news.getNewsTableNone();
                    //loadResources();
                }
            });
        });
      });
    }
    function deleteMessage(){
      $('.delete-message').click(function() {
          var id = $(this).val();
          $('#modal-delete-message').modal('show');
          $('#message-id').html(id);
          $('#delete').click(function() {
            $.ajax({
                url:'/PopCulture/app/AdminMessage/delete/'+id,
                success: function(){
                    $('#modal-delete-message').modal('hide');
                    $('#success-delete').modal('show');
                    message.getMessageTableNone();
                    //loadResources();
                }
            });
        });
      });
    }
    function deleteVideo(){
      $('.delete-video').click(function() {
          var id = $(this).val();
          $('#modal-delete-video').modal('show');
          $('#video-id').html(id);
          $('#delete').click(function() {
            $.ajax({
                url:'/PopCulture/app/AdminVideo/delete/'+id,
                success: function(){
                    $('#modal-delete-video').modal('hide');
                    $('#success-delete').modal('show');
                    videopage.getVideoTableNone();
                    //loadResources();
                }
            });
        });
      });
    }
    function deletePost(){
      $('.delete-post').click(function() {
          var id = $(this).val();
          $('#modal-delete-post').modal('show');
          $('#post-id').html(id);
          $('#delete').click(function() {
            $.ajax({
                url:'/PopCulture/app/AdminPost/delete/'+id,
                success: function(){
                    $('#modal-delete-post').modal('hide');
                    $('#success-delete').modal('show');
                    post.getPostTableNone();
                    //loadResources();
                }
            });
        });
      });
    }
  function updateNews(){
      $('.update-news').click(function() {
        var id = $(this).attr('value');
        $('.form-group').removeClass('has-success');
        $('#modal-update-news').modal('show');
        var results = [];
        $.ajax({
            type: 'GET',
            url: '/PopCulture/app/AdminNews/get/'+id,
            dataType: 'json',
            success: function(response){
                  results = response;
                  console.log(results);
                 
                    var date = results.date_time;
                    date = replaceAll(date, "/", "-");
                    var newdate = date.split("-").reverse().join("-");
                    console.log(newdate);
                    $('#idinput').val(id);
                    $('#title').val(results.title);
                    $('#date').val('20'+newdate);
                    $('#image_default').val( results.image);
                    CKEDITOR.instances.editor1.setData(results.article); 
                      $('#save').click(function(){
                      //saveUpdateNews();
                      $('#update-news-form').submit();
                     
                    });
                
            }
        });
     
      
      
      });
    }
    function replyMessage(){
      $('.reply-message').click(function() {
        var id = $(this).attr('value');
        $('.form-group').removeClass('has-success');
        $('#modal-reply-message').modal('show');
        $('#idperson').val(id);
        $('#save').click(function(){
                      //saveUpdateNews();
            $('#reply-message-form').submit();
                     
        });
     
      
      
      });
    }
    function updateVideo(){
      $('.update-video').click(function() {
       
        var id = $(this).attr('value');
        $('.form-group').removeClass('has-success');
        $('#modal-update-video').modal('show');
        var results = [];
        $.ajax({
            type: 'GET',
            url: '/PopCulture/app/AdminVideo/get/'+id,
            dataType: 'json',
            success: function(response){
                  results = response;
                  console.log(results);
                 
                    var date = results.date_time;
                    date = replaceAll(date, "/", "-");
                    var newdate = date.split("-").reverse().join("-");
                    console.log(newdate);
                    $('#idinput').val(id);
                    $('#title').val(results.title);
                    $('#date').val('20'+newdate);
                    $('#image_default').val( results.image);
                    CKEDITOR.instances.editor1.setData(results.article); 
                      $('#save').click(function(){
                      //saveUpdatevideo();
                      $('#update-video-form').submit();
                     
                    });
                
            }
        });
     
      
      
      });
    }
    function updatePost(){
      $('.update-post').click(function() {
        var id = $(this).attr('value');
        $('.form-group').removeClass('has-success');
        $('#modal-update-post').modal('show');
        var results = [];
        $.ajax({
            type: 'GET',
            url: '/PopCulture/app/AdminPost/get/'+id,
            dataType: 'json',
            success: function(response){
                  results = response;
                  console.log(results);
                 
                    var date = results.date_time;
                    date = replaceAll(date, "/", "-");
                    var newdate = date.split("-").reverse().join("-");
                    console.log(newdate);
                    $('#idinput').val(id);
                    $('#title').val(results.title);
                    $('#date').val('20'+newdate);
                    $('#image_default').val( results.image);
                    console.log(results.categoria);
                    console.log($('option'));
                    /*for(i = 0; i < $('option').length; i++){
                      if($('option').val() == results.categoria){
                        console.log('true');
                      }
                    }*/
                   $('option').each(function() {
                     var text = $(this).val();
                     console.log(text);
                     if(text == results.idcategoria) {
                        console.log('AAAAAAAAAA');
                        $(this).attr('selected', 'selected');
                     }
                   });
        
                   
                    CKEDITOR.instances.editor1.setData(results.article); 
                      $('#save').click(function(){
                      //saveUpdatepost();
                      $('#update-post-form').submit();
                     
                    });
                
            }
        });
     
      
      
      });
    }
    function viewMessage(){
      $('.view-message').click(function() {
        var id = $(this).attr('value');
        $('#view-message').modal('show');
        var results = [];
        $.ajax({
            type: 'GET',
            url: '/PopCulture/app/AdminMessage/get/'+id,
            dataType: 'json',
            success: function(response){
                  results = response;
                  console.log(results);
                  console.log(results.message);
                  $('#email').html(results.email);
                  $('#name_ms').html(results.name_ms);
                  $('#message-received').html(results.message);
                 
                  console.log($('#message'));
                
            }
        });
     
      
      
      });
    }
    function loadResources() {
        setTimeout(function(){ 
              
            
              deletePost();
              updatePost();
              //updateNews();
              $('#example2_next').click(function(){
                  deleteNews();
                  updateNews();
                  deletePost();
                  updatePost();
              });
        }, 500);
    }
   
   // loadResources();
   
  CKEDITOR.replace('editor1');
  //CKEDITOR.replace('editor2');
  function CKupdate(){
    for ( instance in CKEDITOR.instances ){
        CKEDITOR.instances[instance].updateElement();
        CKEDITOR.instances[instance].setData('');
    }
  }
$.validator.setDefaults({
    errorElement: "span",
    errorClass: "help-block",
    highlight: function (element, errorClass, validClass) {
        // Only validation controls
        if (!$(element).hasClass('novalidation')) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
          
        }
    },
    unhighlight: function (element, errorClass, validClass) {
        // Only validation controls
        if (!$(element).hasClass('novalidation')) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
          
        }
    },
    errorPlacement: function (error, element) {
        $('p.help-block').hide();
        if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        }
        else if (element.prop('type') === 'radio' && element.parent('.radio-inline').length) {
            error.insertAfter(element.parent().parent());
        }
        else if (element.prop('type') === 'textarea') {
            error.insertAfter('#cke_editor1');
        }
        else if (element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
            error.appendTo(element.parent().parent());
        }
        else {
            error.insertAfter(element);
        }
    }
});
  
  
    $('#add-news-form').validate({
        ignore: [],
        rules:{
            title: {
              required: true,
              minlength: 3
            },
            date_time: {
              required: true
            },
            image: {
              required: true
            },
            article: {
                required:  function(textarea) {
                  CKEDITOR.instances[textarea.id].updateElement(); // update textarea
                  var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
                  return editorcontent.length === 0;
                },
                minlength: 10
            }
        },
        messages: {
          title: {
            required: "Você não inseriu um titulo a notícia",
            minlength: "No mínimo 3 caracteres"
          },
          date_time:{
            required: "Você não inseriu uma data válida para a notícia"
          },
          image:{
            required: "Você não inseriu uma imagem para a notícia"
          },
          article:{
            required: "Você não inseriu um artigo para a notíca",
            minlength: "No mínimo 10 caracteres"
          }
        },
        submitHandler: function() {
          var data = new FormData($('#add-news-form')[0]);
        
          $.ajax({
            type: 'POST',
            url: '/PopCulture/app/AdminNews/save',
            data: data,
            processData: false,
            contentType: false,
            dataType: 'html',
            success: function(response) {
                $('#resp').css({
                  display: 'block'
                });
                $('#resp').html(response);
                $('html, body').animate({scrollTop:0}, 'fast');
                $('#add-news-form').trigger('reset');
               
                 CKupdate();
               
   
            }
           });
            return false;
          }
      });
    $('#add-post-form').validate({
        ignore: [],
        rules:{
            title: {
              required: true,
              minlength: 3
            },
            date_time: {
              required: true
            },
            image: {
              required: true
            },
            categoria: {
              required: true
            },
            article: {
                required:  function(textarea) {
                  CKEDITOR.instances[textarea.id].updateElement(); // update textarea
                  var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
                  return editorcontent.length === 0;
                },
                minlength: 10
            }
        },
        messages: {
          title: {
            required: "Você não inseriu um titulo a notícia",
            minlength: "No mínimo 3 caracteres"
          },
          date_time:{
            required: "Você não inseriu uma data válida para a notícia"
          },
          image:{
            required: "Você não inseriu uma imagem para a notícia"
          },
          article:{
            required: "Você não inseriu um artigo para a notíca",
            minlength: "No mínimo 10 caracteres"
          },
          categoria:{
            required: "Selecione a categoria!"
          }
        },
        submitHandler: function() {
          var data = new FormData($('#add-post-form')[0]);
        
          $.ajax({
            type: 'POST',
            url: '/PopCulture/app/AdminPost/save',
            data: data,
            processData: false,
            contentType: false,
            dataType: 'html',
            success: function(response) {
                $('#resp').css({
                  display: 'block'
                });
                $('#resp').html(response);
                $('html, body').animate({scrollTop:0}, 'fast');
                $('#add-post-form').trigger('reset');
               
                 CKupdate();
               
   
            }
           });
            return false;
          }
      });
  $('#add-video-form').validate({
        ignore: [],
        rules:{
            title: {
              required: true,
              minlength: 3
            },
            date_time: {
              required: true
            },
            image: {
              required: true
            },
            query:{
              required: true
            },
            article: {
                required:  function(textarea) {
                  CKEDITOR.instances[textarea.id].updateElement(); // update textarea
                  var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
                  return editorcontent.length === 0;
                },
                minlength: 10
            }
        },
        messages: {
          title: {
            required: "Você não inseriu um titulo a notícia",
            minlength: "No mínimo 3 caracteres"
          },
          date_time:{
            required: "Você não inseriu uma data válida para a notícia"
          },
          image:{
            required: "Você não inseriu uma imagem para a notícia"
          },
          article:{
            required: "Você não inseriu um artigo para a notíca",
            minlength: "No mínimo 10 caracteres"
          },
          query:{
            required: "Selecio um video!"
          }
        },
        submitHandler: function() {
          var data = new FormData($('#add-video-form')[0]);
        
          $.ajax({
            type: 'POST',
            url: '/PopCulture/app/AdminVideo/save',
            data: data,
            processData: false,
            contentType: false,
            dataType: 'html',
            success: function(response) {
                $('#resp').css({
                  display: 'block'
                });
                $('#resp').html(response);
                $('html, body').animate({scrollTop:0}, 'fast');
                $('#add-video-form').trigger('reset');
               
                 CKupdate();
               
   
            }
           });
            return false;
          }
      });
    //function saveUpdateNews() {
    $('#update-news-form').validate({
        ignore: [],
        rules:{
            title: {
              required: true,
              minlength: 3
            },
            date_time: {
              required: true
            },
            article: {
                required:  function(textarea) {
                  CKEDITOR.instances[textarea.id].updateElement(); // update textarea
                  var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
                  return editorcontent.length === 0;
                },
                minlength: 10
            }
        },
        messages: {
          title: {
            required: "Você não inseriu um titulo a notícia",
            minlength: "No mínimo 3 caracteres"
          },
          date_time:{
            required: "Você não inseriu uma data válida para a notícia"
          },
          article:{
            required: "Você não inseriu um artigo para a notíca",
            minlength: "No mínimo 10 caracteres"
          }
        },
        submitHandler: function() {
          var data = new FormData($('#update-news-form')[0]);
          var id = $('#idinput').val();
          $.ajax({
            type: 'POST',
            url: '/PopCulture/app/AdminNews/saveUpdate/'+id,
            data: data,
            processData: false,
            contentType: false,
            dataType: 'html',
            success: function(response) {
                $('#modal-update-news').modal('hide');
                console.log(response);
                /*$('#resp').css({
                  display: 'block'
                });
                $('#resp').html(response);*/
                news.getNewsTableNone();
                //$('#save').addClass('pull-left');
                //$('html, body').animate({scrollTop:0}, 'fast');
               
   
            }
           });
            return false;
          }
      });
    $('#reply-message-form').validate({
        ignore: [],
        rules:{
            message: {
                required:  function(textarea) {
                  CKEDITOR.instances[textarea.id].updateElement(); // update textarea
                  var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
                  return editorcontent.length === 0;
                },
                minlength: 10
            }
        },
        message: {
          title: {
            required: "Você não inseriu uma mensagem",
            minlength: "No mínimo 3 caracteres"
          }
        },
        submitHandler: function() {
          var data = new FormData($('#reply-message-form')[0]);
          var id = $('#idperson').val();
          $('#resp').show();
          $('#resp').html("<img width='80' class='col-lg-offset-5' src='http://profanderson.blog.etecarmine.com.br/wp-content/uploads/2017/10/loading-gif-transparent-10.gif'><br><br>");
          $.ajax({
            type: 'POST',
            url: '/PopCulture/app/AdminMessage/replyMessage/'+id,
            data: data,
            processData: false,
            contentType: false,
            dataType: 'html',
            success: function(response) {
                
                console.log(response);
                /*$('#resp').css({
                  display: 'block'
                });
               */
               // $('#modal-reply-message').modal('hide');
                $('#reply-message-form').trigger('reset');
                message.getMessageTableNone();
                //$('#save').addClass('pull-left');
                //$('html, body').animate({scrollTop:0}, 'fast');
                $('#resp').html(response);
               
                CKupdate();
            }
           });
            return false;
          }
      });
      $('#update-video-form').validate({
        ignore: [],
        rules:{
            title: {
              required: true,
              minlength: 3
            },
            date_time: {
              required: true
            },
            article: {
                required:  function(textarea) {
                  CKEDITOR.instances[textarea.id].updateElement(); // update textarea
                  var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
                  return editorcontent.length === 0;
                },
                minlength: 10
            }
        },
        messages: {
          title: {
            required: "Você não inseriu um titulo a notícia",
            minlength: "No mínimo 3 caracteres"
          },
          date_time:{
            required: "Você não inseriu uma data válida para a notícia"
          },
          article:{
            required: "Você não inseriu um artigo para a notíca",
            minlength: "No mínimo 10 caracteres"
          }
        },
        submitHandler: function() {
          var data = new FormData($('#update-video-form')[0]);
          var id = $('#idinput').val();
          $.ajax({
            type: 'POST',
            url: '/PopCulture/app/AdminVideo/saveUpdate/'+id,
            data: data,
            processData: false,
            contentType: false,
            dataType: 'html',
            success: function(response) {
                $('#modal-update-video').modal('hide');
                //console.log(response);
                /*$('#resp').css({
                  display: 'block'
                });
                $('#resp').html(response);*/
                videopage.getVideoTableNone();
                //$('#save').addClass('pull-left');
                //$('html, body').animate({scrollTop:0}, 'fast');
               
   
            }
           });
            return false;
          }
      });
       $('#update-post-form').validate({
        ignore: [],
        rules:{
            title: {
              required: true,
              minlength: 3
            },
            date_time: {
              required: true
            },
            categoria: {
              required: true
            },
            article: {
                required:  function(textarea) {
                  CKEDITOR.instances[textarea.id].updateElement(); // update textarea
                  var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
                  return editorcontent.length === 0;
                },
                minlength: 10
            }
        },
        messages: {
          title: {
            required: "Você não inseriu um titulo a notícia",
            minlength: "No mínimo 3 caracteres"
          },
          date_time:{
            required: "Você não inseriu uma data válida para a notícia"
          },
          article:{
            required: "Você não inseriu um artigo para a notíca",
            minlength: "No mínimo 10 caracteres"
          },
          categoria:{
            required: "Selecione a categoria!"
          }
        },
        submitHandler: function() {
          var data = new FormData($('#update-post-form')[0]);
          var id = $('#idinput').val();
          $.ajax({
            type: 'POST',
            url: '/PopCulture/app/AdminPost/saveUpdate/'+id,
            data: data,
            processData: false,
            contentType: false,
            dataType: 'html',
            success: function(response) {
                $('#modal-update-post').modal('hide');
                console.log(response);
                /*$('#resp').css({
                  display: 'block'
                });
                $('#resp').html(response);*/
                post.getPostTableNone();
                //$('#save').addClass('pull-left');
                //$('html, body').animate({scrollTop:0}, 'fast');
               
   
            }
           });
            return false;
          }
      });
    //}
 });
}
</script>
</body>
</html>