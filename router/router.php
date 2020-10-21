<?php
namespace App;

class Router{
    /**
     * Роутер маршрутов к контроллерам, 
     * которые хранятся в /routes.php
     */
    public function __construct() {
        $this->find_path();
        $this->create_path();
        $this->findRoute();

    }
    private function find_path(){
        $this->path = explode('?',strtolower(($_SERVER['REQUEST_URI'])))[0];
    }
    private function create_path()
    {
        include 'routes.php';
        $this->type = explode('/',explode('?',$this->path)[0])[1];

        $this->routes = ['web'=>$web,'api'=>$api];
        if(strcmp($this->type,'api')!=0)
            $this->type = 'web';
    }
    protected function findRoute()
    {
        $class = new $this->routes[$this->type][$this->path]['class']();
        $eval = $this->routes[$this->type][$this->path]['function'];
        return call_user_func([$class,$eval]);
    }

}


?>
