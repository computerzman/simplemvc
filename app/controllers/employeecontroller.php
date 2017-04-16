<?php

/**
 * Description of abstractcontroller
 *
 * @author Mohamed Hassn Elmetwaly (25-03-2017)
 * mhe.developer@gmail.com
 */

namespace BATRAHOSTMVC\Controllers;
use BATRAHOSTMVC\Models\EmployeeModel;

class EmployeeController extends AbstractController
{
    
    public function defaultAction()
    {
        //EmployeeModel::getAll();
        var_dump(EmployeeModel::getAll());
        $this->_view();
    }
}
