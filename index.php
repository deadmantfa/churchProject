<?php
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);
ini_set('display_errors', 'On');

require_once(dirname(__FILE__).'/protected/config/environment.php');
//$environment = new Environment(Environment::PRODUCTION);
$environment = new Environment(Environment::DEVELOPMENT);
//$environment = new Environment(Environment::STAGE);
//$environment = new Environment(Environment::TEST);

$yii=dirname(__FILE__).'/../../../www-protected/yii/framework/yii.php';

defined('YII_DEBUG') or define('YII_DEBUG',$environment->getDebug());
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', $environment->getTraceLevel());

require_once($yii);
Yii::createWebApplication($environment->getConfig())->run();