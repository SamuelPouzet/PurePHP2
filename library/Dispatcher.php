<?php
/**
 * Created by PhpStorm.
 * User: moi
 * Date: 19/11/2017
 * Time: 13:09
 */

namespace library;


class Dispatcher
{

    protected $request;

    protected $response;

    public function __construct(Request $request)
    {

        $this->request = $request;

        $this->response = new Response();

    }

    public function dispatch()
    {
        try{

            $module = $this->request->getModule();

            $controller = $this->request->getController();

            $class = '\\' . $module . '\\' . 'Controller' . '\\' . ucfirst(strtolower($controller)) . 'Controller';
            $file = APP_PATH . DS . $module . DS . 'Controller' . DS . ucfirst(strtolower($controller)) . 'Controller.php';

            if(!is_file($file)){
                $this->response->setResponseCode(404);
                throw new \Exception('fichier non trouvé');
            }

            $controller = new $class($this->request, $this->response);

            $controller->run();
            $controller->render();


        }catch(\Exception $e){
            if($this->response->getResponseCode() == 200){
                $this->response->setResponseCode(500);
            }
            $this->request->setModule( 'Exception' );
            $this->request->setController( 'Error' );

            $this->response->setResponseMessage($e);

            $class = '\\' . $this->request->getModule() . '\\' . 'Controller' . '\\' . ucfirst(strtolower($this->request->getController() )) . 'Controller';

            $controller = new $class($this->request, $this->response);

            $controller->run();

        }finally{
            echo $this->response->getBody();
        }
    }

}