<?php
/**
 * Created by PhpStorm.
 * User: moi
 * Date: 19/11/2017
 * Time: 15:06
 */

namespace library;

class View
{

    protected $file;

    protected $path;

    public function __construct(Request $request)
    {
        $this->path = APP_PATH . DS . $request->getModule() . DS . 'view';

        $this->file = $this->path  . DS . ucfirst(strtolower($request->getController() )) . '.phtml';
    }

    public function setTpl(string $template)
    {
        $this->file = $this->path . DS . ucfirst(strtolower($template )) . '.phtml';
    }

    public function render()
    {
        if(!is_file($this->file))
        {
            throw new \RuntimeException('fichier de vue non présent : ' . $this->file);
        }

        ob_start();
            require $this->file;
        return ob_get_clean();

    }

}