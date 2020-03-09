<html><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/scripts/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/scripts/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/scripts/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>




<body class="login-page" style="min-height: 518.391px;">

<div class="login-box">
<div id="error_message"></div>
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <!--<form action="" method="post">-->
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="UserName" id="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" id="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat" style="
    margin-left: 111%;
" id="login_user">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      <!--</form>-->

      
      <!-- /.social-auth-links -->

      <p class="mb-1">
        
      </p>
      <p class="mb-0">
        
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>/scripts/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>/scripts/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>/scripts/dist/js/adminlte.min.js"></script>



</body></html>




<script>
$(document).ready(function(){
  $("#login_user").click(function(){
    var datas = {
             username : $("#username").val(), 
                                            
             password : $("#password").val(),

             ajax : '1'
           };
              $.ajax({
              url : "<?php echo site_url();   ?>/admin/Login/request/login_user",
              type : "post",
              data : datas,
              success : function(msg){
                window.location.href = msg;
              
             }
    });

  });
});
</script>