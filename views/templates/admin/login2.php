<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo $this->asset?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $this->asset?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo $this->asset?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $this->asset?>dist/css/AdminLTE.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo $this->asset?>plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo $this->base_url?>home"><b>PopCulture</b>Brasil</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Login</p>
    <div id="resp"></div>
    <form method="post" id="login-form">

      <div class="form-group has-feedback">
        <input type="text" name="user" class="form-control" placeholder="Usuário">
        <span class="form-control-feedback">
          <i class="fa fa-user"></i>
        </span>
      </div>
      <!--<div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email">
        <span class="form-control-feedback">
            <i class="fa fa-envelope"></i>
        </span>
      </div>-->
      <div class="form-group has-feedback">
        <input type="password" name="pass" class="form-control" placeholder="Password">
        <span class="form-control-feedback">
            <i class="fa fa-lock"></i>
        </span>
      </div>

      <div class="form-group">
        <input type="text" name="soma" class="form-control" placeholder="<?php echo $_SESSION['num1'].' + '.$_SESSION['num2'].' =  ' ?> ">
      
      </div>
    
      <div class="row">
        <div class="col-lg-12">
            <div class="col-xs-6">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox" name="continue"> Lembre-me
                </label>
               
              </div>
            </div>
            <div class="col-xs-6">
              <div class="checkbox">
                  <a href="#">Esqueci minha senha</a><br>
              </div>
              
            </div>
        </div>
        
        <!-- /.col -->
        <div class="col-lg-12">
          <button type="submit" class="btn btn-custom btn-lg btn-block btn-flat">Login</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


    <!-- /.social-auth-links -->

   
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo $this->asset?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo $this->asset?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo $this->asset?>plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });

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





    

    $('#login-form').validate({
        ignore: [],
        rules:{
            user: {
              required: true,
            },
            pass: {
              required: true
            }
        },
        messages: {
           user: {
              required: "Usuário obrigatório",
            },
            pass: {
             required: "Senha obrigatória",
            }
        },
        submitHandler: function() {
          var data = new FormData($('#login-form')[0]);
        
          $.ajax({
            type: 'POST',
            url: '/PopCulture/app/Admin/doLogin',
            data: data,
            processData: false,
            contentType: false,
            dataType: 'html',
            success: function(response) {
                $('#resp').css({
                  display: 'block'
                });
                console.log(response);
                
                if(response != true && isNaN(parseInt(response))) {
                   $('#resp').html(response);
                }else if(!isNaN(parseInt(response)) && response > 1) {
                   window.location.href="http://localhost/PopCulture/app/admin/changepassword/"+response;
                } else {
                  window.location.reload();
                }
               
          
   
            }
           });
            return false;
          }
      });
  });
</script>
</body>
</html>