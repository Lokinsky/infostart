<?php

namespace App\Controllers;

use App\Models\Callback as CallbackModel;


class Result extends Controller
{
    /**
     * Контроллер-обработчик маршрутов 
     * @var Route(/result)
     */

    public function index($request = null)
    {
        /**
         * Функция вывода результата
         * @return view
         */
        $data = parent::basicValidate($_GET);
        $callback = new CallbackModel();

        if (!empty($data)) {

            $where = $data['where'] != null ? $data['where'] : 'id !=0';
            $order = $data['order'] != null ? $data['order'] : 'name';
            $as =  $data['as'] != null ? $data['as'] : 'ASC';
            $offset =  $data['offset'] != null ? $data['offset'] : 0;
            $callbacks = $callback->select($offset, '*', $where, $order, $as);
        }else
            $callbacks = $callback->select();

        parent::view('Result', ['title' => 'Result', 'callbacks' => $callbacks]);
    }
}
