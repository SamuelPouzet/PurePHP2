<?php

/**
 * Created by PhpStorm.
 * User: moi
 * Date: 19/11/2017
 * Time: 14:33
 */
namespace Exception\Controller;

use library\ControllerGeneral;

class ErrorController extends ControllerGeneral
{

    public function __construct(\library\Request $request, \library\Response $response)
    {
        parent::__construct($request, $response);

        switch($response->getResponseCode())
        {
            case 404:
                if($request->getParam('site')['env'] === 'dev'){
                    $this->view->setTpl('404_dev');
                }else{
                    $this->view->setTpl('404');
                }
                break;
            default:
                if($request->getParam('site')['env'] === 'dev'){
                    $this->view->message = $response->getResponseMessage();
                    $this->view->setTpl('500_dev');
                }else{
                    $this->view->setTpl('500');
                }
                break;
        }


    }

}