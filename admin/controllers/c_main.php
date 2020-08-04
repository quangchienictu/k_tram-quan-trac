<?php

class c_main {

    protected $viewer;
    protected $viewName;
    protected $object;
    protected $action;

    function __construct($viewName, $object)
    {
        $this->viewName=$viewName;
        $this->object=$object;
        return $this;

    }

}