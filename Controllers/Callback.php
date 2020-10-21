<?php
namespace App\Controllers;
use App\Models\Callback as CallbackModel;

use App\Middleware\CSRF;

class Callback extends Controller{
    /**
     * Контроллер-обработчик маршрутов 
     * @var Route(/callback)
     */
    public function index($request=null)
    {
        /**
         * Конуструктор базового представления
         * @var view
         */
        parent::view('Callback',['title'=>'Hello']);
    }
    public function apiPutComment($request = null)
    {
        /**
         * API-функция для создания записи в бд
         * в таблице 
         * @var App\Models\Callback
         */
        $data = parent::basicValidate($_POST);
        CSRF::validate($_POST['csrf'], function () use ($data)
            {
                $callback = new CallbackModel();
                return $callback->insert($data);
            }
        );
        header("Location: /result");
    }
}

?>