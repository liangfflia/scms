<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Auto',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.models.scms.*',
		'application.models.scms.admin.*',
		'application.components.*',
		'application.components.behaviors.*',
		'application.components.widgets.*',
		'application.components.custom.*',
		'application.components.custom.behaviors.*',
		'application.components.custom.controllers.*',
		'application.components.custom.helpers.*',
		'application.components.custom.views.*',
		'application.components.custom.widgets.*',
		'application.components.custom.forms.*',
		
//		SCMS INCLUDES
		'application.components.scms.admin.controllers.*',
		'application.components.scms.admin.models.*',
		'application.components.scms.admin.widgets.*',
		'application.components.scms.behaviors.*',
		'application.components.scms.helpers.*'
	),

//	'defaultController'=>'post',
	'defaultController'=>'page',

	// application components
	'components'=>array(
                'assetManager' => array(
                        'linkAssets' => true,
                ),
                'authManager' => array(
                    // Будем использовать свой менеджер авторизации
                    'class' => 'PhpAuthManager',
                    // Роль по умолчанию. Все, кто не админы, модераторы и юзеры — гости.
                    'defaultRoles' => array('guest'),
                   
                ),
//		'user'=>array(
//			// enable cookie-based authentication
//			'allowAutoLogin'=>true,
//                        'class' => 'WebUser',
//                        'loginUrl'=>array('admin/admin/validate'),
//		),
//		'db'=>array(
//			'connectionString' => 'sqlite:protected/data/blog.db',
//			'tablePrefix' => 'tbl_',
//		),
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=scms',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			'tablePrefix' => 'tbl_',
		),
	    
//        ENABLE IN PRODUCTION
//        'cache'=>array(
//            'class'=>'system.caching.CEAcceleratorCache',
//        ),
		
		'session' => array(
		   'cookieParams' => array(
		      'lifetime' => 600,
		   ),
		),

//		'errorHandler'=>array(
//			// use 'site/error' action to display errors
//			'errorAction'=>'site/error',
//		),
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName' => false,
			'rules'=>array(
				'<action:(login|logout|test2)>' => 'site/<action>',
				'post/<id:\d+>/<title:.*?>'=>'post/view',
				'posts/<tag:.*?>'=>'post/index',
				'admin/page/index/<id:\d+>'=>'admin/page/index',
				'articles/<category:\w+>'=>'articles/index',
				'photo/page/<page:\d+>'=>'photo/index',
				'photo/<category:\w+>'=>'photo/index',
				'photo/<category:\w+>/<catname>/<page>'=>'photo/index',
				'news/<id:\d+>'=>'news/one',
				'news/page/<page:\d+>'=>'news/index',
				'fav/news/<id:\d+>'=>'fav/newsone',
				'<alias>.html'=>'page/view',
//				'admin/page/index/<id:\d+>'=>array('page/index'),
				'autocatalog/<model:.+>'=>array('autocatalog/index'),
				'<versId>/autocatalog/<mark>/<model>'=>array('autocatalog/view'),
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
//				'<url:[^\/]+>'=>array('page/view','urlSuffix'=>'.html'),
			),
		),
		'controllerMap'=>array(
                'page'=>array(
					'class'=>'application.controllers.admin.AdminPageController',
                ),
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
		'image'=>array(
					'class'=>'application.extensions.image.CImageComponent',
					// GD or ImageMagick
					'driver'=>'GD',
					// ImageMagick setup path
					'params'=>array('directory'=>'/images'),
				),
	),
	
	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123',
			'generatorPaths'=>array(
				'ext.gtc',   // Gii Template Collection
				),
			// 'ipFilters'=>array(…список IP…),
			// 'newFileMode'=>0666,
			// 'newDirMode'=>0777,
		),
	),
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__).'/params.php'),
);
