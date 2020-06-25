@extends('productos.template')
@section('contenido')
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<link rel="stylesheet" href="https://bootswatch.com/4/united/bootstrap.min.css">
<script src="bootstrap.min.js"></script>
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
                                 <a href="#" class="fitness-btn menu-btn ml-20 producto" precio="{{$p->costo}}" titulo="{{$p->descripcion}}" role="button"><span class="fa fa-shopping-cart"></span> Agregar al Carrito</a></p>
                               </div>
                             </div>
                           </div>
                         </div>
					               @endforeach
				          </div>
		        </div>
        </div>
<br></br>
<script src="{{ asset('minicart.js')}}"></script>
	<script>
	  // configuración inicial del carrito
	  paypal.minicart.render({
	  strings:{
	    button:'Pagar'
	   ,buttonAlt: "Total"
	   ,subtotal: 'Total:'
	   ,empty: 'No hay productos en el carrito'
	  }
	  });
	  // Eventos para agregar productos al carrito

	   $('.producto').click(function(e){
	       e.stopPropagation();
		    paypal.minicart.cart.add({
			business: 'sporthousexonacatlan@gmail.com', // Cuenta paypal para recibir el dinero
			item_name: $(this).attr("titulo"),
			 amount: $(this).attr("precio"),
			 currency_code: 'MXN',

			});
	   });

	</script>
@stop
