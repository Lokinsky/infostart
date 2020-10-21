<?php
/**
 * Контейнер маршрутов.
 * @var Controller controller
 */
namespace App;
require($_SERVER['DOCUMENT_ROOT'].'/Controllers/Result.php');

require($_SERVER['DOCUMENT_ROOT'].'/Controllers/Callback.php');

$web = array(
    '/callback' => [
        'class' => Controllers\Callback::class,
        'function' => 'index'
    ],
    '/result' => [
        'class' => Controllers\Result::class,
        'function' => 'index'
    ],
);
$api = array(
    '/api/callback/comment' => [
        'class' => Controllers\Callback::class,
        'function' => 'apiPutComment'
    ],
);
