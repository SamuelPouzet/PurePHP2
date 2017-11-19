<?php
/**
 * Created by PhpStorm.
 * User: moi
 * Date: 19/11/2017
 * Time: 14:56
 */

namespace library;


abstract class ControllerGeneral
{
    protected $request;

    protected $response;

    protected $layout;

    protected $view;

    protected $viewTpl;

    public function __construct(Request $request, Response $response)
    {

        $this->request = $request;

        $this->response = $response;

        $this->view = new View($request);

        $this->layout = new Layout();

    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @param Request $request
     * @return ControllerGeneral
     */
    public function setRequest(Request $request): ControllerGeneral
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }

    /**
     * @param Response $response
     * @return ControllerGeneral
     */
    public function setResponse(Response $response): ControllerGeneral
    {
        $this->response = $response;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * @param mixed $layout
     * @return ControllerGeneral
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @param mixed $view
     * @return ControllerGeneral
     */
    public function setView($view)
    {
        $this->view = $view;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getViewTpl()
    {
        return $this->viewTpl;
    }

    /**
     * @param mixed $viewTpl
     * @return ControllerGeneral
     */
    public function setViewTpl($viewTpl)
    {
        $this->viewTpl = $viewTpl;
        return $this;
    }

    public function run()
    {
        $this->response->setBody($this->view->render());
    }

    public function render()
    {
        $this->layout->render($this->response);
    }

}