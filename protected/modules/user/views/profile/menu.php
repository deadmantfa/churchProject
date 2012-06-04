
<?php
$this->menu=array(
	array('label'=>UserModule::t('Manage User'), 'url'=>array('/user/admin'),'visible'=>Yii::app()->user->checkAccess("User.Admin.Admin"),),
	array('label'=>UserModule::t('List User'), 'url'=>array('/user'),'visible'=>Yii::app()->user->checkAccess("User.*"),),
	array('label'=>UserModule::t('Profile'), 'url'=>array('/user/profile'),'visible'=>Yii::app()->user->checkAccess("User.Profile.Profile"),),
	array('label'=>UserModule::t('Edit'), 'url'=>array('edit'),'visible'=>Yii::app()->user->checkAccess("User.Profile.Edit"),),
	array('label'=>UserModule::t('Change password'), 'url'=>array('changepassword'),'visible'=>Yii::app()->user->checkAccess("User.Profile.Changepassword")),
);
?>