<?php
/**
 * Yii application environmental configuration
 *
 * @name Enviroment
 * @author Wenceslaus D'silva.
 * @version 1.1 (updated 07/02/2011 Gavin Fonseca)
 */

class Environment {

	const DEVELOPMENT = 100;
	const TEST        = 200;
	const STAGE       = 300;
	const PRODUCTION  = 400;

	private $_mode = 0;
	private $_debug;
	private $_trace_level;
	private $_config;

	/**
	 * Returns the debug mode
	 * @return Bool
	 */
	public function getDebug() {
		return $this->_debug;
	}

	/**
	 * Returns the trace level for YII_TRACE_LEVEL
	 * @return int
	 */
	public function getTraceLevel() {
		return $this->_trace_level;
	}

	/**
	 * Returns the configuration array depending on the mode
	 * you choose
	 * @return array
	 */
	public function getConfig() {
		return $this->_config;
	}

	/**
	 * Initilizes the Enviroment class with the given mode
	 * @param constant $mode
	 */
	function __construct($mode) {
		$this->_mode = $mode;
		$this->setConfig();
	}

	/**
	 * Sets the configuration for the choosen enviroment
	 * @param constant $mode
	 */
	private function setConfig() {
		switch($this->_mode) {
			case self::DEVELOPMENT:
				$this->_config      = array_merge_recursive ($this->_main(), $this->_development());
				$this->_debug       = TRUE;
				$this->_trace_level = 3;
				break;
			case self::TEST:
				$this->_config      = array_merge_recursive ($this->_main(), $this->_test());
				$this->_debug       = FALSE;
				$this->_trace_level = 0;
				break;
			case self::STAGE:
				$this->_config      = array_merge_recursive ($this->_main(), $this->_stage());
				$this->_debug       = TRUE;
				$this->_trace_level = 0;
				break;
			case self::PRODUCTION:
				$this->_config      = array_merge_recursive ($this->_main(), $this->_production());
				$this->_debug       = FALSE;
				$this->_trace_level = 0;
				break;
			default:
				$this->_config      = array_merge_recursive ($this->_main(), $this->_production());
				$this->_debug       = FALSE;
				$this->_trace_level = 0;
				break;
		}
	}

	/**
	 * Main configuration
	 * This is the general configuration that uses all enviroments
	 */
	private function _main() {
		return array(
			'catchAllRequest'=>file_exists(dirname(__FILE__).'/.maintenance') && !(isset($_COOKIE['secret']) && $_COOKIE['secret']=="password") && !strstr($_SERVER['REDIRECT_URL'], '/aems/UP/Up/') ? array('maintenance/index') : null,
			
			// Base Path
			'basePath' => dirname(__FILE__).DIRECTORY_SEPARATOR.'..',

			//Project Name
			'name' => 'Church Administration',

			//Theme
			'theme'=>'twitter',

			// Preloading 'log' component
			'preload'=>array('log','bootstrap',),

			// autoloading model and component classes
			'import' => array(
				'application.models.*',
				'application.components.*',
				'ext.bootstrap.widgets.*',
				'ext.tcpdf.*',
				'ext.fpdi.*',
				'ext.fpdf.*',
				'application.modules.user.models.*',
				'application.modules.user.components.*',
				'application.modules.rights.*',
				'application.modules.rights.components.*',
			),

			// Modules list used in the application
			'modules'=>array(
				'Baptism','Marriage',
				'user'=>array(
					'tableUsers' => 'chu_users',
					'tableProfiles' => 'chu_profiles',
					'tableProfileFields' => 'chu_profilesFields',
				),
				'rights'=>array(
					'install'=>false,
					'superuserName'=>'admin',
					'authenticatedName'=>'Authenticated',
					'debug'=>true,
				),
			),

			// Application components
			'components' => array(
				'cache'=>array(
					'class'=>'CMemCache',
					'servers'=>array(
						array(
							'host'=>'localhost',
							'port'=>11211,
							'weight'=>60,
						),
					),
				),
				'user'=>array(
					'class'=>'RWebUser',
					// enable cookie-based authentication
					'allowAutoLogin'=>true,
					'loginUrl' => array('/user/login'),
                ),
				'authManager'=>array(
					'class'=>'RDbAuthManager',
					'connectionID'=>'db',
					'defaultRoles'=>array('Authenticated', 'Guest'),
					'itemTable'=>'chu_authitem',
					'itemChildTable'=>'chu_authitemchild',
					'assignmentTable'=>'chu_authassignment',
					'rightsTable'=>'chu_rights',
				),
				// Error Handler
				'errorHandler'=>array(
					'errorAction'=>'site/error',
				),

				// URLs in path-format
				'urlManager'=>array(
					'urlFormat'=>'path',
					'showScriptName'=>false,
					'rules'=>array(
					)
				),
				'bootstrap'=>array(
					'class'=>'ext.bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
					'coreCss'=>true, // whether to register the Bootstrap core CSS (bootstrap.min.css), defaults to true
					'responsiveCss'=>true, // whether to register the Bootstrap responsive CSS (bootstrap-responsive.min.css), default to false
					'plugins'=>array(
						// Optionally you can configure the "global" plugins (button, popover, tooltip and transition)
						// To prevent a plugin from being loaded set it to false as demonstrated below
						'transition'=>true, // disable CSS transitions
						'tooltip'=>array(
							'selector'=>'a.tooltip', // bind the plugin tooltip to anchor tags with the 'tooltip' class
							'options'=>array(
								'placement'=>'bottom', // place the tooltips below instead
							),
						),

						// If you need help with configuring the plugins, please refer to Bootstrap's own documentation:
						// http://twitter.github.com/bootstrap/javascript.html
					),
				),
				
				'request'=>array(
					'enableCsrfValidation'=>false,
				),
				'session'=>array(
					'class'=>'system.web.CDbHttpSession',
					'connectionID'=>'db',
				),

				// Database
				'db'=>array(
					'class'=>'CDbConnection',
					'charset'=>'utf8',
					'emulatePrepare' => true,
					'tablePrefix'=>'chu_',
				),
				'widgetFactory' => array(
					'class'=>'CWidgetFactory',
					'widgets' => array(
						'CJuiDatePicker' => array(
							'themeUrl'=>'/church/themes/twitter/css/jQueryUIThemes',
							'theme' => 'start',
							'options'=>array(
								'dateFormat'=>'yy-mm-dd',
								'changeMonth' => 'true',
								'changeYear' => 'true',
								'constrainInput' => 'false',
								'duration'=>'normal',
								'showAnim' =>'clip'
							),
						),
						'CJuiDialog' => array(
							'themeUrl'=>'/church/themes/twitter/css/jQueryUIThemes',
							'theme' => 'start',
						),
						'CJuiAccordion' => array(
							'themeUrl'=>'/church/themes/twitter/css/jQueryUIThemes',
							'theme' => 'start',
						),
						'CJuiAutoComplete' => array(
							'themeUrl'=>'/church/themes/twitter/css/jQueryUIThemes',
							'theme' => 'start',
						),
					),
				),
			),

			'params'=>array(
				// this is used in contact page
				'adminEmail'=>'wenceslausdsilva@gmail.com',
				'tab_prefix'=>'chu_',
				'keyphrase'=>'9415ef0092c5d7a025e4069f5ee3a2a5',
				'prefix_chars'=>'/( |-|\.)$/',
				'enviroment'=> $this->_mode,
				'defaultPageSize'=>20,
				'gridFilterPosition'=>'footer',
				'pageTitle'=>' :: Church Administration',
				'companyName'=>'St. Mary\'s Church, Al Ain',
				'creator'=>'Wenceslaus D\'silva'
			),
		);
	}

