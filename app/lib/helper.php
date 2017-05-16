<?php
/**
 * Description of abstractmodel
 * @author Mohamed Hassn Elmetwaly (15-05-2017)
 * mhe.developer@gmail.com
 */

namespace BATRAHOSTMVC\LIB;


trait Helper
{
    public function redirect($path)
    {
        session_write_close(); // to close any open session this file use
        header('Location:' . $path);
        exit;
    }
}