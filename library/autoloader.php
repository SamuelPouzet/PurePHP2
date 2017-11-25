<?php

/**
 * Created by PhpStorm.
 * User: moi
 * Date: 19/11/2017
 * Time: 11:15
 */
class autoloader
{

    public static function register()
    {
        spl_autoload_register( [__CLASS__, 'autoload'] );
    }

    public static function autoload(string $className)
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
            throw new Exception('Aucun accès à la console n\'est admis.');
        }else
        {
            $absPath = APP_PATH . DS . $path;
        }

        $file = $absPath . DS . ucfirst(strtolower($name)) . '.php';

        if(!is_file($file))
        {
            //if classfile doesn't exists throw an exception
            throw new Exception('la classe : ' . $className . ' n\'existe pas dans le fichier : ' . $file);
        }else{
            require_once $file;
        }


    }

}