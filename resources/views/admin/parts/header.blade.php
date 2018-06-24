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
                    <li class="">
                        <a href="/products" class="dropdown-toggle" data-toggle="dropdown">Ассортимент</a>
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
    </div>
</header>