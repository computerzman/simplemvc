<?php
/**
 * Created by PhpStorm.
 * User: itadmin
 * Date: 06/10/2017
 * Time: 03:21 ص
 */

namespace BATRAHOSTMVC\LIB;


class Language
{
    private  $_dictionary = [];

    /*
    public function load($dictionary){

        $lang = DEFAULT_LANGUAGE;
        if(isset($_SESSION['lang'])){
            $lang = $_SESSION['lang'];
        }
        $languageFile = LANGUAGE_PATH . DS . $lang . DS . (str_replace('|', DS, $dictionary)).'.lang.php';
        if(file_exists($languageFile)){
            require $languageFile;
            if(isset($_) && is_array($_)){
                foreach ($_ as $textLabel => $textValue){
                    $this->_dictionary[$textLabel] = $textValue;
                }
            }
        } else {
        trigger_error('The Language file '. $dictionary . ' does not exist');
        }
    }
*/

    public function load($path){

        $defaultlanguage = APP_DEFAULT_LANGUAGE;
        if(isset($_SESSION['lang'])){
            $defaultlanguage = $_SESSION['lang'];
        }
        $pathArray = explode('.', $path);
        //var_dump($pathArray);
        $languageFileToLoad = LANGUAGES_PATH . $defaultlanguage . DS . $pathArray[0] . DS . $pathArray[1]. '.lang.php';
        if(file_exists($languageFileToLoad)){
            require $languageFileToLoad;
            if(is_array($_) && !empty($_)){
                foreach ($_ as $key => $value){
                    $this->_dictionary[$key] = $value; // if we load two file with the same key , one will ovewrite the other, solution in (array_key_exist)
                }
                //var_dump($this->_dictionary);
            }
        } else {
            trigger_error('Sorry the language file ' . $path . ' doesn\'t exist' . E_USER_WARNING);
        }
    }


    public function get($dictionary, $key = false, $replace = array()){

    }

    public function getDictionary(){
        return $this->_dictionary;
       // var_dump($this->_dictionary);
    }

}