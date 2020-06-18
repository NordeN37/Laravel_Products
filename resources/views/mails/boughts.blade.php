<h1>СПАСИБО,<br/>ВАШ ЗАКАЗ ОФОРМЛЕН!</h1>
<h2>Номер заказа: {{ $boughts->order_number }}</h2>
<p><u>Ваши контактные данные:</u></p>

<div>
    <p><b>Email:</b>&nbsp;{{ $boughts->email }}</p>
    <p><b>Tel:</b>&nbsp;{{ $boughts->phone }}</p>
</div>

<p><u>Данные по заказу:</u></p>

<div>
    <p><b>Наименование:</b>&nbsp;{{ $boughts->name }}</p>
    <p><b>Цена:</b>&nbsp;{{ $boughts->price }}</p>
    <p><b>Размер:</b>&nbsp;{{ $boughts->sizes }}</p>
</div>

<p><u>Адрес доставки:</u></p>

<div>
    <p><b>Страна:</b>&nbsp;{{ $boughts->country }}</p>
    <p><b>Город:</b>&nbsp;{{ $boughts->city }}</p>
    <p><b>Улица:</b>&nbsp;{{ $boughts->street }}</p>
    <p><b>Дом:</b>&nbsp;{{ $boughts->home }}</p>
    <p><b>Квартира:</b>&nbsp;{{ $boughts->flat }}</p>
</div>

<h3>Спасибо за покупку!</h3>
