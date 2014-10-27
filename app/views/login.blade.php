<!DOCTYPE html>
<html lang="es" xml:lang="es">
  <head>
      
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inicio de sesión</title>
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    @include('include.styles')
    <?php echo HTML::style('css/estilos2.css') ?> 
    <meta class="os-tdn" http-equiv="Content-Language" content="es"><meta class="os-tdn" property="og:locale" content="es">

</head>

  <body style='background-image: url("img/oes.jpg")'>
      
      
    <div class="container" style="width: 400px;">

      <form class="form-signin" method="post" action="login" style="margin-top: 40px;">

        <h2 class="form-signin-heading" style="font-size:25px;">Inicio de sesión</h2>

        @if (Session::has('login_errors'))
                    <b class="text-danger" >El nombre de usuario o la contraseña no son correctos.</b>
        @else
                    <b>Introduzca usuario y contraseña para continuar.</b>
        @endif

        <input name="username" type="text" class="form-control" placeholder="nombre de usuario" style="margin-top:10px;">
        <input name="password" type="password" class="form-control" placeholder="Contrase&#xF1;a" style="margin-top: 10px;">
        <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top: 10px;"><i class="fa fa-user fa-fw"></i>Iniciar sesión</button>
      </form>

    </div> 

    <?php // HTML::script('js/jquery.js') 
          // <img src="{{ asset('img/oes.png') }}" alt="">
    ?> 
      
</body>

</html>