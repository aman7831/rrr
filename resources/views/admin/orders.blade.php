<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('AgroPal', 'AgroPal') }}</title>
    <link rel="shortcut icon" href="/img/Tlogo.png" >

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">


    <!-- Styles -->
<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>
<style>
 body
{
    background-image: url('/img/bg.jpg');
} 
</style>
<body>
    <nav class="navbar">
        <span class="openslide">
            <a href="#" onclick="opensidemenu()">
            <i class="fas fa-bars"><span style="margin-left: 20px">Menu</span></i>
            </a>
        </span>
    </nav>
    <div id="side-menu" class="side-nav">
        <a href="#" class="btn-close" onclick="closesidemenu()">&times;</a>
        <br>
        <center>
        <img src="/img/Tlogo.png" style="height:50px; width:50px;"></center>
        <a href="/dashboard">Home</a> <br>
        <a href="/admin_user_details">User Details</a> <br>
        <a href="/admin_product_details">Product Details</a> <br>
        <a href="/reg_buyer">Register buyer</a> <br>
        <a href="/reg_seller">Regster Seller</a><br>
        <a href="/orders">Recent Orders</a><br>
        <a href="/contact/showmessage">Contact Message</a><br>

    </div>
    <div id="main">
    <center><h1>Recent Orders<hr></h1></center>
    <br><br>

    <table class="table table-dark table-hover">
    <tr>
      <th scope="col"><h1>Order ID<hr></h1></th>
      <th scope="col"><h1>User ID<hr></h1></th>
      <th scope="col"><h1>Order Name<hr></h1></th>
      <th scope="col"><h1>Order Image<hr></h1></th>
      <th scope="col"><h1>Order Quantity<hr></h1></th>
      <th scope="col"><h1>Order Price<hr></h1></th>
      <th scope="col"><h1>Make successful<hr></h1></th>
      <th scope="col"><h1>Make unsuccessful<hr></h1></th>

    </tr>
    @forelse($orders as $order)
    <tr>
    <th scope="col"><p>{{$order->id}}</p></th>
      <th scope="col"><p>User ID</p></th>
      <th scope="col"><p>Order Name</p></th>
      <th scope="col"><p>Order Image</p></th>
      <th scope="col"><p>{{$order->quantity}}</p></th>
      <th scope="col"><p>Order Price</p></th>
      <th scope="col"><p>
      <form action="/successfulorder" method="post">
@csrf
<input type="hidden" name="user_id" value="{{$order->user_id}}">
<input type="hidden" name="product_id" value="{{$order->product_id}}">
<input type="hidden" value="{{$order->quantity}}" name="quantity">
{{$order->quantity}}
<button type="submit"><p>Successful</p></button>
</form>
      </p></th>

      <th scope="col"><p>
      <form action="/unsuccessfulorder" method="post">
@csrf
<input type="hidden" name="user_id" value="{{$order->user_id}}">
<input type="hidden" name="product_id" value="{{$order->product_id}}">
<input type="hidden" value="{{$order->quantity}}" name="quantity">

<button type="submit"><p>Un-Successful</p></button>
</form>
      </p></th>
    </tr>

    @empty
    <center> <p style="background-color: #b0b435; height: 25px; padding:10px;">Noone has ordered any products.</p><center>
    @endforelse

</table>







</div>
    <script>
    function opensidemenu(){
        document.getElementById('side-menu').style.width='250px';
        document.getElementById('main').style.marginLeft='250px';   
    }
    function closesidemenu(){
        document.getElementById('side-menu').style.width='0px';
        document.getElementById('main').style.marginLeft='0px';
    }
    </script>
</body>
<script>

</script>