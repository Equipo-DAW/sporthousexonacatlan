@extends('site.machote')
@section('contenido')
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(sitetemplate/img/bg-img/breadcumb-2.jpg);">
    <div class="bradcumbContent">
        <div class="container">
            <div class="row">
            </div>
        </div>
    </div>
  </div>
<div class="fitness-services-area section-padding-100-0">
		<div class="container">
				<div class="row">
					@foreach($productos as $p)
          <div class="col-sm-4">
            <div class="product-image-wrapper">
              <div class="single-products">
                  <div class="productinfo text-center">
                    <img src = "{{asset('Storage/app/public/'.$p->foto)}}" height=250 width=250>
                    <h2>$ {{$p->costo}}</h2>
                    <p>{{$p->descripcion}}</p>
                    <a href="iniciarsesioncliente" class="fitness-btn menu-btn ml-20"><i class="fa fa-shopping-cart"></i> Agregar al Carrito</a>
                  </div>
              </div>
            </div>
          </div>
					@endforeach
				</div>
		</div>
</div>
<br></br>
@stop
