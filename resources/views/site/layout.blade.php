<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body>
<!-- Dropdown Structure -->
<ul id='dropdown1' class='dropdown-content'>
  @foreach ($categoriasMenu as $categoriaM)
  <li><a href="{{route('site/categoria', $categoriaM->id)}}">{{$categoriaM->nome}}</a></li>
  @endforeach
</ul>
<!-- HEADER-->
  <nav class="red">
    <div class="nav-wrapper">
      <a href="{{route('site/index')}}" class="brand-logo center">Ecommerce.web</a>
      <ul id="nav-mobile" class="left">
        <li><a href="{{route('site/index')}}">Home</a></li>
        <li><a href="{{route('site/carrinho')}}">Carrinho <span class="new badge blue " data-badge-caption="">{{\Cart::getContent()->count();}}</span></a></li>
        <li><a href="" class="dropdown-trigger" data-target="dropdown1">Categorias <i class="material-icons right">expand_more</i></a></li>
      </ul>
      <ul id="nav-mobile" class="right">
        <li><a href="{{route('site/login')}}">Login</a></li>
      </ul>
    </div>
  </nav>
  <!--fim header-->
  @yield("conteudo");

 <!-- Compiled and minified JavaScript -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>       
 
 <script>
 /* Dropdown */
var elemDrop = document.querySelectorAll('.dropdown-trigger');
var instanceDrop = M.Dropdown.init(elemDrop, {
    coverTrigger: false,
    constrainWidth: false
});
 </script>
 <!--footer-->

<!--FIM FOOTER-->
</body>
</html>