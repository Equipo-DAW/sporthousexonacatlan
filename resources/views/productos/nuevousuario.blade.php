<head>
<link href="{{ asset('admintemplate/build/css/login.css')}}" rel="stylesheet">
<link href="{{ asset('admintemplate/build/css/all.css')}}" rel="stylesheet">
<link href="{{ asset('admintemplate/build/css/bootstrap.min.css')}}" rel="stylesheet">
<script src="{{ asset('admintemplate/build/js/jquery.slim.js')}}"></script>
<script src="{{ asset('admintemplate/build/js/bootstrap.bundle.min.js')}}"></script>
<link rel="icon" href="{{ asset('admintemplate/sport-house.png')}}" type="image/ico" />
<title> SportHouse Xonacatlán | Nuevo Cliente</title>
</head>
<body>
<div class="container-fluid">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <center><h3 class="login-heading mb-4">¡Bienvenido!</h3></center>
              <form action="{{route('guardaCliente')}}" method = "POST" enctype='multipart/form-data'>
                {{csrf_field()}}
                <div class="form-group">
                  <input type="text" id="idcliente" class="form-control" name='idcliente' value="{{$idc}}" hidden>
                  <input type="text" id="nombre" class="form-control" placeholder="Nombre(s)" name='nombre'>
                  <label></label>
                </div>
                <div class="form-group">
                  <input type="text" id="apellidopc" class="form-control" placeholder="Apellido Paterno" name='apellidopc'>
                  <label></label>
                </div>
                <div class="form-group">
                  <input type="text" id="apellidomc" class="form-control" placeholder="Apellido Materno" name='apellidomc'>
                  <label></label>
                </div>
                <div class="form-group">
                  <input type="email" id="email" class="form-control" placeholder="Correo Electronico" name='email'>
                  <label></label>
                </div>
                <div class="form-group">
                  <input type="password" id="contraseña" class="form-control" placeholder="Contraseña" name='contraseña'>
                  <label></label>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto: </label>
                    <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                      <input type="file" name="foto">
                    </div>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Crear Perfil</button>
                  <div class="text-center">
                    <a href="http://localhost:8080/sporthouse-local/iniciarsesioncliente" class="small">Cancelar</a>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
