<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content=<?= App\Middleware\CSRF::get_token() ?>>
    <link rel="stylesheet" href="public/css/result.css">
    <title><?= $title ?></title>
</head>

<body>
    <div class="container">
        <div>
            <a href="/callback">Обратная форма связи</a>
            <a href="/result">Результат</a>
        </div>
        
        <div class="content">
            <div class="table">
                <div class="header">
                    <h3>Таблица</h3>
                </div>
                <form action="/result" method="get">
                    <select id="order" name="order" id="">
                        <option value="name">Имя</option>
                        <option value="email">Почта</option>
                    </select>
                    <select id="as" name="as" id="">
                        <option value="desc">По возрастанию</option>
                        <option value="asc">По убыванию</option>
                    </select>
                    <button type="submit">Отфильтровать</button>
                </form>
                <div class="body">
                    <div class="column-names">
                        <div>#</div>
                        <div class="item">Имя</div>
                        <div class="item">Почта</div>
                        <div class="item">Мобильный телефон</div>
                        <div class="item">Комментарий</div>
                    </div>
                    <?php
                    foreach ($callbacks as $key => $callback) {
                        echo '<div class="item-row">';
                        foreach ($callback as $key => $value) {
                            echo '<div> ' . $value . ' </div>';
                        }
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('order').value = findGetParameter('order');
        document.getElementById('as').value = findGetParameter('as');
        function findGetParameter(parameterName) {
            var result = null,
                tmp = [];
            location.search
                .substr(1)
                .split("&")
                .forEach(function(item) {
                    tmp = item.split("=");
                    if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
                });
            return result;
        }
    </script>
</body>

</html>