<!DOCTYPE html>
<html>
<head>
	<title>Nuevo Pedido</title>
</head>
<body>
	<p> Se ha realizado un nuevo pedido!</p>
	<p> Estos son lo datos del Usuario que realizo el pedido</p>
	<ul>
		<li>
			<strong>Nombre: </strong>
			{{$user->name}}
		</li>
		<li>
			<strong>Telefono: </strong>
			{{$user->phone}}
		</li>
		<li>
			<strong>E-mail: </strong>
			{{$user->email}}
		</li>
		<li>
			<strong>Fecha del Pedido: </strong>
			{{ $cart->order_date}}
		</li>
	</ul>
	<hr>
	<p>Detalles del Peidio</p>
	<ul>
		@foreach($cart->details as $detail)
		<li>
			{{ $detail->product->name }} x {{ $detail->quantity}}
			(S/ {{ $detail->quantity * $detail->product->price}} )
		</li>
		@endforeach
	</ul>
	<p>
		<strong> Importe a pagar:</strong> {{ $cart->total }}
	</p>
	<hr>
	<p>
		<a href="{{ url('/admin/orders/'.$cart->id) }}">Haz Click aqui</a>
		 para ver mas informacion sobre este pedido
	</p>
</body>
</html>
