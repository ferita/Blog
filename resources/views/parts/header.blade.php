<header class="header  push-down-45">
    <div class="container">
        <div class="logo pull-left">
            <a href="/">
                <img src="assets/images/logo2.png" alt="Logo" width="352" height="140">
            </a>
        </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#readable-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="header-cart hidden-md hidden-lg">
                @if (Cart::instance('default')->count() > 0)
                    <div class="cart-pic"><span class="glyphicon glyphicon-shopping-cart"></span></div>
                
                    <div class="cart-amount"><a href="{{ route('cart.index') }}" class="header-cart-icon"><strong> {{ Cart::instance('default')->count() }} </strong></a></div>
                @else
                    <a href="{{ route('cart.index') }}" class="header-cart-icon"><span class="glyphicon glyphicon-shopping-cart"></span></a>
                @endif
            </div>
        </div>
        <nav class="navbar navbar-default" role="navigation">
            <div class="collapse  navbar-collapse" id="readable-navbar-collapse">
                <ul class="navigation">
                    <li class="{{ Request::is('/') ? 'dropdown active' : '' }}">
                        <a href="/" class="dropdown-toggle" data-toggle="dropdown">Главная</a>
                    </li>
                 
                    <li class="{{ (Request::is('products') || Request::is('products/*')) ? 'dropdown active' : '' }}">
                        <a href="/products" class="dropdown-toggle" data-toggle="dropdown">Ассортимент</a>
                    </li>
                     <li class="">
                        <a href="/elements" class="dropdown-toggle" data-toggle="dropdown">Верстка</a>
                    </li>
                  
                    <li class="{{ (Request::is('feedback') || Request::is('feedback/*')) ? 'dropdown active' : '' }}">
                        <a href="/feedback" class="dropdown-toggle" data-toggle="dropdown">Обратная связь</a>
                    </li>
                    <li class="{{ Request::is('contacts') ? 'dropdown active' : '' }}">
                        <a href="/contacts" class="dropdown-toggle" data-toggle="dropdown">Контакты</a>
                    </li>
                    @if (!Auth::user())
                        <li class="{{ (Request::is('login') || Request::is('admin/login')) ? 'dropdown active' : '' }}">
                            <a href="/login" class="dropdown-toggle" data-toggle="dropdown">Вход</a>
                        </li>
                    @else
                        <li class="{{ (Request::is('logout') || Request::is('admin/logout')) ? 'dropdown active' : '' }}"">
                            <a href="/logout" class="dropdown-toggle" data-toggle="dropdown">Выход</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
        <div class="hidden-xs hidden-sm">
                @if (Cart::instance('default')->count() > 0)
                    <div class="cart-pic"><span class="glyphicon glyphicon-shopping-cart"></span></div>
                
                    <div class="cart-amount"><a href="{{ route('cart.index') }}" class="glyph__container "><strong> {{ Cart::instance('default')->count() }} </strong></a></div>
                @else
                    <a href="{{ route('cart.index') }}" class="glyph__container "><span class="glyphicon glyphicon-shopping-cart"></span></a>
                @endif
        </div>
        
        @if(Auth::check())
            <div class="hidden-xs hidden-sm">
                <a href="{{route('lk')}}" class="glyph__container"><span class="glyphicon glyphicon-home"></span></a>
            </div>
        @endif
       <!--  <div class="hidden-xs hidden-sm">
            
            <a href="/search-results" class="search__container  js--toggle-search-mode"><span class="glyphicon glyphicon-search"></span> </a>
        </div> -->

    </div>
</header>