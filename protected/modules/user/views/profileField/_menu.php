<?php
$array = array(
	array('label'=>UserModule::t('Manage User'), 'url'=>array('/user/admin'),'visible'=>Yii::app()->user->checkAccess("User.Admin.Admin")),
	array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin'),'visible'=>Yii::app()->user->checkAccess("User.ProfileField.admin")),
);
$menu = array_merge($list,$array );
$this->menu=$menu;
?>
