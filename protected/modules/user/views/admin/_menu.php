<?php
$array = array(
	array('label'=>UserModule::t('List User'),  'url'=>array('/user'),'visible'=>Yii::app()->user->checkAccess("User.Default.Index")),
	array('label'=>UserModule::t('Manage User'), 'url'=>array('admin'),'visible'=>Yii::app()->user->checkAccess("User.Admin.Admin")),
	array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin'),'visible'=>Yii::app()->user->checkAccess("User.ProfileField.Admin")),
);
$menu = array_merge($list,$array );
$this->menu=$menu;
?>
