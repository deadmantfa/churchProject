<?php
$this->breadcrumbs=array(
	(UserModule::t('Users'))=>array('admin'),
	$model->username=>array('view','id'=>$model->id),
	(UserModule::t('Update')),
);
?>

<h1><?php echo  UserModule::t('Update User')." ".$model->id; ?></h1>

<?php echo $this->renderPartial('_menu', array(
		'list'=> array(
					array(
						'label'=>UserModule::t('Create User'),'url'=>array('create'),'visible'=>Yii::app()->user->checkAccess("User.Admin.Create"),
						'label'=>UserModule::t('View User'),'url'=>array('view','id'=>$model->id),'url'=>array('create'),'visible'=>Yii::app()->user->checkAccess("User.Admin.View"),
					)
		),
	)); 

	echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile)); ?>