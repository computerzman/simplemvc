<?php

return [
    'template' => [
        'wrapperstart'  => TEMPLATE_PATH . 'wrapperstart.php',
        'nav'           => TEMPLATE_PATH . 'navbar.php',
        ':view'         => ':action_view',
        'wrapperend'    => TEMPLATE_PATH . 'wrapperend.php',
    ],
    'header_resources' => [
            'css' => [
                'bootstrap'=> CSS . 'bootstrap.min.css',
                'metisMenu'=> CSS . 'metisMenu.min.css',
                'admincss'=> CSS . 'admin.css',
                'fawesome'=> CSS . 'font-awesome.min.css',
                'foundationicons'=> CSS . 'foundation-icons.css',
                'datatablebootstraprespnsivecss'=> CSS . 'responsive.bootstrap.min.css',
                'custom'=> CSS . 'custom.css',
            ],
            'js' => [
                'html5shiv'     =>  JS . 'html5shiv.js',
                'respond'       =>  JS . 'respond.min.js'
            ]
    ],
    'footer_resources' => [
        'js' => [
            'jquery'        => JS . 'jquery.min.js',
            'bootstrapjs'        => JS . 'bootstrap.min.js',
            'datatablejqueryjs'        => JS . 'jquery.dataTables.min.js',
            'datatablebootstrapjs'        => JS . 'dataTables.bootstrap.min.js',
            'datatablebootstraprespnsivejs'        => JS . 'responsive.bootstrap.min.js',
            'metisMenujs'        => JS . 'metisMenu.min.js',
            'adminjs'        => JS . 'admin.js'
        ]
    ]

];