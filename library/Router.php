<?php
/**
 * Created by PhpStorm.
 * User: moi
 * Date: 19/11/2017
 * Time: 12:18
 */

namespace library;


class Router
{

    protected $request;

    protected $params;

    public function __construct(Request $request)
    {
        $this->request = $request;

        $this->params = $request->getParam('site');

        $uri=$this->request->getUri();

        $uri = str_replace($this->params['basepath'], '', trim($uri, '/'));

        $request->setUri($uri);
    }

    public function route()
    {
        $uri = $this->request->getUri();

        if('' === $uri || is_null($uri)) {
            //no uri, we go to general index
            $module = 'general';
            $controller = 'index';
        }else{
            $uriparts = explode('/', trim($uri, '/'));
            $module = array_shift($uriparts);
            $controller = array_shift($uriparts) or 'index';
            if($controller === '' or is_null($controller)){
                $controller = 'index';
            }
        }

        $this->request->setModule($module);
        $this->request->setController($controller);

        return;
    }

}