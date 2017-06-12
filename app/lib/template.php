<?php
/**
 * Description of abstractcontroller
 *
 * @author Mohamed Hassn Elmetwaly (03-06-2017)
 * mhe.developer@gmail.com
 */
namespace BATRAHOSTMVC\LIB;
class Template
{

    private $_templateParts;
    private $_action_view;
    private $_data;

    public function  __construct(array $parts)
    {
        $this->_templateParts = $parts;
    }

    public function setActionViewFile($actionViewPath)
    {
        $this->_action_view = $actionViewPath;
    }

    public function setAppData($data)
    {
        $this->_data = $data;
    }

    private function renderTemplateHeaderStart()
    {
        extract($this->_data);
        require_once TEMPLATE_PATH . 'templateheaderstart.php';
    }

    private function renderTemplateHeaderEnd()
    {
        extract($this->_data);
        require_once TEMPLATE_PATH . 'templateheaderend.php';
    }

    private function renderTemplateFooter()
    {
        extract($this->_data);
        require_once TEMPLATE_PATH . 'templatefooter.php';
    }

    private function renderTemplateBlocks()
    {
        if(!array_key_exists('template', $this->_templateParts))
        {
            trigger_error('Sorry you have to define the template blocks', E_USER_WARNING);
        }
        else {
            $parts = $this->_templateParts['template'];
            if(!empty($parts)) {
                extract($this->_data);
                foreach ($parts as $partKey => $file) {
                    if($partKey === ':view')
                    {

                        require_once $this->_action_view;
                    }
                    else {
                      //  echo $file;
                        require_once $file;
                    }


                }
            }

        }

    }

    private function renderHeaderResources()
    {
        $output = '';
        if(!array_key_exists('header_resources', $this->_templateParts))
        {
            trigger_error('Sorry you have to define the header resources', E_USER_WARNING);
        }
        else {
            $resources = $this->_templateParts['header_resources'];
            // Generate CSS Links
            $css = $resources['css'];
            if(!empty($css)) {
                foreach ($css as $cssKey => $path) {
                    $output .= '<link type="text/css" rel="stylesheet" href="'.$path.'" />';
                }
            }
            // Generate JS Scripts
            $js = $resources['js'];
            foreach ($js as $jsKey => $path) {
                if ($jsKey != 'html5shiv' && $jsKey != 'respond') {
                    $output .= '<script src="' . $path . '" /></script>';
                } else {
                    $output .= '
                <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
                <!-- WARNING: Respond.js doesn\'t work if you view the page via file:\\// -->
                <!--[if lt IE 9]>
                <script src="' . $path . '" /></script>
                <![endif]-->';
                }
            }

            echo $output;

        }

    }


    private function renderFooterResources()
    {
        $output = '';
        if(!array_key_exists('footer_resources', $this->_templateParts))
        {
            trigger_error('Sorry you have to define the footer resources', E_USER_WARNING);
        }
        else {
            $resources = $this->_templateParts['footer_resources'];

            // Generate JS Scripts
            $js = $resources['js'];
            foreach ($js as $jsKey => $path) {
                if ($jsKey != 'html5shiv' && $jsKey != 'respond') {
                    $output .= '<script src="' . $path . '" /></script>';
                } else {
                    $output .= '
                <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
                <!-- WARNING: Respond.js doesn\'t work if you view the page via file:\\// -->
                <!--[if lt IE 9]>
                <script src="' . $path . '" /></script>
                <![endif]-->';
                }
            }

            echo $output;

        }

    }

    public function renderApp()
    {

        extract($this->_data);
        $this->renderTemplateHeaderStart();
        $this->renderHeaderResources();
        $this->renderTemplateHeaderEnd();
        $this->renderTemplateBlocks();
        $this->renderFooterResources();
        $this->renderTemplateFooter();

        //require_once TEMPLATE_PATH . 'wrapperstart.php';
        //require_once TEMPLATE_PATH . 'navbar.php';
        //require_once $this->_action_view;
        //require_once TEMPLATE_PATH . 'wrapperend.php';

    }

}