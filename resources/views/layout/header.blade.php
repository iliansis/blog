<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="/public/css/bootstrap.min.css">
        <link rel="stylesheet" href="/public/css/style.css">
        <title>@yield('title')</title>
</head>
<body>
<div class="container">
        <nav class="navbar navbar-expand-lg bg-light mt-3 mb-3">
                <div class="container-fluid">
                  <a class="navbar-brand" href="/">LiveBlog</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Главная</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/feedback">Техподдержка</a>
                      </li>                    
                      
                    </ul>
                    @auth
                    <a  class="btn btn-primary me-2" href="/profile">
                        Личный кабинет
                       </a>
                    <a  class="btn btn-outline-primary me-2" href="/logout">
                        Выход
                      </a>                     
                    @endauth
                    @guest
                    <button type="button" class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#auth">
                        Авторизация
                      </button>
                      <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#reg">
                       Регистрация
                      </button>
                    @endguest                    
                                            
                  </div>
                </div>
              </nav>

        @include('incl.modal')
        @yield('body')

        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
          <p class="col-md-4 mb-0 text-muted">© 2023 LiveBlog</p>
      
          <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
          </a>
      
          <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
          </ul>
        </footer>

</div>
    <script src="/public/js/jquery-3.7.0.min.js"></script>   
    <script src="/public/js/bootstrap.bundle.min.js"></script>   
    <script src="/public/js/main.js"></script>   


</body>
</html>