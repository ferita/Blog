<div class="widget-categories  push-down-30">
    <h6>Здравствуйте, {{ Auth::user()->name }}</h6>
    <ul class = "admin-menu">
        <li>
            <a href="/admin/orders">Заказы &nbsp;</a>
        </li>
        <li>
            <a href="/admin/products">Продукция &nbsp; </a>
        </li>
        <li>
            <a href="/admin/categories">Категории &nbsp;</a>
        </li>
        <li>
            <a href="/admin/customers">Покупатели &nbsp; </a>
        </li>
        <li>
            <a href="/admin/users">Пользователи &nbsp; </a>
        </li>
        <li>
            <a href="/admin/settings">Настройки &nbsp; </a>
        </li>
    </ul>
</div>