	/**
	 * Development configuration
	 * Usage:
	 * - Show all details on each error.
	 * - Gii module enabled
	 */
	private function _development () {
		return array(

			// Modules
			'modules'=>array(
				'gii'=>array(
					'class'=>'system.gii.GiiModule',
					'password'=>'R0ck$0lid',
					'ipFilters'=>array('127.0.0.1','::1'),
					'generatorPaths'=>array('bootrap.gii',),
				),
			),

			// Application components
			'components' => array(

				// Database
				'db'=>array(
					'connectionString'=>'mysql:host=localhost;dbname=church',
					'username'=>'root',
					'password'=>'admin',
				),

				// Application Log
				'log'=>array(
					'class'=>'CLogRouter',
					'routes'=>array(
						// Save log messages on file
						array(
						'class'=>'CFileLogRoute',
						'levels'=>'error, warning,trace, info',
						),
					),
				),
			),
		);
	}

	/**
	 * Test configuration
	 * Usage:
	 * - Standard production error pages (404,500, etc.)
	 * @var array
	 */
	private function _test() {
		return array(

			// Application components
			'components' => array(

				// Database
				'db'=>array(
					'connectionString'=>'mysql:host=localhost;dbname=church',
					'username'=>'root',
					'password'=>'admin',
				),


				// Fixture Manager for testing
				'fixture'=>array(
					'class'=>'system.test.CDbFixtureManager',
				),

				// Application Log
				'log'=>array(
					'class'=>'CLogRouter',
					'routes'=>array(
						array(
							'class'=>'CFileLogRoute',
							'levels'=>'error, warning,trace, info',
						),
					),
				),
			),
		);
	}

	/**
	 * Stage configuration
	 * - All details on error
	 */
	private function _stage() {
		return array(

			// Application components
			'components' => array(
				// Database
				'db'=>array(
					'connectionString'=>'mysql:host=localhost;dbname=church',
					'username'=>'root',
					'password'=>'admin',
				),

				// Application Log
				'log'=>array(
					'class'=>'CLogRouter',
					'routes'=>array(
						array(
							'class'=>'CFileLogRoute',
							'levels'=>'error, warning, trace, info',
						),
					),
				),
			),
		);
	}

	/**
	 * Production configuration
	 * - Standard production error pages (404,500, etc.)
	 */
	private function _production() {
		return array(

			// Application components
			'components' => array(

				// Database
				'db'=>array(
					'connectionString'=>'mysql:host=localhost;dbname=church',
					'username'=>'root',
					'password'=>'admin',
				),
				// Application Log
				'log'=>array(
					'class'=>'CLogRouter',
					'routes'=>array(
						// Send errors via email to the system admin
						array(
							'class'=>'CFileLogRoute',
							'levels'=>'error, warning,trace, info',
						),
						array(
							'class'=>'CEmailLogRoute',
							'levels'=>'error, warning',
							'emails'=>'wenceslausdsilva@gmail.com',
						),
						
					),
				),
			),
		);
	}

}
?>
