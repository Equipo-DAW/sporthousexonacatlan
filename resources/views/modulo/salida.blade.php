@extends('admintemplate.main')

@section('contenido')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
  function ShowSelected()
  {
    /* Para obtener el valor */
    var cod = document.getElementById("empleado").value;
    document.getElementById("idempleado").value=cod;
    /* Para obtener el texto */
    var combo = document.getElementById("empleado");
    var selected = combo.options[combo.selectedIndex].text;
    document.getElementById("nombreemp").value=selected;
  }
</script>

<div class="col-md-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Hora de Salida</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
    <br />
      <form class="form-horizontal form-label-left input_mask" action = "{{route('guardaSalida')}}" method="POST" enctype='multipart/form-data' name="form_reloj">
        {{csrf_field()}}
          <div class="col-md-4 col-sm-4  form-group has-feedback">
            <label>No. Registro:</label>
          </div>
          <div class="col-md-4 col-sm-4  form-group has-feedback">
            <label>Fecha:</label>
          </div>
          <div class="col-md-4 col-sm-4  form-group has-feedback">
            <label>Hora de Entrada:</label>
          </div>
          <div class="col-md-3 col-sm-3  form-group has-feedback" hidden>
            <label><p style="color:white";>.</p></label>
          </div>
          <div class="col-md-4 col-sm-4  form-group has-feedback">
            <input type="text" class="form-control has-feedback-left" id="id_h" name="id_h" readonly style="background-color : white">
            <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
          </div>
          <div class="col-md-4 col-sm-4  form-group has-feedback">
            <input type="text" class="form-control has-feedback-left" id="fecha" name="fecha" readonly style="background-color : white">
            <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
          </div>
          <div class="col-md-4 col-sm-4  form-group has-feedback">
            <input type="text" class="form-control has-feedback-left" id="h_entrada" name="h_entrada" readonly style="background-color : white">
            <span class="fa fa-clock-o form-control-feedback left" aria-hidden="true"></span>
          </div>
          <div class="col-md-3 col-sm-3  form-group has-feedback" hidden>
            <input type="text" class="form-control has-feedback-left" id="idempleado" name="idempleado">
            <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
          </div>
          <div class="col-md-6 col-sm-6  form-group has-feedback">
            <label>Nombre Empleado:</label>
          </div>
          <div class="col-md-4 col-sm-4  form-group has-feedback">
            <label>Hora de Salida:</label>
          </div>
          <div class="col-md-6 col-sm-6  form-group has-feedback">
            <input type="text" class="form-control has-feedback-left" id="nombreemp" name="nombreemp" readonly style="background-color : white">
            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
            @if($errors->first('nombreemp'))<b>{{ $errors->first('nombreemp')}}@endif</b>
          </div>
          <div class="col-md-4 col-sm-4  form-group has-feedback">
            <input type="text" class="form-control has-feedback-left" id="reloj" name="reloj" size="6"  class="count" style="background-color : white; color : bold; font-family : Arial, Arial, Helvetica; font-size : 11pt; text-align : center;" onfocus="window.document.form_reloj.reloj.blur()" readonly>
            <span class="fa fa-clock-o form-control-feedback left" aria-hidden="true"></span>
          </div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
              <a type="button" class="btn btn-warning" href="{{URL::action('AdminController@inicio')}}"><i class="fa fa-rotate-left"></i> Cancelar</a>
              <button type="submit" class="btn btn-primary"><span class="fa fa-save"></span> Guardar</button>
            </div>
          </div>
      </form>
    </div>
  </div>
</div>

<div class="col-md-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Seleccione su Nombre</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
    <br />
      <form class="form-horizontal form-label-left input_mask" action = "" method="POST" enctype='multipart/form-data'>
        {{csrf_field()}}
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre Empleado: </label>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
              <select id='empleado' name='empleado' class="form-control"  onchange="ShowSelected();">
                <option>Seleccione su Nombre</option>
                @foreach($empleados as $empleado)
                  <option value = '{{$empleado->idempleado}}'>{{$empleado->nombreemp}} {{$empleado->apellidope}} {{$empleado->apellidome}}</option>
                @endforeach
              </select>
              <span class="fa fa-users form-control-feedback right" aria-hidden="true"></span>
            </div>
        </div>
        <div class="ln_solid"></div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$(document).on("change","#empleado",function(){
		$.ajax({
			url: 'http://localhost/sporthouse/buscar',
			headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
			type: 'POST',
			data: {idempleado: $(this).val()},
				success: function (resp) {
					var i = $(this).index("#empleado");
						$("#id_h:eq("+i+")").val(resp[0].id_h);
				}
		});
	});
  $(document).on("change","#empleado",function(){
		$.ajax({
			url: 'http://localhost/sporthouse/fecha',
			headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
			type: 'POST',
			data: {idempleado: $(this).val()},
				success: function (resp) {
					var i = $(this).index("#empleado");
						$("#fecha:eq("+i+")").val(resp[0].fecha);
				}
		});
	});
  $(document).on("change","#empleado",function(){
		$.ajax({
			url: 'http://localhost/sporthouse/hora',
			headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
			type: 'POST',
			data: {idempleado: $(this).val()},
				success: function (resp) {
					var i = $(this).index("#empleado");
						$("#h_entrada:eq("+i+")").val(resp[0].h_entrada);
				}
		});
	});
});
</script>

@stop