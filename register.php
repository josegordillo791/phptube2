<?php
   $mje="";
   $usuario="";
   $email="";
   $password="";
   $repitepassword="";
   /*  echo "hola"; */

if (!isset($_POST["de_acuerdo"])){
  $mje.="debe aceptar los terminos y condiciones <br>";
  
}else{
  $mje.="Ha aceptado los terminos y condiciones";
}



if(   (isset($_POST["email"])) 
    &&   (isset($_POST["password"])) 
     &&   (!isset($_POST["repite_password"])) ) 
{  
  if (isset($_POST["email"])=="") {
    $mje.="Debe ingresar un email <br>";
      
  }

  if (isset($_POST["password"])=="") {
    $mje.="Debe ingresar la contraseña <br>";

  }

  if (isset($_POST["repite_password"])=="") {
    $mje.="Debe repetir la contraseña <br>";
      
  }
  die();
}

  if (isset($_POST["repite_password"])!=isset($_POST["password"])) {
    $mje.="Las contraseñas no son iguales .Verifique <br>";
  }else{
   
    $servername = "localhost";
    $username = "root";
    $passbd = "";
    $dbname = "phptube";

    // Creamos la conexion
    $conn = new mysqli($servername, $username, $passbd, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }else{
        $usuario=strip_tags($_POST["usuarionombre"]);  
        $email=strip_tags($_POST["usuarioemail"]);
        $password= strip_tags($_POST["usuariopassword"]);

          echo "conexion exitosa a ".$dbname."<br>";
          $sql = "INSERT INTO `usuarios` (`usuario_nombre`, `usuario_fecha`, `usuario_email`, `usuario_clave`, `usuario_ip`, `usuario_ultimo_login`) 
                  VALUES ('".$usuario."', current_timestamp(), '".$email."', '".$password."', '192.334.34', current_timestamp())";

          if ($conn->query($sql) === TRUE) {
            
            echo "Se ha insertado un nuevo registro desde el form";
            $conn->close();
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }


    }
     
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page bg-dark">
<div class="register-box bg-red">
  <div class="card card-outline card-primary bg-black">
    <div class="card-header text-center">
        <img src="./img/phptube.png" alt="" width="110px" height="110px" srcset="">
      </div>
    <div class="card-body">
      <p class="login-box-msg">Registrar nuevo usuario</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="usuarionombre" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="usuarioemail" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="usuariopassword" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="repitepassword" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="de_acuerdo">
              <label for="agreeTerms">
                Aceptar <a href="#">terminos</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-5">
            <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <a href="login.html" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
