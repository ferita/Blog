<header class="header  push-down-45">
    <div class="container">
        <div class="logo pull-left">
            <a href="/">
                <img src="assets/images/logo1.png" alt="Logo" width="352" height="140">
            </a>
        </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#readable-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <nav class="navbar navbar-default" role="navigation">
            <div class="collapse  navbar-collapse" id="readable-navbar-collapse">
                <ul class="navigation">
                    <li class="dropdown active">
                        <a href="/" class="dropdown-toggle" data-toggle="dropdown">Главная</a>
                    </li>
                    <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Тест</a>
                        <ul class="navigation__dropdown">
                            <li><a href="#">Пункт 1</a></li>
                            <li><a href="#">Пункт 2</a></li>
                            <li><a href="#">Пункт 3</a></li>
                            <li><a href="#">Пункт 4</a></li>
                        </ul>
                    </li> -->
                   
                    <li class="">
                        <a href="/products" class="dropdown-toggle" data-toggle="dropdown">Ассортимент</a>
                    </li>
                    <!--  <li class="">
                        <a href="/elements" class="dropdown-toggle" data-toggle="dropdown">Верстка</a>
                    </li> -->
                   <!--  <li class="">
                        <a href="/about" class="dropdown-toggle" data-toggle="dropdown">Обо мне</a>
                    </li> -->
                    <li class="">
                        <a href="/feedback" class="dropdown-toggle" data-toggle="dropdown">Обратная связь</a>
                    </li>
                    @if (!Auth::user())
                        <li class="">
                            <a href="/login" class="dropdown-toggle" data-toggle="dropdown">Вход</a>
                        </li>
                    @else
                        <li class="">
                            <a href="/logout" class="dropdown-toggle" data-toggle="dropdown">Выход</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
        <div class="hidden-xs hidden-sm">
            <div class="header-cart">
                @if (Cart::instance('default')->count() > 0)
                    <span class="glyphicon glyphicon-shopping-cart"></span>
                
                    <a href="{{ route('cart.index') }}"><strong> {{ Cart::instance('default')->count() }} шт./ {{ Cart::instance('default')->total() }} </strong></a>
                @else
                    <a href="{{ route('cart.index') }}" class="btn"><span class="glyphicon glyphicon-shopping-cart"></span></a>
                @endif
            </div>
            <a href="/search-results" class="search__container  js--toggle-search-mode"><span class="glyphicon glyphicon-search"></span> </a>
        </div>
    </div>
</header>