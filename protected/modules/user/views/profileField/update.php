<?php
$this->breadcrumbs=array(
	UserModule::t('Profile Fields')=>array('admin'),
	$model->title=>array('view','id'=>$model->id),
	UserModule::t('Update'),
);
?>

<h1><?php echo UserModule::t('Update ProfileField ').$model->id; ?></h1>

<?php echo $this->renderPartial('_menu', array(
		'list'=> array(
					array(
						'label'=>UserModule::t('Create Profile Field'),'url'=>array('create'),'visible'=>Yii::app()->user->checkAccess("User.ProfileFiled.Create"),
						'label'=>UserModule::t('View Profile Field'),'url'=>array('view','id'=>$model->id),'visible'=>Yii::app()->user->checkAccess("User.ProfileFiled.View"),
					)
		),
	));
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>