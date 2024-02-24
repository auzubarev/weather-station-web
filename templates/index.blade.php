<!DOCTYPE HTML>
<html lang="ru" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title>Метеостанция</title>
    <meta name="description" content=" На этой странице представлена актуальная информация о погодных условиях
    с графиками изменения температуры, влажности и давления в вашем поселке.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://kit.fontawesome.com/645991e92d.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js" integrity="sha512-ZwR1/gSZM3ai6vCdI+LVF1zSq/5HznD3ZSTk7kajkaj4D292NLuduDCO1c/NT8Id+jE58KYLKT7hXnbtryGmMg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
    <script src="/script.js?v={{time()}}"></script>
</head>
<body>
<nav class="navbar bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="#">
            <i class="fa-solid fa-cloud-sun text-primary me-2 h2"></i>
            <span class="h2 me-2">Погода в поселке</span>
            <span style="display: none;" id="spinner" class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </span>
        </a>
    </div>
</nav>
<div style="min-height: 900px;" class="container mt-3">
    <div x-data="meteo()">
        <select x-model="reading" @change="update()" class="form-select mb-3" style="max-width: 400px;">
            <option value="temperature" selected>Температура</option>
            <option value="pressure">Давление</option>
            <option value="humidity">Влажность</option>
        </select>
        <canvas x-ref="chart" id="chart" class="mb-5"></canvas>
    </div>
    <div class="mb-5" style="max-width: 800px;">
        <h1 class="mb-5">Погода в поселке</h1>

        <h2>Температура</h2>
        <p class="mb-5">Наши датчики постоянно измеряют температуру воздуха, благодаря чему вы всегда можете быть в курсе последних
            изменений.
            График температуры поможет вам проследить динамику изменений и подготовиться к возможным изменениям погоды.</p>

        <h2>Влажность</h2>
        <p class="mb-5">Уровень влажности - важный показатель, который влияет на комфорт и здоровье человека.
            Наш сайт предоставляет точные данные о влажности воздуха,
            помогая вам сохранять оптимальный микроклимат в помещении и на улице.
        </p>

        <h2>Давление</h2>
        <p class="mb-5">Изменения атмосферного давления могут вызывать головные боли, усталость и другие неприятные симптомы.
            На нашем сайте всегда можно узнать актуальное значение давления, чтобы вовремя принять меры и избежать
            неприятных последствий.</p>

        <h2>Связаться с нами</h2>
        <p class="mb-5">Если вы хотите предложить улучшения нашего сервиса, оставить отзыв или задать вопрос, пожалуйста,
            свяжитесь с <a href="mailto:auzubarev@mail.ru">нашей командой поддержки</a>.</p>
    </div>


</div>
<div class="bg-body-tertiary">
    <div class="container">
        <div class="py-5 text-center">© 2023-{{date('Y')}} — <a href="mailto:auzubarev@mail.ru">Алексей Зубарев</a>
        </div>
    </div>
</div>

</body>
</html>