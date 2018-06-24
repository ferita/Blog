<div class="widget-categories  push-down-30">
    <h6>Здравствуйте, {{ Auth::user()->name }}</h6>
    <ul>
        <li>
            <a href="/admin/orders">Заказы &nbsp; <span class="widget-categories__text">(16)</span> </a>
        </li>
        <li>
            <a href="/admin/products">Продукция &nbsp; <span class="widget-categories__text">(13)</span> </a>
        </li>
        <li>
            <a href="/admin/categories">Категории &nbsp; <span class="widget-categories__text">(13)</span> </a>
        </li>
        <li>
            <a href="/admin/customers">Покупатели &nbsp; <span class="widget-categories__text">(9)</span> </a>
        </li>
        <li>
            <a href="/admin/users">Пользователи &nbsp; <span class="widget-categories__text">(9)</span> </a>
        </li>
        <li>
            <a href="/admin/settings">Настройки &nbsp; <span class="widget-categories__text">(9)</span> </a>
        </li>
    </ul>
</div>