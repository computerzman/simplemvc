<?php
namespace BATRAHOSTMVC\Controllers;

class IndexController extends AbstractController
{
    public function defaultAction()
    {
        $this->_language->load('template.common');
        $this->_view();
    }
    public function addAction()
    {
        $this->_language->load('template.common');
        $this->_view();
    }
}

