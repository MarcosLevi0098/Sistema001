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

<ul id='dropdown2' class='dropdown-content'>
  
  <li><a href="{{route('admin/dashboard')}}">dashboard</a></li>
  <li><a href="{{route('login/logout')}}">Sair</a></li>
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
     
      @auth
      <ul id="nav-mobile" class="right">
        <li><a href="" class="dropdown-trigger" data-target="dropdown2">Olá {{auth()->user()->firstName}} <i class="material-icons right">expand_more</i></a></li>
      </ul>
          
      @else
      <ul id="nav-mobile" class="right">
        <li><a href="{{route('login/form')}}">Login<i class="material-icons right">lock</i></a></li>
      @endauth
    </div>
  </nav>
  <!--fim header-->
  @yield("conteudo");
  
  <footer class="page-footer" style="position:absolute; bottom: 0px;  width: 100%; bottom: -5%;">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Ecommerce.web</h5>
          <p class="grey-text text-lighten-4">O melhor site para fazer as suas compras</p>
        </div>
        <div class="col l4 offset-l2 s12">
          <h5 class="white-text">Links</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="#!">Faceboock</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Instagram</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Telegram</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Twitter</a></li>
          </ul>
        </div>
      </div>
    </div>
    <style>

      
    </style>
    <div class="footer-copyright">
      <div class="container">
      © 2014 Copyright Text
      <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
      </div>
    </div>
  </footer>


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