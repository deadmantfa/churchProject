<?php
$this->breadcrumbs=array(
	UserModule::t('Profile Fields')=>array('admin'),
	UserModule::t($model->title),
);
?>
<h1><?php echo UserModule::t('View Profile Field #').$model->varname; ?></h1>

<?php echo $this->renderPartial('_menu', array(
		'list'=> array(
					array(
						'label'=>UserModule::t('Create Profile Field'),'url'=>array('create'),'visible'=>Yii::app()->user->checkAccess("User.ProfileFiled.Create"),
						'label'=>UserModule::t('Update Profile Field'),'url'=>array('update','id'=>$model->id),'visible'=>Yii::app()->user->checkAccess("User.ProfileFiled.Update"),
						'label'=>UserModule::t('Delete Profile Field'),'url'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure to delete this item?'),'visible'=>Yii::app()->user->checkAccess("User.ProfileFiled.Delete"),
					)
		),
	));
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'varname',
		'title',
		'field_type',
		'field_size',
		'field_size_min',
		'required',
		'match',
		'range',
		'error_message',
		'other_validator',
		'widget',
		'widgetparams',
		'default',
		'position',
		'visible',
	),
)); ?>
