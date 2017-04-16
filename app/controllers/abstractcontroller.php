<?php
namespace BATRAHOSTMVC\Controllers;
use BATRAHOSTMVC\LIB\FrontController;
/**
 * Description of abstractcontroller
 *
 * @author Mohamed Hassn Elmetwaly (25-03-2017)
 * mhe.developer@gmail.com
 */

class AbstractController {
    
    protected $_controller = 'index';
    protected $_action = 'default';
    protected $_params = array();

    public function notFoundAction()
    {
        $this->_view();
    }
    
    public function setController ($controllerName)
    {
        $this->_controller = $controllerName;
    }
    
    public function setAction ($actionName)
    {
        $this->_action = $actionName;
    } 
    
    public function setParams ($params)
    {
        $this->_params = $params;
    } 
    
    protected function _view()
    {
        if($this->_action == FrontController::NOT_FOUND_ACTION)
        {
            
          //  echo VIEWS_PATH.'notfound'.DS. 'notfound.view.php';
         require_once VIEWS_PATH.'notfound'.DS. 'notfound.view.php';
        }
        else {
            $view = VIEWS_PATH.$this->_controller.DS.$this->_action.'.view.php';
            if(file_exists($view))
            {
                require_once $view;
            }
            else {
                require_once VIEWS_PATH.'notfound'.DS. 'noview.view.php';
            }
        }
    }
}
