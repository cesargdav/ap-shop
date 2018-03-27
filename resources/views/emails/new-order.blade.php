<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nuevo pedido</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>
<body>

<p>Se ha realizado un nuevo pedido! :)</p>

<p>Estos son los datos del cliente que realizó el pedido</p>

<ul>
    <li>
        <strong>Nombre: </strong>
        {{ $user->name }}
    </li>
    <li>
        <strong>E-mail: </strong>
        {{ $user->email }}
    </li>
    <li>
        <strong>Fecha del pedido: </strong>
        {{ $cart->order_date }}
    </li>
</ul>

<hr>
<p>Detalles del pedido</p>
<ul>
    @foreach ($cart->details as $detail)
    <li>
        {{ $detail->product->name }} x {{ $detail->quantity }} ($ {{ $detail->quantity * $detail->product->price }})
    </li>
    @endforeach
</ul>
<p>
    <strong>Total a pagar: </strong>{{ $cart->total }}
</p>

<p>
    <a href="{{ url('admin/orders/'.$cart->id) }}">Haz clic aquí</a> para ver mas información del pedido.
</p>
    
</body>
</html>