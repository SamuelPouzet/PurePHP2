<?php
/**
 * Created by PhpStorm.
 * User: moi
 * Date: 19/11/2017
 * Time: 11:53
 */

namespace library;


class Request
{

    protected $uri;

    protected $module;

    protected $controller;

    protected $method;

    protected $gets;

    protected $posts;

    protected $session;

    protected $params;

    public function __construct()
    {

        $this->setUri($_SERVER['REQUEST_URI']);
        $this->setMethod($_SERVER['REQUEST_METHOD']);

        if($this->method == 'POST'){
            $this->setPosts($_POST);
        }

        $this->setSession($_SESSION);

        if(!is_file(CONFIG_PATH . DS . "config.ini")){
            throw new \Exception('le fichier de configuration est absent');
        }
        $this->setParams(parse_ini_file(CONFIG_PATH . DS . "config.ini", true));

    }

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @param mixed $uri
     * @return Request
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * @param mixed $module
     * @return Request
     */
    public function setModule($module)
    {
        $this->module = $module;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param mixed $controller
     * @return Request
     */
    public function setController($controller)
    {
        $this->controller = $controller;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $method
     * @return Request
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGets()
    {
        return $this->gets;
    }

    /**
     * @param mixed $gets
     * @return Request
     */
    public function setGets($gets)
    {
        $this->gets = $gets;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * @return mixed
     */
    public function getPost(string $post)
    {
        if(isset($this->posts[$post])){
            return $this->posts[$post];
        }else{
            return null;
        }
    }

    /**
     * @param mixed $posts
     * @return Request
     */
    public function setPosts($posts)
    {
        $this->posts = $posts;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * @param mixed $session
     * @return Request
     */
    public function setSession($session)
    {
        $this->session = $session;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @return mixed
     */
    public function getParam(string $param)
    {
        if(isset($this->params[$param])){
            return $this->params[$param];
        }else{
            return null;
        }
    }

    /**
     * @param mixed $params
     * @return Request
     */
    public function setParams($params)
    {
        $this->params = $params;
        return $this;
    }


}