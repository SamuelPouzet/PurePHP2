<?php
/**
 * Created by PhpStorm.
 * User: moi
 * Date: 19/11/2017
 * Time: 15:58
 */

namespace library;


class Layout
{
    protected $file;

    protected $path;

    public function __construct()
    {
        $this->path = SRC_PATH . DS . 'layout';

        $this->file = $this->path  . DS . 'layout.phtml';
    }

    public function setTpl(string $template)
    {
        $this->file = $this->path . DS . ucfirst(strtolower($template )) . '.phtml';
    }

    public function render(Response $response)
    {
        if(!is_file($this->file))
        {
            throw new \RuntimeException('fichier de layout non présent : ' . $this->file);
        }

        $this->content = $response->getBody();

        ob_start();
        require $this->file;
        $response->setBody(ob_get_clean());

        return;
    }
}