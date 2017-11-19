<?php
/**
 * Created by PhpStorm.
 * User: moi
 * Date: 19/11/2017
 * Time: 14:54
 */

namespace General\Controller;


use library\ControllerGeneral;
use library\Request;
use library\Response;

class IndexController extends ControllerGeneral
{

    public function __construct(Request $request, Response $response)
    {
        parent::__construct($request, $response);

        $pizza = new Index\Pizza();

    }

}