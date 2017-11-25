<?php
/**
 * Created by PhpStorm.
 * User: moi
 * Date: 19/11/2017
 * Time: 17:07
 */

class Autoloader
{
    public static function register()
    {
        spl_autoload_register( [__CLASS__, 'autoload'] );
    }

    public static function autoload($className)
    {
        $parts = preg_split('#\\\#', $className);

        //the last is the class' name
        $name = array_pop($parts);

        //searching if the reqested class is in app, vendor or library
        $location = strtolower($parts[0]);

        //creating the path
        $path = implode(DS , array_map('strtolower', $parts));

        if($location == 'vendor'){
            $absPath = ROOT_PATH . DS . $path;
        }elseif($location == 'library'){
            $absPath = ROOT_PATH . DS . $path;
        }elseif ($location == 'pure') {
            $path = implode(DS , array_map('strtolower', array_splice($parts,1)));
            $absPath = ROOT_PATH . DS . 'pure' . DS . 'src' . DS .  $path;
        }else
        {
            $absPath = APP_PATH . DS . $path;
        }

        $file = $absPath . DS . ucfirst(strtolower($name)) . '.php';

        if(!is_file($file))
        {
            //if classfile doesn't exists throw an exception
            throw new \Exception('la classe : ' . $className . ' n\'existe pas dans le fichier : ' . $file);
        }else{
            require_once $file;
        }


    }

}