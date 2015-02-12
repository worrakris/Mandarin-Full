<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('images', 'images/');
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Mandarin Golden Valley Hotel and Resort (Khao Yai)',
    'language' => 'en',
    'timeZone' => 'Asia/Bangkok',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'modules' => array(
// uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123456',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
        'BackOffice',
        'Booking',
    ),
    // application components
    'components' => array(
//        'Smtpmail' => array(
//            'class' => 'application.extensions.smtpmail.PHPMailer',
//            'Host' => "smtp.gmail.com",
//            'Username' => 'worrakris@gmail.com',
//            'Password' => 'WBPass111023',
//            'Mailer' => 'smtp',
//            'Port' => 465,
//            'SMTPAuth' => true,
//        ),
//        'user' => array(
//            // enable cookie-based authentication
//            'allowAutoLogin' => true,
//        ),
//        'image' => array(
//            'class' => 'application.extensions.image.CImageComponent',
//            // GD or ImageMagick
//            'driver' => 'GD',
//            // ImageMagick setup path
//            'params' => array('directory' => '/opt/local/bin'),
//        ),
        'user' => array(
            'allowAutoLogin' => true,
            'class' => 'BackOffice.components.BackOfficeUser',
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                'showScriptName' => false,
            ),
        ),
        /* 'db'=>array(
          'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
          ), */
// uncomment the following to use a MySQL database
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=mandari1_project',
            'emulatePrepare' => true,
            'username' => 'mandari1_arm',
            'password' => 'arm12345',
            'charset' => 'utf8',
        ),
        'errorHandler' => array(
// use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
    ),
    // application-level parameters that can be accessed
// using Yii::app()->params['paramName']
    'params' => array(
// this is used in contact page
        'adminEmail' => 'worrakris@gmail.com',
        'saleEmail' => 'worrakris@gmail.com',
//        'saleEmail' => 'nareerat@mandarin-khaoyai.com',
    ),
);
