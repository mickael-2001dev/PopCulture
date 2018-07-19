<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Recuperar Conta</title>
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
    <a href="<?php echo $this->base_url?>home"><b>Esqueci minha senha</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Você receberá um email com uma senha temporária, na proxima vez que você fizer login, você será redirecionado a uma página para mudá-la. Verifique seu email.</p>
    <div id="resp"></div>
    <form method="post" id="forget-form">

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
        <input type="email" name="email" class="form-control" placeholder="Email">
        <span class="form-control-feedback">
            <i class="fa fa-envelope"></i>
        </span>
      </div>

      
    
      <div class="row">
        <!-- /.col -->
        <div class="col-lg-12">
          <button type="submit" class="btn btn-custom btn-lg btn-block btn-flat">Enviar</button>
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
 $(document).ready(function () {
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





    

    $('#forget-form').validate({
        ignore: [],
        rules:{
            user: {
              required: true,
            },
            email: {
              required: true
            }
           
        },
        messages: {
           user: {
              required: "Por Favor preencha o nome de usuário",
            },
            email: {
             required: "Por Favor preencha seu email",
            }            
        },
        submitHandler: function() {
          var data = new FormData($('#forget-form')[0]);
          $('#resp').show();
          $('#resp').html("<img width='100' class='col-lg-offset-4' src='http://localhost/PopCulture/app/views/img/load.gif'><br><br><br>");
          $.ajax({
            type: 'POST',
            url: '/PopCulture/app/ForgetPassword/sendMyTempPassword',
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
                } else {
                    window.location.href="http://localhost/PopCulture/app/admin/";
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