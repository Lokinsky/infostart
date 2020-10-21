<?php
namespace App\Controllers;

class Controller
{
    /**
     * Базовый класс предоставляющий 
     * общий для всех контроллеров
     * функционал
     */
    public function __construct(){

    }
    public function view($view, $params = [])
    {
        /**
         * Создания представления.
         * @return view.php
         * 
         * Представления хранятся в /views/<name.view>.php
         */
        extract($params);
        include $_SERVER['DOCUMENT_ROOT'] . '/views/' . $view . '.view.php';
    }
    public function basicValidate($array = [])
    {
        /**
         * Валидатор на наличие xss-атак
         */
        foreach ($array as $key => $value) {
            if(strcmp($key,'csrf')!=0)
                $result[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }
        return $result;
    }
}
