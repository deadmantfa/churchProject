<?php
$this->breadcrumbs=array(
	UserModule::t('Profile Fields')=>array('admin'),
	UserModule::t('Manage'),
);
?>
<h1><?php echo UserModule::t('Manage Profile Fields'); ?></h1>

<?php echo $this->renderPartial('_menu', array(
		'list'=> array(
					array(
						'label'=>UserModule::t('Create Profile Field'),'url'=>array('create'),'visible'=>Yii::app()->user->checkAccess("User.ProfileFiled.Create")
					)
		),
	));
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id',
		'varname',
		array(
			'name'=>'title',
			'value'=>'UserModule::t($data->title)',
		),
		'field_type',
		'field_size',
		//'field_size_min',
		array(
			'name'=>'required',
			'value'=>'ProfileField::itemAlias("required",$data->required)',
		),
		//'match',
		//'range',
		//'error_message',
		//'other_validator',
		//'default',
		'position',
		array(
			'name'=>'visible',
			'value'=>'ProfileField::itemAlias("visible",$data->visible)',
		),
		//*/
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
			'buttons'=>array
			(
				'view' => array
				(
					'visible'=>'Yii::app()->user->checkAccess("User.ProfileField.View")'
				),
				'update' => array
				(
					'visible'=>'Yii::app()->user->checkAccess("User.ProfileField.Update")'
				),
				'delete' => array
				(
					'visible'=>'Yii::app()->user->checkAccess("User.ProfileField.Delete")'
				),
			),
		),
	),
)); ?>
