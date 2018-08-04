<div class="widget-categories  push-down-30">
    <h6>Здравствуйте, {{ Auth::user()->name }}</h6>
    <ul class = "lk-menu">
        <li>
            <a href="/lk/orders">Заказы &nbsp;</a>
        </li>

        @if (Auth::user()->customer !== null)
        <li>
            <a href="/lk/profile">Профиль &nbsp; </a>
        </li>
        @endif
    </ul>
</div>