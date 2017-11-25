<?php
/**
 * Created by PhpStorm.
 * User: moi
 * Date: 19/11/2017
 * Time: 17:46
 */

namespace pure\lib_console;


class console_req
{

    protected $element;

    protected $action;

    protected $args;

    public function __construct()
    {

        $args = $_SERVER['argv'];

        $xpl = explode(':', $args[1]);

        $this->action = $xpl[0];

        $this->element= $xpl[1];

        $this->args = isset($args[2])?$args[2]:null;

    }

    /**
     * @return mixed
     */
    public function getElement()
    {
        return $this->element;
    }

    /**
     * @param mixed $element
     * @return console_req
     */
    public function setElement($element)
    {
        $this->element = $element;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     * @return console_req
     */
    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getArgs()
    {
        return $this->args;
    }

    /**
     * @param mixed $args
     * @return console_req
     */
    public function setArgs($args)
    {
        $this->args = $args;
        return $this;
    }



}