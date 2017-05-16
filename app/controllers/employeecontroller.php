<?php

/**
 * Description of abstractcontroller
 *
 * @author Mohamed Hassn Elmetwaly (25-03-2017)
 * mhe.developer@gmail.com
 */

namespace BATRAHOSTMVC\Controllers;
use BATRAHOSTMVC\LIB\Helper;
use BATRAHOSTMVC\LIB\InputFilter;
use BATRAHOSTMVC\Models\EmployeeModel;

class EmployeeController extends AbstractController
{
    use InputFilter;
    use Helper;
    
    public function defaultAction()
    {
        $this->_data['employees'] = EmployeeModel::getAll();
        $this->_view();
    }
    public function addAction()
    {
        if(isset($_POST['submit'])){

            $emp = new EmployeeModel();
            $emp->name = $this->filterString( $_POST['name']);
            $emp->age = $this->filterInt( $_POST['age']);
            $emp->address = $this->filterString($_POST['address']);
            $emp->salary = $this->filterFloat($_POST['salary']);
            $emp->tax = $this->filterFloat($_POST['tax']);
            if($emp->save()){
                //echo $emp->name . ' has been saved successfully with ID: '. $emp->id;
                $_SESSION['message'] = 'Employee, saved successfully';
              $this->redirect('/employee');
            }
            else
            {
                $_SESSION['message'] = 'Employee, Cant Save Employee';
                $this->redirect('/employee');
            }
        }
        $this->_view();
    }
    public function editAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $emp = EmployeeModel::getByPk($id);
        if($emp === false || empty($id))
        {
            $this->redirect('/employee');
        }
        $this->_data['employees'] = $emp;
       // $this->{EmployeeModel::$primaryKey} = $id;
        //var_dump($emp);
        if(isset($_POST['submit'])){

            $emp = new EmployeeModel();
            $emp->name = $this->filterString( $_POST['name']);
            $emp->age = $this->filterInt( $_POST['age']);
            $emp->address = $this->filterString($_POST['address']);
            $emp->salary = $this->filterFloat($_POST['salary']);
            $emp->tax = $this->filterFloat($_POST['tax']);

            if($emp->save()){
                //echo $emp->name . ' has been saved successfully with ID: '. $emp->id;
                $_SESSION['message'] = 'Employee, Updated successfully';
              //  $this->redirect('/employee');
            }
            else
            {
                $_SESSION['message'] = 'Employee, Cant update Employee';
                $this->redirect('/employee');
            }
        }
        $this->_view();
    }
    public function deleteAction()
    {
        $id = $this->filterInt($this->_params[0]);
        $emp = EmployeeModel::getByPk($id);
        if($emp === false)
        {
            $this->redirect('/employee');
        }

            if($emp->delete()){
                //echo $emp->name . ' has been saved successfully with ID: '. $emp->id;
                $_SESSION['message'] = 'Employee, Deleted successfully';
                $this->redirect('/employee');
            }
    }



}
