<div class="boxed  push-down-45">
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1  col-md-8  col-md-offset-2"> <br>
           
            <h2>Контакты</h2>
            @php $settingsModel = App\Models\Setting::firstOrFail(); @endphp
            <h4 class="contact__text">Интернет-магазин тортов {{ $settingsModel->site_name }} </h4>
            <span class="contact__text"><strong>E-mail: </strong> {{  $settingsModel->company_email }} </span><br>
            <span class="contact__text"><strong>Телефон: </strong>  {{ $settingsModel->company_phone }} </span><br>
            <span class="contact__text"><strong>Адрес: </strong>  {{ $settingsModel->company_address }} </span><br><br>
            <div class="row">
                 
                <div class="col-xs-12  push-down-30">
                    
                    <div class="map">
                        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A96a13c6f2039fb60ff9e86ffbd18ac822654a010b937e0f042673f31edb85fe4&amp;width=778&amp;height=477&amp;lang=ru_RU&amp;scroll=true"></script>
                    </div>


                    <blockquote>
                        Вопросы, отзывы, пожелания? <a href="{{ route('feedback')}}">Напишите нам!</a>
                    </blockquote>
                   
                </div>
            </div>
        </div>
    </div>
</div>
