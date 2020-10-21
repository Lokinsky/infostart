<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content=<?= App\Middleware\CSRF::get_token()?>>
    <link rel="stylesheet" href="./public/css/style.css">
    <title><?=$title?></title>
</head>
<body>
    <div class="container">
        <div>
            <a href="/callback">Обратная форма связи</a>
            <a href="/result">Результат</a>
        </div>
        <div class="content">
            <form action="/api/callback/comment" method="POST">
                <input name="csrf" type="text" hidden value=<?= App\Middleware\CSRF::get_token()?>>
                <input name="name" required type="text" placeholder="Имя">
                <input name="email" required type="text" placeholder="Почта">
                <input name="mob" required type="text" placeholder="Телефон">
                <input name="comment" required type="text" placeholder="Комментарий">
                <button type="submit">Отправить</button>
            </form>
        </div>
    </div>
    
</body>
</html>