<?php
/**
 * Description of abstractmodel
 * @author Mohamed Hassn Elmetwaly (30-04-2017)
 * mhe.developer@gmail.com
 */

namespace BATRAHOSTMVC\LIB;


trait InputFilter
{
    public function filterInt($input)
    {
        return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
    }
    public function filterFloat($input)
    {
        // WE USE FILTER_FLAG_ALLOW_FRACTION TO ALLOW USING FRACTION للسماح باستخدام الكسور
        return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        //return $input;
    }
    public function filterString($input)
    {
        return htmlentities(strip_tags($input), ENT_QUOTES, 'UTF-8');
    }

}