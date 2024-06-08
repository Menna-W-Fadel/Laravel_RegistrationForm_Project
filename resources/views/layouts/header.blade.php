<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>
    <script src="{{ asset('assets/js/main.js') }} "></script>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/styleNav.css')}}">
    <header>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-body fixed-top">
    <div class="container-fluid">
     <!--choose language -->
     <div style="display:flex">
        <a class="nav-link" href="locale\en">English</a>
        <a class="nav-link" href="locale\ar">Arabic</a>
     </div>

      <div class="nav-bar-container">
        <ul class="nav-bar ">
          <li class="nav-item active">
            <a class="nav-link" aria-current="page" href="#">{{__('transl.home')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">{{__('transl.features')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">{{__('transl.pricing')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">{{__('transl.about')}}</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar -->

  <!-- Background image -->
  <div 
    class="p-5 text-center bg-image"
    style="
      background-image: url({{asset('assets/imgs/pexels-jeremy-bishop-20147087.jpg')}});
      height: 550px;
      margin-top: 58px;
    "
  >
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.6); margin-top: 160px; padding:50px;">
      <div class="d-flex justify-content-center align-items-center">
        <div class="text-white">
          <h1 class="mb-3">{{__('transl.welcome')}}</h1>
          <h4 class="mb-3"> {{__('transl.subMess')}}</h4>
        </div>
      </div>
    </div>
  </div>
  <!-- Background image -->
</header>
</head>
<body>
<script src="{{ asset('assets/js/bootstrap.js') }} "></script>
</body>
</html>