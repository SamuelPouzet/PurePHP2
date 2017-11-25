<?php
/**
 * Created by PhpStorm.
 * User: moi
 * Date: 19/11/2017
 * Time: 18:12
 */

namespace pure\lib_console;


class console_dispatcher
{

    protected $request;

    public function __construct(console_req $request)
    {

        $this->request = $request;

    }

    public function dispatch()
    {
        $className = 'pure\\app_console\\' . $this->request->getAction() . '\\controller\\' . ucfirst(strtolower($this->request->getElement())) . 'Controller';
        $file = PURE_PATH . DS . 'src' . DS . 'app_console' . DS . $this->request->getAction() . DS . 'controller' . DS . ucfirst(strtolower($this->request->getElement())) . 'Controller.php';

        if (!is_file($file))
        {
            print('votre requete ne peut aboutir');
            exit;
        }

        $class = new $className($this->request);

    }

}